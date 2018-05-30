@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Rol toevoegen
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.rollen.index') }}">Rollen</a></li>
                <li class="active">Toevoegen</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
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
                            <h3 class="box-title">Voeg een rol toe</h3>
                        </div>
                        <!-- /.box-header -->

                        <!-- form start -->
                        <form role="form" action="{{ route('admin.rollen.store') }}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="naam">Naam</label>
                                    <input type="text" class="form-control" id="naam" name="naam" placeholder="Voor maam in">
                                </div>
                                <!-- /.form-group -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="admin" name="admin"> Adminstrator
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="bekijken" name="bekijken"> Bekijken
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="toevoegen" name="toevoegen"> Toevoegen
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="wijzigen" name="wijzigen"> Wijzigen
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="verwijderen" name="verwijderen"> Verwijderen
                                    </label>
                                </div>
                                <!-- /.checkbox -->
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Toevoegen</button>
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

@section('footerSection')
    <!-- CKEditor -->
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection