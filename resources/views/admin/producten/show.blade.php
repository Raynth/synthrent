@extends('admin.app')

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
                <li><a href="{{ route('admin.producten.index') }}">Producten</a></li>
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
                            <h3 class="panel-title">Categorie</h3>
                        </div>  
                        <div class="panel-body">
                            {{ $product->category->naam }}
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Merk</h3>
                        </div>
                        <div class="panel-body">
                            {{ $product->merk->naam }}
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Product naam</h3>
                        </div>
                        <div class="panel-body">
                            {{ $product->naam }}
                        </div>
                    </div>
                    <!-- /.panel -->    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Huurprijs per dag</h3>
                        </div>
                        <div class="panel-body">
                            &euro; {{ number_format($product->huurprijs, 2, ',', '.') }}
                        </div>
                    </div>
                    <!-- /.panel -->    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Omschrijving</h3>
                        </div>
                        <div class="panel-body">
                            {!! $product->omschrijving !!}
                        </div>
                    </div>
                    <!-- /.panel -->    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Details</h3>
                        </div>
                        <div class="panel-body">
                            {!! $product->details !!}
                        </div>
                    </div>
                    <!-- /.panel -->    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Afbeelding</h3>
                        </div>
                        <div class="panel-body">
                            <img src="{{ asset('storage/cover_images/'.$product->foto) }}" width="100%">
                        </div>
                    </div>
                    <!-- /.panel -->    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Online</h3>
                        </div>
                        <div class="panel-body">
                            @if ($product->online == 1)
                                <span class="fa fa-check"></span>
                            @endif
                        </div>
                    </div>
                    <!-- /.panel -->
                    <a href="{{ route('admin.producten.edit', $product->id) }}" class="btn btn-warning">Bewerken</a>
                    <a href="{{ route('admin.producten.index') }}" class="btn btn-default">Annuleren</a>
                </div>
                <!--/.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection