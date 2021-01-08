@extends('layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Bienvenido {{$user->name}} {{$user->apellido}}.</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
          <li class="breadcrumb-item active">Starter Page</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="content">
  <div class="container-fluid">
    @if(Auth::user()->hasRole('admin'))
    <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-file-text"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Notas publicadas</span>
                <span class="info-box-number">
                  {{$publicacionesnum}}
                  <small>notas</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-eye"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Visitas</span>
                <span class="info-box-number">{{$visitas}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-list-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Categorias</span>
                <span class="info-box-number">{{$categoriasnum}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Colaboradores</span>
                <span class="info-box-number">{{$numusers}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">TOP 5 NOTAS MÁS VISITADAS</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Título</th>
                      <th>Fecha</th>
                      <th>Autor</th>
                      <th>Visitas</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($topnotas as $top)
                      <tr>
                        <td>{{$top->titulo}}</td>
                        <td>{{$top->fecha}}</td>
                        <td>{{$top->name}} {{$top->apellido}}</td>
                        <td>{{$top->visitas}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="/posts/create" class="btn btn-sm btn-info float-left">Redactar publicación</a>
                <a href="/posts/" class="btn btn-sm btn-secondary float-right">Ver todas</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 d-none d-md-block">
            <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Ultimos colaboradores</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach($users as $user)
                      <li>
                        <img src="/imgusers/{{$user->avatar}}" class="img-circle elevation-2" style="height: 80px; width: 80px;">
                        <a class="users-list-name" href="#">{{$user->name}} {{$user->apelllido}}</a>
                        <span class="users-list-date">{{$user->created_at->diffForHumans()}}</span>
                      </li>
                      @endforeach
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="/usuarios">Ver todos.</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
          </div>
        </div>
      </div>
      @endif
  </div>
</div>
<div class="container-fluid">
    <div class="row">
        <!--Perfil usuario-->
        <div class="col-md-12 col-lg-3">
                  <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img src="/imgusers/{{Auth::user()->avatar}}"  class="profile-user-img img-fluid img-circle" alt="User Image">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}} {{Auth::user()->apellido}}</h3>

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
            <!-- /.card -->
        </div>
        <!--/Perfil-->
        <!--Acerca-->
        <div class="col-md-12 col-lg-3">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Información.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Mis publicaciones:</strong>

                <p class="text-muted">
                  <a href="/myPosts/{{Auth::user()->id}}" class="btn btn-primary btn-block"><b>Ver</b></a>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Redes sociales</strong>

                <p class="text-muted">
                  <a href="{{Auth::user()->fb
                  }}"><button class="btn" style="background-color:  #3b5998;"><i class="fa fa-facebook-official " aria-hidden="true" style="color: white;"></i></button></a>
                  <a href="{{Auth::user()->tw}}"><button class="btn" style="background-color:  #00acee;"><i class="fa fa-twitter" aria-hidden="true" style="color:white;"></i></button></a>
                  <a href="{{Auth::user()->ig
                  }}"><button class="btn" style="background-color: #E1306C;"><i class="fa fa-instagram" aria-hidden="true" style="color:white;"></i></button></a>
                </p>

                <hr>

                <strong><i class="fa fa-envelope-o" aria-hidden="true"></i> Contacto</strong>

                <p class="text-muted">
                  {{Auth::user()->email}}
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Acerca de mí</strong>
                  {!!html_entity_decode(Auth::user()->bio)!!}
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <!--/Acerca-->
        <!--Datos-->
        <div class="col-md-12 col-lg-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar mis datos.</h3>
            </div>
            <div class="card-body">
              <form action="/updateMyData/{{Auth::user()->id}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                  <img src="/imgusers/{{Auth::user()->avatar}}" class="img-circle elevation-2 img-fluid"  style="height: 80px; width: 80px;" />
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
                    <input type="text" class="form-control" name="nombre" value="{{Auth::user()->name}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Apellidos</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="apellidos" value="{{Auth::user()->apellido}}">
                  </div>
                </div>
                <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Correo</label>
                  <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                      </div>
                 </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Facebook</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="fb" value="{{Auth::user()->fb}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Twitter</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tw" value="{{Auth::user()->tw}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Instagram</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ig" value="{{Auth::user()->ig}}">
                  </div>
                </div>
                <div class="form-group row"> 
                    <label for="" class="col-sm-2 col-form-label">Acerca de mí.</label>
                    <div class="col-sm-10"> 
                        <textarea class="ckeditor" name="bio" id="editor1" rows="10" cols="80">
                          {{Auth::user()->bio}}
                        </textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for=" " class="col-sm-2 col-form-label"> Editar</label>
                    <div class="col-sm-10"> 
                        <button type="submit" class="btn btn-success btn-lg"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                    </div>  
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--/Datos-->
    </div>
</div>
@endsection
