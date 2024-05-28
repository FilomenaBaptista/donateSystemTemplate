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


/* Route::get('/historias-de-sucesso', function () {
    return view('portal.blog/historia-de-sucesso');
})->name('historiasdesucesso'); */

Route::get('/encontrar-doacao', function () {
    return view('portal.doacao/encontrar-doacao');
})->name('encontrardoacao');

Route::get('/doar-bens-materiais', function () {
    return view('portal.doacao/doar-bens-materiais');
})->name('doarbensmateriais');

Route::get('/doar-money', function () {
    return view('portal.doacao/doar-money');
})->name('doarmoney');

/* Route::get('/carrinho', function () {
    return view('portal.doacao/carrinho');
})->name('carrinho'); */

Route::get('/checkout', function () {
    return view('portal.doacao/checkout');
})->name('checkout');

Route::get('/doacao', function () {
    return view('portal.doacao/doacao');
})->name('doacao');

Route::get('/listar-voluntarios', function () {
    return view('portal.listar-voluntarios');
})->name('listarvoluntarios');

Route::get('/user-perfil', function () {
    return view('portal.user-perfil');
})->name('userperfil');


require __DIR__.'/auth.php';


//API
Route::get('/api-leke', Controllers\ApiController::class);


//Doacao
Route::apiResource('doar', Controllers\DoacaoFisicaController::class);

Route::apiResource('doacao', Controllers\DoacaoFisicaController::class);
Route::get('/doacao-editar/{doacao}', [Controllers\DoacaoFisicaController::class,'edit'])->name('doacao.edit');
Route::get('/doacao-destroy/{doacao}', [Controllers\DoacaoFisicaController::class,'destroy'])->name('doacao.destroy');
Route::any('/doacoes-recentes/{limit}', [Controllers\DoacaoFisicaController::class,'doacoesRecentes'])->name('doacao.recente');
Route::get('/doar-create', [Controllers\DoacaoFisicaController::class,'create'])->name('doar.create');

//Campanha

Route::apiResource('campanha', Controllers\CampanhaController::class);

Route::get('/', [Controllers\CampanhaController::class, 'campanhaHome'])->name('campanha.home');
Route::get('/solicitar-doacao', [Controllers\CampanhaController::class,'create'])->name('campanha.create');
Route::get('/campanha-editar/{campanha}', [Controllers\CampanhaController::class,'edit'])->name('campanha.edit');
Route::get('/campanha-destroy/{campanha}', [Controllers\CampanhaController::class,'destroy'])->name('campanha.destroy');
Route::apiResource('comentarios', Controllers\ComentarioController::class);
Route::any('/campanhas-recentes/{limit}', [Controllers\CampanhaController::class,'campanhasRecentes'])->name('campanha.recente');
Route::any('/shop', [Controllers\CampanhaController::class,'shop'])->middleware(['auth'])->name('shop');
Route::any('/shop-detail/{id}', [Controllers\CampanhaController::class,'shopdetail'])->middleware(['auth'])->name('shopdetail');
Route::any('/historias-de-sucesso', [Controllers\CampanhaController::class,'historiasdesucesso'])->name('historiasdesucesso');

Route::middleware('auth')->group(function () {
    Route::get('/carrinho', [Controllers\CartController::class, 'index'])->name('cart.index');
    Route::any('/cart', [Controllers\CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [Controllers\CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/order', [Controllers\CartController::class,'processCheckout'])->name('checkout.process');
});