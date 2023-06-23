<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tipo;
use App\Models\Habitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisponibilidadController extends Controller
{
    public function index()
    {
        $tipos = Tipo::all();
        return view('disponibilidad.disponibilidad',compact('tipos'));
    }
    public function query(Request $request){
        
        // return $request;
        $tipos = Tipo::all();
        if(request()->input('tipo') == 0){
            $tiposHabiTotal = Habitacion::where('estado',true)->groupBy('idTipo')->select('idTipo', DB::raw('COUNT(*) as cantidad'))
            ->get();
            // return $tiposHabiTotal;
        }else{
            $tiposEntrada = request()->input('tipo');
            $tiposHabiTotal = Habitacion::where('estado',true)->whereIn('idTipo', $tiposEntrada)
                ->groupBy('idTipo')
                ->select('idTipo', DB::raw('COUNT(*) as cantidad'))
                ->get();
            
        }
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');
        $tiposHabiPorFecha = DB::table('reserva as r')
        ->join('habitacionesReservadas as hr', 'r.idReserva', '=', 'hr.idReserva')
        ->join('tipoHabitacion as th', 'hr.idTipoHabitacion', '=', 'th.idTipo')
        ->where(function ($query) {
            $query->where('r.fechaInicio', '>=', request()->input('fechaInicio'))
                ->where('r.fechaFin', '<=', request()->input('fechaFin'));
        })
        ->orWhere(function ($query) {
            $query->where('r.fechaInicio', '<=', request()->input('fechaInicio'))
                ->where('r.fechaFin', '>=', request()->input('fechaFin'));
        })
        ->orWhere(function ($query) {
            $query->where('r.fechaInicio', '<=', request()->input('fechaFin'))
                ->where('r.fechaFin', '>=', request()->input('fechaFin'));
        })
        ->orWhere(function ($query) {
            $query->where('r.fechaInicio', '<=', request()->input('fechaInicio'))
                ->where('r.fechaFin', '>=', request()->input('fechaInicio'));
        })
        ->groupBy('th.idTipo')
        ->select('th.idTipo', DB::raw('COUNT(*) as cantidad'))
        ->get();
        $tiposHabiResult = [];
        foreach ($tiposHabiTotal as $key => $valueT) {
            foreach ($tiposHabiPorFecha as $key => $valueF) {
                if($valueT->idTipo == $valueF->idTipo){
                    $valueT->cantidad = $valueT->cantidad - $valueF->cantidad;
                }
            }
            $tiposHabiResult[] = $valueT->idTipo;
        }
        $tiposDeHabitaciones = Tipo::whereIn('idTipo',$tiposHabiResult)->orderBy('idTipo')->get();
        // return $tiposHabiTotal;
        return view('disponibilidad.disponibilidad',compact('tipos','tiposDeHabitaciones','tiposHabiTotal'));
    }
}
