@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Rol bewerken
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.rollen.index') }}">Rollen</a></li>
                <li class="active">Bekijken</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- column -->
                <div class="col-md-8 col-md-offset-2">
                    <!-- general form elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Naam</h3>
                        </div>
                        <div class="panel-body">
                            {{ $rol->naam }}
                        </div>
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Toestemming</h3>
                        </div>
                        <div class="panel-body">
                            <p>{!! $rol->admin == 1 ? '<span class="fa fa-check-square-o"></span>' : '<span class="fa fa-square-o"></span>' !!} Adminstrator</p>
                            <p>{!! $rol->bekijken == 1 ? '<span class="fa fa-check-square-o"></span>' : '<span class="fa fa-square-o"></span>' !!} Bekijken</p>
                            <p>{!! $rol->toevoegen == 1 ? '<span class="fa fa-check-square-o"></span>' : '<span class="fa fa-square-o"></span>' !!} Toevoegen</p>
                            <p>{!! $rol->wijzigen == 1 ? '<span class="fa fa-check-square-o"></span>' : '<span class="fa fa-square-o"></span>' !!} Wijzigen</p>
                            <p>{!! $rol->verwijderen == 1 ? '<span class="fa fa-check-square-o"></span>' : '<span class="fa fa-square-o"></span>' !!} Verwijderen</p>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <button type="submit" class="btn btn-warning">Bewerken</button>
                    <a href="{{ route('admin.rollen.index') }}" class="btn btn-default">Annuleren</a>
                </div>
                <!--/.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection