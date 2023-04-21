<!DOCTYPE html>
<html lang="es">
    <header class="header">
      <title>Reserva</title>
    </header>
    @extends('layout')
    @section('content')
      <section class="text-center pt-3 row">
        <h2 class="" >Reserva de habitaciones</h2>
      </section>
      <section class="form-reserva row">
          <div class="col-2 "></div>
          <div class="col">
              <form class="g-3 bg-dark" action="{{route('reserva.seleccionarFecha')}}" method="POST" enctype="multipart/form-data" novalidate>
                  @csrf
                  <div class="row pb-3 mb-4 registro-datos mx-2 ">
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
                          <input name="fechaSalida" type="date" class="form-control" id="fechaSalida" value="{{old('fechaSalida')}}">
                          @error('fechaSalida')
                              <p class="text-warning">{{ $message }}</p>
                          @enderror
                        </div>
                      
                      <div class="col-md-6">
                        <label for="cantidadDeHuespedes" class="form-label text-light">Cantidad de huespedes:</label>
                        <input name="cantidadDeHuespedes" type="text" class="form-control" id="cantidadDeHuespedes" value="{{old('cantidadDeHuespedes')}}" >
                        @error('cantidadDeHuespedes')
                              <p class="text-warning">{{ $message }}</p>
                          @enderror
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
          <div class="col-2"></div>
      </section>
      {{-- <section class="pt-4 habitaciones">
          @if($habitaciones != [])
          <div class="row">
              <div class="col-2">
                  
              </div>
              <div class="col">
                  <section class=" room-list text-center">
                      <div class="d-flex flex-column  flex-shrink-0 bg-white" ">
                          <div class="list-group list-group-flush border-bottom scrollarea">
                            @foreach ($habitaciones as $habitacion)
                              <div class=" list-group-item card my-3 mx-2 shadow" >
                                  <div class="row g-0">
                                    <div class="col-md-5 d-flex align-items-center">
                                      <img src="{{URL::asset('storage/habitaciones/Hsimple.jpg' )}}" class="img-fluid rounded-start" alt="simple">
                                    </div>
                                    <div class="col-md-7">
                                      <div class="card-body">
                                        <h5 class="card-title">{{$habitacion->tipoHabitacion}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$habitacion->nombreHabitacion}}</h6>
                                        <p class="card-text">{{$habitacion->descripcion}}</p>
                                        <div class="row">

                                          <p class="card-text"> <small class="text-muted">Precio: {{$habitacion->precio}} Bs</small></p>
                                          <a href="#" class="btn btn-primary">Reservar</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            @endforeach
                          </div>
                      </div>
                  </section>
                  
              </div>
              <div class="col-2">
                  
              </div>
            </div>
          @endif
      </section> --}}
    
    <script>
        document.getElementById("fechaIngreso").min = new Date("YY-mm-dd").toISOString().slice(0,10);
    </script>
    @endsection

</body>
