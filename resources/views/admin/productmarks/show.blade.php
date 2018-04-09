@extends('admin.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productmerk bekijken
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('productmarks.index') }}">Productmerken</a></li>
        <li class="active">Bekijken</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2">
          <!-- general form elements -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Productmerk</h3>
              </div>
              <div class="panel-body">
                {{ $productMark->product_mark_name }}
              </div>
            </div>
              
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Online</h3>
              </div>
              <div class="panel-body">
                @if ($productMark->online == 1)
                  <span class="fa fa-check"></span>
                @endif
              </div>
            </div>

              <a href="{{ route('productmarks.edit', $productMark->id) }}" class="btn btn-warning">Bewerken</a>
              <a href="{{ route('productmarks.index') }}" class="btn btn-default">Annuleren</a>

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection