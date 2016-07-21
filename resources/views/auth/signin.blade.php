@extends('layouts.default')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Sign In</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('auth.signin') }}">

						<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
							<label for="email" class="col-md-4 control-label">Email Adress</label>
							<div class="col-md-6">
								<input type="text" name="email" class="form-control" id="email">
								<!--Span notification -->
								@if($errors->has('email'))
									<span class="help-block">{{$errors->first('email')}}</span>
								@endif
							</div>
						</div>

						

						<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
							<label for="password" class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" name="password" class="form-control" id="password">
								<!--Span notification -->
								@if($errors->has('password'))
									<span class="help-block">{{$errors->first('password')}}</span>
								@endif
							</div>
						</div>

						
						<!-- -->
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-user"></i>
									Log in
								</button>
							</div>
						</div>
						<input type="hidden" name="_token" value="{{Session::token()}}">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop