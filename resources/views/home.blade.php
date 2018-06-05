@extends('app')

@section('main-content')
	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
					<!-- banner -->
					<div class="banner banner-1">
						<img src="{{ asset('storage/cover_images/banner01.jpg') }}" alt="">
						<div class="banner-caption text-center">
							<h1 class="primary-color">SynthRENT</h1>
							<h3 class="white-color">Verhuur van synthesizers</h3>
							<a class="primary-btn" href="{{ route('producten.index') }}">Bekijk Producten</a>
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img src="{{ asset('storage/cover_images/banner02.jpg') }}" alt="">
						<div class="banner-caption text-center">
							<h1 class="primary-color">SynthRENT</h1>
							<h3 class="white-color">Verhuur van mixers, monitors, microfoons</h3>
							<a class="primary-btn" href="{{ route('producten.index') }}">Bekijk Producten</a>
						</div>
					</div>
					<!-- /banner -->

					<!-- banner -->
					<div class="banner banner-1">
						<img src="{{ asset('storage/cover_images/banner03.jpg') }}" alt="">
						<div class="banner-caption text-center">
							<h1 class="primary-color">SynthRENT</h1>
							<h3 class="white-color">Alles voor de EDM-producer</h3>
							<a class="primary-btn" href="{{ route('producten.index') }}">Bekijk Producten</a>
						</div>
					</div>
					<!-- /banner -->
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Laatste Producten</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- row -->
				<div class="row clearfix-laatste-product">
					@foreach($laatsteProducten as $laatsteProduct)
						<!-- Product Single -->
						<div class="col-md-3 col-sm-4 col-xs-6">
							<div class="product product-single">
								<div class="product-thumb">
									<!-- Label 'Nieuw' verschijnt alleen als het product binnen 2 maanden is toegevoegd -->
									@if (((strtotime(date('Y-m-d H:i:s')) - strtotime($laatsteProduct->created_at)) / 2592000) < 2)
										<div class="product-label">
											<span>Nieuw</span>
										</div>
									@endif
									<button class="main-btn quick-view" onclick="window.location.href='{{ route('producten.show', $laatsteProduct->id) }}'"><i class="fa fa-search-plus"></i> Bekijk product</button>
									<img src="{{ asset('storage/cover_images/'.$laatsteProduct->foto) }}" alt="Afbeelding van {{ $laatsteProduct->naam }}" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">&euro; {{ number_format($laatsteProduct->huurprijs, 2, ',', '.') }}</h3>
									<h2 class="product-name"><a href="#">{{ $laatsteProduct->merk->naam }} {{ $laatsteProduct->naam }}</a></h2>
									<div class="product-btns">
										<button class="primary-btn add-to-cart" onclick="window.location.href='{{ route('producten.show', $laatsteProduct->id) }}'"><i class="fa fa-shopping-cart"></i> Huren</button>
									</div>
								</div>
							</div>
						</div>
						<!-- /Product Single -->
					@endforeach
				</div>
				<!-- /row -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection
