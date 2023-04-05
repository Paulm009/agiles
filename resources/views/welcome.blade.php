<!DOCTYPE html>
<html>
<link href="/css/style.css" rel="stylesheet">

    <header class="header">
        <div class="logo">
            <h1>Gestion de hoteles</h1>
        </div>
        <nav>
           <ul class="nav-links">
                <li><a href="#">HOME</a></li>
                <li><a href="{{url('/registro/huesped')}}">REGISTRO</a></li>
                <li><a href="{{url('/reserva')}}">RESERVAS</a></li>
                <li><a href="#">LISTA DE HABITACIONES</a></li>
           </ul>            
        </nav>
        
    </header>
  
    <body>
    
    <h1 class="title">LISTA DE MOTELES</h1>
<br><br>
    <div class="container__slider">

        <div class="container">
            <input type="radio" name="slider" id="item-1" checked>
            <input type="radio" name="slider" id="item-2">
            <input type="radio" name="slider" id="item-3">

            <div class="cards">
                <label class="card" for="item-1" id="selector-1">
                <img src="{{ asset('habi.jpg') }}" alt="Descripción de la imagen">

                </label>
                <label class="card" for="item-2" id="selector-2">
                <img src="{{ asset('dos.jpg') }}" alt="Descripción de la imagen">
                </label>
                <label class="card" for="item-3" id="selector-3">
                <img src="{{ asset('tres.jpg') }}" alt="Descripción de la imagen">
                </label>

            </div>
        </div>

    </div>

</body>



</html>
