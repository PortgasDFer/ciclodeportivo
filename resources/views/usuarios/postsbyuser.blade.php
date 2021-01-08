@extends('layouts.admin')
@section('title','Publicaciones del usuario')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Publicaciones del usuario: {{$user->name}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Publicaciones</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered" id="posts">
      <thead class="thead-light">
        <tr>
          <th>Titulo</th>
          <th>Fecha</th>
          <th>Visitas</th>
          <th colspan="2">Autor</th>
          <th>Publicado en</th>
          <th>Vista previa</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
    </table>
  </div>

@endsection
@section('datatables')
<script>
  $(document).ready( function () {
    $('#posts').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "/postsUser/{{$user->id}}",
        "columns": [
            {data:'titulo',name:'publicaciones.titulo'},
            {data:'fecha',name:'publicaciones.fecha'},
            {data:'visitas',name:'publicaciones.visitas'},
            {data:'name',name:'users.name'},
            {data:'apellido',name:'users.apellido'},
            {data:'nombresub',name:'subcategorias.nombresub'},
            {data:'preview',orderable:false, searchable:false},
            {data:'edit',orderable:false, searchable:false},
            {data:'delete',orderable:false, searchable:false}
        ],
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
          "infoEmpty": "Mostrando 0 to 0 of 0 Documentos",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Registros",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
          }
        }
    });
  });
</script>
@endsection