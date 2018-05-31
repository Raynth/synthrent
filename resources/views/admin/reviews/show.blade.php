@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Review bekijken
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.reviews.index') }}">Reviews</a></li>
                <li class="active">Bekijken</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- column -->
                <div class="col-md-10 col-md-offset-1">
                    <!-- general form elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Merk</h3>
                        </div>  
                        <div class="panel-body">
                            {{ $review->product->merk->naam }}
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Product</h3>
                        </div>
                        <div class="panel-body">
                            {{ $review->product->naam }}
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Naam</h3>
                        </div>
                        <div class="panel-body">
                            {{ $review->naam }}
                        </div>
                    </div>
                    <!-- /.panel -->    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">E-mail</h3>
                        </div>
                        <div class="panel-body">
                            {{ $review->email }}
                        </div>
                    </div>
                    <!-- /.panel -->  
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Beoordeling</h3>
                        </div>
                        <div class="panel-body">
                            {!! $review->beoordeling !!}
                        </div>
                    </div>
                    <!-- /.panel -->    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Waardering</h3>
                        </div>
                        <div class="panel-body">
                            {{ $review->waardering }}
                        </div>
                    </div>
                    <!-- /.panel -->
                    <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-warning">Bewerken</a>
                    <a href="{{ route('admin.reviews.index') }}" class="btn btn-default">Annuleren</a>
                </div>
                <!--/.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection