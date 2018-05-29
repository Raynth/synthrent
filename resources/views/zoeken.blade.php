@extends('app')

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li><a href="{{ route('producten.index') }}">Producten</a></li>
				<li class="active">Zoekresultaat</li>
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
				@include('aside')

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">	
							<div class="sort-filter">
								<span class="text-uppercase">Zoekresultaat:</span>
							</div>
						</div>
						<div class="pull-right">
							{{ $producten->links('vendor.pagination.custom') }}	
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row clearfix-product">
                            @foreach($producten as $product)
                                <!-- Product Single -->
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <div class="product product-single">
                                        <div class="product-thumb">
											<!-- Label 'Nieuw' verschijnt alleen als het product binnen 2 maanden is toegevoegd -->
											@if (((strtotime(date('Y-m-d H:i:s')) - strtotime($product->created_at)) / 2592000) < 2)
												<div class="product-label">
													<span>Nieuw</span>
												</div>
											@endif
                                            <button class="main-btn quick-view" onclick="window.location.href='{{ route('producten.show', $product->id) }}'"><i class="fa fa-search-plus"></i> Bekijk product</button>
                                            <img src="{{ asset('storage/cover_images/'.$product->foto) }}" alt="Afbeelding van {{ $product->naam }}">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price">&euro; {{ number_format($product->huurprijs, 2, ',', '.') }}</h3>
                                            <h2 class="product-name"><a href="#">{{ $product->merk->naam }} {{ $product->naam }}</a></h2>
                                            <div class="product-btns">
                                                <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                                <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                                <button class="primary-btn add-to-cart" onclick="window.location.href='{{ route('producten.show', $product->id) }}'"><i class="fa fa-shopping-cart"></i> Huren</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Product Single -->
                            @endforeach


						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="sort-filter">
								<span class="text-uppercase">Zoekresultaat:</span>
							</div>
						</div>
						<div class="pull-right">
							{{ $producten->links('vendor.pagination.custom') }}
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
    <!-- /section -->
@endsection