<?php

namespace App\Http\Controllers;

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
        // $habitaciones = Habitacion::select()->OrderBy("habitacion.idTipo")
        //                 ->join('tipo','habitacion.idTipo','=','tipo.idTipo')
        //                 ->get();
        // $habitaciones = [["idHabitacion"=>1,"idTipo"=>1,"nombreHabitacion"=>"Alfombra Beni Ourain","precio"=>500,"precioDescuento"=>0,"descripcion"=>"La habitaci\u00f3n alfombrada con una alfombra Beni Ourain es una opci\u00f3n elegante y sofisticada. La alfombra Beni Ourain es de origen marroqu\u00ed y \r\n                            est\u00e1 hecha de lana de oveja natural, lo que le da un aspecto c\u00e1lido y acogedor. La habitaci\u00f3n est\u00e1 decorada en tonos neutros y c\u00e1lidos para\r\n                             complementar la alfombra.","created_at"=>"2023-03-24T17:01:03.000000Z","updated_at"=>null,"tipoHabitacion"=>"Simple"]];
        $habitaciones = [1];
        return view('formularioReserva',compact('habitaciones'));
    }
}
