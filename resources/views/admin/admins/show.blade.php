@extends('admin.app')

@section ('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gebruiker bekijken
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.admins.index') }}">Gebruikers</a></li>
                <li class="active">Bekijken</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gebruiker gegevens</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th width="200px">Naam:</th>
                            <td>{{ $admin->naam }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $admin->email}}</td>
                        </tr>
                        <tr>
                            <th>Telefoonnummer:</th>
                            <td>{{ $admin->telefoon}}</td>
                        </tr>
                        <tr>
                            <th>Rol:</th>
                            <td>{{ $admin->rol->naam }}</td>
                        </tr>
                        <tr>
                            <th>Foto:</th>
                            <td><img src="{{ asset('storage/cover_images/'.$admin->foto) }}" width="100%"></td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-warning">Bewerken</a>
                    <a href="{{ route('admin.admins.index') }}" class="btn btn-default">Annuleren</a>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection