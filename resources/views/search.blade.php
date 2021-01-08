@extends('layouts.page')
@section('title','Página de autor')
@section('metatags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
 <meta property="og:image" content="/img/CD.png" />
@endsection
@section('header')
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 text-center">
				<div class="author">
					<h1 class="text-uppercase">Busqueda por: {{$palabra}}</h1>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
	@forelse($publicaciones as $post)
	<!-- post -->
	<div class="post post-row">
		<a class="post-img" href="/posts/{{$post->slug}}"><img src="/headers/{{$post->cabecera}}" alt=""></a>
		<div class="post-body">
			<div class="post-category">
				<a href="/subcategorias/{{$post->slg}}">{{$post->nombresub}}</a>
				<a href="/categorias/{{$post->slu}}">{{$post->nombre}}</a>
			</div>
			<h3 class="post-title"><a href="/posts/{{$post->slug}}">{{$post->titulo}}</a></h3>
			<ul class="post-meta">
				<li><a href="/autores/{{$post->slug_user}}">{{$post->name}} {{$post->apellido}}</a></li>
				<li>20 April 2018</li>
			</ul>
			<p>{{$post->subtitulo}}</p>
		</div>
	</div>
	<!-- /post -->
	@empty
		<p>Sin publicaciones aún.</p>
	@endforelse
	{{ $publicaciones->links() }}
@endsection
@section('tags')
	@foreach($tags as $tag)
		<li><a href="/etiquetas/{{$tag->slug}}">{{$tag->name}}</a></li>
	@endforeach
@endsection