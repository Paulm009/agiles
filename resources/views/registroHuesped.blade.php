<html lang="en">
<header class="header">
  <link href="/css/formhuesped.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
    <form class="g-3 bg-dark" action="{{route('registro.huesped.envio')}}" method="POST" enctype="multipart/form-data" novalidate id="formulario">
      @csrf
      <hr>
      <div class="col-md-12">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        @error('nombre')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-12">

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
        @error('apellidos')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-12">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
        @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-12">
        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" required>
        @error('telefono')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-md-6 text-center pb-3">
        <button type="submit" class="btn w-100 btn-warning">Enviar</button>
        <div class="modal" id="modal-exito">
    <div class="modal-contenido">
        <p>Registro exitoso</p>
        <button id="boton-refrescar">Refrescar</button>

    </div>
</div>

<script>
    document.getElementById('formulario').addEventListener('submit', function(event) {
        event.preventDefault();
        fetch(event.target.action, {
            method: 'POST',
            body: new FormData(event.target)
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.success) {
                document.getElementById('modal-exito').classList.add('activo');
            }
        })
        .catch(function(error) {
            console.error(error);
        });
    });
</script>
<script>
  document.getElementById('boton-refrescar').addEventListener('click', function() {
    var confirmacion = confirm('¿Estás seguro de que deseas refrescar la página?');
    if (confirmacion) {
      location.reload(); // Esto recarga la página actual
    }
  });
</script>


    </div>
    
</section>

</div>
@endsection



