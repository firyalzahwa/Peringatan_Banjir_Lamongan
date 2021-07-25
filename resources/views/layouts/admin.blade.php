<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>AdminLTE 3 | Dashboard 2</title>
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href=" {{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href=" {{ asset('dist/css/adminlte.min.css') }} ">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
    <link rel="stylesheet" href=" {{ asset('dist/js/leaflet.ajax.min.js') }} ">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
</head>

<style>
    #legend {
        padding: 10px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        line-height: 18px;
        height: 150px;
        width: 100px;
      }
      .legend-key {
        display: inline-block;
        border-radius: 20%;
        width: 10px;
        height: 10px;
        margin-right: 5px;
      }
    
</style>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('home')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            
            <!-- SEARCH FORM -->
            <form class="form-inline ml-auto">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            
        </nav>
        <!-- /.navbar -->
        
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>
            
            <!-- Sidebar -->
            <div class="sidebar">
                {{-- <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('dist/img/user2-160x160.jpg') }} " class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#">Alexander Pierce</a>
                        </div>
                    </div> --}}
                    
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                with font-awesome or any other icon font library -->
                                <li class="nav-item">
                                    <a href="{{route('home')}}" class="nav-link">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>
                                            Dashboard
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview menu-open">
                                    <a href="{{route('home')}}" class="nav-link">
                                        <i class="nav-icon fas fa-file"></i>
                                        <p>
                                            Data Administrasi
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.districts.index') }}" class="nav-link">
                                                <i class="fas fa-circle nav-icon"></i>
                                                <p>Data Kecamatan</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.villages.index') }}" class="nav-link">
                                                <i class="fas fa-circle nav-icon"></i>
                                                <p>Data Desa</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item has-treeview menu-open">
                                    <a href="" class="nav-link">
                                        <i class="nav-icon fas fa-copy"></i>
                                        <p>
                                            Data Parameter
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.populations.index') }}" class="nav-link">
                                                <i class="fas fa-circle nav-icon"></i>
                                                <p>Kepadatan Penduduk</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.landheights.index') }}" class="nav-link ">
                                                <i class="fas fa-circle nav-icon"></i>
                                                <p>Tinggi Tanah</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.rivers.index') }}" class="nav-link ">
                                                <i class="fas fa-circle nav-icon"></i>
                                                <p>Data Sungai</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.reservoirs.index') }}" class="nav-link ">
                                                <i class="fas fa-circle nav-icon"></i>
                                                <p>Waduk</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.weathers.index') }}" class="nav-link ">
                                                <i class="fas fa-circle nav-icon"></i>
                                                <p>Cuaca</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('admin.histories.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            Riwayat Banjir
                                        </p>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('admin.procedures.index') }}"class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>
                                            SOP
                                        </p>
                                    </a>
                                </li>
                                
                                
                                
                                <li class="nav-header">ACTION</li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="nav-icon far fa-circle text-danger"></i>
                                    {{ __('Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                
                            </li>
                            
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
            
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
            
            <!-- Main Footer -->
            <!-- <footer class="main-footer">
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.0.2
                </div>
            </footer> -->
        </div>
        <!-- ./wrapper -->
        
        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }} "></script>
        <!-- Bootstrap -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} "></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.js') }} "></script>
        
        <!-- OPTIONAL SCRIPTS -->
        <script src="{{ asset('dist/js/demo.js') }} "></script>
        
        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }} "></script>
        <script src="{{ asset('plugins/raphael/raphael.min.js') }} "></script>
        <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }} "></script>
        <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }} "></script>
        <!-- ChartJS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }} "></script>
        
        
        
        <!-- PAGE SCRIPTS -->
        <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
    </body>
    
    </html>