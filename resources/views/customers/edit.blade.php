@extends('app')

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
        <li><a href="{{ route('customers.index') }}">Klanten</a></li>
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
            {{--  <form role="form">  --}}
            {!! Form::open(['action' => ['CustomersController@update', $customer->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
              <input type="hidden" name="_method" value="put">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="forename">Voornaam</label>
                      <input type="text" class="form-control" id="forename" name="forename" value="{{ $customer->forename }}" placeholder="Voor klant voornaam in">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lastname">Achternaam</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $customer->lastname }}" placeholder="Voor klant achternaam in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <label for="street">Straat</label>
                      <input type="text" class="form-control" id="street" name="street" value="{{ $customer->street }}" placeholder="Voor straatrnaam in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="number">Huisnummer</label>
                      <input type="text" class="form-control" id="number" name="number" value="{{ $customer->number }}" placeholder="Voor huisnummer in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="zipcode">Postcode</label>
                      <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $customer->zipcode }}" placeholder="Voor postcode in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                  <div class="col-md-9">
                    <div class="form-group">
                      <label for="city">Woonplaats</label>
                      <input type="text" class="form-control" id="city" name="city" value="{{ $customer->city }}" placeholder="Voor woonplaats in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="account_number">Bankrekening</label>
                      <input type="text" class="form-control" id="account_number" name="account_number" value="{{ $customer->account_number }}" placeholder="Voor bankrekening in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="identification">Identificatie</label>
                      <input type="text" class="form-control" id="identification" name="identification" value="{{ $customer->identification }}" placeholder="Voor identificatie in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="discount">Korting</label>
                      <input type="text" class="form-control" id="discount" name="discount" value="{{ $customer->discount }}" placeholder="Voor korting in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                </div>
                <!-- /.row -->                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="comment">Opmerking</label>
                      <textarea class="form-control" rows="3" id="article-ckeditor" name="comment" placeholder="Voer een opmerking in">{{ $customer->comment }}</textarea>
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
                <a href="{{ route('customers.index') }}" class="btn btn-default">Annuleren</a>
              </div>
            {{--  </form>  --}}
            {!! Form::close() !!}
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