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
                Verhuur bewerken
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.verhuren.index') }}">Verhuren</a></li>
                <li class="active">Bewerken</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- column -->
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
                            <h3 class="box-title">Een verhuur bewerken</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('admin.verhuren.update', $verhuur->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <input type="hidden" name="_method" value="put">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="klant">Klant</label>
                                        <select class="form-control select2" style="width: 100%;" id="klant" name="klant_id">
                                            @foreach ($klanten as $klant)
                                                <option value="{{ $klant->id }}" {{ ($verhuur->klant_id == $klant->id) ? 'selected' : '' }}>{{$klant->voornaam }} {{ $klant->achternaam }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="product">Product</label>
                                        <select class="form-control select2" style="width: 100%;" id="product_id" name="product_id" onchange="selectedProduct()">
                                            @foreach ($producten as $product)
                                                <option value="{{ $product->id }}" {{ ($verhuur->product_id == $product->id) ? 'selected' : '' }}>{{ $product->product_mark->naam }} {{ $product->naam }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="begindatum">Datum: vanaf</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="begindatum" name="begindatum" value="{{ $verhuur->begindatum }}" onchange="dateCheck()">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <div class="form-group col-md-6">
                                        <label for="einddatum">Datum: tot</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="einddatum" name="einddatum" value="{{ $verhuur->einddatum }}" onchange="dateCheck()">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="totale_huurprijs">Huurprijs per dag</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">&euro;</span>
                                            <input type="number" class="form-control" id="huurprijs" name="huurprijs" step="0.05" value="{{ $verhuur->product->huurprijs }}" readonly>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group col-md-4">
                                        <label for="totale_huurprijs">Aantal dagen</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="dagen" name="dagen" value="{{ $verhuur->dagen }}" readonly>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group col-md-4">
                                        <label for="totale_huurprijs">Totale huurprijs</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">&euro;</span>
                                            <input type="number" class="form-control" id="totale_huurprijs" name="totale_huurprijs" step="0.05" value="{{ $verhuur->totale_huurprijs }}" readonly>
                                        </div>
                                        <!-- /.input-group -->
                                    </div>
                                    <!-- /.form-group -->   
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="teruggebracht" {{ $verhuur->teruggebracht == 1 ? 'checked' : '' }}> Teruggebracht
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Bewerken</button>
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
                format: 'dd-mm-yyyy',
                language: 'nl'
            })
			// Datepicker eindatum
			$('#einddatum').datepicker({
                autoclose: true,
                startDate: '+1d',
                format: 'dd-mm-yyyy',
                language: 'nl'
            })
			// Als begindatum geselecteerd is, is de minimale datum van einddatum gelijk aan begindatum
			$('#begindatum').change(function() {
				var begindatum = document.getElementById('begindatum').value
				 $('#einddatum').datepicker('setStartDate', begindatum);
			})
        })
    </script>
    <script>
        var producten = JSON.parse('<?php echo $producten; ?>')
        // Toon de huurprijs per dag voor de geselecteerde product
        function selectedProduct() {
            var productId = document.getElementById('product_id').value
            // Haal alle proudcten en zet deze om naar JSON-formaat
            var producten = JSON.parse('<?php echo $producten; ?>')
            // Zoek de index van de sleutel 'product_id' waar de waarde van bekend is
            for (i = 0; i < producten.length; i++) {
                if (producten[i].id == productId) {
                    var key = i
                    break
                }
            }
            //
            var rentMoney = producten[key].huurprijs
            document.getElementById('huurprijs').value = rentMoney
        }
        // Controleer of begindatum en einddatum zijn ingevuld en bereken het aantal dagen tussen deze 2 datums
        function dateCheck() {
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
                var totaalHuurprijs = dagen * rentMoney
                document.getElementById("totale_huurprijs").value = totaalHuurprijs.toFixed(2)
            }
            
            console.log(begindatum, einddatum)
        }
    </script>
@endsection