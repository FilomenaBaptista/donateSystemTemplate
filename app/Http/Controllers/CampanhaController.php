<?php

namespace App\Http\Controllers;

use App\Services\CampanhaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $response = $CampanhaService->listcampanha(
            $request->user_id,
            $request->eliminado
        );
       // return response()->json( $response['data']) ;
        return view('portal.blog/blog',['campanhas' => response()->json(['data' => $response['data']]) ]);
        //return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
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
            'titulo' => 'string|required',
            'descricao' => 'string|required',
            'categoria' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }

        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->createCampanha(
            Auth::user()->id,
            $request->titulo,
            $request->descricao,
            $request->categoria
        );
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $campanhaId)
    {
        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->getcampanha( $campanhaId);
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'string|required',
            'descricao' => 'string|required',
            'categoria' => 'string|required'
        ]);

        if ($validator->fails()) {
            return response()->json(['data' => '', 'message' => $validator->errors(), 'status' => 400]);
        }

        $CampanhaService = new CampanhaService();
        $response = $CampanhaService->updateCampanha(
            $id,
            $request->titulo,
            $request->descricao,
            $request->categoria
        );
        return response()->json(['data' => $response['data'], 'message' => $response['message'], 'status' => $response['status']]);
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
}
