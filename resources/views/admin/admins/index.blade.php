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
                Gebruikers
                <small>overzicht van alle gebruikers</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('admin.admins.index') }}">Gebruikers</a></li>
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
                    <!-- Als er records in de gebruikers-tabel staan, toon tabel -->
                    <!-- Als er geen records in de gebruikers-tabel staan, toon melding -->
                    @if (count($admins) > 0)
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Overzicht gebruikers</h3>
                                <a href="{{ route('admin.admins.create') }}" class="btn btn-primary pull-right">Toevoegen</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Naam</th>
                                            <th>E-mail</th>
                                            <th>Telefoon</th>
                                            <th>Rol</th>
                                            <th>Actie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->id }}</td>
                                                <td>{{ $admin->naam }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->telefoon }}</td>
                                                <td>{{ $admin->rol->naam }}</td>
                                                <td>
                                                    <a href="{{ route('admin.admins.show', $admin->id) }}" class="btn btn-primary"><span class="fa fa-search-plus"></a>
                                                    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-warning"><span class="fa fa-edit"></a>
                                                    <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="post" style="display:inline">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">
                                                            <span class="fa fa-trash">
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Naam</th>
                                            <th>E-mail</th>
                                            <th>Telefoon</th>
                                            <th>Rol</th>
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
                            <h4>Geen gebruikers in het bestand!</h4>
                            <p>Op dit moment bevinden er zich geen gebruikers in het bestand.</p>
                        </div>
                        <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">Toevoegen</a>
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
    <div class="modal modal-danger fade" id="confirmDelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Gebruiker verwijderen</h4>
                </div>
                <!-- /.modal-header -->
                <div class="modal-body">
                    <p>Weet u zeker dat u deze gebruiker wilt verwijderen?</p>
                </div>
                <!-- /.modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" id="confirm">Verwijderen</button>
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Annuleren</button>
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
        // Modal voor bevestiging voor verwijderen
        $('#confirmDelete').on('show.bs.modal', function (e) {
            $message = $(e.relatedTarget).attr('data-message');
            $(this).find('.modal-body p').text($message);
            $title = $(e.relatedTarget).attr('data-title');
            $(this).find('.modal-title').text($title);
        
            // Pass form reference to modal for submission on yes/ok
            var form = $(e.relatedTarget).closest('form');
            $(this).find('.modal-footer #confirm').data('form', form);
        });
        
        // Form confirm (yes/ok) handler, submits form
        $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
            $(this).data('form').submit();
        });

        // dataTable gesorteerd op 'naam', in het Nederlands
        $(function () {
            $('#example1').DataTable( {
                "order": [[2, "asc"]],
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