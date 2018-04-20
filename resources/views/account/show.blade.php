@extends('app')

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
				<li class="active">Account</li>
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
				<!-- colomn -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Account gegevens</h3>
                    </div>
                </div>
                <!-- /column -->
            </div>
            <!-- /row -->
            <!-- row -->
			<div class="row">
				<!-- colomn -->
                <div class="col-md-6">
					<table>
						<tr>
							<th width="200px">Naam:</th>
							<td>{{ Auth::user()->forename }} {{ Auth::user()->lastname }}</td>
						</tr>
						<tr>
							<th>Adres:</th>
                    		<td>{{ Auth::user()->street }} {{ Auth::user()->number }}</td>
						</tr>
						<tr>
							<th>Postcode en woonplaats:</th>
							<td>{{ Auth::user()->zipcode }} {{ Auth::user()->city }}</td>
						</tr>
						<tr>
							<th>Emailadres:</th>
                    		<td>{{ Auth::user()->email }}</td>
						</tr>
					</table>
                </div>
                <!-- /column -->
				<!-- colomn -->
                <div class="col-md-6">
					<table>
						<tr>
							<th width="200px">Telefoonnummer:</th>
							<td>{{ Auth::user()->phone }}</td>
						</tr>
						<tr>
							<th>Rekeningnummer:</th>
							<td>{{ Auth::user()->account_number }}</td>
						</tr>
						<tr>
							<th>Identificatienummer:</th>
							<td>{{ Auth::user()->identification }}</td>
						</tr>
						<tr>
							<th>Korting:</th>
							<td>{{ Auth::user()->discount }}</td>
						</tr>
					</table>
                </div>
                <!-- /column -->
			</div>
			<!-- /row -->
			<!-- row -->
			<div class="row">
				<!-- colomn -->
				<div class="col-md-12">
					<a href="{{ route('account.edit', Auth::id()) }}" class="primary-btn">Gegevens wijzigen</a>
					<a href="{{ route('account.edit-password', Auth::id()) }}" class="primary-btn pull-right">Wachtwoord wijzigen</a>
				</div>
				<!-- /column -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
    <!-- /section -->

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
								<h3 class="title">Huur geschiedenis</h3>
                            </div>
                            @if($rented->count() > 0)
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
                                        @foreach($rented as $key => $item)
                                            <tr>
                                                <td class="thumb"><img src="{{ asset('storage/cover_images/'.$item->product->cover_image) }}" alt=""></td>
                                                <td class="details">
                                                    <a href="{{ route('producten.show', $item->id) }}">{{ $item->product->product_mark->product_mark_name }} {{ $item->product->product_name }}</a>
                                                    <ul>
                                                        <li><span>Van: {{ date("d-m-Y", strtotime($item->date_from)) }}</span></li>
                                                        <li><span>Tot: {{ date("d-m-Y", strtotime($item->date_to)) }}</span></li>
                                                    </ul>
                                                </td>
												<?php
													$totalDays = date_diff(date_create($item->date_from), date_create($item->date_to))->format('%d');
													$rentMoney = $item->total_rent_money / $totalDays;
												?>
												<td class="price text-center"><strong>&euro; {{ number_format($rentMoney, 2, ',', '.') }}</strong></td>
                                                <td class="days text-center"><strong>{{ $totalDays }}</strong></td>
                                                <td class="total text-center"><strong class="primary-color">&euro; {{ number_format($item->total_rent_money, 2, ',', '.') }}</strong></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            @else
                                <h4>Geen producten gehuurd!</h4>
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