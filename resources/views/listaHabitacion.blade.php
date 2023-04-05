<!DOCTYPE html>
<html lang="es">
<header class="header">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>        <link href="/css/nav.css" rel="stylesheet">
    <div class="logo">
      <h1 class="text-light">Gestion de hoteles</h1>
    </div>
    <nav class="navbar-expand-sm menu">
      <ul class="nav-links">
        <li><a href="{{url('/')}}">HOME</a></li>
        <li><a href="{{url('/reserva')}}">RESERVAS</a></li>
        <li><a href="{{url('/listaHabitacion')}}">LISTA DE HABITACIONES</a></li>
      </ul>            
    </nav>
</header>

<body>
  <div class="container p-5" id = "container" >
      <h2 class="list_hab text-center">Lista Habitaciones</h2>
            <table class="table mt-5" id = "tabla">
                <thead>
                  <tr id = "first_column">
                    <th scope="col">Nro</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Capacidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>NOMBRE</td>
                    <td>Triple</td>
                    <td>4</td>
                    <td>250bs</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Modificar</button>
                        <button type="button" class="btn btn-danger  btn-sm">Eliminar</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>NOMBRE</td>
                    <td>Simple</td>
                    <td>1</td>
                    <td>100bs</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Modificar</button>
                        <button type="button" class="btn btn-danger btn-sm">Eliminar</button></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>NOMBRE</td>
                    <td>Doble</td>
                    <td>2</td>
                    <td>150bs</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Modificar</button>
                        <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>NOMBRE</td>
                    <td>Doble</td>
                    <td>2</td>
                    <td>150bs</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Modificar</button>
                        <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>NOMBRE</td>
                    <td>Triple</td>
                    <td>4</td>
                    <td>150bs</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm">Modificar</button>
                        <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="botones">
            <button type="button" class="btn btn-lg">Nuevo</button>
            <button type="button" class="btn btn-lg">Salir</button>
        </div>
        

</html>