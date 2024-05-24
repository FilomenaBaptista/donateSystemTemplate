<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Services\ComentarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'id' => 'int|required',
            'tipo'=> 'string|required',
            'conteudo' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }
     

        $ComentarioService = new ComentarioService();
     
        $response = $ComentarioService->createComentario(
            Auth::user()->id,
            $request->id,
            $request->tipo,
            $request->conteudo
        );
        //return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
        return redirect(url()->previous());
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $comentarioId)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'int|required',
            'conteudo' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }

        $ComentarioService = new ComentarioService();
        $response = $ComentarioService->updateComentario(
            $comentarioId,
            $request->conteudo
        );
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        int $ComentarioId
    ) {
        $ComentarioService = new ComentarioService();
        $response = $ComentarioService->deleteComentario( $ComentarioId);
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }
}
