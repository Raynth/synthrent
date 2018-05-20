@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Verhuur bekijken
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.verhuren.index') }}">Verhuren</a></li>
                <li class="active">Bekijken</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Klant</div>
                        <div class="panel-body">
                            {{ $verhuur->klant->voornaam }} {{ $verhuur->klant->achternaam }}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Product</div>
                        <div class="panel-body">
                            {{ $verhuur->product->merk->naam }} {{ $verhuur->product->naam }}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datum: van</h3>
                        </div>
                        <div class="panel-body">
                            {{ $verhuur->begindatum }}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Einddatum</h3>
                        </div>
                        <div class="panel-body">
                            {{ $verhuur->einddatum }}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Totale huurprijs</h3>
                        </div>
                        <div class="panel-body">
                            &euro; {{ number_format($verhuur->totale_huurprijs, 2, ',', '.') }}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Teruggebracht</h3>
                        </div>
                        <div class="panel-body">
                            @if ($verhuur->teruggebracht == 1)
                                <span class="fa fa-check"></span>
                            @endif
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <a href="{{ route('admin.verhuren.edit', $verhuur->id) }}" class="btn btn-warning">Bewerken</a>
                    <a href="{{ route('admin.verhuren.index') }}" class="btn btn-default">Annuleren</a>
                </div>
                <!--/.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection