
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
        <li class="nav-item">
            <a class="nav-link" href="{{url('/listaTipoHabitacion')}}">Tipos de Habitaciones</a>
        </li>
        </ul>
    </div>
    <div class="text-center w-100 col">
        <a class="navbar-brand logo" href="{{url('/')}}">Gestion de Hoteles</a>
    </div>
    </div>
</nav>