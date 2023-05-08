<?php

use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\Mecanotest;
use App\Http\Controllers\PreguntaController;
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
    return view('inicio');
})->name('inicio');

//Rutas para todos de ejericios
Route::get('/ejercicios/{ejercicio}', [EjercicioController::class, 'show'])
->name('mostrar-ejer');
Route::get('/soluciones/{ejercicio}', [EjercicioController::class, 'show_soluciones'])
->name('ver-soluciones');
Route::get('/ejercicios', [EjercicioController::class, 'ejercicios'])
->name('ver-ejercicios');

//Rutas para todos de preguntas
Route::get('/preguntas', [PreguntaController::class, 'index'])
->name('ver-preguntas');
Route::get('/pregunta/{pregunta}', [PreguntaController::class, 'show'])
->name('mostrar-pregunta');

//Rutas para todos de mecanografía
Route::get('/mecanografia', [Mecanotest::class, 'index'])
->name('test-mecano');

Route::middleware(['auth'])->group(function () {//rutas para usuarios
    //preguntas
    Route::get('/create_pregunta', [PreguntaController::class, 'create'])
    ->name('crear-pregunta');
    Route::post('/store_pregunta', [PreguntaController::class, 'store'])
    ->name('store-pregunta');
    //ejercicios
    Route::get('create_ejer', [EjercicioController::class, 'create'])
    ->name('crear-ejer');
    Route::post('store_ejer', [EjercicioController::class, 'store'])
    ->name('guardar-ejer');
    Route::delete('delete/ejer/{ejercicio}', [EjercicioController::class, 'delete_ejer'])
    ->name('borrar-ejer');
    Route::post('ejercicio/rate/{ejercicio}', [EjercicioController::class, 'rate'])
    ->name('rate-ejer');
    Route::post('respuesta/rate/{respuesta}', [EjercicioController::class, 'rate_respuesta'])
    ->name('rate-respuesta');
    Route::post('solucion/{ejercicio}', [EjercicioController::class, 'store_solucion'])
    ->name('guardar-solucion');

    Route::get('dashboard', [EjercicioController::class, 'mis_ejer'])
    ->name('dashboard');

    Route::post('mecanografia',[Mecanotest::class,'store'])->name('store-mecanotest');

});


require __DIR__.'/auth.php';
