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
                            <h3 class="box-title">Een rol bewerken</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('admin.rollen.update', $rol->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="naam">Rol titel</label>
                                    <input type="text" class="form-control" id="naam" name="naam" value="{{ $rol->naam }}" placeholder="Voor rol naam in">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="admin" name="admin" {{ $rol->admin == 1 ? 'checked' : '' }}> Adminstrator
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="bekijken" name="bekijken" {{ $rol->bekijken == 1 ? 'checked' : '' }}> Bekijken
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="toevoegen" name="toevoegen" {{ $rol->toevoegen == 1 ? 'checked' : '' }}> Toevoegen
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="wijzigen" name="wijzigen" {{ $rol->wijzigen == 1 ? 'checked' : '' }}> Wijzigen
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="verwijderen" name="verwijderen" {{ $rol->verwijderen == 1 ? 'checked' : '' }}> Verwijderen
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Bewerken</button>
                                <a href="{{ route('admin.rollen.index') }}" class="btn btn-default">Annuleren</a>
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