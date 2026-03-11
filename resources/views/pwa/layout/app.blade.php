<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>Integrated Data</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/style.css')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/fonts/css/fontawesome-all.min.css')}}">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
    <link href="https://fonts.googleapis.com/css2?family=Anek+Latin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    @yield('style')
    <style>
    .font-aneka {
        font-family: 'Anek Latin', sans-serif;
    }

    .footer-card {
        bottom: 0px !important;
    }

    .fontsize {
        font-size: 18px;
        font-weight: 600;
        color: black;

    }

    .fontsize1 {
        font-size: 16px;
        font-weight: 500;
        color: rgba(0, 0, 0, 0.521);

    }

    .footer .footer-title {
        font-size: 23px;
    }

    #footer-bar a {
        padding-top: 25px;
    }

    .page-title-small h2 {
        font-size: 20px !important;
    }

    .bg-highlight {
        background-color: #0c3040 !important;

    }

    .btn {
        background-color: #0c3040 !important;
        border: 1px solid white !important;
    }

    .bordered-table thead th {
        background: #183b4a !important;
        color: #fff !important;
    }

    .theme-light .bg-gradient-fade {
        background: transparent !important;
    }

    .rounded-l {
        border-radius: 15px !important;
    }

    .menu-header a {
        text-align: end !important;
    }

    .footer-bar-5 strong {
        background-color: #183b4a !important;
    }
    .footer-bar-5 a.active-nav {
  color: #8B4513 !important;
}

.footer-bar-5 a.active-nav span {
  opacity: 1;
  font-weight: 600;
}

.footer-bar-5 a.active-nav::after {
  content: "";
  position: absolute;
  width: 50px;
  height: 4px;
  background: #8B4513;
  border-radius: 60px;
  left: 50%;
  bottom: 0;
  transform: translateX(-50%);
}
    </style>
</head>

<body class="theme-light">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">

        <!-- header and footer bar go here-->
        <div class="header header-fixed header-auto-show header-logo-app">
            <a href="index.html" class="header-title">Industries and Commerce</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
            <!--<a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i-->
            <!--        class="fas fa-sun"></i></a>-->
            <!--<a href="#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i-->
            <!--        class="fas fa-moon"></i></a>-->
            <!--<a href="#" data-menu="menu-highlights" class="header-icon header-icon-3"><i class="fas fa-brush"></i></a>-->
        </div>
        @include('pwa.layout.footer')


        <div class="page-content">

            <!-- @include('pwa.layout.header') -->


            @yield('content')

            @include('pwa.layout.menu-footer')

            <!-- footer and footer card-->
            <!-- <div class="footer" data-menu-load="menu-footer.html"></div> -->
        </div>
        <!-- end of page content-->


        <div id="menu-share" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-load="menu-share.html"
            data-menu-height="420" data-menu-effect="menu-over">
        </div>

        <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached rounded-m"
            data-menu-load="menu-colors.html" data-menu-height="510" data-menu-effect="menu-over">
        </div>

        <div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260"
            data-menu-load="menu-main" data-menu-active="nav-pages" data-menu-effect="menu-over">
        </div>



    </div>



    <script type="text/javascript" src="{{asset('frontend/scripts/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/scripts/custom.js')}}"></script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    let currentUrl = window.location.pathname;

    document.querySelectorAll("#footer-bar a").forEach(function (link) {
        let linkPath = new URL(link.href).pathname;

        if (currentUrl === linkPath) {
            link.classList.add("active-nav");
        }
    });
});
</script>
    @yield('script')
</body>

</html>