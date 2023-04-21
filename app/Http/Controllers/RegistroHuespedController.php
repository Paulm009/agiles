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
    public function envio(Request $request){

        $cliente = new cliente;
        $cliente->nombre = $request->input('nombre');
        $cliente->apellidos = $request->input('apellidos');
        $cliente->correo = $request->input('email');
        $cliente->telefono = $request->input('telefono');
        // ...
        $cliente->save();

        // Puedes redirigir al usuario a otra página una vez que los datos han sido guardados
        return redirect('/registro/huesped');

    }
}
