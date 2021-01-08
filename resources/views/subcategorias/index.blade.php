@extends('layouts.admin')
@section('title','Subcategorias')
@section('content')
@if(Auth::user()->hasRole('admin'))
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Subcategorias</h1>
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
                  <h3>Registrar</h3>

                  <p>Nueva Subcategoria</p>
                </div>
                <div class="icon">
                 <i class="fa fa-list-alt" aria-hidden="true"></i>
                </div>
                <a data-toggle="modal" data-target="#centralModalSm" class="small-box-footer">
                  Click aquí <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </a>
    </div>
</div>

<div class="container-fluid mt-3">
  <div class="table-responsive">
    <table class="table table-hover table-bordered" id="categorias">
      <thead class="thead-light">
        <tr>
          <th>Subcategoría</th>
          <th>Descripción</th>
          <th>Categoría</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
    </table>
  </div>
</div>

<!--Modal Agregar -->
<!-- Central Modal Small -->
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <!-- Change class .modal-sm to change the size of the modal -->
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Agregar Subcategoría</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/subcategoria" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nombre" placeholder="Nombre de la Subcategoría" required="">
          </div>
        </div>
      <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Descripción</label>
      <div class="col-sm-10">
            <input type="text" class="form-control" name="desc" placeholder="Agregue una breve descripción" required="">
          </div>
     </div>
     <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Imagen</label>
      <div class="col-sm-10">
            <input type="file" class="form-control" name="img" required="">
          </div>
     </div>
     <div class="form-group row">
       <label for="" class="col-sm-2 col-form-label">Categoria</label>
       <div class="col-sm 10">
          <select id="idcategoria" name="id_categoria" class="js-example-placeholder-single  form-control" style="width: 100%" required>
            <option  value="">Buscar Categoria</option>
              @foreach($cat as $c)
                  <option value="{{$c->id}}">{{$c->nombre}}</option>
              @endforeach
          </select>
       </div>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
        <button type="submit" class="btn btn-success btn-lg"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
      </div>
        </form>
    </div>
    </div>
  </div>
</div>
<!-- Central Modal Small -->
<!--/Modal Agregar-->


<!--Modal Editar-->
@foreach($sub as $s)
<div class="modal fade bs-example-modal-lg" id="PlaceModal-{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100" id="myModalLabel">Editar Subcategoría</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/subcategoria/{{$s->id}}" method="POST"  enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Imagen actual</label>
              <div class="col-sm-10">
                <img src="/subimg/{{$s->header}}" alt="" class="img-fluid">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre" value="{{$s->nombresub}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Descripción</label>
              <div class="col-sm-10">
                    <input type="text" class="form-control" name="desc" value="{{$s->descripcion}}">
                  </div>
             </div>
             <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Imagen</label>
              <div class="col-sm-10">
                    <input type="file" class="form-control" name="newimg">
                  </div>
             </div>
             <div class="form-group row">
               <label for="" class="col-sm-2 col-form-label">Categoria</label>
               <div class="col-sm 10">
                  <select id="idcategoria" name="id_categoria" class="js-example-placeholder-single  form-control" style="width: 100%">
                    <option value="{{$s->id_categoria}}">No cambiar categoria</option>
                      @foreach($cat as $c)
                          <option value="{{$c->id}}">{{$c->nombre}}</option>
                      @endforeach
                  </select>
               </div>
             </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
              <button type="submit" class="btn btn-success btn-lg"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endforeach
<!--/Modal Editar-->
@else
<div class="container">
  <div class="row mt-4">
    <div class="col-xs-12">
      <div class="alert alert-danger" role="alert">
        Atención, no tienes los permisos necesarios para entrar a este sitio. 
        Si necesitas una nueva subcategoria ponte en contacto con cualquier administrador.
      </div>
    </div>
    <div class="col-xs-12 d-flex justify-content-center">     
      <img src="/img/denegado.png" alt="" class="img-fluid">
    </div>
  </div>
</div>
@endif
@endsection
@section('datatables')
<script>
    $(document).ready(function() {
      $('#idcategoria').select2({
        dropdownParent: $('#centralModalSm')
      });
    });
</script>
<script>
  $(document).ready( function () {
    $('#categorias').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "/obtenerSub",
        "columns": [
            {data:'nombresub'},
            {data:'descripcion'},
            {data:'nombre'},
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