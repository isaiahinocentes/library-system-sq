<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini">
        <div id="app">
            <div class="wrapper">

                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="" class="nav-link">OPAC</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a href="" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </nav>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="#" class="brand-link">
                        &nbsp;
                        <i class=" nav-icon fa fa-book elevation-1"></i>

                        <span class="brand-text font-weight-light">Library Management</span>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">

                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                                <li class="nav-header" style="padding-left: 16px">MANAGEMENT</li>

                                {{-- ACQUISITION GROUP --}}
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-folder-open"></i>
                                        <p>
                                            Acquisition
                                            <i class="fa fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            {{--List of Books link--}}
                                            <a href="{{ route('acq-list') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>List of Books</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            {{--Add book link--}}
                                            <a href="{{ route('acq-book') }}" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>Add Book</p>
                                            </a>
                                        </li>
                                        {{--<li class="nav-item">--}}
                                            {{--Add book link--}}
                                            {{--<a href="" class="nav-link">--}}
                                                {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                                                {{--<p>Manual Upload</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li class="nav-item">--}}
                                            {{--bulk upload link--}}
                                            {{--<a href="" class="nav-link">--}}
                                                {{--<i class="fa fa-circle-o nav-icon"></i>--}}
                                                {{--<p>Bulk Upoad</p>--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                    </ul>
                                </li>
                                {{-- //ACQUISITION GROUP --}}

                                {{-- Circulation Group--}}
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-clipboard"></i>
                                        <p>
                                            Circulation
                                            <i class="fa fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            {{-- Circulation List link--}}
                                            <a href="" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>List of Reserved</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- //CIRCULATION GROUP --}}

                                {{-- //RESERVATION GROUP --}}
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-bookmark"></i>
                                        <p>
                                            Reservation
                                            <i class="fa fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            {{-- On-Site Reservation Link --}}
                                            <a href="" class="nav-link">
                                                <i class="fa fa-circle-o nav-icon"></i>
                                                <p>On-site Reservation</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                {{-- //RESERVATION GROUP --}}

                                {{-- SUGGESTION GROUP --}}
                                <li class="nav-item">
                                    {{--SUGGESTION LINK--}}
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-comment"></i>
                                        <p>Suggestion</p>
                                    </a>
                                </li>
                                {{-- //SUGGESTION GROUP --}}

                                {{-- ADMIN GROUP --}}
                                {{--<li class="nav-header">ADMINISTRATION</li>--}}
                                {{--<li class="nav-item">--}}
                                    {{-- Settings Link --}}
                                    {{--<a href="#" class="nav-link">--}}
                                    {{--<i class="nav-icon fa fa-cogs"></i>--}}
                                    {{--<p>--}}
                                    {{--Settings--}}
                                    {{--</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class="nav-item">--}}
                                    {{-- ACCOUNTS LINK --}}
                                    {{--<a href="#" class="nav-link">--}}
                                    {{--<i class="nav-icon fa fa-user-plus"></i>--}}
                                    {{--<p>--}}
                                    {{--Users--}}
                                    {{--</p>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{-- //ADMIN GROUP --}}

                                {{-- REPORTS GROUP --}}
                                <li class="nav-header">STATISTICS</li>
                                <li class="nav-item">
                                    {{-- REPORTS LINK --}}
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fa fa-file"></i>
                                        <p>Reports</p>
                                    </a>
                                </li>
                                {{-- //REPORTS GROUP --}}
                            </ul>

                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                    <!-- /.sidebar -->
                </aside>
            </div>
            <main class="content-wrapper">
                @yield('content')
            </main>
            @yield('scripts')
        </div>
    </body>
</html>
