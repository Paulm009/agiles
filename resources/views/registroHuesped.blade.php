<html lang="en">
<header class="header">
  <link href="/css/formhuesped.css" rel="stylesheet">

    <title>Home</title>
</header>


@extends('layout')
@section('content')
<div class="pt-2 row">
  <section class="text-center row">
          <h2 class="" >Registro de Huesped</h2>
      
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
