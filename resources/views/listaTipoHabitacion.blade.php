<!DOCTYPE html>
<html>
<head>
  <title>Lista de Tipos de Habitaciones</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
  <style>
    .table-actions .btn {
      margin-right: 5px;
    }
  </style>
</head>


@extends('layout')
@section('content')

<body>
  <div class="container">
    <h2>Lista de Tipos de Habitaciones</h2>
    <div class="row mb-3">
      <div class="col-md-6">
        <input type="text" id="searchInput" class="form-control" placeholder="Buscar...">
      </div>
      <div class="col-md-6 text-right">
        <button id="addRowBtn" class="btn btn-primary">Agregar Tipo</button>
      </div>
    </div>
    <table id="dataTable" class="table table-striped">
      <thead>
        <tr class="text-center">
          <th>Tipo</th>
          <th>Capacidad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        
          @foreach($tiposH as $tipo)
          <tr class="text-center">
          <td>{{$tipo->tipoHabitacion}}</td>
          <td>{{$tipo->capacidad}}</td>
          <td id="{{$tipo->idTipo}}" class="d-none"></td>
          <td class="table-actions">
            <button class="btn btn-sm btn-primary editBtn">Editar</button>
            <button class="btn btn-sm btn-danger deleteBtn">Eliminar</button>
            <button class="btn btn-sm btn-success saveBtn d-none">Guardar</button>
            <button class="btn btn-sm btn-secondary cancelBtn d-none">Cancelar</button>
          </td>
        </tr>
        @endforeach
        <!-- Agrega más filas aquí -->
      </tbody>
    </table>
    <div class="pagination">
      {{ $tiposH->appends(['sort' => 'idTipo'])->render() }}
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
  <script>
    var headers = {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		};
    $(document).ready(function() {
      var rowsPerPage = 5;
      var totalRows = $('#dataTable tbody tr').length;
      var numPages = Math.ceil(totalRows / rowsPerPage);
      var currentPage = 1;

      // Editar fila
      $(document).on('click', '.editBtn', function() {
        var row = $(this).closest('tr');
        var type = row.find('td:eq(0)').text();
        var capacity = row.find('td:eq(1)').text();
        row.find('td:eq(0)').html('<input name="nombeTipo" type="text" class="form-control" value="' + type + '">');
        row.find('td:eq(1)').html('<input name="capacidad" type="text" class="form-control" value="' + capacity + '">');
        row.find('.editBtn').addClass('d-none');
        row.find('.deleteBtn').addClass('d-none');
        row.find('.saveBtn').removeClass('d-none');
        row.find('.cancelBtn').removeClass('d-none');
      });

      // Guardar edición de fila
      $(document).on('click', '.saveBtn', function() {
        var row = $(this).closest('tr');
        var type = row.find('input:eq(0)').val();
        var capacity = row.find('input:eq(1)').val();
        var idTipo = 0;
        $.ajax({
            url: "{{route('tipo.guardar')}}",
            type: 'POST',
            headers: headers,
            data: {
                tipoHabitacion: type,
                capacidad: capacity,
                idTipo: row.find('td:eq(2)').attr('id')
            },
            dataType: 'json',
            success: function(response) {
                
              console.log(response.idTipo);
              idTipo = response.idTipo;
              row.find('td:eq(0)').text(type);
              row.find('td:eq(1)').text(capacity);
              row.find('td:eq(2)').attr('id', idTipo);
              row.find('td:eq(2)').addClass('d-none');
              row.find('.editBtn').removeClass('d-none');
              row.find('.deleteBtn').removeClass('d-none');
              row.find('.saveBtn').addClass('d-none');
              row.find('.cancelBtn').addClass('d-none');
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        
      });

      // Cancelar edición de fila
      $(document).on('click', '.cancelBtn', function() {
        var row = $(this).closest('tr');
        var type = row.find('input:eq(0)').val();
        var capacity = row.find('input:eq(1)').val();

        row.find('td:eq(0)').text(type);
        row.find('td:eq(1)').text(capacity);
        row.find('.editBtn').removeClass('d-none');
        row.find('.deleteBtn').removeClass('d-none');
        row.find('.saveBtn').addClass('d-none');
        row.find('.cancelBtn').addClass('d-none');
      });

      // Eliminar fila
      $(document).on('click', '.deleteBtn', function() {
        var row = $(this).closest('tr');

        Swal.fire({
          title: '¿Estás seguro?',
          text: 'Esta acción no se puede deshacer.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
            url: "{{route('tipo.eliminar')}}",
            type: 'POST',
            headers: headers,
            data: {
                idTipo: row.find('td:eq(2)').attr('id')
            },
            dataType: 'json',
            success: function(response) {
                
              console.log(response);
              row.remove();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
            
          }
        });
      });

      // Agregar fila
      $('#addRowBtn').on('click', function() {
        var newRow = '<tr class="text-center">' +
          '<td><input name="nombeTipo" type="text" class="form-control"></td>' +
          '<td><input name="capacidad" type="text" class="form-control"></td>' +
          '<td class="d-none"><input name="capacidad" type="text" class="form-control"></td>' +
          '<td class="table-actions">' +
          '<button class="btn btn-sm btn-primary editBtn d-none">Editar</button>' +
          '<button class="btn btn-sm btn-danger deleteBtn d-none">Eliminar</button>' +
          '<button class="btn btn-sm btn-success saveBtn ">Guardar</button>' +
          '<button class="btn btn-sm btn-secondary cancelBtn ">Cancelar</button>' +
          '</td>' +
          '</tr>';
            
        $('#dataTable tbody').append(newRow);
      });

      // Buscador
      $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();

        $('#dataTable tbody tr').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });
    });
  </script>
</body>
</html>
@endsection