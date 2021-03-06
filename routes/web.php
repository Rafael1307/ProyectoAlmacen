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
    return view('auth/login');
});

Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware(['auth', 'verified']); 
Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware(['auth', 'verified']);
Route::resource('entradas', App\Http\Controllers\EntradaController::class)->middleware(['auth', 'verified']);
Route::resource('salidas', App\Http\Controllers\SalidaController::class)->middleware(['auth', 'verified']);
Route::resource('pentradas', App\Http\Controllers\PentradaController::class)->middleware(['auth', 'verified']);
Route::resource('psalidas', App\Http\Controllers\PsalidaController::class)->middleware(['auth', 'verified']);
Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware(['auth', 'verified']);
Route::resource('userroles', App\Http\Controllers\UserroleController::class)->middleware(['auth', 'verified']);

Route::get('pentradas/pdf', [App\Http\Controllers\PentradaController::class, 'pdf'])->middleware(['auth', 'verified'])->name('pentradas.pdf');

Route::get('psalidas/pdf', [App\Http\Controllers\PsalidaController::class, 'pdf'])->middleware(['auth', 'verified'])->name('psalidas.pdf');


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
