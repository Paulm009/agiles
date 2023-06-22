<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tipo;
use App\Models\Habitacion;
use Illuminate\Http\Request;

class DisponibilidadController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return view('disponibilidad.disponibilidad',compact('tipos'));
    }
    public function store(Request $request){
        $tipo = $request->input('tipo');
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
        $habitaciones = Reserva::select('idTipo')
                ->from('reserva')
                ->where(function ($query) {
                    $query->where('fechaInicio', '>=', request()->input('fechaIngreso'))
                        ->where('fechaFin', '<=', request()->input('fechaSalida'));
                })
                ->orWhere(function ($query) {
                    $query->where('fechaInicio', '<=', request()->input('fechaIngreso'))
                        ->where('fechaFin', '>=', request()->input('fechaSalida'));
                })
        ->orderBy('idHabitacion')
        ->get();
        $habitaciones = Habitacion::where('idTipo',$tipo)->get();
        return view('disponibilidad.disponibilidad',compact('habitaciones','fechaInicio','fechaFin'));
    }
}
