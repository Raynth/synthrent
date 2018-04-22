@extends('app')

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li class="active">Producten</li>
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
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							{{ $products->links('vendor.pagination.custom') }}	
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row clearfix-product">
                            @foreach($products as $product)
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
                                            <img src="{{ asset('storage/cover_images/'.$product->cover_image) }}" alt="Afbeelding van {{ $product->product_name }}">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-price">&euro; {{ number_format($product->rent_money, 2, ',', '.') }}</h3>
                                            <h2 class="product-name"><a href="#">{{ $product->product_mark->product_mark_name }} {{ $product->product_name }}</a></h2>
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
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							{{ $products->links('vendor.pagination.custom') }}
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