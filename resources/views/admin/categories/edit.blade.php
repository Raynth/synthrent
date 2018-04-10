@extends('admin.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categorie bewerken
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('categories.index') }}">Categorieën</a></li>
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
              <h3 class="box-title">Een categorie bewerken</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{--  <form role="form">  --}}
            {!! Form::open(['action' => ['CategoriesController@update', $category->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
              <input type="hidden" name="_method" value="put">
              <div class="box-body">
                <div class="form-group">
                  <label for="category_name">Categorie naam</label>
                  <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->category_name }}" placeholder="Voor category naam in">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="online" value="$category->online" {{ ($category->online == 1) ? 'checked' : '' }}> Online
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Bewerken</button>
                <a href="{{ route('categories.index') }}" class="btn btn-default">Annuleren</a>
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