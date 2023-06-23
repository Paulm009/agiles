<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cliente; // Modelo que representa la tabla en la base de datos donde se guardarán los datos del formulario
class RegistroHuespedController extends Controller
{
    public function index(Request $request)
    {

        return view('registroHuesped');
        
    }
   
}