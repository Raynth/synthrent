@extends('app')

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
				<li><a href="{{ route('account.index') }}">Account</a></li>
				<li class="active">Wachtwoord wijzigen</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset 3">
                <div class="section-title">
                    <h3 class="title">Wachtwoord wijzigen</h3>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif

                <form method="POST" action="{{ route('account.update-password', $customer->id) }}">
                    @csrf

                    <div class="form-group">
                        <input id="old_password" type="password" class="input{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password" placeholder="Oud wachtwoord" required autofocus>
                        @if ($errors->has('old_password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('old_password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="new_password" type="password" class="input{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" placeholder="Nieuw wachtwoord" required>
                        @if ($errors->has('new_password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('new_password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="input" name="new_password_confirmation" placeholder="Bevestig nieuw wachtwoord" required>
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