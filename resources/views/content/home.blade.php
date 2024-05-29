@extends('layouts.sections.master' )

@section('title', 'Home')

@section('page-style')
@endsection

@section('content')

<section class="banner_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12"  data-aos="fade-right" data-aos-duration="1500">
				<div class="banner_text">
					<h1>Best way to <span>manage your clients.</span></h1>
					<p>Increase the development of your business by managing clients better</p>
				</div>
				<ul class="app_btn">
					<li>
						<a href="{{ config('maestro.appstore_url')}}" target="_blank">
							<img class="blue_img" src="{{ asset('assets/images/download/appstore_blue.png') }}" alt="image" >
							<img class="white_img" src="{{ asset('assets/images/download/appstore_white.png') }}" alt="image" >
						</a>
					</li>
					<li>
						<a href="{{ config('maestro.playstore_url') }}" target="_blank">
							<img class="blue_img" src="{{ asset('assets/images/download/googleplay_blue.png') }}" alt="image" >
							<img class="white_img" src="{{ asset('assets/images/download/googleplay_white.png') }}" alt="image" >
						</a>
					</li>
				</ul>
				<div class="used_app">
					<ul>
						<li><img src="{{ asset('assets/images/theme/used01.png') }}" alt="image" ></li>
						<li><img src="{{ asset('assets/images/theme/used02.png') }}" alt="image" ></li>
						<li><img src="{{ asset('assets/images/theme/used03.png') }}" alt="image" ></li>
						<li><img src="{{ asset('assets/images/theme/used04.png') }}" alt="image" ></li>
					</ul>
					<p>12M + <br> used this app</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-12"  data-aos="fade-in" data-aos-duration="1500">
				<div class="banner_slider">
					<div class="left_icon">
						<img src="{{ asset('assets/images/theme/message_icon.png') }}" alt="image" >
					</div>
					<div class="right_icon">
						<img src="{{ asset('assets/images/theme/shield_icon.png') }}" alt="image" >
					</div>
					<div id="frmae_slider" class="owl-carousel owl-theme">
                        @foreach ($banner as $row)
						<div class="item">
							<div class="slider_img">
								<img src="{{ asset('assets/images/banners') }}/{{ $row->image_name }}" alt="image" >
							</div>
						</div>
                        @endforeach
					</div>
					<div class="slider_frame">
						<img src="{{ asset('assets/images/theme/mobile_frame_svg.svg') }}" alt="image" >
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="row_am features_section" id="features">
	<div class="container">
		<div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
			<h2><span>Features</span> that makes our app different!</h2>
			<p>Enjoy the conveniences we provide in our application</p>
		</div>
		<div class="feature_detail">
			<div class="left_data feature_box">
				<div class="data_block" data-aos="fade-right" data-aos-duration="1500">
					<div class="icon">
						<img src="{{ asset('assets/images/theme/secure_data.png') }}" alt="image" >
					</div>
					<div class="text">
						<h4>Secure data</h4>
						<p>We ensure the security of your client data and transactions</p>
					</div>
				</div>
				<div class="data_block" data-aos="fade-right" data-aos-duration="1500">
					<div class="icon">
						<img src="{{ asset('assets/images/theme/functional.png') }}" alt="image" >
					</div>
					<div class="text">
						<h4>Simple to use</h4>
						<p>Our application makes your work process easier, thereby improving your company</p>
					</div>
				</div>
			</div>
			<div class="right_data feature_box">
				<div class="data_block" data-aos="fade-left" data-aos-duration="1500">
					<div class="icon">
						<img src="{{ asset('assets/images/theme/live-chat.png') }}" alt="image" >
					</div>
					<div class="text">
						<h4>Live chat</h4>
						<p>Make it easier for you to communicate with clients by using our chat feature</p>
					</div>
				</div>
				<div class="data_block" data-aos="fade-left" data-aos-duration="1500">
					<div class="icon">
						<img src="{{ asset('assets/images/theme/support.png') }}" alt="image" >
					</div>
					<div class="text">
						<h4>24-7 Support</h4>
						<p>We will always be there for any problems you face</p>
					</div>
				</div>
			</div>
			<div class="feature_img" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
				<img src="{{ asset('assets/images/theme/features_frame.png') }}" alt="image" >
			</div>
		</div>
	</div>
</section>

<section class="row_am copycode_section">
    <div class="container">
        <div class="copycode_box">
            <div class="section_title aos-init aos-animate" data-aos="fade-in" data-aos-duration="1500" data-aos-delay="100">
                <h2>Coupon Code</h2>
                <p>Be the first to use our coupon and get the attractive discounts</p>
            </div>
            <form id="coupon_form">
                <div class="form-group">
                    <input type="text" class="form-control" value="HALLOW10" readonly id="couponCode">
                </div>
                <div class="form-group">
                    <button class="btn" id="copyText">Copy Coupon</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="row_am about_app_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="about_img" data-aos="fade-in" data-aos-duration="1500">
					<div class="frame_img">
						<img class="moving_position_animatin" src="{{ asset('assets/images/theme/about-frame.png') }}" alt="image" >
					</div>
					<div class="screen_img">
						<img class="moving_animation" src="{{ asset('assets/images/theme/about-screen.png') }}" alt="image" >
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="about_text">
					<div class="section_title" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
						<h2>Make sure you are part of <span>our app.</span></h2>
						<p>Many companies have been helped by our presence. It has been proven that many people are actively using our application</p>
					</div>
					<ul class="app_statstic" id="counter" data-aos="fade-in" data-aos-duration="1500">
						<li>
							<div class="icon">
								<img src="{{ asset('assets/images/theme/download.png') }}" alt="image" >
							</div>
							<div class="text">
								<p><span class="counter-value" data-count="10">10</span><span>M+</span></p>
								<p>Download</p>
							</div>
						</li>
						<li>
							<div class="icon">
								<img src="{{ asset('assets/images/theme/followers.png') }}" alt="image" >
							</div>
							<div class="text">
								<p><span class="counter-value" data-count="8">8 </span><span>M+</span></p>
								<p>Followers</p>
							</div>
						</li>
						<li>
							<div class="icon">
								<img src="{{ asset('assets/images/theme/reviews.png') }}" alt="image" >
							</div>
							<div class="text">
								<p><span class="counter-value" data-count="2300">2300</span><span>+</span></p>
								<p>Reviews</p>
							</div>
						</li>
						<li>
							<div class="icon">
								<img src="{{ asset('assets/images/theme/countries.png') }}" alt="image" >
							</div>
							<div class="text">
								<p><span class="counter-value" data-count="5">0</span><span>+</span></p>
								<p>Countries</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="row_am query_section">
    <div class="query_inner aos-init aos-animate" data-aos="fade-in" data-aos-duration="1500">
        <div class="container">
            <div class="section_title">
                <h2>Promotion</h2>
                <p>We have special offers for you.<br />Do not miss it</p>
            </div>
            <a href="{{ config('maestro.promote_url')}}" class="btn white_btn" target="_blank">Visit Now</a>
        </div>
    </div>
  </section>

@endsection

@section('page-script')
<script type="text/javascript">
    $(document).ready(function() {
        $("#coupon_form").on('click', function(e) {
            e.preventDefault();
        });

        $('#copyText').click(function() {
            let copyText = document.querySelector('#couponCode');

            navigator.permissions.query({name: "clipboard-write"}).then(result => {
                if (result.state == "granted" || result.state == "prompt") {
                    navigator.clipboard.writeText(copyText.value);
                    Lobibox.notify('success', {
                        title: 'Great',
                        sound: false,
                        size: 'mini',
                        delay: 2500,
                        icon: false,
                        msg: copyText.value + ' has been copied to clipboard'
                    });
                }
            });
        });
    })
</script>
@endsection
