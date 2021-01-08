@extends('layouts.app')
@section('content')
<div class="row">
	<form action="/generar" method="POST">
		@csrf
		<div class="col-md-3">
			Contraseña
		</div>
		<div class="col-md-3">
			<input type="text" name="password" >
		</div>
		<div class="col-md-3">
			<button type="submit">Generar</button>
		</div>
	</form>
</div>
@endsection