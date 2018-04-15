@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Gebruiker toevoegen
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('users.index') }}">Gebruikers</a></li>
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
                            <h3 class="box-title">Voeg een gebruiker toe</h3>
                        </div>
                        <!-- /.box-header -->
                        <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Naam</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Voor naam in">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="email">E-mail adres</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Voor e-mail adres in">
                                    </div>
                                    <!-- /.form-group -->                    
                                    <div class="form-group">
                                        <label for="password">Wachtwoord</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Voor wachtwoord in">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="confirm_password">Bevestig wachtwoord</label>
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Bevestig wachtwoord">
                                    </div>
                                    <!-- /.form-group -->                  
                                    <div class="form-group">
                                        <label for="phone">Telefoonnummer</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Voor telefoonnummer in">
                                    </div>
                                    <!-- /.form-group -->                    
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="text" class="form-control" id="status" name="status" placeholder="Voor status in">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="role">Rol</label>
                                        <select class="form-control" id="role" name="role">
                                            <option value="1">Inzien</option>
                                            <option value="2">Bewerken</option>
                                            <option value="9">Alles</option>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->                  
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Toevoegen</button>
                                <a href="{{ route('users.index') }}" class="btn btn-default">Annuleren</a>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col  -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection