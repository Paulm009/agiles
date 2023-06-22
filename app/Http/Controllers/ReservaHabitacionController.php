<?php

namespace App\Http\Controllers;
use App\Models\Habitacion;
use App\Models\Tipo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservaHabitacionController extends Controller
{
    public function mostrarFormulario()
    {
        $tiposHabitacion = Tipo::all();
        return view('formularioReserva', compact('tiposHabitacion'));
    }

    public function seleccionarFecha(Request $request)
    {
        $fechaIngreso = $request->input('fechaIngreso');
        $fechaSalida = $request->input('fechaSalida');
        $tipoHabitacion = $request->input('tipoHabitacion');
        
        $habitacionesDisponibles = Habitacion::whereNotIn('idHabitacion', function ($query) {
            $query->select('idHabitacion')
                ->from('reserva')
                ->where(function ($query) {
                    $query->where('fechaInicio', '>=', request()->input('fechaIngreso'))
                        ->where('fechaFin', '<=', request()->input('fechaSalida'));
                })
                ->orWhere(function ($query) {
                    $query->where('fechaInicio', '<=', request()->input('fechaIngreso'))
                        ->where('fechaFin', '>=', request()->input('fechaSalida'));
                });
        });

        if ($tipoHabitacion) {
            $habitacionesDisponibles->where('idTipo', $tipoHabitacion);
        }

        $habitacionesDisponibles = $habitacionesDisponibles->get();
        
        return view('habitacionDisponible',compact('habitacionesDisponibles'));
    }
}
