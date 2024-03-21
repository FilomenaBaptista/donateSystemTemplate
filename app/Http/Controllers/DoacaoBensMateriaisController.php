<?php

namespace App\Http\Controllers;

use App\Services\DoacaoBensMateriaisService;
use App\Models\DoacaoBensMateriais;
use App\Services\CategoriaService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoacaoBensMateriaisController extends Controller
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
        $DoacaoBensMateriaisService = new DoacaoBensMateriaisService();
        $response = $DoacaoBensMateriaisService->listDoacaoBensMateriais(
            $request->user_id,
            $request->eliminado
        );

        return view('portal.doacao/doacao',['doacoes' => $response['data']]);
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
        return view('portal.doacao/doacao',['categorias' => $categorias]);
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

        $DoacaoBensMateriaisService = new DoacaoBensMateriaisService();
        $response = $DoacaoBensMateriaisService-> createDoacaoBensMateriais(
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
        return redirect()->route('doar.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $doacaoBensMateriaisId)
    {
        $DoacaoBensMateriaisService = new DoacaoBensMateriaisService();
        $response = $DoacaoBensMateriaisService->getDoacaoBensMateriais( $doacaoBensMateriaisId);
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoacaoBensMateriais $doacaoBensMateriais)
    {
        //
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

        $DoacaoBensMateriaisService = new DoacaoBensMateriaisService();
        $response = $DoacaoBensMateriaisService->updateDoacaoBensMateriais(
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
    public function destroy(  int $doacaoBensMateriaisId)
    {
        $DoacaoBensMateriaisService = new DoacaoBensMateriaisService();
        $response = $DoacaoBensMateriaisService->deleteDoacaoBensMateriais($doacaoBensMateriaisId);
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }


    public function doacoesRecentes(
        int $limit
    ){
        $DoacaoBensMateriaisService = new DoacaoBensMateriaisService();
        $response = $DoacaoBensMateriaisService->DoacaoBensMateriaissRecentes($limit);
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }
}
