@extends('app')

@section('headSection')
	<!-- bootstrap datepicker -->
  	<link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li><a href="{{ route('producten.index') }}">Producten</a></li>
				<li class="active">{{ $product->product_mark->naam }} {{ $product->naam }}</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="{{ asset('storage/cover_images/'.$product->foto) }}" alt="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<!-- Label 'Nieuw' wordt alleen getoond als het product binnen 60 dagen is toegevoegd -->
							@if (((time() - strtotime($product->created_at)) / (60 * 60 * 24)) < 60)
								<div class="product-label">
									<span>Nieuw</span>
								</div>
							@endif
							<h2 class="product-name">{{ $product->product_mark->naam }} {{ $product->naam }}</h2>
							<h3 class="product-price">&euro; {{ number_format($product->huurprijs, 2, ',', '.') }}<small> per dag</small></h3>
							<p><strong>Merk:</strong> {{ $product->product_mark->naam }}</p>
							<div class="product-options">
								@if ($productRented->count() > 0)
									<p style="color: #F8694A">Dit product is al {{ $productRented->count() }} keer verhuurd:</p>
									@foreach ($productRented as $rented)
										<p style="color: #F8694A">Van {{ date("d-m-Y", strtotime($rented->begindatum)) }} tot {{ date("d-m-Y", strtotime($rented->einddatum)) }}.</p>
									@endforeach
								@endif
							</div>

							<!-- form start -->
							<form action="{{ route('winkelwagen.itemtoevoegen', ['id' => $product->id]) }}" enctype="multipart/form-data" method="post">
								{{ csrf_field() }}
								<div class="form-group col-md-6">
									<label for="begindatum">Begindatum</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="begindatum" name="begindatum">
									</div>
									<!-- /.input group -->
								</div>
								<!-- /.form group -->
								<div class="form-group col-md-6">
									<label for="einddatum">Einddatum</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="einddatum" name="einddatum">
									</div>
									<!-- /.input group -->
								</div>
								<!-- /.form group -->
								<div class="form-group">
									<button type="submit" class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Huren</button>
								</div>
							</form>
							<!-- Display validation errors -->
							@if ($errors->any())
								<div class="callout callout-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif
							<!-- Geef melding als het product verhuurd is -->
							@if (session('productRented'))
								<div class="alert alert-warning">
									{!! session('productRented') !!}
								</div>
							@endif
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Omschrijving</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p>{!! $product->omschrijving !!}</p>
								</div>
								<div id="tab2" class="tab-pane fade in">
									<p>Details</p>
								</div>
								<div id="tab3" class="tab-pane fade in">

									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
														<div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
														<div class="review-rating pull-right">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
															irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
													</div>
												</div>

												<ul class="reviews-pages">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<p>Your email address will not be published.</p>
											<form class="review-form">
												<div class="form-group">
													<input class="input" type="text" placeholder="Your Name" />
												</div>
												<div class="form-group">
													<input class="input" type="email" placeholder="Email Address" />
												</div>
												<div class="form-group">
													<textarea class="input" placeholder="Your review"></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Your Rating: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn">Submit</button>
											</form>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection

@section('footerSection')
    <!-- bootstrap datepicker -->
    <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.nl.min.js') }}" charset="UTF-8"></script>
    <script>
        $(function () {
            // Datepicker begindatum
            $('#begindatum').datepicker({
                autoclose: true,
                startDate: '+1d',
                format: 'dd-mm-yyyy',
                language: 'nl'
            })
			// Datepicker eindatum
			$('#einddatum').datepicker({
                autoclose: true,
                startDate: '+1d',
                format: 'dd-mm-yyyy',
                language: 'nl'
            })
			// Als begindatum geselecteerd is, is de minimale datum van einddatum gelijk aan begindatum
			$('#begindatum').change(function() {
				var begindatum = document.getElementById('begindatum').value
				 $('#einddatum').datepicker('setStartDate', begindatum);
			})
        })
    </script>
@endsection