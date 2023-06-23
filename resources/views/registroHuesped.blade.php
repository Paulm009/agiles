<!DOCTYPE html>
<html lang="es">
<header class="header">
  <link href="/css/formhuesped.css" rel="stylesheet">

    <title>Home</title>
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
      
  </section>
<section class="form-registro mx-2 row">
  <div class="col-0"></div>
  <div class="col">
    <form class="g-3 bg-dark" action="{{route('registro.huesped.envio')}}" method="POST" enctype="multipart/form-data" novalidate>
      @csrf
      <hr>
      <div class="col-md-12">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
      </div>
      <div class="col-md-12">

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
        
      </div>
      <div class="col-md-12">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="col-md-12">
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required>
      </div>
      <div class="col-md-6 text-center pb-3">
        <button type="submit" class="btn w-100 btn-warning">Enviar</button>
    </div>
</section>
</div>
@endsection
