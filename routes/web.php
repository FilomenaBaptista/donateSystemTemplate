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

Route::get('/campanha-detail', function () {
    return view('portal.blog/blog-details');
})->name('campanhadetail');

Route::get('/historias-de-sucesso', function () {
    return view('portal.blog/historia-de-sucesso');
})->name('historiasdesucesso');

Route::get('/doar', function () {
    return view('portal.doacao/doacao');
})->name('doar');

Route::get('/solicitar-doacao', function () {
    return view('portal.doacao/solicitar-doacao');
})->name('solicitardoacao');

Route::get('/encontrar-doacao', function () {
    return view('portal.doacao/encontrar-doacao');
})->name('encontrardoacao');


require __DIR__.'/auth.php';


Route::apiResource('campanha', Controllers\CampanhaController::class);
Route::apiResource('comentarios', Controllers\ComentarioController::class);
