<?php

namespace App\Http\Controllers;
use App\Models\Habitacion;
use App\Models\Tipo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Pluralizer;

class ReservaHabitacionController extends Controller
{
    public function mostrarFormulario()
    {
        $tiposHabitacion = Tipo::all();
        return view('formularioReserva', compact('tiposHabitacion'));
    }

    public function seleccionarFecha(Request $request)
    {
        Pluralizer::useLanguage('spanish');
        $request->validate([
            'fechaIngreso' => ['required', 'date', 'after_or_equal:today'],
            'fechaSalida' => ['required', 'date', 'after_or_equal:fechaIngreso'],
        ]);
        
        $tipoHabitacion = $request->input('tipoHabitacion');
        // return $request;
        
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

        if ($tipoHabitacion == "Simple") {
            $habitacionesDisponibles->where('idTipo', 1);
        }else if ($tipoHabitacion == "Doble") {
            $habitacionesDisponibles->where('idTipo', 2);
        }else if ($tipoHabitacion == "Triple") {
            $habitacionesDisponibles->where('idTipo', 3);
        }
        
        $habitacionesDisponibles = $habitacionesDisponibles->get();
        
        return view('habitacionDisponible',compact('habitacionesDisponibles'));
    }
}
