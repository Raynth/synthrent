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
				<li class="active">{{ $product->merk->naam }} {{ $product->naam }}</li>
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
							<h2 class="product-name">{{ $product->merk->naam }} {{ $product->naam }}</h2>
							<h3 class="product-price">&euro; {{ number_format($product->huurprijs, 2, ',', '.') }}<small> per dag</small></h3>
							<p><strong>Merk:</strong> {{ $product->merk->naam }}</p>
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
								@csrf
								<div class="form-group col-md-6">
									<label for="begindatum">Begindatum</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="begindatum" name="begindatum" onchange="berekenPrijs()">
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
										<input type="text" class="form-control pull-right" id="einddatum" name="einddatum" onchange="berekenPrijs()">
									</div>
									<!-- /.input group -->
								</div>
								<!-- /.form group -->
								<div>
									<h4>Huurprijs voor <span id="dagen">0</span> dagen:</h4>
									<h3 id="totale_huurprijs" class="primary-color">&euro; 0,00</h3>
								</div>
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
								<li><a data-toggle="tab" href="#tab3">Beoordelingen ({{ $reviewsAmount }})</a></li>
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
												@if ($reviews->count() > 0)
													@foreach ($reviews as $review)
														<div class="single-review">
															<div class="review-heading">
																<div><a href="#"><i class="fa fa-user-o"></i> {{ $review->naam }}</a></div>
																<div><a href="#"><i class="fa fa-clock-o"></i> {{ $review->created_at }}</a></div>
																<div class="review-rating pull-right">
																	@for ($i = 0; $i < $review->waardering; $i++)
																		<i class="fa fa-star"></i>
																	@endfor
																	@for ($i = $review->waardering; $i < 5; $i++)
																		<i class="fa fa-star-o empty"></i>
																	@endfor
																</div>
															</div>
															<div class="review-body">
																<p>{{ $review->beoordeling }}</p>
															</div>
														</div>
													@endforeach
												@else
													<div class="single-review">
														<div class="review-body">
															<p>Dit product heeft nog geen beoordeling.</p>
														</div>
													</div>
												@endif
											</div>
												
													{{ $reviews->links('vendor.pagination.custom') }}
												
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Schrijf uw review</h4>
											<p>Uw e-mailadres wordt niet gepubliceerd.</p>
											<form class="review-form" action="{{ route('reviews.store') }}" method="post">
												@csrf
												<input type="hidden" name="product_id" value="{{ $product->id }}">
												<div class="form-group">
													<input class="input" type="text" name="naam" placeholder="Uw naam" @auth value="{{ Auth::user()->voornaam }}" readonly @endauth/>
												</div>
												<div class="form-group">
													<input class="input" type="email" name="email" placeholder="E-mail adres" @auth value="{{ Auth::user()->email }}" readonly @endauth />
												</div>
												<div class="form-group">
													<textarea class="input" name="beoordeling" placeholder="Uw beoordeling"></textarea>
												</div>
												<div class="form-group">
													<div class="input-rating">
														<strong class="text-uppercase">Uw waardering: </strong>
														<div class="stars">
															<input type="radio" id="star5" name="waardering" value="5" /><label for="star5"></label>
															<input type="radio" id="star4" name="waardering" value="4" /><label for="star4"></label>
															<input type="radio" id="star3" name="waardering" value="3" /><label for="star3"></label>
															<input type="radio" id="star2" name="waardering" value="2" /><label for="star2"></label>
															<input type="radio" id="star1" name="waardering" value="1" /><label for="star1"></label>
														</div>
													</div>
												</div>
												<button class="primary-btn" type="submit">Toevoegen</button>
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
                format: 'yyyy-mm-dd',
                language: 'nl'
            })
			// Datepicker eindatum
			$('#einddatum').datepicker({
                autoclose: true,
                startDate: '+1d',
                format: 'yyyy-mm-dd',
                language: 'nl'
            })
			// Als begindatum geselecteerd is, is de minimale datum van einddatum gelijk aan begindatum
			$('#begindatum').change(function() {
				var begindatum = document.getElementById('begindatum').value
				 $('#einddatum').datepicker('setStartDate', begindatum);
			})
        })

        var huurprijs = JSON.parse('{{ $product->huurprijs }}')
		var dagen = 0
		var totaalHuurprijs = 0

		// Controleer of begindatum en einddatum zijn ingevuld en bereken het aantal dagen tussen deze 2 datums
        function berekenPrijs() {
            // Haal de datums 'van' en 'tot'      
            var begindatum = document.getElementById("begindatum").value
            var einddatum = document.getElementById("einddatum").value
            // Controleer of beide datums zijn ingevuld, voordat het aantal dagen berekend kan worden
            if (begindatum != '' && einddatum != '') {
                begindatum = Date.parse(begindatum)
                einddatum = Date.parse(einddatum)
                // Bereken het aantal milliseconden tussen deze 2 datums
                var timeDiff = einddatum - begindatum
                // Bereken aantal dagen van het aantal milliseconden
                dagen = Math.floor(timeDiff / (1000 * 60 * 60 * 24))
                document.getElementById('dagen').innerHTML = dagen
                // Bereken totale huurprijs: aantal dagen x huurprijs
                totaalHuurprijs = (dagen * huurprijs).toFixed(2)
                document.getElementById("totale_huurprijs").innerHTML = new Intl.NumberFormat('nl-NL', { style: 'currency', currency: 'EUR' }).format(totaalHuurprijs);
            }
        }
    </script>
@endsection