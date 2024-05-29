@extends('layouts.sections.master')

@section('title', 'Login')

@section('page-style')
@endsection

@section('content')
	<div class="full_bg">
		<div class="container">
			<section class="signup_section">
				<div class="top_part">
					<a class="navbar-brand" href="#">
						<img src="{{ asset('assets/images/logo/footer_logo.png') }}" alt="image">
					</a>
				</div>

				<div class="signup_form">
					<div class="section_title">
						<h2> Welcome to <span>{{ config('maestro.app_name')}}</span> </h2>
						<p>Fill all fields so you can access our features</p>
					</div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif

                    @if (Session::has('message'))
                    <div class="alert alert-success mb-4" role="alert">
                        {{ Session::get('message') }}
                    </div>
                    @endif

					<form method="post" action="{{url('do-login')}}">
                        @csrf
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
                        <div class="form-group">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <input id="captcha" type="text" class="form-control" placeholder="Enter above captcha" name="captcha">
                        </div>
                        <div style="text-align: right;">
                            <a href="{{ url('forgot') }}">Forgot Password</a>
                        </div>
						<div class="form-group">
							<button class="btn puprple_btn" type="submit">SIGN IN</button>
						</div>
					</form>
					<p class="or_block"></p>
					<div class="or_option">
						<p>Want to join us? <a href="{{ url('register') }}">Register here</a></p>
					</div>
				</div>
			</section>
		</div>
	</div>

@endsection

@section('page-script')
<script type="text/javascript">
    $('#reload').click(function() {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function(data) {
                $('.captcha span').html(data.captcha);
            }
        });
    });
</script>
@endsection
