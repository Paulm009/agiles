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
        @php
        $number = $tipo->idTipo % 10 + 1;
        $class = "checkbox-{$number} custom-control custom-checkbox border border-secondary-subtle";
    @endphp
        <div class="col-6">
            <div class="{{ $class }}">
                <input type="checkbox" class="custom-control-input" id="checkbox{{$tipo->idTipo}}" name="tipo[]" value="{{$tipo->idTipo}}">
                <label class="custom-control-label" for="checkbox{{$tipo->idTipo}}">{{$tipo->tipo}}</label>
            </div>
        </div>
        @endforeach
        
        
    </div>
</div>