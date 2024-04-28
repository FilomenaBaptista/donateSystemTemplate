<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller{

    public function __invoke(){
        $response = Http::get('https://www.leke.ao/wp-json');
        return $response->json();

    }
}