<nav class="navbar navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<!-- Collapsed Hamburger -->
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                 Forecast Test
            </a>
		</div>
		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav navbar-left">
				
			</ul>

			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				@if (Auth::check())
					<li><a href="#">{{Auth::user()->username}}</a></li>
					<li><a href="#">Profile</a></li>
					<li><a href="{{route('auth.signout')}}">Sign out</a></li>
				@else
					<li ><a href="{{ url('/signin') }}">Sign In</a></li>
                	<li ><a href="{{ url('/signup') }}">Sign Up</a></li>
                @endif
			</ul>
		</div>
	</div>
</nav>