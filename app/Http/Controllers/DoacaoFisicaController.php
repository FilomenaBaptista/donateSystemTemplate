<?php

namespace App\Http\Controllers;

use App\Services\DoacaoFisicaService;
use App\Models\DoacaoFisica;
use App\Services\CategoriaService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoacaoFisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'int|nullable',
            'eliminado' => 'int|nullable'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }
        $doacaoFisicaService = new DoacaoFisicaService();
        $response = $doacaoFisicaService->listDoacaoFisica(
            $request->user_id,
            $request->eliminado
        );
       
        $CategoriaService = new CategoriaService();
        $categorias = $CategoriaService->listCategoria();
        return view('portal.doacao/doacao',['doacoesFisicas' => $response['data'], 'categorias' => $categorias['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $CategoriaService = new CategoriaService();
        $validacao = new FuncoesUteisController();
        $response = $CategoriaService->listCategoria();
        $categorias= $validacao->getNames($response['data']);
        return view('portal.doacao/doar-bens-materiais',['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'capa' => 'required|mimes:jpg,jpeg,png,gif',
            'anuncio' => 'string|required',
            'categoria_id' => 'int|required',
            'qtd_itens_doar' => 'int|required',
            'estado_artigo' => 'string|required',
            'local' => 'string|required',
            'descricao' => 'string|required',
            'is_anonimo' => 'int|required'
        ]);

   
        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }


        $capa="";
        if ($request->hasFile('capa') && $request->file('capa')->isValid()) :
            $fileName = time().$request->file('capa')->getClientOriginalName();
            $path = $request->file('capa')->storeAs('images', $fileName, 'public');
            $capa = '/storage/'.$path;
            if (!$path):
                return redirect()->back()->withInput();
            endif;
        endif;
       
        $DoacaoFisicaService = new DoacaoFisicaService();
       
        $response = $DoacaoFisicaService->createDoacaoFisica(
            Auth::user()->id,
            $capa,
            $request->anuncio,
            $request->categoria_id,
            $request->qtd_itens_doar,
            $request->local,
            $request->estado_artigo,
            $request->descricao,
            $request->is_anonimo

        );

        session()->flash('mensagem', 'DOAÇÃO SUBMETIDA COM SUCESSO!!!');
        return redirect()->route('doar.create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doacaoFisicaService = new DoacaoFisicaService();
        $response = $doacaoFisicaService->getDoacaoFisica( $id);
        return view('portal.doacao/donate-details',['doacao' => $response['data']]);
        // return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, DoacaoFisica $doacaoFisica)
    {
        $this->authorize('edit', $doacaoFisica);

        $CategoriaService = new CategoriaService();
        $validacao = new FuncoesUteisController();
        $response = $CategoriaService->listCategoria();
        $categorias= $validacao->getNames($response['data']);
        return view('portal.doacao.solicitar-doacao' , ['campanha' => $doacaoFisica,'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'capa' => 'required|mimes:jpg,jpeg,png,gif',
            'anuncio' => 'string|required',
            'categoria_id' => 'int|required',
            'qtd_itens_doar' => 'int|required',
            'estado_artigo' => 'string|required',
            'local' => 'string|required',
            'descricao' => 'string|required',
            'is_anonimo' => 'int|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }
        $capa="";
        if ($request->hasFile('capa') && $request->file('capa')->isValid()) :
            $fileName = time().$request->file('capa')->getClientOriginalName();
            $path = $request->file('capa')->storeAs('images', $fileName, 'public');
            $capa = '/storage/'.$path;
            if (!$path):
                return redirect()->back()->withInput();
            endif;
        endif;

        $DoacaoFisicaService = new DoacaoFisicaService();
        $response = $DoacaoFisicaService->updateDoacaoFisica(
            $id,
            $capa,
            $request->anuncio,
            $request->categoria_id,
            $request->qtd_itens_doar,
            $request->local,
            $request->estado_artigo,
            $request->descricao,
            $request->is_anonimo
        );
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(  int $doacaoId)
    {
        $DoacaoFisicaService = new DoacaoFisicaService();
        $response = $DoacaoFisicaService->deleteDoacaoFisica($doacaoId);
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }


    public function doacoesRecentes(
        Request $request,
        int $limit
    ){
        $DoacaoFisicaService = new DoacaoFisicaService();
        $response = $DoacaoFisicaService->DoacaoFisicaRecentes(
            $request->limit,
            $request->excepto_id
        );
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }
}
