<!DOCTYPE html>
<html lang="es">
<link href="/css/home.css" rel="stylesheet">

<header class="header">
    <title>Home</title>
</header>

@extends('layout')
@section('content')
<div class="hero">
    <h1 class="title">Bienvenido al Hotel</h1>
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
@endsection
</body>
</html>
