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
        $this->authorize('REGISTAR DOAÇÃO');

        $request->validate([
            'imagem' => ['required'],
            'anuncio' => ['required', 'string', 'min:15', 'max:255'],
            'categoria_id' =>['required', 'int'],
            'qtd_itens_doar' => ['required','int'],
            'estado_artigo' => ['required'],
            'local' => ['required'],
            'descricao' => ['required'],
            'is_anonimo' => ['required', 'int']
        ]);
       
        $DoacaoFisicaService = new DoacaoFisicaService();
       
        $DoacaoFisicaService->createDoacaoFisica(
            Auth::user()->id,
            $request->imagem,
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
    public function edit(Request $request, DoacaoFisica $doacao)
    {
        $this->authorize('edit', $doacao);

        $CategoriaService = new CategoriaService();
        $validacao = new FuncoesUteisController();
        $response = $CategoriaService->listCategoria();
        $categorias= $validacao->getNames($response['data']);
        return view('portal.doacao/doar-bens-materiais' , ['doacao' => $doacao,'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'imagem' => 'required|mimes:jpg,jpeg,png,gif',
            'anuncio' => 'string|required',
            'categoria_id' => 'int|required',
            'qtd_itens_doar' => 'int|required',
            'estado_artigo' => 'string|required',
            'local' => 'string|required',
            'descricao' => 'string|required',
            'is_anonimo' => 'int|required'
        ]);

        $DoacaoFisicaService = new DoacaoFisicaService();
        $response = $DoacaoFisicaService->updateDoacaoFisica(
            $id,
            $request->imagem,
            $request->anuncio,
            $request->categoria_id,
            $request->qtd_itens_doar,
            $request->local,
            $request->estado_artigo,
            $request->descricao,
            $request->is_anonimo
        );

        session()->flash('mensagem', 'DOAÇÃO ALTERADA COM SUCESSO!!!');
        return redirect()->route('doar.show',$id);
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
