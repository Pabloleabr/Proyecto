<?php

use App\Http\Controllers\EjercicioController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('ejercicio/{ejercicio}', [EjercicioController::class, 'show'])
->name('mostrar-ejer');
Route::get('ejercicios', [EjercicioController::class, 'ejercicios'])
->name('ver-ejercicios');
Route::get('soluciones/{ejercicio}', [EjercicioController::class, 'show_soluciones'])
->name('ver-soluciones');

Route::middleware(['auth'])->group(function () {
    Route::get('create_ejer', [EjercicioController::class, 'create'])
    ->name('crear-ejer');
    Route::post('store_ejer', [EjercicioController::class, 'store'])
    ->name('guardar-ejer');
    Route::get('mis_ejer', [EjercicioController::class, 'mis_ejer'])
    ->name('mis-ejer');
    Route::delete('delete/ejer/{ejercicio}', [EjercicioController::class, 'delete_ejer'])
    ->name('borrar-ejer');
    Route::post('ejercicio/rate/{ejercicio}', [EjercicioController::class, 'rate'])
    ->name('rate-ejer');
    Route::post('respuesta/rate/{respuesta}', [EjercicioController::class, 'rate_respuesta'])
    ->name('rate-respuesta');
    Route::post('solucion/{ejercicio}', [EjercicioController::class, 'store_solucion'])
    ->name('guardar-solucion');

});


require __DIR__.'/auth.php';
