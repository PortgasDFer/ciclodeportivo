<form method="POST" action="/posts/{{$id}}">
	@method('DELETE')
	@csrf
	<a href="/posts/"><button class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
</form> 