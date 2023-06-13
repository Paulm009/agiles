<nav class="navbar navbar-dark bg-dark  navbar-expand-xl ">
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
</nav> --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">       
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{url('/listaHabitacion')}}" id="dropdownTiposHabitacion" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Tipos de Habitación</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownTiposHabitacion">
                        <li><a class="dropdown-item" href="#">Habitaciones simples</a></li>
                        <li><a class="dropdown-item" href="#">Habitaciones dobles</a></li>
                        <li><a class="dropdown-item" href="#">Habitaciones triples</a></li>
                        <li><a class="dropdown-item" href="#">Habitaciones familiares</a></li>
                        <li><a class="dropdown-item" href="#">Cabañas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{url('/reserva')}}" id="dropdownReservas" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Reservas</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownReservas">
                        <li><a class="dropdown-item" href="{{url('/reserva')}}">Habitaciones disponibles</a></li>
                        <li><a class="dropdown-item" href="{{url('/reserva')}}">Realizar reserva</a></li>
                        <li><a class="dropdown-item" href="#">Cancelar reserva</a></li>
                        <li><a class="dropdown-item" href="#">Reporte de reservas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownIngresoSalida" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Ingreso/Salida</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownIngresoSalida">
                        <li><a class="dropdown-item" href="#">Ingreso de Huésped</a></li>
                        <li><a class="dropdown-item" href="#">Salida de Huésped</a></li>
                        <li><a class="dropdown-item" href="#">Factura de Huésped</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownServicios" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Servicios</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownServicios">
                        <li><a class="dropdown-item" href="#">Servicio de Limpieza</a></li>
                        <li><a class="dropdown-item" href="#">Servicio de Minibar</a></li>
                        <li><a class="dropdown-item" href="#">Recojo en el Aeropuerto</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownAdministracion" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Administración</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownAdministracion">
                        <li class="dropdown-submenu">
                            <a class="dropdown-item dropdown-toggle" href="#" id="dropdownReportes"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Reportes</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownReportes">
                                <li><a class="dropdown-item" href="#">Reportes Diarios</a></li>
                                <li><a class="dropdown-item" href="#">Reportes Semanales</a></li>
                                <li><a class="dropdown-item" href="#">Reportes Mensuales</a></li>
                            </ul>
                        </li>
                        <li><a class="dropdown-item" href="#">Información del Hotel</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="text-center col">
        <a class="navbar-brand logo" href="{{url('/')}}">Gestion de Hoteles</a>
    </div>
</nav>