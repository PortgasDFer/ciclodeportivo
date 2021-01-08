<form method="POST" action="/usuarios/{{$id}}">
	@method('DELETE')
	@csrf
	<a href="/usuarios/{{$id}}"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
</form> 