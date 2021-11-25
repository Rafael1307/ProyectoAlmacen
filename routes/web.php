<?php

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware(['auth', 'verified']); 
Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware(['auth', 'verified']);
Route::resource('entradas', App\Http\Controllers\EntradaController::class)->middleware(['auth', 'verified']);
Route::resource('salidas', App\Http\Controllers\SalidaController::class)->middleware(['auth', 'verified']);
Route::resource('pentradas', App\Http\Controllers\PentradaController::class)->middleware(['auth', 'verified']);
Route::resource('psalidas', App\Http\Controllers\PsalidaController::class)->middleware(['auth', 'verified']);


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
