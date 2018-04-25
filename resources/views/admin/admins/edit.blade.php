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
                <li><a href="{{ route('admins.index') }}">Gebruikers</a></li>
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
                        <form role="form" action="{{ route('admins.update', $admin->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset 3">
                                        <div class="form-group">
                                            <label for="name">Naam</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" placeholder="Voor gebruiker naam in">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="email">Emailadres</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $admin->email }}" placeholder="Voor emailadres in">
                                        </div>
                                        <!-- /.form-group -->                    
                                        <div class="form-group">
                                            <label for="phone">Telefoonnummer</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $admin->phone }}" placeholder="Voor telefoonnummer in">
                                        </div>
                                        <!-- /.form-group -->                    
                                        <div class="form-group">
                                            <label for="role">Rol</label>
                                            <select class="form-control select2" style="width: 100%;" id="role" name="role_id">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ ($admin->role_id == $role->id) ? 'selected' : '' }}>{{$role->name }}</option>
                                                @endforeach
                                            </select>
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
                                <a href="{{ route('admins.index') }}" class="btn btn-default">Annuleren</a>
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
        CKEDITOR.replace( 'comment' );
    </script>
@endsection