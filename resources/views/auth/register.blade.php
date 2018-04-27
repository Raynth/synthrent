@extends('app')

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li class="active">Registreren</li>
			</ul>
		</div>
	</div>
    <!-- /BREADCRUMB -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title">
                    <h3 class="title">Registreer gegevens</h3>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <input id="voornaam" type="text" class="input{{ $errors->has('voornaam') ? ' is-invalid' : '' }}" name="voornaam" placeholder="Voornaam" value="{{ old('voornaam') }}" required autofocus>
                        @if ($errors->has('voornaam'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('voornaam') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="achternaam" type="text" class="input{{ $errors->has('achternaam') ? ' is-invalid' : '' }}" name="achternaam" placeholder="Achternaam" value="{{ old('achternaam') }}" required autofocus>
                        @if ($errors->has('achternaam'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('achternaam') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail adres" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Wachtwoord" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" placeholder="Bevestig wachtwoord" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="primary-btn">
                            Registreren
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
