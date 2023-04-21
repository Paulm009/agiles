<?php

namespace App\Http\Controllers;
use Illuminate\Support\Pluralizer;
use App\Models\Habitacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservaHabitacionController extends Controller
{
    public function index(Request $request)
    {
        $habitaciones = [];
        return view('formularioReserva',compact('habitaciones'));
    }
    public function filtrar(Request $request)
    {
        Pluralizer::useLanguage('spanish');
        $request->validate([
            'fechaIngreso' => 'required',
            'fechaSalida' => 'required',
            'cantidadDeHuespedes' => ['required','integer'],
        ]);
        return $request;
        }
}
