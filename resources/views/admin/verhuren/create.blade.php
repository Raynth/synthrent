@extends('admin.app')

@section('headSection')
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Verhuur toevoegen
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.verhuren.index') }}">Verhuren</a></li>
                <li class="active">Toevoegen</li>
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
                    <!-- Geef melding als het product verhuurd is -->
                    @if (session('productRented'))
                        <div class="alert alert-warning">
                            {!! session('productRented') !!}
                        </div>
                    @endif
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Voeg een verhuur toe</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.verhuren.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="klant_id">Klant</label>
                                        <select class="form-control select2" style="width: 100%;" id="klant_id" name="klant_id" onchange="selectKlant()">
                                            @foreach ($klanten as $klant)
                                                <option value="{{ $klant->id }}">{{ $klant->voornaam }} {{ $klant->achternaam }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="product">Product</label>
                                        <select class="form-control select2" style="width: 100%;" id="product_id" name="product_id" onchange="selectedProduct()">
                                            @foreach ($producten as $product)
                                                <option value="{{ $product->id }}">{{ $product->merk->naam }} {{ $product->naam }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="begindatum">Begindatum</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="begindatum" name="begindatum" onchange="berekenPrijs()">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-md-6">
                                        <label for="einddatum">Einddatum</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="einddatum" name="einddatum" onchange="berekenPrijs()">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="huurprijs">Huurprijs per dag</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">&euro;</span>
                                            <input type="number" class="form-control" id="huurprijs" name="huurprijs" step="0.05" readonly>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group col-md-4">
                                        <label for="dagen">Aantal dagen</label>
                                        <input type="number" class="form-control" id="dagen" name="dagen" readonly>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group col-md-4">
                                        <label for="totale_huurprijs">Totale huurprijs</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">&euro;</span>
                                            <input type="number" class="form-control" id="totale_huurprijs" name="totale_huurprijs" step="0.05" readonly>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
                                    <!-- /.form-group -->   
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="korting_perc">Korting percentage</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="korting_perc" name="korting_perc" readonly>
                                            <span class="input-group-addon">&#37;</span>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group col-md-4">
                                        <label for="korting">Korting</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">&euro;</span>
                                            <input type="number" class="form-control" id="korting" name="korting" step="0.05" readonly>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group col-md-4">
                                        <label for="te_betalen">Te betalen</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">&euro;</span>
                                            <input type="number" class="form-control" id="te_betalen" name="te_betalen" step="0.05" readonly>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
                                    <!-- /.form-group -->   
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Toevoegen</button>
                                <a href="{{ route('admin.verhuren.index') }}" class="btn btn-default">Annuleren</a>
                            </div>
                            <!-- /.box-footer -->
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
    <!-- bootstrap datepicker -->
    <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.nl.min.js') }}" charset="UTF-8"></script>
    <script>
        $(function () {
            // Datepicker begindatum
            $('#begindatum').datepicker({
                autoclose: true,
                startDate: '+1d',
                format: 'yyyy-mm-dd',
                language: 'nl'
            })
            // Datepicker eindatum
            $('#einddatum').datepicker({
                autoclose: true,
                startDate: '+1d',
                format: 'yyyy-mm-dd',
                language: 'nl'
            })
            // Als begindatum geselecteerd is, is de minimale datum van einddatum gelijk aan begindatum
            $('#begindatum').change(function() {
                var begindatum = document.getElementById('begindatum').value
                $('#einddatum').datepicker('setStartDate', begindatum)
            })
        })

        // Haal alle proudcten en zet deze om naar JSON-formaat
        var producten = JSON.parse('<?php echo $producten; ?>')
        // Toon de huurprijs van het eerste product
        var rentMoney = producten[0].huurprijs
        document.getElementById('huurprijs').value = rentMoney

        // Haal alle klanten en zet deze om naar JSON-formaat
        var klanten = JSON.parse('<?php echo $klanten; ?>')
        // Toon de kortingspercentage van de eerste klant
        var kortingPerc = klanten[0].korting
        document.getElementById('korting_perc').value = kortingPerc

        // Toon de kortingspercentage van de geselecteerde klant
        function selectKlant() {
            klantId = document.getElementById('klant_id').value
            // Zoek de index van de sleutel 'klant_id' waar de waarde van bekend is
            for (i = 0; i < klanten.length; i++) {
                if (klanten[i].id == klantId) {
                    var key = i
                    break
                }
            }
            // Toon de kortingspercentage
            kortingPerc = klanten[key].korting
            document.getElementById('korting_perc').value = kortingPerc
            // Bereken opnieuw de prijs
            this.berekenPrijs()            
        }

        // Toon de huurprijs per dag voor de geselecteerde product
        function selectedProduct() {
            var productId = document.getElementById('product_id').value
            // Zoek de index van de sleutel 'product_id' waar de waarde van bekend is
            for (i = 0; i < producten.length; i++) {
                if (producten[i].id == productId) {
                    var key = i
                    break
                }
            }
            // Toon de huurprijs
            rentMoney = producten[key].huurprijs
            document.getElementById('huurprijs').value = rentMoney
            // Bereken opnieuw de prijs
            this.berekenPrijs()
        }

        // Controleer of begindatum en einddatum zijn ingevuld en bereken het aantal dagen tussen deze 2 datums
        function berekenPrijs() {
            // Haal de datums 'van' en 'tot'      
            var begindatum = document.getElementById("begindatum").value
            var einddatum = document.getElementById("einddatum").value
            // Controleer of beide datums zijn ingevuld, voordat het aantal dagen berekend kan worden
            if (begindatum != '' && einddatum != '') {
                begindatum = Date.parse(begindatum)
                einddatum = Date.parse(einddatum)
                // Bereken het aantal milliseconden tussen deze 2 datums
                var timeDiff = einddatum - begindatum
                // Bereken aantal dagen van het aantal milliseconden
                var dagen = Math.floor(timeDiff / (1000 * 60 * 60 * 24))
                document.getElementById('dagen').value = dagen
                // Bereken totale huurprijs: aantal dagen x huurprijs
                var rentMoney = document.getElementById("huurprijs").value
                var totaalHuurprijs = (dagen * rentMoney).toFixed(2)
                document.getElementById("totale_huurprijs").value = totaalHuurprijs
                // Bereken de korting
                var korting = (totaalHuurprijs * kortingPerc / 100).toFixed(2)
                document.getElementById("korting").value = korting
                // Bereken de te betalen prijs
                var teBetalen = (totaalHuurprijs - korting).toFixed(2)
                document.getElementById("te_betalen").value = teBetalen
            }
        }
    </script>
@endsection