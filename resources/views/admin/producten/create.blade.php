@extends('admin.app')

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
                <li><a href="{{ route('admin.producten.index') }}">Producten</a></li>
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
                        <form action="{{ route('admin.producten.store') }}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="category">Categorie</label>
                                    <select class="form-control select2" style="width: 100%;" id="category" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->naam }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="category">Productmerk</label>
                                    <select class="form-control select2" style="width: 100%;" id="mark" name="product_mark_id">
                                        @foreach ($productMarks as $productMark)
                                            <option value="{{ $productMark->id }}">{{ $productMark->naam }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="naam">Product naam</label>
                                    <input type="text" class="form-control" id="naam" name="naam" placeholder="Voor product naam in">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="huurprijs">Huurprijs per dag</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">&euro;</span>
                                        <input type="number" class="form-control" id="huurprijs" name="huurprijs" step="0.05" placeholder="Voer huurprijs per dag in">
                                    </div>
                                    <!-- /.input-group -->
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Omschrijving</label>
                                    <textarea class="form-control" id="omschrijving" name="omschrijving"></textarea>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Details</label>
                                    <textarea class="form-control" id="details" name="details"></textarea>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="foto">Afbeelding invoer</label>
                                    <input type="file" id="foto" name="foto">
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
                                <a href="{{ route('admin.producten.index') }}" class="btn btn-default">Annuleren</a>
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
        CKEDITOR.replace( 'omschrijving' );
        CKEDITOR.replace( 'details' );
    </script>
@endsection