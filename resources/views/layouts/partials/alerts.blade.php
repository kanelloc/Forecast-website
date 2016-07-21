<!--Info alert -->
@if(Session::has('info'))
	<div class="alert alert-info" role="alert">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{Session::get('info')}}
	</div>
@endif

<!--False alert-->
@if(Session::has('alert'))
	<div class="alert alert-danger" role="alert">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{Session::get('alert')}}
	</div>
@endif

<!-- True Alert-->
@if(Session::has('success'))
	<div class="alert alert-success">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{Session::get('success')}}
	</div>
@endif