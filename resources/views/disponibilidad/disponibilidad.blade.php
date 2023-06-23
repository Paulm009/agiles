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
  <form class="disponibilidad" method="GET" action="{{route('disponibilidad.consulta')}}" enctype="multipart/form-data">
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
  <div class="section-diponibles">
    @if(isset($tiposHabiTotal))
    <div class="row">
      <div class="col">
        <div class=" list-group-item card card-animation my-3 mx-2 shadow" >
          <div class="row g-0">
            <div class="col-md-5 d-flex align-items-center">
              <img src="{{URL::asset('img/bed.jpg' )}}" class="img-fluid rounded-start" alt="simple">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <h5 class="card-title">{{"Tipo de habitacion Simple"}}</h5><div class="row">
    
                  <p class="card-text text-lg text-muted"> Cantidad: <strong class="">10</strong> Disponibles</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">

      </div>
    </div>
    
    @endif
  </div>
</div>

@endsection