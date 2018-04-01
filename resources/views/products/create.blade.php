@extends('app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product toevoegen
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}">Producten</a></li>
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
              <h3 class="box-title">Voeg een product toe</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{--  <form role="form">  --}}
            <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="post">
              {{ csrf_field() }}
                <div class="box-body">
                <div class="form-group">
                  <label for="category">Categorie</label>
                  <select class="form-control select2" style="width: 100%;" id="category" name="category_id">
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="product_name">Product naam</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Voor product naam in">
                </div>
                <div class="form-group">
                  <label for="rent_money">Huurprijs per dag</label>
                  <input type="text" class="form-control" id="rent_money" name="rent_money" placeholder="Voer huurprijs per dag in">
                </div>
                <div class="form-group">
                  <label>Omschrijving</label>
                  <textarea class="form-control" rows="3" id="article-ckeditor" name="description" placeholder="Voer een omschrijving in"></textarea>
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