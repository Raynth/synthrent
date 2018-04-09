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
        <li><a href="{{ route('rentals.index') }}">Verhuren</a></li>
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
            {{--  <form role="form">  --}}
            <form action="{{ route('rentals.store') }}" enctype="multipart/form-data" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group col-md-12">
                  <label for="customer">Klant</label>
                  <select class="form-control select2" style="width: 100%;" id="customer" name="customer_id">
                    @foreach ($customers as $customer)
                      <option value="{{ $customer->id }}">{{ $customer->forename }} {{ $customer->lastname }}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group col-md-12">
                  <label for="product">Product</label>
                  <select class="form-control select2" style="width: 100%;" id="product" name="product_id">
                    @foreach ($products as $product)
                      <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group col-md-6">
                  <label for="date_from">Datum: vanaf</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker1" name="date_from">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group col-md-6">
                  <label for="date_to">Datum: tot</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker2" name="date_to">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group col-md-12">
                  <label for="total_rent_money">Huurprijs</label>
                  <div class="input-group">
                    <span class="input-group-addon">&euro;</span>
                    <input type="number" class="form-control" id="total_rent_money" name="total_rent_money" step="0.05" onfocus="calculateRental()">
                  </div>
                  <!-- /.input-group -->
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Toevoegen</button>
                <a href="{{ route('rentals.index') }}" class="btn btn-default">Annuleren</a>
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
  <script>
    // Bereken totaal huurprijs: aantal dagen x huurprijs
    function calculateRental() {
      // Haal gekozen product uit de <SELECT>
      var productId = document.getElementById("product").value
      // Haal alle proudcten en zet deze om naar JSON-formaat
      var products = JSON.parse('<?php echo $products; ?>')
      // Zoek de sleutel waar product_id gelijk is aan id van alle producten
      for (i = 0; i < products.length; i++) {
        if (products[i].id == productId) {
          var key = i
          break
        }
      }
      // Haal de huurprijs van de gekozen product uit alle producten
      var rentMoney = products[key].rent_money
      // Haal de datums 'van' en 'tot'      
      var dateFrom = Date.parse(document.getElementById("datepicker1").value)
      var dateTo = Date.parse(document.getElementById("datepicker2").value)
      // Bereken het aantal milliseconden tussen deze 2 datums
      var timeDiff = dateTo - dateFrom
      // Bereken aantal dagen van het aantal milliseconden
      var daysTotal = Math.floor(timeDiff / (1000 * 60 * 60 * 24))
      // Bereken totale huurprijs: aantal dagen x huurprijs
      var totalRentMoney = daysTotal * rentMoney
      document.getElementById("total_rent_money").value = totalRentMoney.toFixed(2)
    }
  </script>
  
  @endsection

  @section('footerSection')
    <!-- CKEditor -->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.nl.min.js') }}" charset="UTF-8"></script>
    <script>
      $(function () {
        //Date picker
        $('#datepicker1').datepicker({
          autoclose: true,
          startDate: '+1d',
          format: 'yyyy-mm-dd',
          language: 'nl'
        })
        //Date picker
        $('#datepicker2').datepicker({
          autoclose: true,
          startDate: '+1d',
          format: 'yyyy-mm-dd',
          language: 'nl'
        })
      })
    </script>
  @endsection