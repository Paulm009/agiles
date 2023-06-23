<!DOCTYPE html>
<html lang="es">
<link href="/css/home.css" rel="stylesheet">

<header class="header">
    <title>Home</title>
</header>

@extends('layout')
@section('content')
<div class="container-fluid">
    <h1 class="title">Bienvenido al Hotel</h1>
    <div class="row">
        <div class="col-md-8">
            <div class="hero">
                <div class="container-hero">
                    <div class="container-slider">
                        <input type="radio" name="slider" id="item-1" checked>
                        <input type="radio" name="slider" id="item-2">
                        <input type="radio" name="slider" id="item-3">
        
                        <div class="slides">
                            <label class="slide" for="item-1" id="selector-1">
                                <img src="{{ asset('img/habitacion_simple.jpg') }}" alt="Habitacion simple">
                            </label>
                            <label class="slide" for="item-2" id="selector-2">
                                <img src="{{ asset('img/habitacion_doble.jpg') }}" alt="Habitacion doble">
                            </label>
                            <label class="slide" for="item-3" id="selector-3">
                                <img src="{{ asset('img/habitacion_triple.jpg') }}" alt="Habitacion triple">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <button type="button" class="btn">Realizar una reserva</button>
                <button type="button" class="btn">Ver lista de habitaciones disponibles</button>
                <button type="button" class="btn">Ver lista de reservas</button>
                <button type="button" class="btn">Registrar ingreso de huésped</button>
            </div>
        </div>        
    </div>
</div>
@endsection
</body>
</html>
