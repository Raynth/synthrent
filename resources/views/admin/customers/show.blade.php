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
                Klant bekijken
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('customers.index') }}">Klanten</a></li>
                <li class="active">Bekijken</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Klantgegevens</h3>
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
                            <td>{{ $customer->forename }} {{ $customer->lastname }}</td>
                        </tr>
                        <tr>
                            <th>Adres:</th>
                            <td>{{ $customer->street }} {{ $customer->number }}</td>
                        </tr>
                        <tr>
                            <th>Postcode en woonplaats:</th>
                            <td>{{ $customer->zipcode}} {{ $customer->city }}</td>
                        </tr>
                        <tr>
                            <th>Telefoonnummer:</th>
                            <td>{{ $customer->phone}}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $customer->email}}</td>
                        </tr>
                        <tr>
                            <th>Bankrekening:</th>
                            <td> {{ $customer->account_number }}</td>
                        </tr>
                        <tr>
                            <th>Identificatie:</th>
                            <td>{{ $customer->identification }}</td>
                        </tr>
                        <tr>
                            <th>Korting:</th>
                            <td>{{ $customer->discount }}%</td>
                        </tr>
                        <tr>
                            <th>Opmerking:</th>
                            <td>{!! $customer->comment !!}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Bewerken</a>
                    <a href="{{ route('customers.index') }}" class="btn btn-default">Annuleren</a>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <!-- Als er records in de klanten-tabel staan, toon tabel -->
                    <!-- Als er geen records in de klanten-tabel staan, toon melding -->
                    @if (count($rentals) > 0)
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Huurgeschiedenis</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product</th>
                                            <th>Datum van</th>
                                            <th>Datum tot</th>
                                            <th>Huurprijs</th>
                                            <th>Teruggebracht</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rentals as $rental)
                                            <tr>
                                                <td>{{ $rental->id }}</td>
                                                <td>{{ $rental->product->product_name }}</td>
                                                <td>{{ $rental->date_from }}</td>
                                                <td>{{ $rental->date_to }}</td>
                                                <td>&euro; {{ number_format($rental->total_rent_money, 2, ',', '.') }}</td>
                                                <td>
                                                    @if ($rental->bring_back == 1)
                                                        <span class="fa fa-check"></span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product</th>
                                            <th>Datum van</th>
                                            <th>Datum tot</th>
                                            <th>Huurprijs</th>
                                            <th>Teruggebracht</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    @else
                        <div class="callout callout-info">
                            <h4>Geen verhuren in het bestand!</h4>
                            <p>Op dit moment bevinden er zich geen verhuren in het bestand.</p>
                        </div>
                        <a href="{{ route('rentals.create') }}" class="btn btn-primary">Toevoegen</a>
                    @endif
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footerSection')
    <!-- DataTables -->
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable( {
                "order": [[3, "dec"]],
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