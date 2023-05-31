<!DOCTYPE html>
<html lang="es">
<header class="header">
    <title>Lista De Habitaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="/css/formhuesped.css" rel="stylesheet">
</header>

@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <section>
            <br>
            <div class="card-header text-center">
                <div class="col-lg-12">
                    <h2>Editar Habitaciones</h2>
                </div>
            </div>
        </section>
        <div class="col-md-12 mb-2">
            <br>
            <a href="{{url('listaHabitacion')}}">
            Atras            </a>
        </div>
        <br>
        <div class="col-md-12 mb-2">
            <div class="row">
                <div class="card" style="border:none;">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card-body">
                        <form class="flex justify-content-center g-3 bg-dark" method="post" action="{{url('listaHabitacion/'.$habitacion->idHabitacion)}}">
                            @csrf
                            @method('PUT')
                            <div class="col-auto mb-2 ">
                                <label class="mr-1">Tipo</label>
                                <div class="input-group">
                                    <select class="form-select" name="idTipo" id="idTipo" aria-label="select example">
                                        <option>seleccionar...</option>
                                        @foreach ($tipos as $tipo)
                                        @if ($habitacion->idTipo===$tipo->idTipo)
                                        <option value="{{$tipo->idTipo}}" selected>{{$tipo->tipoHabitacion}}</option>
                                        @else
                                        <option value="{{$tipo->idTipo}}">{{$tipo->tipoHabitacion}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('nombreHabitacion'))
                                <span class="text-danger">{{ $errors->first('nombreHabitacion') }}</span>
                                @endif
                            </div>
                            <div class="col-auto mb-2 ">
                                <label class="mr-1">Nombre</label>
                                <div class="input-group">
                                    <input value="{{ $habitacion->nombreHabitacion}}" type="text" class="form-control @error('nombreHabitacion') is-invalid @enderror" name="nombreHabitacion" id="nombreHabitacion">
                                </div>
                                @if ($errors->has('nombreHabitacion'))
                                <span class="text-danger">{{ $errors->first('nombreHabitacion') }}</span>
                                @endif
                            </div>
                            <div class="col-auto mb-2">
                                <label class="mr-1">Precio</label>
                                <div class="input-group">
                                    <input value="{{$habitacion->precio}}" type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" id="precio">

                                </div>
                                @if ($errors->has('precio'))
                                <span class="text-danger">{{ $errors->first('precio') }}</span>
                                @endif
                            </div>
                            <div class="col-auto mb-2">
                                <label class="mr-1">Capacidads</label>
                                <div class="input-group">
                                    <input value="{{$habitacion->capacidad}}" type="number" class="form-control @error('capacidad') is-invalid @enderror" name="capacidad" id="capacidad">

                                </div>
                                @if ($errors->has('capacidad'))
                                <span class="text-danger">{{ $errors->first('capacidad') }}</span>
                                @endif
                            </div>
                            <div class="col-auto mb-2">
                                <label class="mr-1">Descuento</label>
                                <div class="input-group">
                                    <input value="{{$habitacion->precioDescuento}}" type="number" class="form-control @error('precioDescuento') is-invalid @enderror" name="precioDescuento" id="precioDescuento">

                                </div>
                                @if ($errors->has('precioDescuento'))
                                <span class="text-danger">{{ $errors->first('precioDescuento') }}</span>
                                @endif
                            </div>
                            <div class="col-auto mb-2">
                                <label class="mr-1">Descripcion</label>
                                <div class="input-group">
                                    <input value="{{$habitacion->descripcion}}" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion">

                                </div>
                                @if ($errors->has('descripcion'))
                                <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn w-100 btn-warning">Guardar</button>
                        </form>
                    </div>
                </div>
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