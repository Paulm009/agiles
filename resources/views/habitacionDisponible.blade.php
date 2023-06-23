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
                <h1 class="title text-center mt-4 mb-4"> <strong>Lista de Habitaciones <br> Disponibles </strong></h1>
            </div>

            <form action="{{ route('habitacionesDisponibles.index') }}" method="GET">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="filtro">Filtrar por:</label>

                        <select name="filtro" id="filtro" class="form-control mt-2">
                            <option value="">Todos</option>

                            <option value="Simple">Simple</option>

                            <option value="Doble">Doble</option>

                            <option value="Triple">Triple</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
            </form>

            <div class="row mt-4">
                @foreach($habitacionesDisponibles as $habitaciones)
                <div class="col-md-6">
                    <div class="card mb-3 ">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="{{ asset('habimoder.jpg') }}" class="img-fluid rounded-start w-100" alt="...">
                            </div>

                            <div class="col-md-7">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{$habitaciones->nombreHabitacion}}</h5>
                                    
                                    <p class="card-text"><small class="text-body-secondary">Tipo de habitación: {{$habitaciones->tipoHabitacion->tipo}}</small></p>

                                    <p class="text-center card-text"><small class="text-body-secondary">Precio: {{$habitaciones->precio}}</small></p>

                                    <a type="button"  href="{{url('/registro/huesped')}}" class="btn w-100 btn-warning">Reservar</a>
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
           