<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta description -->
    <meta name="description"
        content="AppCo App Landing Page Template. agency landing page template helps you easily create websites for your business, marketing landing page template form promotion and many more.">
    <meta name="author" content="ThemeTags">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!--title-->
    <title>pikremaja</title>

    <!--favicon icon-->
    <link rel="icon" href="{{ asset('frontend/img/genre.png') }}" type="image/png" sizes="16x16">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans&display=swap"
        rel="stylesheet">

    <!--Bootstrap css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <!--Magnific popup css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <!--Themify icon css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
    <!--animated css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <!--ytplayer css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.mb.YTPlayer.min.css') }}">
    <!--Owl carousel css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <!--custom css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!--responsive css-->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

</head>

<body>

    <!--header section start-->
    <header class="header">
        <!--start navbar-->
        <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="index-2.html"><img src="{{ asset('frontend/img/genre.png') }}" width="120"
                        alt="logo" class="img-fluid"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="ti-menu"></span>
                </button>

                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ url('/') }}#about">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ url('/') }}#informasi">Informasi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('login') }}">Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="{{ route('register') }}">Daftar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--end navbar-->
    </header>
    <!--header section end-->

    <!--body content wrap start-->
    <div class="main">

        <!--header section start-->
        <section class="hero-section ptb-100 background-img"
            style="background: url('img/hero-bg-2.jpg')no-repeat center center / cover">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-7">
                        <div class="page-header-content text-white text-center pt-sm-5 pt-md-5 pt-lg-0">
                            <h1 class="text-white mb-0">{{ $item->nama }}</h1>
                            <div class="custom-breadcrumb">
                                <ol class="breadcrumb d-inline-block bg-transparent list-inline py-0">
                                    <li class="list-inline-item breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="list-inline-item breadcrumb-item"><a href="#">Informasi</a></li>
                                    <li class="list-inline-item breadcrumb-item active">{{ $item->nama }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--header section end-->

        <!--blog section start-->
        <div class="module ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <!-- Post-->
                        <article class="post">
                            <div class="post-preview"><img src="{{ asset('backend/images/foto/'.$item->foto) }}"
                                    class="img-fluid" />
                            </div>
                            <div class="post-wrapper">
                                <div class="post-header">
                                    <h1 class="post-title">{{ $item->nama }}</h1>
                                    <ul class="post-meta">
                                        <li>{{
                                            Carbon\Carbon::parse($item->created_at)->format('F,d Y') }}</li>

                                    </ul>
                                </div>
                                <div class="post-content">
                                    {!! $item->deskripsi !!}
                                </div>
                            </div>
                        </article>
                        <!-- Post end-->


                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="sidebar-right pl-4">


                            <aside class="widget widget-recent-entries-custom">
                                <div class="widget-title">
                                    <h6>Recent Posts</h6>
                                </div>
                                <ul>
                                    @foreach ($items as $item)


                                    <li class="clearfix">
                                        <div class="wi"><a href="{{ url('detail/'.$item->id) }}"><img
                                                    src="{{ asset('backend/images/foto/'.$item->foto) }}"
                                                    alt="recent post" class="img-fluid rounded" /></a></div>
                                        <div class="wb"><a href="{{ url('detail/'.$item->id) }}">{{ $item->nama
                                                }}</a><span class="post-date">{{
                                                Carbon\Carbon::parse($item->created_at)->format('F,d Y') }}</span></div>
                                    </li>
                                    @endforeach
                                </ul>
                            </aside>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--blog section end-->

    </div>
    <!--body content wrap end-->

    <!--footer section start-->
    <footer class="footer-section">


        <!--footer copyright start-->
        <div class="footer-bottom gray-light-bg pt-4 pb-4">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <p class="copyright-text pb-0 mb-0">Copyrights © 2020 All
                            rights reserved by
                            <a href="#">ThemeTags</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--footer copyright end-->
    </footer>
    <!--footer section end-->

    <!--jQuery-->
    <script src="{{ asset('frontend/js/jquery-3.5.0.min.js') }}"></script>
    <!--Popper js-->
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <!--Bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!--Magnific popup js-->
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <!--jquery easing js-->
    <script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
    <!--jquery ytplayer js-->
    <script src="{{ asset('frontend/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <!--wow js-->
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <!--owl carousel js-->
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <!--countdown js-->
    <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
    <!--validator js-->
    <script src="{{ asset('frontend/js/validator.min.js') }}"></script>
    <!--custom js-->
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>
</body>

</html>