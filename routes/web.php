<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaHabitacionController;
use App\Http\Controllers\RegistroHuespedController;
use App\Http\Controllers\listarHabitacionesController;
use App\Http\Controllers\listaTipoHabitacionController;

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
    return view('welcome');
})->name('home');
Route::get('/reserva', [ReservaHabitacionController::class, 'mostrarFormulario'])->name('reserva.mostrarFormulario');
Route::post('/reserva/habitacionesDisponibles', [ReservaHabitacionController::class, 'seleccionarFecha'])->name('reserva.seleccionarFecha');
Route::get('/registro/huesped', [RegistroHuespedController::class,'index'])->name('registro.huesped');
Route::post('/registro/huesped', [RegistroHuespedController::class,'envio'])->name('registro.huesped.envio');
Route::resource('/listaHabitacion', listarHabitacionesController::class);
Route::resource('/listaTipoHabitacion', listaTipoHabitacionController::class);
Route::post('/listaTipoHabitacion/guardar', [listaTipoHabitacionController::class,'store'])->name('tipo.guardar');
Route::post('/listaTipoHabitacion/eliminar', [listaTipoHabitacionController::class,'destroy'])->name('tipo.eliminar');
