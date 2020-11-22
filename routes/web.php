<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorizacionController;
use App\Http\Controllers\PrincipalController;
use App\Providers\RouteServiceProvider;

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

Route::post('/autorizacion', [AutorizacionController::class, 'login'])->name('autorizacion');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/principal', [PrincipalController::class, 'index'])->name('principal');
Route::post('/principal/filtro', [PrincipalController::class, 'filtro'])->name('filtro');
Route::get('/paginado', [PrincipalController::class, 'query'])->name('paginado');
