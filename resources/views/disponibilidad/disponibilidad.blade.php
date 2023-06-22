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
  <form class="disponibilidad">
    <h1 class="text-center">Disponibilidad</h1>
    {{-- <h2>Seleccione un rango de fechas y tipos de habitacion</h2> --}}
    <div class="row  border-warning  border-bottom border-top p-2 mb-2 border-opacity-25  ">
      <div class="col">
        @include('disponibilidad.calendario')
      </div>
      <div class="col-3  p-2 text-dark bg-opacity-50">
        @include('disponibilidad.tipos')
      </div>
      <div class="d-grid gap-2 col-6 my-2 mx-auto">
        <button type="submmit" class="btn btn-warning">Consultar Disponibilidad</button>
      </div>
    </div>
    
  </form>
    
</div>

@endsection