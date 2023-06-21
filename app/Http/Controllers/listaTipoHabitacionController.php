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
        $tipos = Tipo::paginate(5);
        return view ('listaTipoHabitacion')->with('tiposH', $tipos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function save()
    {
        return request();
        return view('habitaciones.create',compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->idTipo){
            $tipo = Tipo::find($request->idTipo);
            $tipo->update($request->all());
        }else{
            $tipo = Tipo::create($request->all());
        }
        
        return response()->json(['idTipo'=>$tipo->idTipo]);
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
    public function update(Request $request)
    {
            
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $tipo = Tipo::find($request ->idTipo);
        $tipo->delete();
        return response()->json(['success'=>"deleted successfully"]);
    }
}

