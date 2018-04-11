@extends('app')

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li class="active">Reset wachtwoord</li>
			</ul>
		</div>
	</div>
    <!-- /BREADCRUMB -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="section-title">
                    <h3 class="title">Reset wachtwoord</h3>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">

                            <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail adres" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group">
                            <button type="submit" class="primary-btn">
                                Stuur wachtwoord reset link
                            </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
