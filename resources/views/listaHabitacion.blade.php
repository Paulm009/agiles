<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Hotel Dunas</title>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Custom CSS -->
        <!--link rel="stylesheet" href="css/index.css"/-->
        <link rel="stylesheet" href="{{ asset('css/listaHabitacion.css') }}">
    </head>

    <body>
        <nav class="navbar">
            <div class="container-nav">
                <h1 class="titulo">Las Dunas</h1>
            </div>
        </nav>

        <div class="container p-5" id = "container">
            <h2 class = "list_hab">Lista Habitaciones</h2>
            <div class = "input-container">
                
                <label class="text-white" id = "title_search">Buscar: </label>
    
                <select class = "combo_box" id = "title_search">
                    <option value="opcion1">Simple</option>
                    <option value="opcion2">Doble</option>
                    <option value="opcion3">Triple</option>
                    <option value="opcion3">Disponible</option>
                    <option value="opcion3">Ocupado</option>
                </select>
    
                <button class = "boton">Buscar
                    <!--img src="img/search.svg" alt="search icon"-->
                </button>

            </div>

            <table class="table mt-5" id = "tabla">
                <thead>
                  <tr id = "first_column">
                    <th scope="col">#</th>
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
        <div class = "botones">
            <button type="button" class="btn btn-lg">Nuevo</button>
            <button type="button" class="btn btn-lg">Salir</button>
        </div>
        

</html>