<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>I & C</title>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/style.css')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/fonts/css/fontawesome-all.min.css')}}">
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Anek+Latin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
    .bg-highlight {
        background-color: #0c3040 !important;

    }

    .color-highlight {
        color: #0c3040 !important;
    }

    .btn {
        background-color: #0c3040 !important;
        border: 1px solid white !important;
    }
    </style>
</head>

<body class="theme-light" data-highlight="blue2">

    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">

        <div class="page-content">
            <div class="page-title page-title-large"></div>

            <div class="card header-card shape-rounded" data-card-height="210">
                <div class="card-overlay bg-highlight opacity-95"></div>
                <div class="card-overlay dark-mode-tint"></div>
                <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>

            </div>


            <div class="card card-style mt-5">
                <div class="content">
                    <div class="col-12 ps-0">
                        <div class="text-center" style="position:relative;">
                            <img src="https://kannadasahithyaparishattu.org/integrateddata/public/admin/assets/images/logo/resizeIClogo.jpg"
                                width="75" height="75" class=" ">
                        </div>
                    </div>
                </div>
                <div class="content mt-2 mb-0">
                    <h2 class="mb-3 color-highlight">Login</h2>
                    <form id="loginForm" method="GET">

                        <!-- KGID -->
                        <div class="input-style no-borders has-icon validate-field mb-4">
                            <i class="fa fa-id-card"></i>
                            <input type="text" class="form-control" id="kgid" name="kgid" placeholder="KGID"
                                value="{{ request('kgid') }}" required>
                            <label class="color-blue-dark font-10 mt-1">KGID</label>
                        </div>

                        <!-- Error -->
                        <em id="kgidError" style="color:red; display:none;">Enter valid KGID</em>

                        <!-- OTP -->
                        <div class="input-style no-borders has-icon validate-field mb-4 position-relative"
                            id="otpSection" style="display:none;">
                            <i class="fa fa-key"></i>
                            <input type="number" class="form-control" placeholder="Enter OTP">
                            <label class="color-blue-dark font-10 mt-1">Enter OTP</label>
                        </div>

                        <center id="continueBtnWrapper">
                            <button type="submit"
                                class="btn btn-m mt-4 mb-4 btn-full bg-blue-dark rounded-sm text-uppercase font-900">
                                Continue 
                            </button>
                        </center>

                    </form>






                </div>
            </div>

            @include('pwa.layout.menu-footer')

            <!--<div class="footer" data-menu-load="menu-footer.html"></div>-->

        </div>

    </div>

    <script type="text/javascript" src="{{asset('frontend/scripts/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/scripts/custom.js')}}"></script>
    <script>
    const validKGIDs = ["KGID12345", "KGID67890", "123456"];

    const params = new URLSearchParams(window.location.search);
    const kgid = params.get("kgid");

    const otpSection = document.getElementById("otpSection");
    const kgidError = document.getElementById("kgidError");
    const continueBtn = document.getElementById("continueBtnWrapper");

    if (kgid) {
        if (validKGIDs.includes(kgid)) {
            otpSection.style.display = "block";
            kgidError.style.display = "none";
           
        } else {
            otpSection.style.display = "none";
            kgidError.style.display = "block";
            continueBtn.style.display = "block";
        }
    }
    </script>








</body>