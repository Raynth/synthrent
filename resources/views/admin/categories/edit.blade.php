@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Categorie bewerken
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('categories.index') }}">Categorieën</a></li>
                <li class="active">Bewerken</li>
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
                            <h3 class="box-title">Een categorie bewerken</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('categories.update', $category->id) }}" method="post">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="naam">Categorie naam</label>
                                    <input type="text" class="form-control" id="naam" name="naam" value="{{ $category->naam }}" placeholder="Voor category naam in">
                                </div>
                                <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="online" value="$category->online" {{ ($category->online == 1) ? 'checked' : '' }}> Online
                                </label>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Bewerken</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-default">Annuleren</a>
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