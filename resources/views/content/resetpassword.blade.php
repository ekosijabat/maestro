@extends('layouts.sections.master')

@section('title', 'Reset Password')

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
						<h2> Reset <span>Password</span> </h2>
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

					<form method="post" action="{{ url('reset-password') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
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
							<button class="btn puprple_btn" type="submit">Reset Password</button>
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
@endsection
