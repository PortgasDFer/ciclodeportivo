@extends('layouts.page')
@section('title','Publicación')
@section('content')
<!-- PAGE HEADER -->
	<div id="post-header" class="page-header">
		<div class="page-header-bg" style="background-image: url('/headers/{{$post->cabecera}}');" data-stellar-background-ratio="0.5"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="post-category">
						<a href="category.html">Lifestyle</a>
					</div>
					<h1>{{$post->titulo}}.</h1>
					<ul class="post-meta">
						<li><a href="author.html">{{$datos->name}} {{$datos->apellido}}</a></li>
						<li>20 April 2018</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<!--/ PAGE HEADER -->
@endsection