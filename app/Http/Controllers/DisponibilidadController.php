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
        // $tipo = Tipo::all();
        return view('disponibilidad.disponibilidad');
    }
}
