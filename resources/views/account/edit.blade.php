@extends('app')

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
				<li><a href="{{ route('account.index') }}">Account</a></li>
				<li class="active">Wijzigen</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Account gegevens wijzigen</h3>
                </div>

                <form method="POST" action="{{ route('account.update', $klant->id) }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="voornaam" type="text" class="input{{ $errors->has('voornaam') ? ' is-invalid' : '' }}" name="voornaam" placeholder="Voornaam" value="{{ $klant->voornaam }}" required autofocus>
                                @if ($errors->has('voornaam'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('voornaam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="achternaam" type="text" class="input{{ $errors->has('achternaam') ? ' is-invalid' : '' }}" name="achternaam" placeholder="Achternaam" value="{{ $klant->achternaam }}" required>
                                @if ($errors->has('achternaam'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('achternaam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">                            
                            <div class="form-group">
                                <input id="straat" type="text" class="input{{ $errors->has('straat') ? ' is-invalid' : '' }}" name="straat" placeholder="Straat" value="{{ $klant->straat }}">
                                @if ($errors->has('straat'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('straat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input id="huisnummer" type="text" class="input{{ $errors->has('huisnummer') ? ' is-invalid' : '' }}" name="huisnummer" placeholder="Huisnummer" value="{{ $klant->huisnummer }}">
                                @if ($errors->has('huisnummer'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('huisnummer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-2">   
                            <div class="form-group">
                                <input id="postcode" type="text" class="input{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" placeholder="Postcode" value="{{ $klant->postcode }}">
                                @if ($errors->has('postcode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">    
                            <div class="form-group">
                                <input id="woonplaats" type="text" class="input{{ $errors->has('woonplaats') ? ' is-invalid' : '' }}" name="woonplaats" placeholder="Woonplaats" value="{{ $klant->woonplaats }}">
                                @if ($errors->has('woonplaats'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('woonplaats') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">                    
                            <div class="form-group">
                                <input id="telefoon" type="text" class="input{{ $errors->has('telefoon') ? ' is-invalid' : '' }}" name="telefoon" placeholder="Telefoonnummer" value="{{ $klant->telefoon }}">
                                @if ($errors->has('telefoon'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telefoon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">    
                            <div class="form-group">
                                <input id="rekeningnummer" type="text" class="input{{ $errors->has('rekeningnummer') ? ' is-invalid' : '' }}" name="rekeningnummer" placeholder="Rekeningnummer" value="{{ $klant->rekeningnummer }}">
                                @if ($errors->has('rekeningnummer'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rekeningnummer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">    
                            <div class="form-group">
                                <input id="identificatie" type="text" class="input{{ $errors->has('identificatie') ? ' is-invalid' : '' }}" name="identificatie" placeholder="Identificatie" value="{{ $klant->identificatie }}" disabled>
                                @if ($errors->has('identificatie'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('identificatie') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">    
                            <div class="form-group">
                                <input id="korting" type="text" class="input{{ $errors->has('korting') ? ' is-invalid' : '' }}" name="korting" placeholder="Korting" value="{{ $klant->korting }}" disabled>
                                @if ($errors->has('korting'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('korting') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail adres" value="{{ $klant->email }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="primary-btn">
                            Wijzigen
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection