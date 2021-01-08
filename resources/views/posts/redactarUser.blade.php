@extends('layouts.admin')
@section('title','Subcategorias')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Redactar publicación</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item active">Redactar publicación</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="container mt-4 mb-4">
  <div class="card">
    <div class="card-body"> 
      <form action="/publicar" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Título</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="titulo" placeholder="Título de la publicación" required="">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Subtítulo</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="subtitulo" placeholder="Subtítulo de la publicación" required="">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Fecha</label>
          <div class="col-sm-4">
            <input type="date" class="form-control" name="fecha" placeholder="Título de la publicación" required="">
          </div>
          <label for="" class="col-sm-2 col-form-label">Foto de cabecera</label>
          <div class="col-sm-4">
            <input type="file" class="form-control" name="cabecera" required="">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-12 col-form-label">Contenido</label>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <textarea class="ckeditor" name="contenido" id="editor1" rows="10" cols="80" required="">
              ¿Qué está pasando el mundo deportivo?
            </textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Categoría</label>
          <div class="col-sm-4">
            <select id="idcategoria" name="id_categoria" class="js-example-placeholder-single form-control" onchange="obtener_subcategorias(this.value)" style="width: 100%" required="">
              <option value="">Seleccione una categoría</option>
              @foreach($cat as $c)
                <option value="{{$c->id}}">{{$c->nombre}}</option>
              @endforeach
            </select>
          </div>

          <label for="" class="col-sm-2 col-form-label">Subcategoría</label>
          <div class="col-sm-4">
            <select id="subcategoria" name="subcategoria" class="form-control dynamic" style="width: 100%" required="">
              <option value="" disabled="true">Subcategorias</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Autor</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" value="{{Auth::user()->name}} {{Auth::user()->apellido}}" readonly="">
            <input type="hidden" name="id_user" value="{{Auth::user()->id}}" name="id_user">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Etiquetas (palabras separadas por coma)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" data-role="tagsinput" name="tags" required="">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success btn-block"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Publicar</button>
          </div>
        </div>
      </form>
    </div> 
  </div>
</div>
@endsection

@section('script')
<script language="javascript">
    $(document).ready(function() {
    $('.js-example-basic-single').select2({
           width: 'resolve'
    });
});
</script>
<script language="javascript">
   function obtener_subcategorias(id_categoria) {
      $.get('/consultaSub/' + id_categoria, function (data) {
         $('#subcategoria').empty();
         $('#subcategoria').append('<option value="0" disable="true" selected="true">Seleccione una subcategoria</option>');
          $.each(data, function(fetch, Subcategoria){
            console.log(data);
            $('#subcategoria').append('<option value="'+ Subcategoria.id +'">'+ Subcategoria.nombresub +'</option>');
          })
      })
    }
</script>
@endsection