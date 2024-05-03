<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller{

    public function __invoke(){
        $response = Http::get('https://fnx.ao/wp-json/wc/v3/products?consumer_key=ck_bbcc18e176c8ac191e3b3a17580e3b712104f8a1&consumer_secret=cs_f92f47e3020fda9e7fed62da9a1c6b860824f96d');
        return $response->json();
    }
}