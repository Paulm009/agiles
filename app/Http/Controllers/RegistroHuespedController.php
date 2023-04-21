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
        
         $request -> validate([
            'nombre' => 'required | max:20 | alpha',
            'apellidos' => 'required | max:40 | alpha',
            'email' => 'required | email',
            'telefono' => ['required',
                            'regex:/^(\\+591)[6|7][0-9]{7}$/'
                    ],

         ],['nombre.required' => 'obligatorio',
            'nombre.max' => 'maximo 20 caracteres',
            'nombre.alpha' => 'solo letras',
            'apellidos.required' => 'obligatorio',
            'apellidos.alpha' => 'solo letras',
            'email.required' => 'obligatorio',
            'email.email' => 'formato no valido',
            'telefono.required' => 'obligatorio',
            'telefono.digits' => 'formato no valido'

         ]);

         $cliente = new cliente;
         $cliente->nombre = $request->input('nombre');
         $cliente->apellidos = $request->input('apellidos');
         $cliente->correo = $request->input('email');
         $cliente->telefono = $request->input('telefono');
        // ...
        $cliente->save();

        // Puedes redirigir al usuario a otra página una vez que los datos han sido guardados
        return back() -> with('succes','Ingeso  correcto');

    }
}
