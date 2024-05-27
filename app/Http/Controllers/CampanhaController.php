<?php

namespace App\Http\Controllers;

use App\Models\Campanha;
use App\Models\User;
use App\Models\DoacaoFisica;
use App\Services\CampanhaService;
use App\Services\CategoriaService;
use App\Services\UtilitarioService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class CampanhaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $proxy = [
        'http'  => 'http://proxy.jupiter.co.ao:3128',
        'https' => 'http://proxy.jupiter.co.ao:3128'
        //'no'    => ['localhost', '127.0.0.1'], // Hosts que não devem usar o proxy
    ];
    private $api = 'https://fnx.ao/wp-json/wc/v3/';
    private $consumer_key = 'ck_bbcc18e176c8ac191e3b3a17580e3b712104f8a1';
    private $consumer_secret = 'cs_f92f47e3020fda9e7fed62da9a1c6b860824f96d';

    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'int|nullable',
            'eliminado' => 'int|nullable',
            'estado' => 'string|nullable'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }
        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->listCampanha(
            $request->user_id,
            $request->eliminado,
            $request->search,
            $request->estado
        );
        if(!empty($request->search)){
            session()->flash('search', $request->search);
        }

        $CategoriaService = new CategoriaService();
        $categorias = $CategoriaService->listCategoria();

        return view('portal.blog.blog',['campanhas' => $response['data'],'categorias' => $categorias['data']]);
    }


    public function campanhaHome(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'int|nullable',
            'eliminado' => 'int|nullable'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }

        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->campanhasRecentes(3);

        $doacaoFisica = new DoacaoFisica();
        $doacoes = $doacaoFisica->listDoacaoFisica();

        return view('portal.index',['campanhas' => $response['data'],'doacoes' => $doacoes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('REGISTAR CAMPANHA');
        $CategoriaService = new CategoriaService();
        $response = $CategoriaService->listCategoria();
        return view('portal.blog.solicitar-doacao' ,
                    ['categorias' => UtilitarioService::getNameToSelect($response['data'])]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('REGISTAR CAMPANHA');

        $request->validate([
            'titulo' => ['required', 'string', 'min:20', 'max:255'],
            'descricao' => ['required'],
            'categoria_id' => ['required', 'int'],
            'quantia' => ['required', 'int'],
            'imagem' => ['required'],
        ]);
        $CampanhaService = new CampanhaService();

        $CampanhaService->createCampanha(
            Auth::user()->id,
            $request->titulo,
            $request->descricao,
            $request->categoria_id,
            $request->quantia,
            $request->imagem
            //UtilitarioService::imageToBase64($request, "capa")
        );

        session()->flash('mensagem', 'SUCESSO!!!');
        return redirect()->route('campanha.create');
       // return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Campanha $campanha)
    {
        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->getCampanha(
            $campanha->id
        );
        return view('portal.blog.details',['campanha' => $response['data']]);
      // return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Campanha $campanha)
    {
        $this->authorize('edit', $campanha);
        $CategoriaService = new CategoriaService();
        $validacao = new FuncoesUteisController();
        $response = $CategoriaService->listCategoria();
        $categorias= $validacao->getNames($response['data']);
        return view('portal.blog.solicitar-doacao' , ['campanha' => $campanha,'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'min:20', 'max:255'],
            'descricao' => ['required'],
            'categoria_id' => ['required', 'int'],
            'imagem' => ['required'],
        ]);

        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->updateCampanha(
            $id,
            $request->titulo,
            $request->descricao,
            $request->categoria_id,
            $request->imagem
        );
        session()->flash('mensagem', 'CAMPANHA ALTERADA COM SUCESSO!!!');
        return redirect()->route('campanha.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        int $campanhaId
    ) {
        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->deleteCampanha($campanhaId);
        session()->flash('mensagem', 'CAMPANHA EXLUÍDA COM SUCESSO!!!');
        return redirect()->route('campanha.index', $campanhaId);
        // return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    public function campanhasRecentes(
        Request $request,
        int $limit
    ){
        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->campanhasRecentes(
            $request->limit,
            $request->excepto_id
        );
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }
    public function shop(){
        $url = $this->api . 'products?consumer_key='.$this->consumer_key.'&consumer_secret='.$this->consumer_secret;
        try {
            $products = Http::withOptions([
                'proxy' => $this->proxy
            ])->get($url);
            $products =$products->json();
        } catch (Exception $e) {
            session()->flash('error', 'Não foi possível conectar ao servidor');
            $products = [];
        }
        return view('portal.doacao/shop',['products' => $products]);
    }

    public function shopdetail($id){
        $url = $this->api . 'products/'.$id.'?consumer_key='.$this->consumer_key.'&consumer_secret='.$this->consumer_secret;
        try {
            $product = Http::withOptions([
                'proxy' => $this->proxy
            ])->get($url);
            $product =$product->json();
        } catch (Exception $e) {
            session()->flash('error', 'Não foi possível conectar ao servidor');
            $product = null;
        }
        return view('portal.doacao/shop-detail',['product' => $product]);
    }
    public function historiasdesucesso(Request $request){

        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->listCampanha(
            null,
            null,
            null,
            $request->estado
        );
        return view('portal.blog/historia-de-sucesso',['campanha' => $response['data']]);
    }
    public function fazerPedido(Request $request){


        // Dados do Pedido
        $order_data = array(
            'customer_id' => 0, // ID do cliente
            'payment_method' => 'bacs', // Método de pagamento (neste caso, transferência bancária)
            'payment_method_title' => 'Transferência Bancária',
            'set_paid' => false, // Define como pago automaticamente
            'billing' => array(
                'first_name' => 'Rosimeuri Borges',
                'email' => 'nimeuri@hotmail.com',
                'phone' => '999 123 123'
            ),
            'line_items' => array(
                array(
                    'product_id' => 15693, // ID do Produto
                    'quantity' => 2 // Quantidade a comprar
                ),
                array(
                    'product_id' => 15701, // ID do Produto
                    'quantity' => 1 // Quantidade a comprar
                )
            )
        );
        try {
            $response = Http::withOptions([
                'proxy' => $this->proxy
            ])->withHeaders([
                'Authorization' => 'Basic ' . base64_encode($this->consumer_key . ':' . $this->consumer_secret),
                'Content-Type' => 'application/json'
            ])->post($this->api . 'orders', $order_data);
            //])->delete($this->api . 'orders/15739');

            if ($response->successful()) {
                $order = $response->json();
                return "Pedido criado com sucesso. ID do Pedido: " . 15697;
            } else {
                $statusCode = $response->status();
                $errorBody = $response->body();
                return  response()->json("Erro ao criar o pedido. Código de Status: $statusCode. Mensagem: $errorBody");
            }
        } catch (\Exception $e) {
            return "Erro ao criar o pedido: " . $e->getMessage();
        }

        return "PEDIDO EFECTUADO COM SUCESSO";
    }
}
