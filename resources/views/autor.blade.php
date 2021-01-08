@extends('layouts.page')
@section('title','Página de autor')
@section('metatags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
 <meta property="og:image" content="/img/CD.png" />
@endsection
@section('header')
<!-- PAGE HEADER -->
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 text-center">
				<div class="author">
					<img class="author-img center-block" src="/imgusers/{{$user->avatar}}" alt="">
					<h1 class="text-uppercase">{{$user->name}} {{$user->apellido}}</h1>
					<p class="lead">{!!html_entity_decode($user->bio)!!}</p>
					<ul class="author-social">
						<li><a href="{{$user->fb}}"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/{{$user->tw}}"><i class="fa fa-twitter"></i></a></li>
						<li><a href="{{$user->ig}}"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /PAGE HEADER -->
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
								<a href="/categorias/{{$post->slu}}">{{$post->nombre}}</a>
								<a href="/subcategorias/{{$post->slg}}">{{$post->nombresub}}</a>
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
					<p>Sin publicaciones recientes</p>
				@endforelse
				{{ $publicaciones->links() }}
			</div>
		</div>
		<!--/row -->
	</div>
	<!--/container -->
</div>
<!--/SECTION -->
@endsection
@section('tags')
	@foreach($tags as $tag)
		<li><a href="/etiquetas/{{$tag->slug}}">{{$tag->name}}</a></li>
	@endforeach
@endsection