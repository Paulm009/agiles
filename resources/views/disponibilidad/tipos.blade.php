<!DOCTYPE html>
<html>
<head>
  <title>Lista de Checkboxes con Bootstrap</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    
  </style>
</head>

<div class="check-list rowd-flex align-content-center">
    <h3>Tipos de Habitacion</h3>
    <div class="check-element row overflow-auto">
        @foreach($tipos as $tipo)
        <div class="col-6">
            <div class="checkbox-1 custom-control custom-checkbox border border-secondary-subtle">
                <input type="checkbox" class="custom-control-input" id="checkbox{{$tipo->idTipo}}" name="tipo[]" value="{{$tipo->idTipo}}">
                <label class="custom-control-label" for="checkbox{{$tipo->idTipo}}">{{$tipo->tipo}}</label>
            </div>
        </div>
        @endforeach
        
        
    </div>
    <ul class="">
        {{-- <li>
            <input type="checkbox" name="tipo" value="ch1" id="ch1">
            <label for="ch1">Individual</label>
        </li>
        <li>
            <input type="checkbox" name="tipo" value="ch1" id="ch1">
            <label for="ch1">Doble</label>
        </li> --}}
        {{-- @foreach($tipos as $tipo)
        <li>
            <input type="checkbox" name="tipo" value="{{$tipo->id}}" id="{{$tipo->id}}">
            <label for="{{$tipo->id}}">{{$tipo->nombre}}</label>
        </li>
        @endforeach --}}
    </ul>
</div>