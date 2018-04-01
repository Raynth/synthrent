@extends('app')

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
                  <!-- Berekening maken -->
                  <input type="text" class="form-control" id="total_rent_money" name="total_rent_money"  onfocus="calculateRental()">
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
    function calculateRental() {
      var date_from = Date.parse(document.getElementById("datepicker1").value)
      var date_to = Date.parse(document.getElementById("datepicker2").value)
      var timeDiff = date_to - date_from
      daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24))
      var product_id = document.getElementById("product").value
      var rent_money = 0
      console.log(product_id, rent_money)
    }
  </script>
  @endsection

  @section('footerSection')
  <!-- bootstrap datepicker -->
  <script src="{{ asset('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  <script>
    $(function () {
      //Date picker
      $('#datepicker1').datepicker({
        autoclose: true,
        startDate: '+1d',
        format: 'yyyy-mm-dd'
      })
      //Date picker
      $('#datepicker2').datepicker({
        autoclose: true,
        startDate: '+1d',
        format: 'yyyy-mm-dd'
      })
      //Date range picker
      $('#reservation').daterangepicker({
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": toepassen,
            "cancelLabel": "Annuleren",
            "fromLabel": "Van",
            "toLabel": "Tot",
            "customRangeLabel": "Aangepast",
            "daysOfWeek": [
                "Zo",
                "Ma",
                "Di",
                "Wo",
                "Do",
                "Vr",
                "Za"
            ],
            "monthNames": [
                "Januari",
                "Februari",
                "Maart",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Augustus",
                "September",
                "Oktober",
                "November",
                "December"
            ],
            "firstDay": 1
        }
      })
    })
  </script>
  @endsection