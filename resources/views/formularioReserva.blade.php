<!DOCTYPE html>
<html lang="es">
    <header class="header">
      <title>Reserva</title>
    </header>

    @extends('layout')
    @section('content')

    <section class="text-center pt-3 mt-5">
      <h1 class="" >Reserva de habitaciones</h1>
    </section>

    <div class="container p-5">
      <section class="form-reserva row ">
          <div class="col">
            <form class="g-3 bg-dark" action="{{route('reserva.seleccionarFecha')}}" method="POST" enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row pb-3 mb-4 registro-datos mx-2">
                <hr>
                
                <div class="col-md-6">
                    <label for="fechaIngreso" class="form-label text-light">Fecha de ingreso:</label>
                    <input id="fechaIngreso" name="fechaIngreso" type="date"  class="form-control" min="" value="{{old('fechaIngreso')}}">
                    @error('fechaIngreso')
                        <p class="text-warning">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="fechaSalida" class="form-label text-light">Fecha de salida:</label>
                    <input id="fechaSalida" name="fechaSalida" type="date" class="form-control"  value="{{old('fechaSalida')}}">
                    @error('fechaSalida')
                        <p class="text-warning">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="col-md-6 mt-3">
                  <label for="cantidadDeHuespedes" class="form-label text-light">Tipo de habitación:</label>
                  <select name="tipoHabitacion" id="tipoHabitacion" class="form-control">
                      <option value="">Todos</option>

                      @foreach ($tiposHabitacion as $tipo)
                          <option value="{{ $tipo->idTipo }}">{{ $tipo->tipo }}</option>
                      @endforeach

                  </select>
                </div>
              </div>

              <div class="row d-flex justify-content-center mx-1">
                <div class="col-md-6 text-center pb-3">
                  <a type="button" href="{{route('home')}}" class="btn w-100 btn-warning">Cancelar</a>
                </div>

                <div class="col-md-6 text-center pb-3">
                    <button type="submit" class="btn w-100 btn-warning">Ver Disponibilidad</button>
                </div>
              </div>
            </form>
          </div>
      </section>
    </div>
    @endsection
</html>