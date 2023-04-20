<html lang="en">
<header class="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link href="/css/formhuesped.css" rel="stylesheet">
        <div class="logo">
            <h1 class="text-light">Gestion de hoteles</h1>
        </div>
        <nav class="navbar-expand-sm menu">
           <ul class="nav-links">
                <li><a href="{{url('/')}}">HOME</a></li>
                <li><a href="{{url('/reserva')}}">RESERVAS</a></li>
                <li><a href="#">LISTA DE HABITACIONES</a></li>
           </ul>            
        </nav>
        
    </header>

<body >
  <div class="pt-2 row">
    <section class="text-center row">
            <h2 class="" >Registro de Huesped</h2>
        
    </section>
  </section>
  <section class="form-registro mx-2 row">
    <div class="col-0"></div>
    <div class="col">
      <form class="g-3 bg-dark" action="{{route('registro.huesped')}}" method="POST" enctype="multipart/form-data" novalidate>
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
</body>
