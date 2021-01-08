@extends('layouts.page')
@section('title','Publicación')
@section('metatags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
 <meta property="og:image" content="/headers/{{$post->cabecera}}" />
@endsection
@section('header')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v6.0"></script>
<!-- PAGE HEADER -->
	<div id="post-header" class="page-header">
		<div class="page-header-bg" style="background-image: url('/headers/{{$post->cabecera}}'); background-size: cover;" data-stellar-background-ratio="0.5"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="post-category">
						<a href="/subcategorias/{{$datos->slg}}">{{$datos->nombresub}}</a>
						<a href="/categorias/{{$datos->slu}}">{{$datos->nombre}}</a>
					</div>
					<h1>{{$post->titulo}}.</h1>
					<ul class="post-meta">
						<li><a href="/autores/{{$datos->slug_user}}">{{$datos->name}} {{$datos->apellido}}</a></li>
						<li>{{$post->fecha->format('d/m/Y')}}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<!--/ PAGE HEADER -->
@endsection
@section('content')
<!-- section -->
	<!-- post share -->
	<div class="section-row">
		<div class="post-share">
			  <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fciclodeportivo.com.mx%2Fposts%2Fen-alemania-dan-el-ejemplo&amp;src=sdkpreparse" class="social-facebook">
			  	<i class="fa fa-facebook"></i><span>Share</span>
			  </a>
			<a href="https://twitter.com/intent/tweet?text={{$post->titulo}}&url=http://ciclodeportivo.com.mx/&via={{$datos->tw}}&hashtags={{$datos->nombresub}},{{$datos->nombre}}" target="_blank" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
		</div>
	</div>
	<!-- /post share -->
	<!-- post content -->
	<div class="section-row">
		<div class="post-content">
			<h1>{{$datos->subtitulo}}</h1>
		</div>
		<div class="post-content">
			{!!html_entity_decode($post->contenido)!!}
		</div>
	</div>
	<!--/post content-->
	<!-- post tags -->
	<div class="row"></div>
	<div class="section-row">
		<div class="post-tags">
			<ul>
				<li>TAGS:</li>
				@foreach($post->tags as $tag)
					<li><a href="#">{{$tag->name}}</a></li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- /post tags -->
	<!-- post author -->
	<div class="section-row">
		<div class="section-title">
			<h3 class="title">Acerca de <a href="author.html">{{$datos->name}} {{$datos->apellido}}</a></h3>
		</div>
		<div class="author media">
			<div class="media-left">
				<a href="author.html">
					<img class="author-img media-object" src="/imgusers/{{$datos->avatar}}" alt="">
				</a>
			</div>
			<div class="media-body">
				<p>{!!html_entity_decode($datos->bio)!!}.</p>
				<ul class="author-social">
					<li><a href="{{$datos->fb}}"><i class="fa fa-facebook"></i></a></li>
					<li><a href="{{$datos->tw}}"><i class="fa fa-twitter"></i></a></li>
					<li><a href="{{$datos->ig}}"><i class="fa fa-instagram"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /post author -->
<!-- section -->

@endsection
@section('tags')
	@foreach($tags as $tag)
		<li><a href="/etiquetas/{{$tag->slug}}">{{$tag->name}}</a></li>
	@endforeach
@endsection