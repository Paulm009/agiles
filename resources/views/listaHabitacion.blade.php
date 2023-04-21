<!DOCTYPE html>
<html lang="es">
<header class="header">
    <title>Lista De Habitaciones</title>
</header>

@extends('layout')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <section>
        <br>
        <div class="card-header text-center">
          <div class="col-lg-12">
            <h2>Lista de Habitaciones</h2>
          </div>
        </div>
      </section>
      <div class="col-md-12 mb-2">
        <br>
        <button id="BotonAgregarHabitacion" type="button" class="btn btn-sm btn-warning">Nueva Habitacion</button>
      </div>
      <br>
      <div class="col-md-12 mb-2">
        <div class="table-responsive">
          <table class="table table-hover" style="width:100%">
            <thead class="text-center">
              <tr id="first_column">
                <th scope="col">Nro</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo</th>
                <th scope="col">Capacidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($habitacion as $item)
              <tr class="text-center">
                <td>{{$loop->iteration }}</td>
                <td>{{$item->nombreHabitacion }}</td>
                <td>{{$item->idTipo }}</td>
                <td>{{$item->capacidad }}</td>
                <td>{{$item->precio }}</td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm">Modificar</button>
                  <button type="button" class="btn btn-danger  btn-sm">Eliminar</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12 mb-2">
        <div style="text-align:right">
          <button type="button" id="btnSalir" class="btn btn-danger text-center btnSalir">Salir</button>
        </div>
      </div>
    </div>
  </div>
@endsection

</html>