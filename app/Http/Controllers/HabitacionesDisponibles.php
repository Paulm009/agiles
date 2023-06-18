<?php

namespace App\Http\Controllers;


use Illuminate\Support\Pluralizer;
use App\Models\Habitacion;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class HabitacionesDisponibles extends Controller
{
    public function index()
    {
        $habitacion = Habitacion::with('tipo')->get();
        return view ('habitacionDisponible')->with('habitacion', $habitacion);
    }
}
