<form method="POST" action="/subcategoria/{{$id}}">
	@method('DELETE')
	@csrf
	<a href="/subcategoria/{{$id}}"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
</form> 