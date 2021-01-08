@extends('layouts.page')
@section('title','River Plate en Vivo')
@section('metatags')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
<meta property="og:image" content="/img/river-plate.jpg" />
@endsection
@section('header')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v6.0"></script>
<!-- PAGE HEADER -->
	<div id="post-header" class="page-header">
		<div class="page-header-bg" style="background-image: url('img/river-plate.jpg'); background-size: cover;" data-stellar-background-ratio="0.5"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="post-category">
						<a href="/">Inicio</a>
						<a href="/river-en-vivo">Vive la pasión de River Plate en vivo</a>
					</div>
					<h1>River Plate vs Independiente</h1>
					<ul class="post-meta">
						<li>Ciclo Deportivo</a></li>
						<li>09/01/2021</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<!--/ PAGE HEADER -->
@endsection
@section('content')
<div class="section-row">
		<div class="post-content">
			<h1>Vive la pasión de River Plate totalmente en vivo</h1>
		</div>
		<div class="post-content">
			<h2>River Plate vs Independiente</h2>
			<p>
				River Plate vs Independiente en vivo, jornada 5 Copa Diego Armando Maradona
			</p>
			<iframe style="border: none;" src="https://sonic.dattalive.com/cp/widgets/player/single/?p=8482" width="100" height="110" scrolling="no"></iframe>
			<video controls autoplay name="media">
				<source src="https://sonic.dattalive.com/8482/stream" type="audio/mpeg">
			</video>
		</div>
	</div>
@endsection
