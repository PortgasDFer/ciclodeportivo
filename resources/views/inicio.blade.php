@extends('layouts.page')
@section('title','Inicio')
@section('metatags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
 <meta property="og:image" content="/img/CD.png" />
@endsection
@section('hotpost')
<div class="row">
	<div class="container-fluid">
	<div class="alert alert-danger" role="alert">
	  <a href="/river-en-vivo">Vive toda la pasión de River Plate aquí en Ciclo Deportivo, Todo sobre tu deporte favorito.</a>
	</div>
</div>
</div>

	<!-- row notas recientes -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="/posts/{{$post1->slug}}"><img src="./headers/{{$post1->cabecera}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="/categorias/{{$post1->slu}}">{{$post1->nombre}}</a>
								<a href="/subcategorias/{{$post1->slg}}">{{$post1->nombresub}}</a>
							</div>
							<h3 class="post-title title-lg"><a href="/posts/{{$post1->slug}}">{{$post1->titulo}}.</a></h3>
							<ul class="post-meta">
								<li><a href="/autores/{{$post1->slug_user}}">{{$post1->name}} {{$post1->apellido}}</a></li>
								<li>{{ date('d-M-y', strtotime($post1->fecha))}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="/posts/{{$post2->slug}}"><img src="./headers/{{$post2->cabecera}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="/categorias/{{$post2->slu}}">{{$post2->nombre}}</a>
								<a href="/subcategorias/{{$post2->slg}}">{{$post2->nombresub}}</a>
							</div>
							<h3 class="post-title"><a href="/posts/{{$post2->slug}}">{{$post2->titulo}}</a></h3>
							<ul class="post-meta">
								<li><a href="/autores/{{$post2->slug_user}}">{{$post2->name}} {{$post2->apellido}}</a></li>
								<li>{{ date('d-M-y', strtotime($post2->fecha))}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="post post-thumb">
						<a class="post-img" href="/posts/{{$post3->slug}}"><img src="./headers/{{$post3->cabecera}}" alt=""></a>
						<div class="post-body">
							<div class="post-category">
								<a href="/categorias/{{$post3->slu}}">{{$post3->nombre}}</a>
								<a href="/subcategorias/{{$post3->slg}}">{{$post3->nombresub}}</a>
							</div>
							<h3 class="post-title"><a href="/posts/{{$post3->slug}}">{{$post3->titulo}}.</a></h3>
							<ul class="post-meta">
								<li><a href="/autores/{{$post3->slug_user}}">{{$post3->name}} {{$post3->apellido}}</a></li>
								<li>{{ date('d-M-y', strtotime($post3->fecha))}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
			</div>
			<!-- /row notas recientes-->
@endsection
@section('content')
<!-- Recientes -->
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">Publicaciones recientes</h2>
				</div>
			</div>
			<!-- post -->
			<div class="col-md-6">
				<div class="post">
					<a class="post-img" href="/posts/{{$post4->slug}}"><img src="./headers/{{$post4->cabecera}}" alt=""></a>
					<div class="post-body">
						<div class="post-category">
							<a href="/categorias/{{$post4->slu}}">{{$post4->nombre}}</a>
							<a href="/subcategorias/{{$post4->slg}}">{{$post4->nombresub}}</a>
						</div>
						<h3 class="post-title"><a href="/posts/{{$post4->slug}}">{{$post4->titulo}}</a></h3>
						<ul class="post-meta">
							<li><a href="/autores/{{$post4->slug_user}}">{{$post4->name}} {{$post4->apellido}}</a></li>
							<li>{{ date('d-M-y', strtotime($post4->fecha))}}</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /post -->

			<!-- post -->
			<div class="col-md-6">
				<div class="post">
					<a class="post-img" href="/posts/{{$post5->slug}}"><img src="./headers/{{$post5->cabecera}}" alt=""></a>
					<div class="post-body">
						<div class="post-category">
							<a href="/categorias/{{$post5->slu}}">{{$post5->nombre}}</a>
							<a href="/subcategorias/{{$post5->slg}}">{{$post5->nombresub}}</a>
						</div>
						<h3 class="post-title"><a href="/posts/{{$post5->slug}}">{{$post5->titulo}}</a></h3>
						<ul class="post-meta">
							<li><a href="/autores/{{$post5->slug_user}}">{{$post5->name}} {{$post5->apellido}}</a></li>
							<li>{{ date('d-M-y', strtotime($post5->fecha))}}</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /post -->

			<div class="clearfix visible-md visible-lg"></div>

			<!-- post -->
			<div class="col-md-6">
				<div class="post">
					<a class="post-img" href="/posts/{{$post6->slug}}"><img src="./headers/{{$post6->cabecera}}" alt=""></a>
					<div class="post-body">
						<div class="post-category">
							<a href="/categorias/{{$post6->slu}}">{{$post6->nombre}}</a>
							<a href="/subcategorias/{{$post6->slg}}">{{$post6->nombresub}}</a>
						</div>
						<h3 class="post-title"><a href="/posts/{{$post6->slug}}">{{$post6->titulo}}</a></h3>
						<ul class="post-meta">
							<li><a href="/autores/{{$post6->slug_user}}">{{$post6->name}} {{$post6->apellido}}</a></li>
							<li>{{ date('d-M-y', strtotime($post6->fecha))}}</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /post -->

			<!-- post -->
			<div class="col-md-6">
				<div class="post">
					<a class="post-img" href="/posts/{{$post7->slug}}"><img src="/headers/{{$post7->cabecera}}" alt=""></a>
					<div class="post-body">
						<div class="post-category">
							<a href="/categorias/{{$post7->slu}}">{{$post7->nombre}}</a>
							<a href="/subcategorias/{{$post7->slg}}">{{$post7->nombresub}}</a>
						</div>
						<h3 class="post-title"><a href="blog-post.html">{{$post7->titulo}}</a></h3>
						<ul class="post-meta">
							<li><a href="/autores/{{$post7->slug_user}}">{{$post7->name}} {{$post7->apellido}}</a></li>
							<li>{{ date('d-M-y', strtotime($post7->fecha))}}</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /post -->
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">LIGA MX</h2>
				</div>
			</div>
			<!-- post -->
			@foreach($ligamx as $mx)
			<div class="col-md-4">
				<div class="post post-sm">
					<a class="post-img" href="/posts/{{$mx->slug}}"><img src="/headers/{{$mx->cabecera}}" alt=""></a>
					<div class="post-body">
						<div class="post-category">
							<a href="/categorias/{{$mx->slu}}">{{$mx->nombre}}</a>
							<a href="/subcategorias/{{$mx->slg}}">{{$mx->nombresub}}</a>
						</div>
						<h3 class="post-title title-sm"><a href="/posts/{{$mx->slug}}">{{$mx->titulo}}</a></h3>
						<ul class="post-meta">
							<li><a href="/autores/{{$mx->slug_user}}">{{$mx->name}} {{$mx->apellido}}</a></li>
							<li>{{ date('d-M-y', strtotime($post7->fecha))}}</li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach
			<!-- /post -->
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">CONMEBOL</h2>
				</div>
			</div>
			<!-- post -->
			@foreach($conmebol as $con)
			<div class="col-md-4">
				<div class="post post-sm">
					<a class="post-img" href="/posts/{{$con->slug}}"><img src="/headers/{{$con->cabecera}}" alt=""></a>
					<div class="post-body">
						<div class="post-category">
							<a href="/categorias/{{$con->slu}}">{{$con->nombre}}</a>
							<a href="/subcategorias/{{$con->slg}}">{{$con->nombresub}}</a>
						</div>
						<h3 class="post-title title-sm"><a href="/posts/{{$con->slug}}">{{$con->titulo}}</a></h3>
						<ul class="post-meta">
							<li><a href="/autores/{{$con->slug_user}}">{{$con->name}} {{$con->apellido}}</a></li>
							<li>{{ date('d-M-y', strtotime($con->fecha))}}</li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach
			<!-- /post -->
		</div>
		<!-- /row -->

		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">OTROS DEPORTES</h2>
				</div>
			</div>
			<!-- post -->
			@foreach($otros as $o)
			<div class="col-md-4">
				<div class="post post-sm">
					<a class="post-img" href="/posts/{{$o->slug}}"><img src="/headers/{{$o->cabecera}}" alt=""></a>
					<div class="post-body">
						<div class="post-category">
							<a href="/categorias/{{$o->slu}}">{{$o->nombre}}</a>
							<a href="/subcategorias/{{$o->slg}}">{{$o->nombresub}}</a>
						</div>
						<h3 class="post-title title-sm"><a href="/posts/{{$o->slug}}">{{$o->titulo}}</a></h3>
						<ul class="post-meta">
							<li><a href="/autores/{{$o->slug_user}}">{{$o->name}} {{$o->apellido}}</a></li>
							<li>{{ date('d-M-y', strtotime($o->fecha))}}</li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach
			<!-- /post -->
		</div>
		<!-- /row -->	
<!-- /Recientes -->
@endsection
@section('tags')
	@foreach($tags as $tag)
		<li><a href="/etiquetas/{{$tag->slug}}">{{$tag->name}}</a></li>
	@endforeach
@endsection