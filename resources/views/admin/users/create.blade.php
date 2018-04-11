@extends('admin.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Klant toevoegen
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('customers.index') }}">Klanten</a></li>
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
              <h3 class="box-title">Voeg een klant toe</h3>
            </div>
            <!-- /.box-header -->
            <form action="{{ route('customers.store') }}" enctype="multipart/form-data" method="post">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="forename">Voornaam</label>
                      <input type="text" class="form-control" id="forename" name="forename" placeholder="Voor klant voornaam in">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lastname">Achternaam</label>
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Voor klant achternaam in">
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
                      <input type="text" class="form-control" id="street" name="street" placeholder="Voor straatrnaam in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="number">Huisnummer</label>
                      <input type="text" class="form-control" id="number" name="number" placeholder="Voor huisnummer in">
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
                      <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Voor postcode in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                  <div class="col-md-9">
                    <div class="form-group">
                      <label for="city">Woonplaats</label>
                      <input type="text" class="form-control" id="city" name="city" placeholder="Voor woonplaats in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="phone">Telefoonnummer</label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Voor telefoonnummer in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->
                  <div class="col-md-7">
                    <div class="form-group">
                      <label for="email">Emailadres</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Voor emailadres in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->  
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="account_number">Bankrekening</label>
                      <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Voor bankrekening in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="identification">Identificatie</label>
                      <input type="text" class="form-control" id="identification" name="identification" placeholder="Voor identificatie in">
                    </div>
                    <!-- /.form-group -->                    
                  </div>
                  <!-- /.col -->                  
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="discount">Korting</label>
                      <input type="text" class="form-control" id="discount" name="discount" placeholder="Voor korting in">
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
                      <textarea class="form-control" rows="3" id="article-ckeditor" name="comment" placeholder="Voer een opmerking in"></textarea>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Toevoegen</button>
                <a href="{{ route('customers.index') }}" class="btn btn-default">Annuleren</a>
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
    <!-- CKEditor -->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection