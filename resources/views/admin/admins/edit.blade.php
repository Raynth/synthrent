@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gebruiker bewerken
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.admins.index') }}">Gebruikers</a></li>
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
                            <h3 class="box-title">Een gebruiker bewerken</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('admin.admins.update', $admin->id) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset 3">
                                        <div class="form-group">
                                            <label for="naam">Naam</label>
                                            <input type="text" class="form-control" id="naam" name="naam" value="{{ $admin->naam }}" placeholder="Voor gebruiker naam in">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="email">Emailadres</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $admin->email }}" placeholder="Voor emailadres in">
                                        </div>
                                        <!-- /.form-group -->                    
                                        <div class="form-group">
                                            <label for="telefoon">Telefoonnummer</label>
                                            <input type="text" class="form-control" id="telefoon" name="telefoon" value="{{ $admin->telefoon }}" placeholder="Voor telefoonnummer in">
                                        </div>
                                        <!-- /.form-group -->                    
                                        <div class="form-group">
                                            <label for="rol_id">Rol</label>
                                            <select class="form-control select2" style="width: 100%;" id="rol_id" name="rol_id">
                                                @foreach ($rollen as $rol)
                                                    <option value="{{ $rol->id }}" {{ ($admin->rol_id == $rol->id) ? 'selected' : '' }}>{{$rol->naam }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="foto">Afbeelding invoer</label>
                                            <input type="file" id="foto" name="foto" value="{{ $admin->foto }}">
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Bewerken</button>
                                <a href="{{ route('admin.admins.index') }}" class="btn btn-default">Annuleren</a>
                            </div>
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
        CKEDITOR.replace( 'opmerking' );
    </script>
@endsection