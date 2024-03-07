<?php

namespace App\Http\Controllers;

use App\Services\DoacaoService;
use Illuminate\Http\Request;

class DoacaoController extends Controller
{
    public function index()
    {
        $Doacoes = new DoacaoService();
        return response()->json($Doacoes);
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

    public function update(Request $request)
    {
        
        return response()->json(1);
    }

    public function destroy(int $doacaoId)
    {
        
        return response()->json(null, 204);
    }
}
