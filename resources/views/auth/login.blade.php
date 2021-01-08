@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center mt-5">   
    <div class="window">
      <span class="h1">INICIAR SESIÓN</span>
       <form method="POST" action="{{ route('login') }}">
        @csrf
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mt-3" name="email" value="{{ old('email') }}" placeholder="Correo Electronico">
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} mt-3" name="password" placeholder="Contraseña">
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        <input type="submit" class="mb-2 btn btn-light mt-3" value="Ingresar">
      </form>
    </div>
</div>
@endsection
