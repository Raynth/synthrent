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
                Producten
                <small>overzicht van alle producten</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.producten.index') }}">Producten</a></li>
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
                    <!-- Als er records in de klanten-tabel staan, toon tabel -->
                    <!-- Als er geen records in de klanten-tabel staan, toon melding -->
                    @if (count($producten) > 0)
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Overzicht producten</h3>
                            <a href="{{ route('admin.producten.create') }}" class="btn btn-primary pull-right">Toevoegen</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Categorie</th>
                                            <th>Product merk</th>
                                            <th>Product naam</th>
                                            <th>Huurprijs</th>
                                            <th>Online</th>
                                            <th>Actie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($producten as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->category->naam }}</td>
                                                <td>{{ $product->merk->naam }}</td>
                                                <td>{{ $product->naam }}</td>
                                                <td>&euro; {{ number_format($product->huurprijs, 2, ',', '.') }}</td>
                                                <td>
                                                    @if ($product->online == 1)
                                                        <span class="fa fa-check"></span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.producten.show', $product->id) }}" class="btn btn-primary"><span class="fa fa-search-plus"></a>
                                                    <a href="{{ route('admin.producten.edit', $product->id) }}" class="btn btn-warning"><span class="fa fa-edit"></a>
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
                                            <th>Product merk</th>
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
                    @else
                        <div class="callout callout-info">
                            <h4>Geen producten in het bestand!</h4>
                            <p>Op dit moment bevinden er zich geen producten in het bestand.</p>
                        </div>
                        <a href="{{ route('admin.producten.create') }}" class="btn btn-primary">Toevoegen</a>
                    @endif
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
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Product verwijderen</h4>
                </div>
                <!-- /.modal-header -->
                <div class="modal-body">
                    <p>Weet u zeker dat u deze product wilt verwijderen?</p>
                </div>
                <!-- /.modal-body -->
                <div class="modal-footer">
                    @if (count($producten) > 0)
                        <form action="{{ route('admin.producten.destroy', $product->id) }}" method="post" class="pull-left">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Annuleren</button>
                </div>
                <!-- /.modal-footer -->
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
            "order": [[2, "asc"], [3, "asc"]],
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