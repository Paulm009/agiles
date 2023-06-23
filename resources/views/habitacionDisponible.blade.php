<!DOCTYPE html>
<html lang="es">
    <link href="" rel="stylesheet">

    <header class="header">
        <title>Home</title>
    </header>
  
    @extends('layout')
    @section('content')
        <div class="container p-2">
            <div class="hero">
                <h1 class="title text-center mt-4 mb-5"> Lista de Habitaciones <br> Disponibles </h1>
            </div>

            <div class="row mt-4">
                @foreach($habitacionesDisponibles as $habitaciones)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('redi.jpg') }}" class="img-fluid rounded-start w-100" alt="...">
                            </div>
                            
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$habitaciones->nombreHabitacion}}</h5>

                                    <p class="card-text ">{{$habitaciones->descripcion}}</p>

                                    <p class="text-center card-text"><small class="text-body-secondary">Precio: {{$habitaciones->precio}}</small></p>
                                    
                                    <p class="text-center card-text"><small class="text-body-secondary">Tipo de habitación: {{$habitaciones->tipoHabitacion->tipo}}</small></p>

                                    <a type="button" href="#
                                    " class="btn w-100 btn-warning mt-2">Reservar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endsection
</html>