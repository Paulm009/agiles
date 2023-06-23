<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Pluralizer;
use App\Models\Habitacion;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class HabitacionesDisponibles extends Controller
{
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');
        
        // Obtener todas las habitaciones con su tipo asociado
        $habitacion = Habitacion::with('tipo')
        
            ->when($filtro, function ($query) use ($filtro) {
                $query->whereHas('tipo', function ($query) use ($filtro) {
                    $query->where('tipoHabitacion', $filtro);
                });
            })
            ->get();
        
        return view('habitacionDisponible')->with('habitacion', $habitacion);
    }
}
