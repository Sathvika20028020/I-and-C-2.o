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

            @if(Session::has('error'))
            <div class="ms-3 me-3 mb-5 alert alert-small rounded-s shadow-xl bg-red-dark s-alrt" role="alert">
                <span><i class="fa fa-times"></i></span>
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert"
                    aria-label="Close">&times;</button>
            </div>
            @endif

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
                    <form method="POST" action="{{ route('pwa.otp.login') }}">
                        @csrf
                        <div class="input-style no-borders has-icon validate-field mb-4">
                            <i class="fa fa-user"></i>
                            <input type="number" class="form-control validate-name" id="phone" name="phone"
                                placeholder="Phone" required
                                oninput="this.value = this.value.slice(0, 10); if (this.value.length > 10) this.value = this.value.slice(0, 10);">
                            <label for="phone" class="color-blue-dark font-10 mt-1">Phone</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>

                        <!-- Message placeholder -->
                        <p id="otpMessage" class="text-success mb-2" style="display:none;">OTP sent successfully</p>

                        <!-- OTP input (hidden initially) -->
                        <div id="otpField" class="input-style no-borders has-icon validate-field mb-4"
                            style="display:none;">
                            <i class="fa fa-lock"></i>
                            <input type="number" required class="form-control" id="otp" name="otp" placeholder="Enter OTP" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                            <label for="otp" class="color-blue-dark font-10 mt-1">Enter OTP</label>
                            <em>(required)</em>
                        </div>

                        <center>
                            <input type="button" id="sendOtpBtn"
                                class="btn btn-m mt-4 mb-4 btn-full bg-blue-dark rounded-sm text-uppercase font-900"
                                value="SEND OTP">

                            <!-- Login button hidden initially -->
                            <input type="submit" id="loginBtn"
                                class="btn btn-m mt-4 mb-4 btn-full bg-green-dark rounded-sm text-uppercase font-900"
                                value="LOGIN" style="display:none;">
                        </center>
                    </form>
                </div>

            </div>

            @include('pwa.layout.menu-footer')

            <!--<div class="footer" data-menu-load="menu-footer.html"></div>-->

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('frontend/scripts/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/scripts/custom.js')}}"></script>
    <script>
    document.getElementById("sendOtpBtn").addEventListener("click", function() {
        let phone = document.getElementById("phone").value;
        if (phone.length === 10) {
          fetch("{{url('send-login-otp')}}/"+phone)
          .then(response => {
            // Handle the response, e.g., check for success status
            if (!response.ok) {
              throw new Error(`HTTP error! status: ${response.status}`);
            }
            // Parse the response body (e.g., as JSON)
            return response.json();
          })
          .then(data => {
            if(data.success){
              
              // Show OTP message + OTP input
              document.getElementById("otpMessage").style.display = "block";
              document.getElementById("otpField").style.display = "block";

              // Hide "Send OTP" button & show "Login"
              document.getElementById("sendOtpBtn").style.display = "none";
              document.getElementById("loginBtn").style.display = "block";
            }else{
              alert(data.message);
            }
          })
          .catch(error => {
            // Handle any errors during the fetch operation
            console.error('Fetch error:', error);
          });
        } else {
            alert("Please enter a valid 10-digit phone number");
        }
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".s-alrt").fadeTo(2000, 500).fadeOut(1000, function() {
            $(".s-alrt").fadeOut(1000);
        });
    });
    </script>

</body>

</html>