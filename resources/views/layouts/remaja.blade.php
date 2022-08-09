<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>pikremaja - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Septulola - Sistem Informasi Terpadu Pengembangan Literasi Anak" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/img/genre.png') }}">

    @stack('add-plugins-css')
    <!-- App css -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    @stack('add-css')

</head>

<body id="body" class="dark-sidebar">
    <!-- leftbar-tab-menu -->
    <div class="left-sidebar">
        <!-- LOGO -->
        <div class="brand">
            <a href="{{ url('dashboard-admin') }}" class="logo">
                <span>
                    <img src="{{ asset('frontend/img/genre.png') }}" alt="logo-small" style="width: 50px; height: 50px;"
                        class="logo-sm">
                </span>
                <span>

                    <img src="{{ asset('backend/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <div class="sidebar-user-pro media border-end">
            <div class="position-relative mx-auto">
                <img src="{{ Auth::user()->foto ? asset('backend/images/users/' . Auth::user()->foto) : asset('backend/images/users/user-3.jpg') }}"
                    alt="user" class="rounded-circle thumb-md">
                <span class="online-icon position-absolute end-0"><i class="mdi mdi-record text-success"></i></span>
            </div>
            <div class="media-body ms-2 user-detail align-self-center">
                <h5 class="font-14 m-0 fw-bold">{{ Auth::user()->name }}</h5>
                <p class="opacity-50 mb-0">{{ Auth::user()->role }}</p>
            </div>
        </div>
        <!--end logo-->


        <div class="menu-content h-100" data-simplebar>
            <div class="menu-body navbar-vertical">
                <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">

                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'dashboard-remaja' ? 'menuitem-active' : '' }}"
                                href="{{ url('dashboard-remaja') }}"><i
                                    class="ti ti-dashboard menu-icon"></i><span>Beranda</span></a>
                        </li>
                        <!--end nav-item-->


                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'orang-tua' ? 'menuitem-active' : '' }}"
                                href="{{ route('konseling.index') }}"><i class="ti ti-friends menu-icon"></i><span>
                                    Konseling</span></a>
                        </li>
                        <!--end nav-item-->


                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'laporan' ? 'menuitem-active' : '' }}"
                                href="{{ route('laporan.index') }}"><i class="ti ti-report menu-icon"></i><span>
                                    Laporan Konseling</span></a>
                        </li>
                        <!--end nav-item-->

                    </ul>
                </div>
                <!--end sidebarCollapse-->
            </div>
        </div>
    </div>
    <!-- end left-sidenav-->
    <!-- end leftbar-menu-->

    <!-- Top Bar Start -->
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom" id="navbar-custom">
            <ul class="list-unstyled topbar-nav float-end mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-bell"></i>
                        <span class="alert-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">

                        <h6
                            class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                            Notifikasi <span class="badge bg-soft-primary badge-pill">{{
                                App\Models\Balasan::whereHas('pesan',function($q){
                                $q->where('id_user',Auth::user()->id);
                                })->where('read','0')->count() }}</span>
                        </h6>
                        <div class="notification-menu" data-simplebar>
                            @foreach (App\Models\Balasan::whereHas('pesan',function($q){
                            $q->where('id_user',Auth::user()->id);
                            })->where('read','0')->get() as $item)


                            <!-- item-->
                            <a href="{{ url('laporan') }}" class="dropdown-item py-3">
                                <small class="float-end text-muted ps-2">{{ $item->created_at }}</small>
                                <div class="media">
                                    <div class="avatar-md bg-soft-primary">
                                        <i class="ti ti-chart-arcs"></i>
                                    </div>
                                    <div class="media-body align-self-center ms-2 text-truncate">
                                        <h6 class="my-0 fw-normal text-dark">{{ $item->topik }}</h6>
                                        <small class="text-muted mb-0">{!! $item->balasan !!}</small>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </a>
                            <!--end-item-->
                            @endforeach

                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <li class="dropdown">
                    <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <img src="{{ Auth::user()->foto ? asset('backend/images/users/' . Auth::user()->foto) : asset('backend/images/users/user-3.jpg') }}"
                                alt="profile-user" class="rounded-circle me-2 thumb-sm" />
                            <div>
                                <small class="d-none d-md-block font-11">{{ Auth::user()->role }}</small>
                                <span class="d-none d-md-block fw-semibold font-12">{{ Auth::user()->name }} <i
                                        class="mdi mdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#"><i class="ti ti-user font-16 me-1 align-text-bottom"></i>
                            Profile</a>

                        <a class="dropdown-item" href="{{ url('/logout') }}"><i
                                class="ti ti-power font-16 me-1 align-text-bottom"></i>
                            Logout</a>
                    </div>
                </li>
                <!--end topbar-profile-->

            </ul>
            <!--end topbar-nav-->

            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="nav-link button-menu-mobile nav-icon" id="togglemenu">
                        <i class="ti ti-menu-2"></i>
                    </button>
                </li>

            </ul>
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <!-- Top Bar End -->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            @yield('content')


            <!--Start Footer-->
            <!-- Footer Start -->
            <footer class="footer text-center text-sm-start">
                &copy; <script>
                    document.write(new Date().getFullYear())
                </script> <a href="https://itgenic.co.id">pikremaja.co.id</a> <span
                    class="text-muted d-none d-sm-inline-block float-end">Built with <i
                        class="mdi mdi-heart text-danger"></i> by sakti</span>
            </footer>
            <!-- end Footer -->
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    @stack('add-plugins-js')
    <!-- App js -->
    <script src="{{ asset('backend/js/app.js') }}"></script>
    @stack('add-js')

</body>
<!--end body-->

</html>