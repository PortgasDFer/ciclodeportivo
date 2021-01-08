@extends('layouts.admin')
@section('title','Subcategorias')
@section('content')
@if(Auth::user()->hasRole('admin'))
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Publicaciones</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Subcategorias</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="container-fluid">
  <div class="row">
        <a style="display:block" data-toggle="modal" data-target="#centralModalSm">
          <div class="col-lg-3 col-6">
              <!-- small card -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>Redactar</h3>

                  <p>Nueva Publicación</p>
                </div>
                <div class="icon">
                 <i class="fa fa-list-alt" aria-hidden="true"></i>
                </div>
                <a href="/posts/create" class="small-box-footer">
                  Click aquí <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </a>
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
</div>
@else
<div class="container">
  <div class="row mt-4">
    <div class="col-xs-12">
      <div class="alert alert-danger" role="alert">
        Atención, no tienes los permisos necesarios para entrar a este sitio. 
        Si necesitas revisar alguna publicación contacta a cualquier administrador.
      </div>
    </div>
    <div class="col-xs-12 d-flex justify-content-center">     
      <img src="/img/denegado.png" alt="" class="img-fluid">
      <a href="/home">Ve al inicio</a>
    </div>
  </div>
</div>
@endif
@endsection
@section('datatables')
<script>
  $(document).ready( function () {
    $('#posts').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "/obtenerPosts",
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