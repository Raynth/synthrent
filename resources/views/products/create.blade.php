@extends('app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product toevoegen
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Producten</a></li>
        <li class="active">Toevoegen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Voeg een product toe</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Categorie</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Voer categorie in">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Product naam</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Voor product naam in">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Huurprijs per dag</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Voer huurprijs per dag in">
                </div>
                <div class="form-group">
                  <label>Omschrijving</label>
                  <textarea class="form-control" rows="3" placeholder="Voer een omschrijving in"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Afbeelding invoer</label>
                  <input type="file" id="exampleInputFile">
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Online
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Toevoegen</button>
                <button type="submit" class="btn btn-default">Annuleren</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection