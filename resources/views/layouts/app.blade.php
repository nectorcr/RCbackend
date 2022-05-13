<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AdminLTE 3</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="{{ asset('//fonts.gstatic.com') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search"
                            aria-label="Search">
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
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Sistema Red Capital</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">
                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                @else
                                {{ Auth::user()->name }}
                                <a class="dropdown-item text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                @endguest
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            <li class="nav-item">
                                <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>

                            @can('adminUser')
                            <li class="nav-item">
                                <a href="{{url('usuarios')}}"
                                    class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                        <?php $users_count = DB::table('users')->count(); ?>
                                        <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{url('roles')}}"
                                    class="{{ Request::path() === 'roles' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Roles
                                    </p>
                                </a>
                            </li>
                            @endcan

                            @can('adminFile')
                            <li class="nav-item has-treeview">
                                <a href="{{ url('#') }}" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Archivos<i class="fas fa-angle-left right"></i></p>
                                </a>

                                
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('filesadmin/index')}}"
                                            class="{{ Request::path() === 'filesadmin/index' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Archivos Historicos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('filesadmin/create')}}"
                                            class="{{ Request::path() === 'filesadmin/create' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Subir Archivos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcan

                            @can('cliente')
                            <li class="nav-item has-treeview">
                                <a href="{{ url('#') }}" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Archivos<i class="fas fa-angle-left right"></i></p>
                                </a>

                                
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('files/index')}}"
                                            class="{{ Request::path() === 'files/index' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Archivos Historicos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('files/create')}}"
                                            class="{{ Request::path() === 'files/create' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Subir Archivos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!-- NO QUITAR -->
                    <div class="float-right d-none d-sm-inline-block">
                        <b>RedCapital, Todos los derechos reservados 2022</b>
                    </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
</body>

</html>