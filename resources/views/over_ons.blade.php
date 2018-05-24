@extends('app')

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li class="active">Over ons</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<div class="container">
			<div class="row">
				@include('aside')
				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<div class="section-title">
						<h3 class="title">Over ons</h3>
					</div>
					<p>Welkom op onze site.</p>
					<p>Voor de EDM-producer verhuren wij apparaten, o.a. synthesizers, 
						MIDI controllers, studio monitors, externe geluidskaarten.</p>
					<p>Ons doel is om producers of iedereen die wilt beginnen met 
						producen, kennis te maken met diverse apparaten voordat ze 
						daadwerkelijk willen aanschaffen.</p>
					<p>De prijzen die op onze site getoont worden zijn prijzen per dag.</p>
					<p>Het huren/reserveren dient online te gebeuren en vooraf te betalen.
						Bij het ophalen dient u zich te indentificeren.</p>					
				</div>
				<!-- /	MAIN -->
			</div>
		</div>
	</div>
    <!-- /section -->
@endsection