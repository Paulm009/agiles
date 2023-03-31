<?php

namespace App\Http\Controllers;

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
        $habitaciones = Habitacion::select()->OrderBy("habitacion.idTipo")
                        ->join('tipo','habitacion.idTipo','=','tipo.idTipo')
                        ->get();
        // return $habitaciones;
        return view('formularioReserva',compact('habitaciones'));
    }
}
