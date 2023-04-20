<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaHabitacionController;
use App\Http\Controllers\RegistroHuespedController;

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
});
Route::get('/reserva', [ReservaHabitacionController::class,'index'])->name('reserva');
Route::post('/reserva', [ReservaHabitacionController::class,'filtrar'])->name('reserva.seleccionarFecha');
Route::get('/registro/huesped', [RegistroHuespedController::class,'index'])->name('registro.huesped');
Route::post('/registro/huesped', [RegistroHuespedController::class,'envio'])->name('registro.huesped.envio');
