@extends('app')

@section ('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('main-content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Producten
        <small>overzicht van alle producten</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('products.index') }}">Producten</a></li>
        <li class="active">Overzicht</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
          @endif
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Overzicht producten</h3>
              <a href="{{ route('products.create') }}" class="btn btn-primary pull-right">Toevoegen</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Categorie</th>
                  <th>Product naam</th>
                  <th>Huurprijs</th>
                  <th>Online</th>
                  <th>Actie</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->category_name }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>&euro; {{ number_format($product->rent_money, 2, ',', '.') }}</td>
                            <td>
                                @if ($product->online == 1)
                                    <span class="fa fa-check"></span>
                                @endif
                            </td>
                            <td>
                              <a href="/products/{{ $product->id }}" class="btn btn-primary"><span class="fa fa-search-plus"></a>
                              <a href="/products/{{ $product->id }}/edit" class="btn btn-warning"><span class="fa fa-edit"></a>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                                <span class="fa fa-trash">
                              </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Categorie</th>
                  <th>Product naam</th>
                  <th>Huurprijs</th>
                  <th>Online</th>
                  <th>Actie</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Popup verschijnt ter bevestiging verwijderen record -->
  <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Product verwijderen</h4>
          </div>
          <div class="modal-body">
          <p>Weet u zeker dat u deze product wilt verwijderen?</p>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sluiten</button>
          {!!Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
              {{Form::hidden('_method', 'DELETE')}}
              {{Form::submit('Verwijderen', ['class' => 'btn btn-danger'])}}
          {!!Form::close()!!}
        </div>
      </div>
      <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection

@section('footerSection')
    <!-- DataTables -->
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
    $(function () {
        $('#example1').DataTable( {
            "ordening": false,
            "language": {
                processing:     "Bezig...",
                search:         "Zoeken:",
                lengthMenu:     "_MENU_ resultaten weergeven",
                info:           "Er worden _START_ tot _END_ van _TOTAL_ resultaten weergegeven",
                infoEmpty:      "Geen resultaten om weer te geven",
                infoFiltered:   " (gefilterd uit _MAX_ resultaten)",
                infoPostFix:    "",
                loadingRecords: "Een moment geduld aub - bezig met laden...",
                zeroRecords:    "Geen overeenkomende resultaten gevonden",
                emptyTable:     "Geen resultaten aanwezig in de tabel",
                paginate: {
                    first:      "Eerste",
                    previous:   "Vorige",
                    next:       "Volgende",
                    last:       "Laatste"
                },
                aria: {
                    sortAscending:  ": activeer om kolom oplopend te sorteren",
                    sortDescending: ": activeer om kolom aflopend te sorteren"
                }
            }
        });
    });
    </script>
@endsection