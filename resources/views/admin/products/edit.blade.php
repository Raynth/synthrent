@extends('admin.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product bewerken
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}">Producten</a></li>
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
              <h3 class="box-title">Een product bewerken</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{--  <form role="form">  --}}
            {!! Form::open(['action' => ['Admin\ProductsController@update', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
              <input type="hidden" name="_method" value="put">
              <div class="box-body">
                <div class="form-group">
                  <label for="category">Categorie</label>
                  <select class="form-control select2" style="width: 100%;" id="category" name="category_id">
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}" {{ ($product->category_id == $category->id) ? 'selected' : '' }}>{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="product_mark">Productmerk</label>
                  <select class="form-control select2" style="width: 100%;" id="product_mark" name="product_mark_id">
                    @foreach ($productMarks as $productMark)
                      <option value="{{ $productMark->id }}" {{ ($product->product_mark_id == $productMark->id) ? 'selected' : '' }}>{{ $productMark->product_mark_name }}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="product_name">Product naam</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" placeholder="Voor product naam in">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="rent_money">Huurprijs per dag</label>
                  <input type="text" class="form-control" id="rent_money" name="rent_money" value="{{ $product->rent_money }}" placeholder="Voer huurprijs per dag in">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Omschrijving</label>
                  <textarea class="form-control" rows="3" id="description" name="description" placeholder="Voer een omschrijving in">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                  <label>Details</label>
                  <textarea class="form-control" rows="3" id="details" name="details" placeholder="Voer details in">{{ $product->details }}</textarea>
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label for="cover_image">Afbeelding invoer</label>
                  <input type="file" id="cover_image" name="cover_image" value="{{ $product->cover_image }}">
                </div>
                <!-- /.form-group -->
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="online" value="$product->online" {{ ($product->online == 1) ? 'checked' : '' }}> Online
                  </label>
                </div>
                <!-- /.checkbox -->
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Bewerken</button>
                <a href="{{ route('products.index') }}" class="btn btn-default">Annuleren</a>
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

@section('footerSection')
    <!-- CKEditor -->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'details' );
    </script>
@endsection