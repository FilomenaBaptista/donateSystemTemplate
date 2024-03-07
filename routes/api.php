<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users',  Controllers\UserController::class);
/* Route::controller(Controllers\UserController::class)->group(function () {
    Route::get('/users/list', 'listUser');
    Route::post('/users/criar', 'createUser');
}); */
/* Route::apiResource('beneficiary-organizations', Controllers\BeneficiaryOrganizationController::class); */
Route::apiResource('doacao', Controllers\DoacaoController::class);
