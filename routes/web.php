<?php

use App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('portal.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
    return view('portal.index');
})->name('home');

Route::get('/voluntario', function () {
    return view('portal.voluntario');
})->name('voluntario');


Route::get('/historias-de-sucesso', function () {
    return view('portal.blog/historia-de-sucesso');
})->name('historiasdesucesso');

Route::get('/encontrar-doacao', function () {
    return view('portal.doacao/encontrar-doacao');
})->name('encontrardoacao');

Route::get('/doar-bens-materiais', function () {
    return view('portal.doacao/doar-bens-materiais');
})->name('doarbensmateriais');

Route::get('/doar-money', function () {
    return view('portal.doacao/doar-money');
})->name('doarmoney');

Route::get('/doar-loja', function () {
    return view('portal.doacao/doar-loja');
})->name('doarloja');

require __DIR__.'/auth.php';


Route::get('doar-create', [Controllers\DoacaoBensMateriaisController::class,'create'])->name('doar.create');
Route::apiResource('doar', Controllers\DoacaoBensMateriaisController::class);
Route::apiResource('campanha', Controllers\CampanhaController::class);

Route::get('/solicitar-doacao', [Controllers\CampanhaController::class,'create'])->name('campanha.create');
Route::get('/campanha-editar/{campanha}', [Controllers\CampanhaController::class,'edit'])->name('campanha.edit');
Route::apiResource('comentarios', Controllers\ComentarioController::class);
Route::get('/campanhas-recentes/{limit}', [Controllers\CampanhaController::class,'campanhasRecentes'])->name('campanha.recente');
