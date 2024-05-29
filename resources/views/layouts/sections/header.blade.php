<header>
	<div class="container">
		<nav class="navbar navbar-expand-lg">
			<a class="navbar-brand" href="{{ url('/') }}">
				<img src="{{ asset('assets/images/logo/logo.png') }}" alt="image" >
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<div class="toggle-wrap">
						<span class="toggle-bar"></span>
					</div>
				</span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/') }}">Home</a>
					</li>
                    <li class="nav-item">
                        Welcome, {{ Auth::user()->name }}
                    </li>
					<li class="nav-item">
                        <form action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link dark_btn" type="submit"> Logout </button>
                        </form>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>
