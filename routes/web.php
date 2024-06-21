<?php

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


Route::resource('actividades',\App\Http\Controllers\Controlador::class);

Route::resource('users',\App\Http\Controllers\ContoladorSuperUser::class);

Route::get('cerrarSesion',[
    \App\Http\Controllers\Controlador::class,
        'cerrarSesion'
]);
Route::get('estadistica/{descripcion}/{id}',[
    \App\Http\Controllers\ContoladorSuperUser::class,
        'estadistica'
]);
Route::get('tabla/{descripcion}/{id}',[
    \App\Http\Controllers\ContoladorSuperUser::class,
        'tabla'
]);
Route::get('filtrarEstado',[
    \App\Http\Controllers\Controlador::class,
        'filtrarEstado'
]);
Route::get('filtrarFecha',[
    \App\Http\Controllers\Controlador::class,
        'filtrarFecha'
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
