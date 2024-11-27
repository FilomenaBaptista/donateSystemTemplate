<?php

namespace App\Http\Controllers;

use App\Services\DoacaoService;
use Illuminate\Http\Request;

class DoacaoController extends Controller
{
    public function index(Request $request)
    {
        $Doacoes = new DoacaoService();
        $validator = Validator::make($request->all(), [
            'doador_id' => 'int|nullable',
            'campanha_id' => 'int|nullable',
            'eliminado' => 'int|nullable',
            'status' => 'string|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }
    
        $response = $Doacoes->listDoacao(
            $request->doador_id,
            $request->campanha_id,
            $request->eliminado,
            $request->status
        );
        if (!empty($request->search)) {
            session()->flash('search', $request->search);
        }

        $CategoriaService = new CategoriaService();
        $categorias = $CategoriaService->listCategoria();

        return view('portal.blog.list-doacao-campanha', ['campanhas' => $response['data'], 'categorias' => $categorias['data']]);
    }

    public function show(int $doacaoId)
    {
        return response()->json(2);
    }

    public function store(Request $doacaoId)
    {
        //$Doacao = Doacao::create($request->all());
        return response()->json(1, 201);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'status' =>  ['required', 'string','nullable']
        ]);

        $Doacao = new DoacaoService();
        $response = $Doacao->updateDoacao(
            $id,
            $request->status
        );
        session()->flash('mensagem', 'CAMPANHA ALTERADA COM SUCESSO!!!');
        return  redirect()->back();
    }

    public function destroy(int $doacaoId)
    {
        
        return response()->json(null, 204);
    }
}
