@extends('layout')
<!DOCTYPE html>
<html>
<head>
  <title>Habitaciones Disponibles</title>
  <link href="/css/disponibilidad.css" rel="stylesheet">
</head>
@section('content')
<link href="/css/disponibilidad.css" rel="stylesheet">  
<div class="container">
  <div class="disponibilidad">
    <h1 class="text-center">Disponibilidad</h1>
    {{-- <h2>Seleccione un rango de fechas y tipos de habitacion</h2> --}}
    <div class="row border border-warning rounded-end p-2 mb-2 border-opacity-25  ">
      <div class="col">
        @include('disponibilidad.calendario')
      </div>
      <div class="col-3  p-2 text-dark bg-opacity-50">
        @include('disponibilidad.tipos')
      </div>
      <div class="d-grid gap-2 col-6 my-4 mx-auto">
        <button type="button" class="btn btn-warning">Consultar Disponibilidad</button>
      </div>
    </div>
    
  </div>
    
</div>

@endsection