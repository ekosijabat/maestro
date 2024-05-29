<footer>
	<div class="top_footer" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12">
					<div class="abt_side">
						<div class="logo"> <a href="{{ config('maestro.url_link') }}" target="_blank"><img src="{{ asset('assets/images/logo/footer_logo.png') }}" alt="image" ></a></div>
						<ul>
							<li><a href="#">support@maestro.com</a></li>
							<li><a href="#">+1-900-123 4567</a></li>
						</ul>
						<ul class="social_media">
							<li><a href="#"><i class="icofont-facebook"></i></a></li>
							<li><a href="#"><i class="icofont-twitter"></i></a></li>
							<li><a href="#"><i class="icofont-instagram"></i></a></li>
							<li><a href="#"><i class="icofont-pinterest"></i></a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-12">
					<div class="links">
						<h3>Useful Links</h3>
						<ul>
							<li><a href="{{ url('/') }}">Home</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-12">
					<div class="try_out">
						<h3>Let's Try Out</h3>
						<ul class="app_btn">
							<li>
								<a href="{{ config('maestro.appstore_url') }}" target="_blank">
									<img src="{{ asset('assets/images/download/appstore_blue.png') }}" alt="image" >
								</a>
							</li>
							<li>
								<a href="{{ config('maestro.playstore_url') }}" target="_blank">
									<img src="{{ asset('assets/images/download/googleplay_blue.png') }}" alt="image" >
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="bottom_footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p>{{ config('maestro.app_name')}} | © Copyrights 2024. All rights reserved.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="go_top">
		<span><img src="{{ asset('assets/images/theme/go_top.png') }}" alt="image" ></span>
	</div>
</footer>
