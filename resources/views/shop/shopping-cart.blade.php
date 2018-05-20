@extends('app')

@section('main-content')
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Winkelwagen</li>
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
				<form id="checkout-form" class="clearfix">

					<div class="col-md-12">

                        <!-- Geef melding als het product verhuurd is -->
                        @if (session('itemInWinkelwagen'))
                            <div class="alert alert-warning">
                                {!! session('itemInWinkelwagen') !!}
                            </div>
                        @endif

                        <!-- Geef melding als het product verhuurd is -->
                        @if (session('success'))
                            <div class="alert alert-warning">
                                {!! session('success') !!}
                            </div>
                        @endif
                        
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Winkelwagen</h3>
                            </div>
                            
                            <!-- Als er items in de winkelwagen zijn, toon deze op het scherm -->
                            @if(Session::has('cart'))
                                <table class="shopping-cart-table table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th></th>
                                            <th class="text-center">Prijs</th>
                                            <th class="text-center">Aantal Dagen</th>
                                            <th class="text-center">Totaal</th>
                                            <th class="text-right"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $key => $item)
                                            <tr>
                                                <td class="thumb"><img src="{{ asset('storage/cover_images/'.$item['foto']) }}" alt=""></td>
                                                <td class="details">
                                                    <a href="{{ route('producten.show', $item['id']) }}">{{ $item['merk'] }} {{ $item['naam'] }}</a>
                                                    <ul>
                                                        <li><span>Van: {{ date("d-m-Y", strtotime($item['begindatum'])) }}</span></li>
                                                        <li><span>Tot: {{ date("d-m-Y", strtotime($item['einddatum'])) }}</span></li>
                                                    </ul>
                                                </td>
                                                <td class="price text-center"><strong>&euro; {{ number_format($item['huurprijs'], 2, ',', '.') }}</strong></td>
                                                <td class="days text-center"><strong>{{ $item['dagen'] }}</strong></td>
                                                <td class="total text-center"><strong class="primary-color">&euro; {{ number_format($item['totale_huurprijs'], 2, ',', '.') }}</strong></td>
                                                <td class="text-right"><a href="{{ route('winkelwagen.itemverwijderen', $key) }}" class="main-btn icon-btn"><i class="fa fa-close"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="empty" colspan="3"></th>
                                            <th>SUBTOTAAL</th>
                                            <th colspan="2" class="sub-total">&euro; {{ number_format($totalPrice, 2, ',', '.') }}</th>
                                        </tr>
                                        <tr>
                                            <th class="empty" colspan="3"></th>
                                            <th>KORTING</th>
                                            <td colspan="2">Free Shipping</td>
                                        </tr>
                                        <tr>
                                            <th class="empty" colspan="3"></th>
                                            <th>TOTAAL</th>
                                            <th colspan="2" class="total">&euro; {{ number_format($totalPrice, 2, ',', '.') }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="pull-right">
                                    <a href="{{ route('kassa.betalen') }}" class="primary-btn">Bevestig Huren</a>
                                </div>
                            @else
                                <h4>Geen producten in de winkelwagen!</h4>
                            @endif
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection