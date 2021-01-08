<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>CicloDeportivo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    B I E N V E N I D O S
                </div>

                <div class="links">
                    <img src="/img/CD.png" alt="" class="img-fluid" style="height: 300px; width: 500px;">
                </div>
                <div class="links mt-3">
                    <a href="/">Inicio</a>
                    <a href="/subcategorias/liga-mx">Liga MX</a>
                    <a href="/categorias/conmebol">CONMEBOL</a>
                    <a href="/categorias/futbol-internacional">Internacional</a>
                    <a href="/categorias/deportes-de-combate">Deportes de combate</a>
                    <a href="/categorias/mas-deportes">Más deportes</a>
                    <a href="/categorias/otros-deportes">Otros</a>
                </div>
            </div>
        </div>
    </body>
</html>
