@extends('app')

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li class="active">Inloggen</li>
			</ul>
		</div>
	</div>
    <!-- /BREADCRUMB -->
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title">
                    <h3 class="title">Inlog gegevens</h3>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail adres" value="{{ old('email') }}" required autofocus>
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
                        <div class="input-checkbox">
                            <label class="font-weak">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Onthoud gegevens
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="primary-btn">
                            Inloggen
                        </button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Wachtwoord vergeten?
                        </a>
                        <p>Heeft u geen account? <a  class="btn btn-link" href="{{ route('register') }}">Aanmelden!</a><p>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
