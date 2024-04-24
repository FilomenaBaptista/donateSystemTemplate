<?php

namespace App\Http\Controllers;

use App\Models\Campanha;
use App\Models\User;
use App\Models\DoacaoFisica;
use App\Services\CampanhaService;
use App\Services\CategoriaService;
use App\Services\UtilitarioService;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Return_;

class CampanhaController extends Controller
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
        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->listCampanha(
            $request->user_id,
            $request->eliminado,
            $request->search
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
        $response = $CampanhaService->listCampanha(
            $request->user_id,
            $request->eliminado
        );

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
            'imagem' => ['required'],
        ]);
        $CampanhaService = new CampanhaService();
        $CampanhaService->createCampanha(
            Auth::user()->id,
            $request->titulo,
            $request->descricao,
            $request->categoria_id,
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
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
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
}
