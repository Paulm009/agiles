<!DOCTYPE html>
<html lang="es">
<header class="header">
    <title>Create Habitaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="/css/formhuesped.css" rel="stylesheet">
</header>

@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <section>
            <br>
            <div class="card-header text-center">
                <div class="col-lg-12">
                    <h2>Registrar Nuevo huesped</h2>
                </div>
            </div>
        </section>
        <div class="col-md-12 mb-2">
            <br>
            <a href="{{url('habitacionesDisponibles')}}">
            Atras            </a>
        </div>
        <br>
        
        <div class="container p-14">
          <section class="form-reserva row ">
            <div class="row justify-content-left">
                <div class="card-4" style="border:none;">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="row justify-content-left">
                        <form class="flex justify-content-center g-3 bg-dark" method="post" action="{{url('habitacionDisponible')}}">
                            @csrf
                           
                          <div class="col-auto mb-2">
                            <label class="mr-1">Nº de Personas </label>
                            <div class="input-group">
                                <input value="{{old('numPersonas')}}" type="number" class="form-control @error('numPersonas') is-invalid @enderror" name="numPersonas" id="numPersonas">

                            </div>
                            @if ($errors->has('numPersonas'))
                            <span class="text-danger">{{ $errors->first('capacidad') }}</span>
                            @endif
                        </div>
                        <div class="col-md-5">
                          <label for="fechaIngreso" class="form-label text-light">Fecha de ingreso:</label>
                          <input id="fechaIngreso" name="fechaIngreso" type="date"  class="form-control" min="" value="{{old('fechaIngreso')}}">
                          @error('fechaIngreso')
                              <p class="text-warning">{{ $message }}</p>
                          @enderror
                      </div>
      
                      <div class="col-md-5 ">
                          <label for="fechaSalida" class="form-label text-light">Fecha de salida:</label>
                          <input name="fechaSalida" type="date" class="form-control" id="fechaSalida" value="{{old('fechaSalida')}}">
                          @error('fechaSalida')
                              <p class="text-warning">{{ $message }}</p>
                          @enderror
                      </div>
                            <div class="col-auto mb-2 ">
                                <label class="mr-1">Nombre</label>
                                <div class="input-group">
                                    <input value="{{old('nombre')}}" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre">
                                </div>
                                @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                @endif
                            </div>
                            <div class="col-auto mb-2">
                                <label class="mr-1">Apellidos</label>
                                <div class="input-group">
                                    <input value="{{old('apellidos')}}" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" id="apellidos">

                                </div>
                                @if ($errors->has('apellidos'))
                                <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                                @endif
                            </div>

                            <div class="col-auto mb-2">
                              <label class="mr-1">Correo Electrónico</label>
                              <div class="input-group">
                                  <input value="{{old('correo')}}" type="text" class="form-control @error('correo') is-invalid @enderror" name="correo" id="correo">

                              </div>
                              @if ($errors->has('correo'))
                              <span class="text-danger">{{ $errors->first('correo') }}</span>
                              @endif
                          </div>
                            <div class="col-auto mb-2">
                                <label class="mr-1">Teléfono</label>
                                <div class="input-group">
                                    <input value="{{old('telefono')}}" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono">

                                </div>
                                @if ($errors->has('telefono'))
                                <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                @endif
                            </div>
                            
                              
                            <button type="submit"  href="{{url('/detallesReserva')}}"class="btn w-100 btn-warning">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            </section>
        </div>
        <div class="col-md-12 mb-2">
            <div style="text-align:right">
                <a type="button" href="{{route('home')}}" class="btn btn-danger text-center btnSalir">Salir</a>
            </div>
        </div>
    </div>
</div>
@endsection

</html>