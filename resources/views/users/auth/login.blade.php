<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="">
    <meta name="keywords"
        content="">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/logo/favicon-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/logo/favicon-icon.png" type="image/x-icon">
    <title>Admin Login</title>
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

    <div class="container-fluid p-0">
        <div class="row m-0">
  @if (session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
@endif
  @if(session('error'))
<div class="alert alert-danger" >
        {{ session('error') }}
    </div>
    @endif
            <div class="col-lg-12 col-sm-12">
                <div class="login-card p-3" style="background-color:white;height:auto">
                    <form class="theme-form col-md-9 p-4 shadow" style="border:1px solid #00000047;border-radius: 5px;"
                        action="{{route('userloginform')}}" method="POST">
                        
                         @csrf
                       
                        <div class="d-flex row align-items-center">
                            <div class="col-lg-6 col-12 mb-3">
                                <div class="d-flex flex-row gap-2 align-items-center">
                                    <img src="{{asset('admin/assets/images/logo/resizeIClogo.jpg')}}" width="20%;" alt="">

                                    <h6 class="text-dark fw-bold text-center mb-0">Integrated Data Management Software
                                    </h6>
                                    <img src="{{asset('admin/assets/images/logo/karnataka.png')}}" width="25%;" alt="">
                                </div>

                            </div>

                            <div class="col-lg-6 col-12">
                                <h4 class="text-center" style="color:#2a1570;">Admin Login</h4>
                                <h5 class="text-start mb-3 text-dark mt-5 mb-2 fs-5"></h5>
                                <div class="form-group">
                                    <label> Phone Number <span class="text-danger">*</span></label>
                                    <div class="input-group"><span class="input-group-text"><i
                                                class="fa fa-phone"></i>
                                        </span>
                                        <input id="number" type="text" class="form-control "
                                            placeholder="Enter Phone No." name="login" value="" required=""
                                            autocomplete="email" autofocus="" maxlength="10"
       oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                        <div class="invalid-feedback">Please Provide Valid Phone No.</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-lock "></i></span>
                                        <input class="form-control" type="password" name="password" id="password"
                                            required placeholder="*********">
                                        <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                            <i class="fa-solid fa-eye" id="toggleIcon"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group d-flex justify-content-between">
                                    <div>
                                        <a href="{{route('userforgotpassword')}}">Forgot Password?</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>






    </div>
    <!-- latest jquery-->
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
 
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            toggleIcon.classList.toggle('fa-eye');
            toggleIcon.classList.toggle('fa-eye-slash');
        });
    </script>
      <script>
        // Auto-hide after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            let alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = 0;
                setTimeout(() => alert.remove(), 500); // Remove from DOM after fade-out
            }
        }, 5000);
    </script>
</body>

</html>