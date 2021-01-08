@extends('layouts.page')
@section('title','Por categoría')
@section('metatags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
 <meta property="og:image" content="/img/CD.png" />
@endsection
@section('header')
<!--Cabecera-->
<header id="header">
<div class="page-header">
	<div class="page-header-bg" style="background-image: url('/subimg/{{$subcategoria->header}}'); background-size: cover;" data-stellar-background-ratio="0.5"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 text-center">
				<h1 class="text-uppercase">{{$subcategoria->nombresub}}</h1>
			</div>
		</div>
	</div>
</div>
</header>
<!--/Cabecera-->
@endsection
@section('content')
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
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
								<li>{{ date('d-M-y', strtotime($post->fecha))}}</li>
							</ul>
							<p>{{$post->subtitulo}}</p>
						</div>
					</div>
					<!-- /post -->
				@empty
					<p>Sin publicaciones aún.</p>
				@endforelse
				{{ $publicaciones->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
@section('tags')
	@foreach($tags as $tag)
		<li><a href="/etiquetas/{{$tag->slug}}">{{$tag->name}}</a></li>
	@endforeach
@endsection