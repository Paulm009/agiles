<!DOCTYPE html>
<html>
<head>
  <title>Lista de Tipos de Habitaciones</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
        <tr>
          <th>Tipo</th>
          <th>Capacidad</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Casa</td>
          <td>5</td>
          <td class="table-actions">
            <button class="btn btn-sm btn-primary editBtn">Editar</button>
            <button class="btn btn-sm btn-danger deleteBtn">Eliminar</button>
            <button class="btn btn-sm btn-success saveBtn d-none">Guardar</button>
            <button class="btn btn-sm btn-secondary cancelBtn d-none">Cancelar</button>
          </td>
        </tr>
        <tr>
          <td>Apartamento</td>
          <td>3</td>
          <td class="table-actions">
            <button class="btn btn-sm btn-primary editBtn">Editar</button>
            <button class="btn btn-sm btn-danger deleteBtn">Eliminar</button>
            <button class="btn btn-sm btn-success saveBtn d-none">Guardar</button>
            <button class="btn btn-sm btn-secondary cancelBtn d-none">Cancelar</button>
          </td>
        </tr>
        <!-- Agrega más filas aquí -->
      </tbody>
    </table>
    <div id="paginationContainer" class="d-flex justify-content-center"></div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function() {
      var rowsPerPage = 5;
      var totalRows = $('#dataTable tbody tr').length;
      var numPages = Math.ceil(totalRows / rowsPerPage);
      var currentPage = 1;

      function showPage(page) {
        var start = (page - 1) * rowsPerPage;
        var end = start + rowsPerPage;

        $('#dataTable tbody tr').hide().slice(start, end).show();
        currentPage = page;
      }

      function renderPagination() {
        $('#paginationContainer').empty();

        var pagination = '<nav aria-label="Page navigation">' +
          '<ul class="pagination">' +
          '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '">' +
          '<a class="page-link" href="#" data-page="prev">&laquo;</a>' +
          '</li>';

        for (var i = 1; i <= numPages; i++) {
          pagination += '<li class="page-item ' + (i === currentPage ? 'active' : '') + '">' +
            '<a class="page-link" href="#" data-page="' + i + '">' + i + '</a>' +
            '</li>';
        }

        pagination += '<li class="page-item ' + (currentPage === numPages ? 'disabled' : '') + '">' +
          '<a class="page-link" href="#" data-page="next">&raquo;</a>' +
          '</li>' +
          '</ul>' +
          '</nav>';

        $('#paginationContainer').html(pagination);
      }

      showPage(1);
      renderPagination();

      $(document).on('click', '.page-link', function(e) {
        e.preventDefault();

        var page = $(this).data('page');

        if (page === 'prev') {
          showPage(currentPage - 1);
        } else if (page === 'next') {
          showPage(currentPage + 1);
        } else {
          showPage(page);
        }

        renderPagination();
      });

      // Editar fila
      $(document).on('click', '.editBtn', function() {
        var row = $(this).closest('tr');
        var type = row.find('td:eq(0)').text();
        var capacity = row.find('td:eq(1)').text();

        row.find('td:eq(0)').html('<input type="text" class="form-control" value="' + type + '">');
        row.find('td:eq(1)').html('<input type="text" class="form-control" value="' + capacity + '">');
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

        row.find('td:eq(0)').text(type);
        row.find('td:eq(1)').text(capacity);
        row.find('.editBtn').removeClass('d-none');
        row.find('.deleteBtn').removeClass('d-none');
        row.find('.saveBtn').addClass('d-none');
        row.find('.cancelBtn').addClass('d-none');
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
            row.remove();
          }
        });
      });

      // Agregar fila
      $('#addRowBtn').on('click', function() {
        var newRow = '<tr>' +
          '<td><input type="text" class="form-control"></td>' +
          '<td><input type="text" class="form-control"></td>' +
          '<td class="table-actions">' +
          '<button class="btn btn-sm btn-primary editBtn">Editar</button>' +
          '<button class="btn btn-sm btn-danger deleteBtn">Eliminar</button>' +
          '<button class="btn btn-sm btn-success saveBtn d-none">Guardar</button>' +
          '<button class="btn btn-sm btn-secondary cancelBtn d-none">Cancelar</button>' +
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