<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Voluntario;
use App\Services\VoluntarioService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class VoluntarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'int|nullable',
            'search' => 'string|nullable',
            'endereço' => 'string|nullable',
            'sobre' => 'string|nullable',
            'is_trabalhador' => 'int|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }
      
        $voluntarioService = new VoluntarioService();
        
        $response = $voluntarioService->listVoluntario(
            $request->user_id,
            $request->search,
            $request->endereço,
            $request->sobre,
            $request->is_trabalhador
        );
     
        if(!empty($request->search)){
            session()->flash('search', $request->search);
        }

        return view('portal.listar-voluntarios', ['voluntarios' => $response['data']]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Voluntario $voluntario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voluntario $voluntario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {

        $request->validate([
            'data_nascimento' => ['required', 'string', 'min:20', 'max:255'],
            'endereco' => ['required'],
            'is_trabalhador' => ['required', 'int'],
            'profissao' => ['required'],
            'descricao' => ['required'],
        ]);

        $voluntarioService = new VoluntarioService();
        $response = $voluntarioService->updateVoluntario(
            $id,
            $request->data_nascimento,
            $request->endereco,
            $request->is_trabalhador,
            $request->profissao,
            $request->descricao
        );
        session()->flash('mensagem', 'VOLUNTARIO ALTERADO COM SUCESSO!!!');
        return redirect()->route('campanha.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        int $voluntarioId
    ) {
        $VoluntarioService = new VoluntarioService();
        $response = $VoluntarioService->deleteVoluntario($voluntarioId);
        session()->flash('mensagem', 'VOLUNTARIO EXLUÍDO COM SUCESSO!!!');
        return redirect()->route('Voluntario.index', $voluntarioId);
    }
}