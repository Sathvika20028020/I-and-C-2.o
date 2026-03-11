<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('admin/assets/images/logo/')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/logo/')}}" type="image/x-icon">
    <title> Integrated Data Management Software </title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/photoswipe.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('admin/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        .input-group-text.show-hide {
            background-color: #f1f1f1;
            /* Your desired background color */
            border-left: none;
        }

        .toggle-password {
            cursor: pointer;
            color: #333;
        }

        .input-group-text.show-hide:hover {
            background-color: #e0e0e0;
            /* Optional hover effect */
        }

        .show-hide {
            top: 24px !important;
            right: 0px !important;
        }
    </style>
</head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader">
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-ball"></div>
      </div>
    </div>











    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <section class="bbmp-login-section position-relative overflow-hidden text-dark">
  
  <!-- SVG Curved Background -->
  <div class="custom-shape-divider-top-1687 position-absolute top-0 start-0 w-100">
    <svg viewBox="0 0 1200 200" preserveAspectRatio="none" style="height: 100%; width: 100%;">
      <path d="M0,0 C300,200 900,0 1200,150 L1200,0 L0,0 Z" fill="#0077b6"></path>
    </svg>
  </div>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
  @if(session('error'))
<div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
  <div class="container position-relative z-1">
    <div class="row align-items-center min-vh-100">
      
      <!-- Image Column -->
      <div class="col-lg-3 text-center mb-4 mb-lg-0">
        <!-- <img src="{{asset('logo/bbmp.png')}}" alt="Login Image" class="img-fluid" style="max-width: 420px;">
        <h2></h2>
        <h3></h3> -->
      </div>

      <!-- Login Form Column -->
      <div class="col-lg-6">
        <div class="bg-white p-4 p-md-5 shadow rounded-4" style="border-radius: 10px;">
          <form action="{{route('userloginform')}}" method="POST">
            @csrf
            <h4 class="fw-bold mb-2">Login</h4>
            <p class="mb-4">Welcome back! Log in to your account.</p>

            <div class="mb-3">
              <label class="form-label">Phone Number</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fa-solid fa-envelope" style="color: #0077b6;"></i></span>
                <input type="number" class="form-control" name="login" placeholder="enter phone number" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="fa-solid fa-lock" style="color: #0077b6;"></i></span>
                <input type="password" class="form-control" name="password" placeholder="****" required>
              </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label text-muted" for="remember">Remember me</label>
              </div>

              <a href="{{route('userforgotpassword')}}" class="text-primary">Forgot password?</a>
            </div>

            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-lg" style="background: #0077b6; color: #fff;">Sign In</button>
            </div>

            <p class="text-center mb-0">Don't have an account? <a href="#" class="text-decoration-none text-primary">Register now</a></p>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

    <script src="{{asset('admin/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('admin/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="{{asset('admin/assets/js/scrollbar/custom.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{asset('admin/assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{asset('admin/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/knob/knob.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/knob/knob-chart.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('admin/assets/js/notify/bootstrap-notify.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/dashboard/default.js')}}"></script>
    <script src="{{asset('admin/assets/js/notify/index.js')}}"></script>
    <script src="{{asset('admin/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
    <script src="{{asset('admin/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
    <script src="{{asset('admin/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/photoswipe/photoswipe.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead/handlebars.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead/typeahead.bundle.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead/typeahead.custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead-search/handlebars.js')}}"></script>
    <script src="{{asset('admin/assets/js/typeahead-search/typeahead-custom.js')}}"></script>
    <script src="{{asset('admin/assets/js/height-equal.js')}}"></script>
   
    <script src="{{asset('admin/assets/js/script.js')}}"></script>
  </body>

</html>