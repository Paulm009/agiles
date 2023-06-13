<?php

namespace App\Http\Controllers;


use Illuminate\Support\Pluralizer;
use App\Models\Habitacion;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class HabitacionesDisponibles extends Controller
{
    public function index(Request $request)
    {
        return view('habitacionDisponible');
    }
}
