@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Klant bewerken
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.klanten.index') }}">Klanten</a></li>
                <li class="active">Bewerken</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8 col-md-offset-2">
                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="callout callout-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Een klant bewerken</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('admin.klanten.update', $klant->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="voornaam">Voornaam</label>
                                            <input type="text" class="form-control" id="voornaam" name="voornaam" value="{{ $klant->voornaam }}" placeholder="Voor klant voornaam in">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="achternaam">Achternaam</label>
                                            <input type="text" class="form-control" id="achternaam" name="achternaam" value="{{ $klant->achternaam }}" placeholder="Voor klant achternaam in">
                                        </div>
                                        <!-- /.form-group -->                    
                                    </div>
                                    <!-- /.col -->                  
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="straat">Straat</label>
                                            <input type="text" class="form-control" id="straat" name="straat" value="{{ $klant->straat }}" placeholder="Voor straatrnaam in">
                                        </div>
                                        <!-- /.form-group -->                    
                                    </div>
                                    <!-- /.col -->                  
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="huisnummer">Huisnummer</label>
                                            <input type="text" class="form-control" id="huisnummer" name="huisnummer" value="{{ $klant->huisnummer }}" placeholder="Voor huisnummer in">
                                        </div>
                                        <!-- /.form-group -->                    
                                    </div>
                                    <!-- /.col -->                  
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="postcode">Postcode</label>
                                            <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $klant->postcode }}" placeholder="Voor postcode in">
                                        </div>
                                        <!-- /.form-group -->                    
                                    </div>
                                    <!-- /.col -->                  
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="woonplaats">Woonplaats</label>
                                            <input type="text" class="form-control" id="woonplaats" name="woonplaats" value="{{ $klant->woonplaats }}" placeholder="Voor woonplaats in">
                                        </div>
                                        <!-- /.form-group -->                    
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="telefoon">Telefoonnummer</label>
                                            <input type="text" class="form-control" id="telefoon" name="telefoon" value="{{ $klant->telefoon }}" placeholder="Voor telefoonnummer in">
                                        </div>
                                        <!-- /.form-group -->                    
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="email">Emailadres</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $klant->email }}" placeholder="Voor emailadres in">
                                        </div>
                                        <!-- /.form-group -->                    
                                    </div>
                                    <!-- /.col -->                  
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="rekeningnummer">Bankrekening</label>
                                            <input type="text" class="form-control" id="rekeningnummer" name="rekeningnummer" value="{{ $klant->rekeningnummer }}" placeholder="Voor bankrekening in">
                                        </div>
                                        <!-- /.form-group -->                    
                                    </div>
                                    <!-- /.col -->                  
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="identificatie">Identificatie</label>
                                            <input type="text" class="form-control" id="identificatie" name="identificatie" value="{{ $klant->identificatie }}" placeholder="Voor identificatie in">
                                        </div>
                                        <!-- /.form-group -->                    
                                    </div>
                                    <!-- /.col -->                  
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="korting">Korting</label>
                                            <input type="text" class="form-control" id="korting" name="korting" value="{{ $klant->korting }}" placeholder="Voor korting in">
                                        </div>
                                        <!-- /.form-group -->                    
                                    </div>
                                    <!-- /.col -->                  
                                </div>
                                <!-- /.row -->                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="opmerking">Opmerking</label>
                                            <textarea class="form-control" rows="3" id="article-ckeditor" name="opmerking" placeholder="Voer een opmerking in">{{ $klant->opmerking }}</textarea>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Bewerken</button>
                                <a href="{{ route('admin.klanten.index') }}" class="btn btn-default">Annuleren</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footerSection')
    <!-- CKEditor -->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'opmerking' );
    </script>
@endsection