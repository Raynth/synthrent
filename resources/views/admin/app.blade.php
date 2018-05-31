<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SynthRENT | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/skins/_all-skins.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @section('headSection')
        @show

</head>
<body class="hold-transition skin-purple sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="../../index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>RT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Synth</b>RENT</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('storage/cover_images/'.Auth::user()->foto) }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->naam }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('storage/cover_images/'.Auth::user()->foto) }}" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->naam }}
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="btn btn-default btn-flat">Uitloggen</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('storage/cover_images/'.Auth::user()->foto) }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->naam }}</p>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">HOOFD NAVIGATIE</li>
                    <li>
                        <a href="{{ route('dashboard.index') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.verhuren.index') }}">
                            <i class="fa fa-dashboard"></i> <span>Verhuren</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.producten.index') }}">
                            <i class="fa fa-dashboard"></i> <span>Producten</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.merken.index') }}">
                            <i class="fa fa-dashboard"></i> <span>Merken</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categorieen.index') }}">
                            <i class="fa fa-dashboard"></i> <span>Categorieën</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.klanten.index') }}">
                            <i class="fa fa-dashboard"></i> <span>Klanten</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.reviews.index') }}">
                            <i class="fa fa-dashboard"></i> <span>Reviews</span>
                        </a>
                    </li>
                    @if (Auth::user()->rol->admin == 1)
                        <li>
                            <a href="{{ route('admin.admins.index') }}">
                                <i class="fa fa-dashboard"></i> <span>Gebruikers</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.rollen.index') }}">
                                <i class="fa fa-dashboard"></i> <span>Rollen</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        @section('main-content')
            @show
    
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2018 <a href="#">SynthRENT</a>.</strong> Alle rechten voorbehouden.
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })
    </script>
    <!-- Active menu -->
    <script>
        $(document).ready(function(){
            var url = window.location;
            // Will only work if string in href matches with location
            $('ul.sidebar-menu a[href="'+ url +'"]').parent().addClass('active');

            // Will also work for relative and absolute hrefs
            $('ul.sidebar-menu a').filter(function() {
                return this.href == url;
            }).parent().addClass('active');

            // Will also work for relative and absolute hrefs
            $('ul.sidebar-menu a').filter(function() {
                var regex = new RegExp('\\b' + this.href + '\\b');
                return url.href.search(regex) !== -1;
            }).parent().addClass('active');
        });
    </script>

    @section('footerSection')
        @show
</body>
</html>