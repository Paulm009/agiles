<?php

namespace App\Http\Controllers;
use Illuminate\Support\Pluralizer;
use App\Models\Habitacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'fechaIngreso' => [
                'required',
                'date',
                'after_or_equal:'.(now()->format('Y-m-d')), // Verifica que la fecha sea igual o posterior a la fecha actual
            ],
            'fechaSalida' => [
                'required',
                'date',
                'after:'.(request()->input('fechaIngreso')), // Verifica que la fecha sea igual o posterior a la fecha actual
            ],
            'cantidadDeHuespedes' => ['required','integer'],
        ]);
        $habitaciones = Habitacion::whereNotIn('idHabitacion', function ($query) {
            $query->select('idHabitacion')
                ->from('reserva')
                ->where(function ($query) {
                    $query->where('fechaInicio', '>=', request()->input('fechaIngreso'))
                        ->where('fechaFin', '<=', request()->input('fechaSalida'));
                })
                ->orWhere(function ($query) {
                    $query->where('fechaInicio', '<=', request()->input('fechaIngreso'))
                        ->where('fechaFin', '>=', request()->input('fechaSalida'));
                });
        })
        ->orderBy('idHabitacion')
        ->get();
        // return $habitaciones;
        return view('formularioReserva',compact('habitaciones'));
        }
}
