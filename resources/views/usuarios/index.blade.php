@extends('layouts.admin')
@section('title','Categorias')
@section('content')
@if(Auth::user()->hasRole('admin'))
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Usuarios</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
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

                  <p>Nuevo usuario</p>
                </div>
                <div class="icon">
                 <i class="fas fa-user-plus"></i>
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
          <th>Foto</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo</th>
          <th>Facebook</th>
          <th>Twitter</th>
          <th>Perfil</th>
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
        <h4 class="modal-title w-100" id="myModalLabel">Agregar Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/usuarios" method="POST" enctype="multipart/form-data"> 
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
            <div class="col-md-6">
                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

                @error('apellido')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

          <div class="col-md-6">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
          </div>
      </div>
      <div class="form-group row">
          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

          <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          </div>
      </div>
      <div class="form-group row">
        <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

        <div class="col-md-6">
            <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" required>

            @if ($errors->has('avatar'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('avatar') }}</strong>
                </span>
            @endif
        </div>
      </div>
      <div class="form-group row">
            <label for="fb" class="col-md-4 col-form-label text-md-right">{{ __('Facebook') }}</label>
            <div class="col-md-6">
                <input id="fb" type="text" class="form-control @error('fb') is-invalid @enderror" name="fb" value="{{ old('fb') }}" required autocomplete="fb" autofocus>

                @error('fb')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="tw" class="col-md-4 col-form-label text-md-right">{{ __('Twitter') }}</label>
            <div class="col-md-6">
                <input id="tw" type="text" class="form-control @error('tw') is-invalid @enderror" name="tw" value="{{ old('tw') }}" required autocomplete="tw" autofocus>

                @error('tw')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="ig" class="col-md-4 col-form-label text-md-right">{{ __('Instagram') }}</label>
            <div class="col-md-6">
                <input id="ig" type="text" class="form-control @error('ig') is-invalid @enderror" name="ig" value="{{ old('ig') }}" required autocomplete="ig" autofocus>

                @error('ig')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
@foreach($users as $u)
<div class="modal fade bs-example-modal-lg" id="PlaceModal-{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100" id="myModalLabel">Editar usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/usuarios/{{$u->id}}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <img src="/imgusers/{{$u->avatar}}" class="img-circle elevation-2 img-fluid"/>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="avatar" placeholder="Seleccione foto">
            </div>
          </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre" value="{{$u->name}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Apellidos</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="apellido" value="{{$u->apellido}}">
              </div>
            </div>
            <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Correo</label>
              <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" value="{{$u->email}}">
                  </div>
             </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Facebook</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="fb" value="{{$u->fb}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Twitter</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tw" value="{{$u->tw}}">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Instagram</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="ig" value="{{$u->ig}}">
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
        Si quieres registrar un nuevo usuario ponte en contacto con cualquier administrador.
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
    $('#categorias').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "/obtenerUsers",
        "columns": [
            {data:'avatar',orderable:false, searchable:false},
            {data:'name'},
            {data:'apellido'},
            {data:'email'},
            {data:'fb'},
            {data:'tw'},
            {data:'profile'},
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