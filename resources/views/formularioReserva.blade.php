<!DOCTYPE html>
<html lang="en">
    <header class="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
        <link href="/css/nav.css" rel="stylesheet">
        <div class="logo">
            <h1 class="text-light">Gestion de hoteles</h1>
        </div>
        <nav class="navbar-expand-sm menu">
           <ul class="nav-links">
                <li><a href="{{url('/')}}">HOME</a></li>
                <li><a href="{{url('/reserva')}}">RESERVAS</a></li>
                <li><a href="#">LISTA DE HABITACIONES</a></li>
           </ul>            
        </nav>
        
    </header>
<body>
    <div class="pt-3 row">
        <section class="text-center row">
                <h2 class="" >Reserva de habitaciones</h2>
            
        </section>
        <section class="form-reserva mx-5 row">
            <div class="col-3"></div>
            <div class="col">
                <form class="g-3 bg-dark" action="{{route('reserva.seleccionarFecha')}}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row pb-3 mb-4 registro-datos mx-2 ">
                        <hr>
                        <div class="col-md-6">
                            <label for="fechaIngreso" class="form-label text-light">Fecha de ingreso:</label>
                            <input id="fechaIngreso" name="fechaIngreso" type="date"  class="form-control" min="">
                        </div>
                        <div class="col-md-6">
                            <label for="fechaSalida" class="form-label text-light">Fecha de salida:</label>
                            <input name="fechaSalida" type="date" class="form-control" id="fechaSalida" value="fechaSalida">
                        </div>
                        
                        {{-- <div class="col-md-6">
                            <label  for="habitacion" class="form-label text-light">Habitacion(s):</label>
                            <select name="habitacion" class="form-select" id="habitacion" value={{ old('pais') }}>
                                <option >Habitacion1</option>
                                <option >Habitacion2</option>
                                <option >Habitacion3</option>
                                <option >Habitacion4</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="col-md-12 text-center pb-3">
                        <button type="submit" class="btn btn-warning text-light">Ver Disponibilidad</button>
                    </div>
               </form>
            </div>
            <div class="col-3"></div>
        </section>
        <section class="pt-4 habitaciones">
            @if($habitaciones != [])
            <div class="row">
                <div class="col-2">
                    
                </div>
                <div class="col">
                    <section class=" room-list text-center">
                        <div class="d-flex flex-column  flex-shrink-0 bg-white" ">
                            <div class="list-group list-group-flush border-bottom scrollarea">
                              {{-- @foreach ($habitaciones as $habitacion)
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
                              @endforeach --}}
                              <div class=" list-group-item card my-3 mx-2 shadow" >
                                <div class="row g-0">
                                  <div class="col-md-5 d-flex align-items-center">
                                    <img src="{{URL::asset('storage/habitaciones/Hsimple.jpg' )}}" class="img-fluid rounded-start" alt="simple">
                                  </div>
                                  <div class="col-md-7">
                                    <div class="card-body">
                                      <h5 class="card-title">Habiacion simple </h5>
                                      <h6 class="card-subtitle mb-2 text-muted">Mi Habit 1</h6>
                                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore libero dolorem doloribus repellat illum, deleniti et commodi possimus blanditiis facilis? Nisi natus consectetur aperiam veritatis officia accusantium, praesentium placeat esse.</p>
                                      <div class="row">

                                        <p class="card-text"> <small class="text-muted">Precio: 600 Bs</small></p>
                                        <a href="#" class="btn btn-warning">Reservar</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class=" list-group-item card my-3 mx-2 shadow" >
                                <div class="row g-0">
                                  <div class="col-md-5 d-flex align-items-center">
                                    <img src="{{URL::asset('storage/habitaciones/Hsimple.jpg' )}}" class="img-fluid rounded-start" alt="simple">
                                  </div>
                                  <div class="col-md-7">
                                    <div class="card-body">
                                      <h5 class="card-title">Habiacion doble </h5>
                                      <h6 class="card-subtitle mb-2 text-muted">Mi Habit 1</h6>
                                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore libero dolorem doloribus repellat illum, deleniti et commodi possimus blanditiis facilis? Nisi natus consectetur aperiam veritatis officia accusantium, praesentium placeat esse.</p>
                                      <div class="row">

                                        <p class="card-text"> <small class="text-muted">Precio: 600 Bs</small></p>
                                        <a href="#" class="btn btn-warning">Reservar</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class=" list-group-item card my-3 mx-2 shadow" >
                                <div class="row g-0">
                                  <div class="col-md-5 d-flex align-items-center">
                                    <img src="{{URL::asset('storage/habitaciones/Hsimple.jpg' )}}" class="img-fluid rounded-start" alt="simple">
                                  </div>
                                  <div class="col-md-7">
                                    <div class="card-body">
                                      <h5 class="card-title">Habiacion triple </h5>
                                      <h6 class="card-subtitle mb-2 text-muted">Mi Habit 1</h6>
                                      <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore libero dolorem doloribus repellat illum, deleniti et commodi possimus blanditiis facilis? Nisi natus consectetur aperiam veritatis officia accusantium, praesentium placeat esse.</p>
                                      <div class="row">

                                        <p class="card-text"> <small class="text-muted">Precio: 600 Bs</small></p>
                                        <a href="#" class="btn btn-warning">Reservar</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </section>
                    
                </div>
                <div class="col-2">
                    
                </div>
              </div>
            @endif
        </section>
        {{-- <section>
            <script src="{{asset('js/admin/users/preinscripcion.js')}}"></script>
        </section> --}}
    
    </div>
    <script>
        document.getElementById("fechaIngreso").min = new Date("YY-mm-dd").toISOString().slice(0,10);
    </script>

</body>
