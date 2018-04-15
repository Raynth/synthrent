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
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Winkelwagen</h3>
                            </div>
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
                                                <td class="thumb"><img src="{{ asset('storage/cover_images/'.$item->cover_image) }}" alt=""></td>
                                                <td class="details">
                                                    <a href="#">{{ $item->productMarkName }} {{ $item->product_name }}</a>
                                                    <ul>
                                                        <li><span>Van: {{ date("d-m-Y", strtotime($item->dateFrom)) }}</span></li>
                                                        <li><span>Tot: {{ date("d-m-Y", strtotime($item->dateTo)) }}</span></li>
                                                    </ul>
                                                </td>
                                                <td class="price text-center"><strong>&euro; {{ number_format($item->rent_money, 2, ',', '.') }}</strong></td>
                                                <td class="qty text-center"><strong>{{ $item->totalDays }}</strong></td>
                                                <td class="total text-center"><strong class="primary-color">&euro; {{ number_format($item->totalRentMoney, 2, ',', '.') }}</strong></td>
                                                <td class="text-right"><a href="{{ route('producten.removeitem', $key) }}" class="main-btn icon-btn"><i class="fa fa-close"></i></a></td>
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
                                    <a href="{{ route('producten.checkout') }}" class="primary-btn">Bevestig Huren</a>
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