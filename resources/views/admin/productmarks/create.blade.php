@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Productmerk toevoegen
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.productmarks.index') }}">Productmerken</a></li>
                <li class="active">Toevoegen</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
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
                            <h3 class="box-title">Voeg een productmerk toe</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {{--  <form role="form">  --}}
                        <form action="{{ route('admin.productmarks.store') }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="naam">Productmerk naam</label>
                                    <input type="text" class="form-control" id="naam" name="naam" placeholder="Voor productmerk naam in">
                                </div>
                                <!-- /.form-group -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="online"> Online
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Toevoegen</button>
                                <a href="{{ route('admin.productmarks.index') }}" class="btn btn-default">Annuleren</a>
                            </div>
                            <!-- /.box-footer -->
                        </form> 
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col -->
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