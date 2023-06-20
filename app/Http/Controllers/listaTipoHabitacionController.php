<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Tipo;
class listaTipoHabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $habitacion = Habitacion::with('tipo')->paginate(5);
        return view ('listaTipoHabitacion')->with('Tipo', $habitacion);
        //return view('formularioReserva',compact('habitacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos= Tipo::all();
        return view('habitaciones.create',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idTipo' => 'required',
            'nombreHabitacion' => 'required|min:10|string',
            'precio' => 'required|numeric|min:1',
            'capacidad' => 'required|numeric|min:1',
            'precioDescuento' => 'required|numeric|min:1',
            'descripcion' => 'required|string|min:4'
        ], [
            'idTipo.required' => 'idTipo field is required.',
            'nombreHabitacion.required' => 'nombreHabitacion field is required.',
            'precio.required' => 'precio field is required.',
            'capacidad.required' => 'capacidad field is required.',
            'precioDescuento.required' => 'precioDescuento field is required.',
            'descripcion.required' => 'descripcion field is required.',
        ]);
        $habitacion = Habitacion::create($validatedData);          
        return redirect('listaHabitacion')->with('success', 'Habitacion creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipos= Tipo::all();
        $habitacion = Habitacion::find($id);
        return view('habitaciones.edit',compact('habitacion','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'idTipo' => 'required',
            'nombreHabitacion' => 'required|min:10|string',
            'precio' => 'required|numeric|min:1',
            'capacidad' => 'required|numeric|min:1',
            'precioDescuento' => 'required|numeric|min:1',
            'descripcion' => 'required|string|min:4'
        ], [
            'idTipo.required' => 'idTipo field is required.',
            'nombreHabitacion.required' => 'nombreHabitacion field is required.',
            'precio.required' => 'precio field is required.',
            'capacidad.required' => 'capacidad field is required.',
            'precioDescuento.required' => 'precioDescuento field is required.',
            'descripcion.required' => 'descripcion field is required.',
        ]);
        $habitacion = Habitacion::find($id);
        $habitacion->update($validatedData);       
        return redirect('listaHabitacion')->with('success', 'Habitacion editada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $habitacion = Habitacion::find($id);
        if ($habitacion) {
            $habitacion->delete();       
            return redirect('listaHabitacion')->with('success', 'Habitacion eliminada exitosamente.');
        }else{
            return back()->withInput()->with('error',  'Habitacion delete failed.');
        }
    }
}

