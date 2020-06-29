<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{url('/dashboard')}}">SIM-MASJID</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img style="width: 40px; height: 40px; border-radius: 50%" src="/uploads/avatars/{{ Auth::user()->avatar }}" > {{ Auth::user()->name }} </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('user.show', Auth::user()->id)}}">Profil</a><a class="dropdown-item" href="{{route('user.setting')}}">Pengaturan</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"href="{{ route('logout') }}">{{ __('Keluar') }}</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>

                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="{{url('/dashboard')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Dashboard</a>
                            <?php 
                                $isAdmin = Auth::user()->admin ; 
                            ?>
                            @if($isAdmin == 1 )
                                <a class="nav-link" href="{{route('users.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>Users</a>
                            @endif
                            <a class="nav-link" href="{{route('jamaah.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-pray"></i></div>Jamaah</a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Keuangan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('masuk.index')}}">Kas Masuk</a>
                                    <a class="nav-link" href="{{route('keluar.index')}}">Kas Keluar</a>
                                    <a class="nav-link" href="{{route('saldo.index')}}">Saldo</a>
                                </nav>
                            </div>
                            

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Login sebagai:</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <ol class="breadcrumb mb-4 mt-4">
                            <li class="breadcrumb-item active small">Dashboard @yield('state')</li>
                        </ol>
                        <div>
                            @if(session('status'))
                                <div class="alert alert-success" role="alert">
                                   {{ session('status') }}
                                </div>
                            @endif
                        </div>
                        <div>
                            @yield('content')
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; dynatic 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/scripts.js')}}"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('backend/assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/assets/demo/datatables-demo.js')}}"></script>

        <script src="{{asset('backend/assets/demo/saldoChart.js')}}"></script>
        <!--data table-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


    </body>
</html>
