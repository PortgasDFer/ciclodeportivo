@extends('layouts.admin')
@section('title','Perfil del usuario')
@section('content')
@if(Auth::user()->hasRole('admin'))
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Perfil del usuario: {{$user->name}}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item"><a href="/usuarios">Usuarios</a></li>
          <li class="breadcrumb-item active">Perfil del usuario: {{$user->name}}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
		<!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img src="/imgusers/{{$user->avatar}}"  class="profile-user-img img-fluid img-circle" alt="User Image">
                </div>

                <h3 class="profile-username text-center">{{$user->name}} {{$user->apellido}}</h3>

                <p class="text-muted text-center">Ciclo Deportivo</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Notas</b> <a class="float-right">{{$notas}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Visitas</b> <a class="float-right">{{$visitasuser}}</a>
                  </li>
                </ul>
                
              </div>
              <!-- /.card-body -->
            </div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
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
			        </tr>
			      </thead>
			    </table>
			  </div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3">
			<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Información.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Redes sociales</strong>

                <p class="text-muted">
                  <a href="{{$user->fb
                  }}"><button class="btn" style="background-color:  #3b5998;"><i class="fa fa-facebook-official " aria-hidden="true" style="color: white;"></i></button></a>
                  <a href="{{$user->tw}}"><button class="btn" style="background-color:  #00acee;"><i class="fa fa-twitter" aria-hidden="true" style="color:white;"></i></button></a>
                  <a href="{{$user->ig
                  }}"><button class="btn" style="background-color: #E1306C;"><i class="fa fa-instagram" aria-hidden="true" style="color:white;"></i></button></a>
                </p>

                <hr>

                <strong><i class="fa fa-envelope-o" aria-hidden="true"></i> Contacto</strong>

                <p class="text-muted">
                  {{$user->email}}
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Acerca de mí</strong>
                  {!!html_entity_decode($user->bio)!!}
              </div>
              <!-- /.card-body -->
            </div>
		</div>
	</div>
</div>
@else
<div class="container">
  <div class="row mt-4">
    <div class="col-xs-12">
      <div class="alert alert-danger" role="alert">
        Atención, no tienes los permisos necesarios para entrar a este sitio. 
        Si quieres revisar los datos de algún usuario, revisa su página publica.
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
            {data:'preview',orderable:false, searchable:false}
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
          "zeroRecords": "Sin publicaciones aún",
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