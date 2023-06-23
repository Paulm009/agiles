<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Habitacion;
use App\Models\Tipo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\PDF;
class listarHabitacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search ="";
        if (isset($request->buscar)) {
            $nombre = $request->get('buscar');
            $search =$nombre;
            $habitacion = Habitacion::with('tipo')->where('nombreHabitacion','like',"%$nombre%")->paginate(5);
        }else{
            $habitacion = Habitacion::with('tipo')->paginate(5);
        }
        return view('habitaciones.listaHabitacion',compact('habitacion','search'));
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
            'estado' => 'required|string|min:4',
            'descripcion' => 'required|string|min:4',
            'imagen'=>'required'
        ], [
            'idTipo.required' => 'Tipo es requerido.',
            'nombreHabitacion.required' => 'Nombre Habitacion es requerido.',
            'precio.required' => 'Precio es requerido.',
            'estado' => 'Estado es requerido.',
            'descripcion.required' => 'Descripcion es requerido.',
            'imagen.required'=>'Es requerido la imagen'
        ]);
        if (isset($_FILES['imagen'])) {
            $imagen = $_FILES['imagen'];
            
            if ($imagen['error'] === UPLOAD_ERR_OK) {
                $nombreimagen = "habitacion_" . time() . '_' . basename($imagen['name']);
                $ruta = "img/habitacion/" . $nombreimagen;
                
                if (move_uploaded_file($imagen['tmp_name'], $ruta)) {
                    $validatedData["imagen"] = $ruta;
                } else {
                    $validatedData["imagen"] = '';
                }
            } else {
                $validatedData["imagen"] = '';
            }
        } else {
            $validatedData["imagen"] = '';
        }
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
            'estado' => 'required|string|min:4',
            'descripcion' => 'required|string|min:4',
            'imagen'=>'required'
        ], [
            'idTipo.required' => 'idTipo field is required.',
            'nombreHabitacion.required' => 'nombreHabitacion field is required.',
            'precio.required' => 'precio field is required.',
            'estado.required'=> 'estado field is required.',
            'descripcion.required' => 'descripcion field is required.',
            'imagen.required'=>'Es requerido la imagen'
        ]);
        $habitacion = Habitacion::find($id);
        if (isset($_FILES['imagen'])) {
            $imagen = $_FILES['imagen'];
            dd($imagen);
            if ($imagen['error'] === UPLOAD_ERR_OK) {
                $nombreimagen = "habitacion_" . time() . '_' . basename($imagen['name']);
                $ruta = "img/habitacion/" . $nombreimagen;
                
                if (move_uploaded_file($imagen['tmp_name'], $ruta)) {
                    $validatedData["imagen"] = $ruta;
                } else {
                    $validatedData["imagen"] = $habitacion->imagen ?$habitacion->imagen:'';
                }
            } else {
                $validatedData["imagen"] = $habitacion->imagen ?$habitacion->imagen:'';
            }
        } else {
            $validatedData["imagen"] = $habitacion->imagen ?$habitacion->imagen:'';
        }

       
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
    public function imprimir(Request $request){
        $habitacion=null;
        if (isset($request->buscar)) {
            $nombre = $request->get('buscar_pri');
            $habitacion = Habitacion::with('tipo')->where('nombreHabitacion','like',"%$nombre%")->paginate(5);
        }else{
            $habitacion = Habitacion::with('tipo')->paginate(5);
        }
        $today = Carbon::now()->format('d/m/Y');
        $pdf = \PDF::loadView('habitaciones.imprimir', compact('today','habitacion'));
        return $pdf->download('habitaciones.pdf');
    }
}
