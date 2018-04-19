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

                <form method="POST" action="{{ route('account.update', $customer->id) }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="forename" type="text" class="input{{ $errors->has('forename') ? ' is-invalid' : '' }}" name="forename" placeholder="Voornaam" value="{{ $customer->forename }}" required autofocus>
                                @if ($errors->has('forename'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('forename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="lastname" type="text" class="input{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" placeholder="Achternaam" value="{{ $customer->lastname }}" required>
                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">                            
                            <div class="form-group">
                                <input id="street" type="text" class="input{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" placeholder="Straat" value="{{ $customer->street }}">
                                @if ($errors->has('street'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input id="number" type="text" class="input{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" placeholder="Huisnummer" value="{{ $customer->number }}">
                                @if ($errors->has('number'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-2">   
                            <div class="form-group">
                                <input id="zipcode" type="text" class="input{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" placeholder="Postcode" value="{{ $customer->zipcode }}">
                                @if ($errors->has('zipcode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">    
                            <div class="form-group">
                                <input id="city" type="text" class="input{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" placeholder="Woonplaats" value="{{ $customer->city }}">
                                @if ($errors->has('city'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">                    
                            <div class="form-group">
                                <input id="phone" type="text" class="input{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Telefoonnummer" value="{{ $customer->phone }}">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">    
                            <div class="form-group">
                                <input id="account_number" type="text" class="input{{ $errors->has('account_number') ? ' is-invalid' : '' }}" name="account_number" placeholder="Rekeningnummer" value="{{ $customer->account_number }}">
                                @if ($errors->has('account_number'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('account_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">    
                            <div class="form-group">
                                <input id="identification" type="text" class="input{{ $errors->has('identification') ? ' is-invalid' : '' }}" name="identification" placeholder="Identificatie" value="{{ $customer->identification }}" disabled>
                                @if ($errors->has('identification'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('identification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">    
                            <div class="form-group">
                                <input id="discount" type="text" class="input{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discount" placeholder="Korting" value="{{ $customer->discount }}" disabled>
                                @if ($errors->has('discount'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail adres" value="{{ $customer->email }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">    
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Wachtwoord" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="input" name="password_confirmation" placeholder="Bevestig wachtwoord" required>
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