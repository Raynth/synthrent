@extends('app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product bekijken
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}">Producten</a></li>
        <li class="active">Bekijken</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8 col-md-offset-2">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Bekijk een product</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <label for="category">Categorie</label>
                  {{ $product->category->category_name }}
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="product_name">Product naam</label>
                  {{ $product->name }}
                </div>
                <div class="form-group">
                  <label for="rent_money">Huurprijs per dag</label>
                  &euro; {{ number_format($product->rent_money, 2, ',', '.') }}
                </div>
                <div class="form-group">
                  <label>Omschrijving</label>
                  {{ $product->description }}
                </div>
                <div class="form-group">
                  <label for="cover_image">Afbeelding invoer</label>
                  <input type="file" id="cover_image" name="cover_image">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="online"> Online
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Toevoegen</button>
                <a href="{{ route('products.index') }}" class="btn btn-default">Annuleren</a>
              </div>
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