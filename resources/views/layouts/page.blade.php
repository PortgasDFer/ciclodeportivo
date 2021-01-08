<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	@yield('metatags')
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<body>
	<!-- HEADER -->
	<header id="header">
		<!-- NAV -->
		<div id="nav">
			<!-- Top Nav -->
			<div id="nav-top">
				<div class="container">
					<!-- social -->
					<ul class="nav-social">
						<li><a href="https://www.facebook.com/ciclodeportivo/"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/CicloDeportivo1"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.instagram.com/ciclodeportivo/"><i class="fa fa-instagram"></i></a></li>
					</ul>
					<!-- /social -->

					<!-- logo -->
					<div class="nav-logo">
						<a href="/" class="logo"><img src="/img/CD.png" alt=""></a>
					</div>
					<!-- /logo -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
							<form method="POST" action="/busqueda">
								@csrf
								@method('GET')
								<input class="input" name="search" placeholder="Ingrese su busqueda">
							</form>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Top Nav -->

			<!-- Main Nav -->
			<div id="nav-bottom">
				<div class="container">
					<!-- nav -->
					<ul class="nav-menu">
						<li><a href="/">Inicio</a></li>
						<!--
						<li class="has-dropdown">
							<a href="/">Inicio</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<ul class="dropdown-list">
										<li><a href="category.html">Categorías</a></li>
										<li><a href="blog-post.html">Post page</a></li>
										<li><a href="author.html">Autores</a></li>
										<li><a href="about.html">Acerca de nosotros</a></li>
										<li><a href="contact.html">Contacto</a></li>
										<li><a href="blank.html">Regular</a></li>
									</ul>
								</div>
							</div>
						</li>
						-->
						<li><a href="/subcategorias/liga-mx">Liga MX</a></li>
						<li><a href="/categorias/conmebol">CONMEBOL</a></li>
						<li><a href="/categorias/futbol-internacional">Internacional</a></li>
						<li><a href="/categorias/deportes-de-combate">Deportes de combate</a></li>
						<li><a href="/categorias/mas-deportes">Más deportes</a></li>
						<li><a href="/categorias/otros-deportes">Otros</a></li>
						<!--
						<li class="has-dropdown megamenu">
							<a href="#">Más deportes</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<div class="row">
										<div class="col-md-3">
											<h4 class="dropdown-heading">Categories</h4>
											<ul class="dropdown-list">
												<li><a href="#">Lifestyle</a></li>
												<li><a href="#">Fashion</a></li>
												<li><a href="#">Technology</a></li>
												<li><a href="#">Health</a></li>
												<li><a href="#">Travel</a></li>
											</ul>
										</div>
										<div class="col-md-3">
											<h4 class="dropdown-heading">Lifestyle</h4>
											<ul class="dropdown-list">
												<li><a href="#">Lifestyle</a></li>
												<li><a href="#">Fashion</a></li>
												<li><a href="#">Health</a></li>
											</ul>
											<h4 class="dropdown-heading">Technology</h4>
											<ul class="dropdown-list">
												<li><a href="#">Lifestyle</a></li>
												<li><a href="#">Travel</a></li>
											</ul>
										</div>
										<div class="col-md-3">
											<h4 class="dropdown-heading">Fashion</h4>
											<ul class="dropdown-list">
												<li><a href="#">Fashion</a></li>
												<li><a href="#">Technology</a></li>
											</ul>
											<h4 class="dropdown-heading">Travel</h4>
											<ul class="dropdown-list">
												<li><a href="#">Lifestyle</a></li>
												<li><a href="#">Healtth</a></li>
												<li><a href="#">Fashion</a></li>
											</ul>
										</div>
										<div class="col-md-3">
											<h4 class="dropdown-heading">Health</h4>
											<ul class="dropdown-list">
												<li><a href="#">Technology</a></li>
												<li><a href="#">Fashion</a></li>
												<li><a href="#">Health</a></li>
												<li><a href="#">Travel</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="has-dropdown">
							<a href="#">Otros</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<ul class="dropdown-list">
										<li><a href="category.html">Categorías</a></li>
										<li><a href="blog-post.html">Post page</a></li>
										<li><a href="author.html">Autores</a></li>
										<li><a href="about.html">Acerca de nosotros</a></li>
										<li><a href="contact.html">Contacto</a></li>
										<li><a href="blank.html">Regular</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
					 /nav -->
				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">
				<ul class="nav-aside-menu">
					<li><a href="/subcategorias/liga-mx">Liga MX</a></li>
					<li><a href="/categorias/conmebol">CONMEBOL</a></li>
					<li><a href="/categorias/futbol-internacional">Internacional</a></li>
					<li><a href="/categorias/deportes-de-combate">Deportes de combate</a></li>
					<li><a href="/categorias/mas-deportes">Más deportes</a></li>
					<li><a href="/categorias/otros-deportes">Otros</a></li>
					<!--
					<li><a href="index.html">Home</a></li>
					<li class="has-dropdown"><a>Categories</a>
						<ul class="dropdown">
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Technology</a></li>
							<li><a href="#">Travel</a></li>
							<li><a href="#">Health</a></li>
						</ul>
					</li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="contact.html">Contacts</a></li>
					<li><a href="#">Advertise</a></li>
				-->
				</ul>
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
			<!-- /Aside Nav -->
		</div>
		<!-- /NAV -->
	</header>
<!-- /HEADER -->
@yield('header')
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		@yield('hotpost')
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				@yield('content')
			</div>
	 		<div class="col-md-4">
							<!-- ad widget-->
							<div class="aside-widget text-center">
								<a href="#" style="display: inline-block;margin: auto;">
									<img class="img-responsive" src="./img/ad-3.jpg" alt="">
								</a>
							</div>
							<!-- /ad widget -->

							<!-- social widget -->
							<div class="aside-widget">
								<div class="section-title">
									<h2 class="title">Redes Sociales</h2>
								</div>
								<div class="social-widget">
									<ul>
										<li>
											<a href="#" class="social-facebook">
												<i class="fa fa-facebook"></i>
											</a>
										</li>
										<li>
											<a href="#" class="social-twitter">
												<i class="fa fa-twitter"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- /social widget -->

							<!-- category widget -->
							<div class="aside-widget">
								<div class="section-title">
									<h2 class="title">Categorias</h2>
								</div>
								<div class="category-widget">
									<ul>
										<li><a href="#">Liga MX</a></li>
										<li><a href="#">CONMEBOL </a></li>
										<li><a href="#">Internacional</a></li>
										<li><a href="#">Deportes de combate</a></li>
										<li><a href="#">Más deportes </a></li>
										<li><a href="#">Otros </a></li>
									</ul>
								</div>
							</div>
							<!-- /category widget -->
							<!-- post widget -->
							<div class="aside-widget">
								<div class="section-title">
									<h2 class="title">LO MÁS LEÍDO</h2>
								</div>
								<!-- post -->
								@foreach($top as $t)
								<div class="post post-widget">
									<a class="post-img" href="/posts/{{$t->slug}}"><img src="/headers/{{$t->cabecera}}" alt=""></a>
									<div class="post-body">
										<div class="post-category">
											<a href="/categorias/{{$t->slu}}">{{$t->nombre}}</a>
											<a href="/subcategorias/{{$t->slg}}">{{$t->nombresub}}</a>
										</div>
										<h3 class="post-title"><a href="/posts/{{$t->slug}}">{{$t->titulo}}</a></h3>
									</div>
								</div>
								@endforeach
								<!-- /post -->
							</div>
							<!-- /post widget -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
<!-- FOOTER -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="footer-logo">
							<a href="/" class="logo"><img src="/img/CD.png" alt="" class="logo"></a>
						</div>
						<p>Todo sobre tu deporte favorito.</p>
						<ul class="contact-social">
							<li><a href="https://www.facebook.com/ciclodeportivo/" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://twitter.com/CicloDeportivo1" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.instagram.com/ciclodeportivo/" class="social-instagram"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Categorías</h3>
						<div class="category-widget">
							<ul>
								<li><a href="#">Liga MX</a></li>
								<li><a href="#">CONMEBOL </a></li>
								<li><a href="#">Internacional</a></li>
								<li><a href="#">Deportes de combate</a></li>
								<li><a href="#">Más deportes </a></li>
								<li><a href="#">Otros </a></li>
							</ul>
						</div>
					</div> 
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Tags</h3>
						<div class="tags-widget">
							<ul>
								@yield('tags')
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">StrawHat Systems</h3>
						
							<button class="primary-button">Contactanos</button>
						
					</div>
				</div>
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="footer-bottom row">
				<div class="col-md-6 col-md-push-6">
					<ul class="footer-nav">
						<li><a href="/
							">Inicio</a></li>
						<li><a href="about.html">Acerca de nosotros</a></li>
						<li><a href="contact.html">Contacto</a></li>
						<li><a href="#">Avisos</a></li>
						<li><a href="#">Privacidad</a></li>
					</ul>
				</div>
				<div class="col-md-6 col-md-pull-6">
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | <a href="https://colorlib.com" target="_blank">Con la ayuda de Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
