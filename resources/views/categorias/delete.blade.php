<form method="POST" action="/categoria/{{$id}}">
	@method('DELETE')
	@csrf
	<a href="/categoria/{{$id}}"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
</form> 