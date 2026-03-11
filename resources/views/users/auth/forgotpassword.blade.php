<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
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
        .otp-input {
            width: 50px;
            height: 50px;
            font-size: 20px;
            text-align: center;
            margin: 0 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .otp-input:focus {
            border-color: #007bff;
            outline: none;
        }

        .resend {
            font-size: 0.9rem;
            color: #666;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <section>
        <div class="container-fluid">
            <div class="d-flex flex-column justify-content-center" style="height: 100vh;">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-11">
                        <div class="login-card p-4"
                            style="box-shadow: 0 0.5rem 1rem #00000047; background: white; border-radius: 10px;height:auto;min-height:auto">
                            <div class="row m-0 align-items-center">
                                <!-- Left Logo Section -->
                                <div class="col-lg-6 text-center">
                                    <img src="{{asset('admin/assets/images/logo/karnataka.png')}}" width="35%;" alt="">
                                    <h6 class="text-dark fw-bold mt-3">Integrated Data Management Software</h6>
                                </div>

                                <!-- Right Form Section -->
                                <div class="col-lg-6">
                                    <!-- Phone Input Section -->
                                    <form class="theme-form login-form p-2"
                                        style="background-color: transparent !important;" id="phoneForm">
                                      
                                        <div id="phoneSection">
                                            <h4 class="text-center">Forgot Password</h4>
                                            <div class="form-group">
                                                <label>Phone No.</label>
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fa-solid fa-phone "></i>
                                                    </span>
                                                    <input id="phoneno" class="form-control" type="text" name="phoneno"
                                                        placeholder="Enter a phone no." maxlength="10" required
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                                </div>
                                            </div>
                                            <div class=" mt-3 d-flex flex-column align-items-center">
                                                <button class="btn btn-primary"
                                                    
                                                    type="submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- OTP Section -->
                                    <div id="otpSection" class="mt-4" style="display: none;">
                                        <div class="text-center mb-3">
                                            <div style="font-size: 2rem;">📱</div>
                                            <h4>OTP Verification</h4>
                                            <p>OTP has been sent via SMS to <strong
                                                    id="userPhone">+91XXXXXXXXXX</strong></p>
                                        </div>

                                        <div class="d-flex justify-content-center mb-2">
                                            <input type="text" maxlength="1" class="otp-input" required>
                                            <input type="text" maxlength="1" class="otp-input" required>
                                            <input type="text" maxlength="1" class="otp-input" required>
                                            <input type="text" maxlength="1" class="otp-input" required>
                                        </div>

                                        <div class="text-center resend">Resend OTP in 00:17</div>

                                        <div class="text-center mt-3">
                                            <a href="resetPassword.html"  class="btn btn-primary"
                                                
                                                type="button">Verify OTP</a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- row -->
                        </div> <!-- login-card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
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
        document.getElementById('phoneForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const phoneInput = document.getElementById('phoneno').value;
            if (phoneInput.length === 10) {
                document.getElementById('phoneSection').style.display = 'none';
                document.getElementById('otpSection').style.display = 'block';
                document.getElementById('userPhone').innerText = `+91${phoneInput}`;
            } else {
                alert('Please enter a valid 10-digit phone number');
            }
        });
    </script>
</body>

</html>