<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorizacionController;
use App\Http\Controllers\PrincipalController;
use App\Providers\RouteServiceProvider;

//Rutas de la App
// Logueo
Route::post('/autorizacion', [AutorizacionController::class, 'login'])->name('autorizacion');

// Pagina Principal
Route::get('/', function () {
    return view('welcome');
});
// Vista del Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Rutas del Api: Pagina Principal
Route::get('/principal', [PrincipalController::class, 'index'])->name('principal');
// Funcion para resetar la consulat
Route::get('/paginado/reset', [PrincipalController::class, 'reset'])->name('paginado.reset');

// Api Post para Filtrar la consulta de la api
Route::post('/principal/filtro', [PrincipalController::class, 'filtro'])->name('filtro');

// Paginas de los registros de la Tabla User -debe ejecutar migrate con la opcion --seed para generar Registros-
Route::post('/paginado', [PrincipalController::class, 'query'])->name('paginado.query');

Route::get('/paginado', [PrincipalController::class, 'inicio'])->name('paginado.inicio');
// Ruta para buscar
Route::post('/paginado/busqueda', [PrincipalController::class, 'busqueda'])->name('paginado.busqueda');
