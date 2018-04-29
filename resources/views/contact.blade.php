@extends('app')

@section('main-content')
    <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li class="active">Contact</li>
			</ul>
		</div>
	</div>
    <!-- /BREADCRUMB -->
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Contact</h3>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <p>SynthRENT</p>
                        <p>Henri Hermanslaan 356</p>
                        <p>6162 GP Geleen</p>
                        <br>
                        <p><i class="fa fa-phone"></i> 06 54 93 46 32</p>
                        <p><i class="fa fa-envelope-o"></i> info@synthrent.nl</p>
                    </div>
                    <div class="col-md-8">
                        @if (Session::has('flash_bericht'))
                            <div class="alert alert-success">{{ Session::get('flash_bericht') }}</div>
                        @endif
                        <form method="POST" action="{{ route('contact.store', 1) }}">
                            @csrf

                            <div class="form-group">
                                @guest
                                    <input id="naam" type="text" class="input{{ $errors->has('naam') ? ' is-invalid' : '' }}" name="naam" placeholder="Naam" value="{{ old('naam') }}" required autofocus>
                                @else
                                    <input id="naam" type="text" class="input" name="naam" value="{{ Auth::user()->voornaam }} {{ Auth::user()->achternaam }}" readonly>
                                @endguest
                                @if ($errors->has('naam'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('naam') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                @guest
                                    <input id="email" type="text" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail adres" value="{{ old('email') }}" required>
                                @else
                                    <input id="email" type="text" class="input" name="email" value="{{ Auth::user()->email }}" readonly>
                                @endguest
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <textarea id="bericht" class="input-textarea{{ $errors->has('bericht') ? ' is-invalid' : '' }}" name="bericht" placeholder="Uw bericht  " value="{{ old('bericht') }}"></textarea>
                                @if ($errors->has('bericht'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bericht') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="primary-btn">
                                    Verzenden
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
