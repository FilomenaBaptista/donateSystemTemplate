<?php

namespace App\Http\Controllers;

use App\Models\Campanha;
use App\Services\CampanhaService;
use App\Services\CategoriaService;
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
            $request->eliminado
        );
        return view('portal.blog.blog',['campanhas' => $response['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        session()->flash('mensagem', 'CAMPANHA ALTERADA COM SUCESSO!!!');
        $CategoriaService = new CategoriaService();
        $validacao = new FuncoesUteisController();
        $response = $CategoriaService->listCategoria();
        $categorias= $validacao->getNames($response['data']);
       // return view('portal.blog.textEditor' , ['categorias' => $categorias]);
        return view('portal.doacao.solicitar-doacao' , ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'string|required',
            'descricao' => 'string|required',
            'categoria_id' => 'int|required',
            'capa' => 'required|mimes:jpg,jpeg,png,gif'
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

        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->createCampanha(
            Auth::user()->id,
            $request->titulo,
            $request->descricao,
            $request->categoria_id,
            $capa
        );
        session()->flash('mensagem', 'CAMPANHA SUBMETIDA COM SUCESSO!!!');
        return redirect()->route('campanha.create');
       // return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Campanha $campanha)
    {
        session()->flash('mensagem', 'CAMPANHA ALTERADA COM SUCESSO!!!');
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
    public function edit(Campanha $campanha)
    {
        $CategoriaService = new CategoriaService();
        $validacao = new FuncoesUteisController();
        $response = $CategoriaService->listCategoria();
        $categorias= $validacao->getNames($response['data']);
        return view('portal.doacao.solicitar-doacao' , ['campanha' => $campanha,'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'string|required',
            'descricao' => 'string|required',
            'categoria_id' => 'int|required',
           // 'capa' => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }
        $capa="";
       /*  if ($request->hasFile('capa') && $request->file('capa')->isValid()) :
            $fileName = time().$request->file('capa')->getClientOriginalName();
            $path = $request->file('capa')->storeAs('images', $fileName, 'public');
            $capa = '/storage/'.$path;
            if (!$path):
                return redirect()->back()->withInput();
            endif;
        endif; */

        $CampanhaService = new CampanhaService();
      /*   $response = $CampanhaService->updateCampanha(
            $id,
            $request->titulo,
            $request->descricao,
            $request->categoria_id,
            $capa
        ); */
        session()->flash('mensagem', 'CAMPANHA ALTERADA COM SUCESSO!!!');
        return redirect()->route('campanha.show',$id);
       // return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
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
        int $limit
    ){
        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->campanhasRecentes($limit);
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }
}
