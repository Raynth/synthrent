@extends('app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Klant bekijken
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('customers.index') }}">Klanten</a></li>
        <li class="active">Bekijken</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-10 col-md-offset-1">
          <!-- general form elements -->
          {{--  <div class="box box-primary">  --}}
            {{--  <div class="box-header with-border">  --}}
              {{--  <h3 class="box-title">Bekijk een product</h3>  --}}
            {{--  </div>  --}}
            <!-- /.box-header -->
              {{--  <div class="box-body">  --}}
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Klantgegevens</h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <p>{{ $customer->forename }} {{ $customer->lastname }}<br>
                        {{ $customer->street }} {{ $customer->number }}<br>
                        {{ $customer->zipcode}} {{ $customer->city }}</p>
                      </div>
                      <div class="col-md-6">
                        <table>
                          <tr>
                            <td><b>Bankrekening:</b></td>
                            <td> {{ $customer->account_number }}</td>
                          </tr>
                          <tr>
                            <td><b>Identificatie:</b></td>
                            <td>{{ $customer->identification }}</td>
                          </tr>
                          <tr>
                            <td><b>Korting:</b></td>
                            <td>{{ $customer->discount }}%</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <p><b>Opmerking:</b><br>
                        {{ $customer->comment }}</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Huurgeschiedenis</h3>
                  </div>
                  <div class="panel-body">
                    
                  </div>
                </div>
                
              {{--  </div>  --}}
              <!-- /.box-body -->

              {{--  <div class="box-footer">  --}}
                <a href="/customers/{{ $customer->id }}/edit" class="btn btn-warning">Bewerken</a>
                <a href="{{ route('customers.index') }}" class="btn btn-default">Annuleren</a>
              {{--  </div>  --}}
          {{--  </div>  --}}
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