@extends('admin.app')

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Version 1.0</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Verhuren</span>
                            <span class="info-box-number">{{ $verhuren }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Klanten</span>
                            <span class="info-box-number">{{ $klanten }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion-headtelefoon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Producten</span>
                            <span class="info-box-number">{{ $producten }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion-ios-folder-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Categorieën</span>
                            <span class="info-box-number">{{ $categories }}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            
            <!-- Overzicht van de omzet per maand van de laatste 6 maanden in een grafiek -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Maandelijks overzichtsrapport</h3>
    
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center">
                                        <strong>Verhuur: <span id="firstPeriod"></span> - <span id="lastPeriod"></span></strong>
                                    </p>
    
                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas id="salesChart" ></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- ./box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Overzicht van niet teruggebrachte producten, waarvan de einddatum verstreken is -->
            @if (count($nietTeruggebrachten) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <i class="fa fa-warning"></i>
                                <h3 class="box-title">Niet teruggebracthen producten, waarvan de einddatum verstreken is</h3>
        
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                @foreach ($nietTeruggebrachten as $nietTeruggebracht)
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <h4><i class="icon fa fa-ban"></i> {{ $nietTeruggebracht->product->product_mark->naam }} {{ $nietTeruggebracht->product->naam }}</h4>
                                        Einddatum: {{ date("d-m-Y", strtotime($nietTeruggebracht->einddatum)) }} | Klant: <a href="{{ route('klanten.show', $nietTeruggebracht->klant_id) }}">{{ $nietTeruggebracht->klant->voornaam }} {{ $nietTeruggebracht->klant->achternaam }}</a>
                                    </div>
                                @endforeach
                            </div>
                            <!-- ./box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            @endif
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footerSection')
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: '{{ route('dashboard.chartsales') }}',
                method: "GET",
                success: function(data) {
                    var month = []
                    var year = []
                    var sum = []
                    var monthName = ['januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'october', 'november', 'december']
                    
                    for(var i in data) {
                        month.push(monthName[data[i].month-1])
                        year.push(data[i].year)
                        sum.push(data[i].sum)
                    }
                    var firstMonth = month[0]
                    var firstMonthYear = year[0]
                    var lastMonth = monthName[new Date().getMonth()]
                    var lastMonthYear = new Date().getFullYear()
                    
                    document.getElementById("firstPeriod").innerHTML = firstMonth+' '+firstMonthYear
                    document.getElementById("lastPeriod").innerHTML = lastMonth+' '+lastMonthYear
                    var chartdata = {
                        labels: month,
                        datasets : [
                            {
                                label: 'Omzet',
                                backgroundColor: 'rgba(100, 0, 255, 0.5)',
                                hoverBackgroundColor: 'rgba(100, 0, 255, 0.75)',
                                data: sum
                            },
                        ]
                    };

                    var ctx = $("#salesChart");

                    var barGraph = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    },
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Omzet in €'
                                    }
                                }],
                                xAxes: [{
                                    scaleLabel: {
                                        display: true,
                                        labelString: 'Maand'
                                    }
                                }]
                            },
                            legend: {
                                display: false
                            },
                        }
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection