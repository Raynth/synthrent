@extends('app')

@section('main-content')
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Kassa</li>
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
                
                <div class="col-md-12">
                    <div class="order-summary clearfix">
                        <div class="section-title">
                            <h3 class="title">Kassa</h3>
                        </div>
                        <h4>Uw totaalbedrag: &euro; {{ number_format($total, 2, ',', '.') }}</h4>
                        <form action="{{ route('producten.checkout') }}" method="post" id="checkout-form" class="clearfix">
                            @csrf
                            <div class="form-group">
                                <input id="naam" type="text" class="input" name="naam" placeholder="Naam" required autofocus>
                            </div>
                            <div class="form-group">
                                <input id="address" type="text" class="input" name="address" placeholder="Adres" required>
                            </div>
                            <div class="form-group">
                                <input id="card-name" type="text" class="input" name="card-name" placeholder="Kaarthoudernaam" required>
                            </div>
                            <div class="form-group">
                                <input id="card-number" type="text" class="input" name="card-number" placeholder="Creditkaartnummer" required>
                            </div>
                            <div class="form-group">
                                <input id="card-expiry-month" type="text" class="input" name="card-expiry-month" placeholder="Expiratie Maand" required>
                            </div>
                            <div class="form-group">
                                <input id="card-expiry-year" type="text" class="input" name="card-expiry-year" placeholder="Expiratie Jaar" required>
                            </div>
                            <div class="form-group">
                                <input id="card-cvc" type="text" class="input" name="card-cvc" placeholder="CVC" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="primary-btn">Betalen</button>
                            </div>
                        </form>
                    </div>

                </div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection

@section('footerSection')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ URL::to('js/checkout.js') }}"></script>
@endsection