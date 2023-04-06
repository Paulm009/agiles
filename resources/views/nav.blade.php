<!DOCTYPE html>
<html lang="en">
    <header class="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link href="/css/main-nav.css" rel="stylesheet">
        
    </header>
<body>
    <nav class="navbar navbar-dark bg-dark  navbar-expand-lg ">
        <div class="container-fluid col">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/reserva')}}">Reservas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/listaHabitacion')}}">Lista de Habitaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/registro/huesped')}}">Registro</a>
            </li>
            </ul>
        </div>
        <div class="text-center w-100 col">
            <a class="navbar-brand logo" href="{{url('/')}}">Gestion de Hoteles</a>
        </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>

</body>
</html>