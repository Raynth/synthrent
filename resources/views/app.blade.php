<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>SynthRENT</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	@section('headSection')
		@show

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welkom bij SynthRENT!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="#">Store</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#">FAQ</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="{{ asset('img/logo.png') }}" alt="">
						</a>
					</div>
					<!-- /Logo -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">Mijn Account <i class="fa fa-caret-down"></i></strong>
							</div>
							@guest
								<a href="{{ route('login') }}" class="text-uppercase">Inloggen</a> / <a href="{{ route('register') }}" class="text-uppercase">Registreren</a>
							@else
								<a href="{{ route('logout') }}" class="text-uppercase" onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">Uitloggen</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>
							@endguest
							<ul class="custom-menu">
								<li><a href="{{ route('account.index') }}"><i class="fa fa-user-o"></i> Mijn Account</a></li>
								<li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
								@guest
									<li><a href="{{ route('login') }}"><i class="fa fa-unlock-alt"></i> Inloggen</a></li>
									<li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> Registreren</a></li>
								@else
									<li><a href="{{ route('logout') }}"><i class="fa fa-lock" onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();"></i> Uitloggen</a></li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								@endguest
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									@if (Session::has('cart'))
										<span class="qty">{{ Session::get('cart')->totalQuantity }}</span>
									@endif
								</div>
								<strong class="text-uppercase">Mijn Winkelwagen:</strong>
								<br>
								<span>&euro; {{ Session::has('cart') ? number_format(Session::get('cart')->totalPrice, 2, ',', '.') : 0 }}</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										@if (Session::has('cart'))
											@foreach(Session::get('cart')->items as $item)
												<div class="product product-widget">
													<div class="product-thumb">
														<img src="{{ asset('storage/cover_images/'.$item->cover_image) }}" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-price">&euro; {{ number_format($item->totalRentMoney, 2, ',', '.') }}</h3>
														<h2 class="product-name"><a href="#">{{ $item->productMarkName }} {{ $item->product_name }}</a></h2>
													</div>
													<button class="cancel-btn"><i class="fa fa-trash"></i></button>
												</div>
											@endforeach
										@endif
									</div>
									<div class="shopping-cart-btns">
										<a href="{{ route('producten.cart') }}" class="main-btn">Bekijk Winkelwagen</a>
										<a href="{{ route('producten.checkout') }}" class="primary-btn">Bevestig Huren <i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Categorieën <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<li><a href="#">Men’s Clothing</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="#">Home</a></li>
						<li><a href="{{ route('producten.index') }}">Producten</a></li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	@section('main-content')
    	@show
	

	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="{{ asset('img/logo.png') }}" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Mijn Account</h3>
						<ul class="list-links">
							<li><a href="#">Mijn Account</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="{{ route('login') }}">Inloggen</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Klanten Service</h3>
						<ul class="list-links">
							<li><a href="#">Over Ons</a></li>
							<li><a href="#">Algemene Voorwaarden</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> Alle rechten voorbehouden</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/slick.min.js') }}"></script>
	<script src="{{ asset('js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>

	@section('footerSection')
  		@show
</body>

</html>
