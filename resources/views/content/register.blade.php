@extends('layouts.sections.master')

@section('title', 'Register')

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
						<h2> <span>Create</span> an account</h2>
						<p>Fill all fields so we can get some info about you. <br> We'll never send you spam</p>
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

                    <form method="post" action="{{url('process')}}">
                        @csrf
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name') }}">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="Confirm password" name="confirm-password">
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
						<div class="form-group">
							<button class="btn puprple_btn" type="submit">SIGN UP</button>
						</div>
					</form>
					<p class="or_block"></p>
					<div class="or_option">
						<p>Already have an account? <a href="{{ url('login') }}">Sign In here</a></p>
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
