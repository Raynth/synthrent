@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Review bewerken
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.reviews.index') }}">Reviews</a></li>
                <li class="active">Bewerken</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- column -->
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
                            <h3 class="box-title">Een review bewerken</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('admin.reviews.update', $review->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <input type="hidden" name="product_id" value="{{ $review->product_id }}">
                                <div class="form-group">
                                    <label for="merk">Merk</label>
                                    <select class="form-control select2" style="width: 100%;" id="merk" disabled="true">
                                        <option>{{ $review->product->merk->naam }}</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="product_id">Product</label>
                                    <select class="form-control select2" style="width: 100%;" id="product_id" disabled="true">
                                        <option>{{ $review->product->naam }}</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="naam">Naam</label>
                                    <input type="text" class="form-control" id="naam" name="naam" value="{{ $review->naam }}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $review->email }}">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="beoordeling">Beoordeling</label>
                                    <textarea class="form-control" rows="3" id="beoordeling" name="beoordeling">{{ $review->beoordeling }}</textarea>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="waardering">Waardering</label>
                                    <input type="text" class="form-control" id="waardering" name="waardering" value="{{ $review->waardering }}" readonly>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Bewerken</button>
                                <a href="{{ route('admin.reviews.index') }}" class="btn btn-default">Annuleren</a>
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
        CKEDITOR.replace( 'beoordeling' );
    </script>
@endsection