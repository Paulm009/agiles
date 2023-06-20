<!DOCTYPE html>
<html lang="es">
<header class="header">
  <title>Lista De Habitaciones</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<style>
  img, svg{
    width: 22px !important;
  }
</style>
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
      <a href="{{url('listaHabitacion/create')}}">
        <button id="BotonAgregarHabitacion" type="button" class="btn btn-sm btn-success"><span class="bi bi-plus-circle"></span>&nbsp;Nueva Habitacion</button>
      </a>
    </div>
    <br>
    <div class="col-md-12 mb-2">
      @if(Session::has('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
        Session::forget('success');
        @endphp
      </div>
      @endif
      @if(Session::has('error'))
      <div class="alert alert-danger">
        {{ Session::get('error') }}
        @php
        Session::forget('error');
        @endphp
      </div>
      @endif
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
              <td><span class="badge badge-secondary" style="color:black;background: #aaa;">{{$item->tipo->tipoHabitacion }}</span></td>
              <td>{{$item->capacidad }}</td>
              <td>{{$item->precio }}</td>
              <td>
                <a href="{{url('listaHabitacion/'.$item->idHabitacion.'/edit')}}" style="text-decoration: none;">
                  <button type="button" class="btn btn-warning text-light btn-sm"><span class="bi bi-pencil"></span>&nbsp;Editar</button>
                </a>
                <form method="post" action="{{url('listaHabitacion/'.$item->idHabitacion)}}" onsubmit="return confirm('Está seguro que desea eliminar la habitación?')" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger  btn-sm bi"><span class="bi bi-trash"></span>&nbsp;Eliminar</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

    </div>
      <div class="pagination">
      {{ $habitacion->appends(['sort' => 'idHabitacion'])->render() }}
      </div>
    </div>
    <div class="col-md-12 mb-2">
      <div style="text-align:right">
        <a type="button" href="{{route('home')}}" class="btn btn-danger text-center btnSalir">Salir</a>
      </div>
    </div>
  </div>
</div>
@endsection

</html>