<?php

namespace App\Http\Controllers;
use Illuminate\Support\Pluralizer;
use App\Models\Habitacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservaHabitacionController extends Controller
{
    public function index(Request $request)
    {
        $habitaciones = [];
        return view('formularioReserva',compact('habitaciones'));
    }
    public function filtrar(Request $request)
    {
        Pluralizer::useLanguage('spanish');
        $request->validate([
            'fechaIngreso' => 'required',
            'fechaSalida' => 'required',
            'cantidadDeHuespedes' => ['required','integer'],
        ]);
        return $request;
        // $habitaciones = Habitacion::select()->OrderBy("habitacion.idTipo")
        //                 ->join('tipo','habitacion.idTipo','=','tipo.idTipo')
        //                 ->get();
        // $habitaciones = [c3n est\u00e1 decorada en tonos neutros y c\u00e1lidos para\r\n                             complementar la alfombra.","created_at"=>"2023-03-24T17:01:03.000000Z","updated_at"=>null,"tipoHabitacion"=>"Simple"]];
        $habitaciones = [1];
        return view('formularioReserva',compact('habitaciones'));
    }
}
