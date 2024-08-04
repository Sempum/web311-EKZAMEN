<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>{{ config('app.name') }} - @yield('title')</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="manifest" href="site.webmanifest">
		<!-- Place favicon.ico -->
		<link rel="apple-touch-icon" href="{{ asset('assets/img/icon.png') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/icon.png') }}">
		<!-- google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Nunito:400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
		<!-- Stylesheet -->
		<link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
		<!-- bootstrap -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		<!-- owl carousel -->
		<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
		<!-- fontawesome -->
		<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
		<!-- animate css -->
		<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
		<!-- type animation css -->
		<link rel="stylesheet" href="{{ asset('assets/css/typing-css.css') }}">
		<!-- custom style -->
		<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
		<!-- main style -->
		<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
		<!-- responsive css -->
		<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
	</head>
	<body>

		<div class="spinner-section">
			<div class="loader preloader"></div>
		</div>
        @if(Route::getCurrentRoute()->uri() === '/' )
            <header class="main-header offset-header">
                <div class="header-bottom">
                    <div class="container">
                        <div class="row">
                            <!-- navbar -->
                            @include('layouts.template-parts.navbar')
                            <!-- // end navbar -->
                        </div>
                    </div>
                </div>
            </header>
            @else
            <header class="main-header">
                <!-- header bottom -->
                <div class="header-bottom">
                    <div class="container">
                        <div class="row">
                            <!-- navbar -->
                            @include('layouts.template-parts.navbar')
                            <!-- // end navbar -->
                        </div>
                    </div>
                </div>
            </header>
        @endif

        @yield('content')

		<!-- footer section -->
		<footer class="footer-section black-bg">
			<!-- footer top -->
			<div class="footer-top equal-space">
				<div class="container">
					<div class="row">
						<!-- single footer content -->
						<div class="col-12 col-lg-3 col-md-6">
							<div class="single-footer-text">
								<a href="" class="footer-logo"><img src="{{ asset('assets/img/footer-logo.png') }}" alt="logo"></a>
								<p>Вы ищете потерянную документацию для вашей техники? Тогда вы по адресу</p>
							</div>
                            <ul class="social-list">
                                <li><a href="https://ru-ru.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/?lang=ru"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://ru.pinterest.com/"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a></li>
                            </ul>
						</div>
						<!-- single footer content -->
						<div class="col-12 col-lg-3 col-md-6">
							<div class="single-footer-text">
								<h3>Связаться с нами</h3>
								<ul class="footer-contact">
									<li>
										<i class="fas fa-map-marker-alt"></i>
										<p>Профессора Камая д. 3<br> Россия, г. Казань</p>
									</li>
									<li>
										<i class="fas fas fa-envelope"></i>
										<p>ryslan.nigmatyllin2001@mail.ru</p>
									</li>
									<li>
										<i class="fas fas fa-phone"></i>
										<p>+7 (900) 329-31-16</p>
									</li>
								</ul>
							</div>
						</div>
                        <div class="col-12 col-lg-3 col-md-6">
							<div class="single-footer-text">
								<h3>Наши сервисные ссылки</h3>
								<ul class="footer-service-list">
									<li><a href="{{ route('app.contacts') }}">Связаться с нами</a></li>
									<li><a href="{{ route('app.contacts') }}">О нас</a></li>
									<li><a href="{{ route('app.sectors') }}">Документация</a></li>
                                    <li><a href="{{ route('app.privacy') }}">Политика конфиденциальности</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer copyright -->
			<div class="footer-copyright whitecolor">
				<div class="container">
					<div class="row">
						<div class="w-100 d-md-flex d-block justify-content-between">
							<p>Copyright &copy; 2018 <a href="">Tech-city</a> All Rights Reserved</p>
						</div>
					</div>
				</div>
			</div>
		</footer>


		<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
		<!-- jquery -->
		<script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
		<!-- Bootstrap Core -->
		<script src="{{ asset('assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<!-- owl carousel -->
		<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
		<!-- whypoints -->
		<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
		<!-- type animation -->
		<script src="{{ asset('assets/js/type-animation.js') }}"></script>
		<!-- circle progress -->
		<script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>
		<!-- masonary -->
		<script src="{{ asset('assets/js/masonary.min.js') }}"></script>
		<!-- isotope -->
		<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
		<!-- imagesLoaded -->
		<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
		<!-- wow js -->
		<script src="{{ asset('assets/js/wow.min.js') }}"></script>
		<!-- main script -->
		<script src="{{ asset('assets/js/main.js') }}"></script>

        @yield('page-script')
	</body>
</html>
