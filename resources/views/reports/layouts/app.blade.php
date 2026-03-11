<!DOCTYPE html>
<html lang="en"> 
  
<!-- Mirrored from admin.pixelstrap.com/zeta/theme/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Oct 2022 12:12:34 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="I and C">
    <meta name="keywords" content="I and C">
    <meta name="author" content="pixelstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('admin/assets/images/login/')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/login/')}}" type="image/x-icon">
    <title> Integrated Data Management Software</title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/datatables.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('admin/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/vendors/dropzone.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">-->

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js"></script>-->
    @yield('style')
    <style>
        .simplebar-content-wrapper {
                height: auto !important;
    overflow: visible !important;
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
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      @include('reports.layouts.header')
     
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
    

        @include('reports.layouts.sidebar')
        <!-- Page Sidebar Ends-->        
        <div class="page-body" style="padding: 2px 15px 0 15px !important;">
          <button class="btn btn-primary d-flex align-items-center gap-1  mt-2" onclick="window.history.back();" >
                    <i data-feather="arrow-left"></i>
                    <span>Back</span>
                </button>
        @yield('content')
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright {{date("Y")}} © Integrated Data Managemnet Software 2025  </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- latest jquery-->
    <script src="{{asset('admin/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('admin/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <script src="{{asset('admin/assets/js/scrollbar/simplebar.js')}}"></script>
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
    <!-- Plugins JS Ends-->
    <script src="{{asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <!-- Theme js-->
    <script src="{{asset('admin/assets/js/script.js')}}"></script>
    <!-- <script src="{{asset('admin/assets/js/theme-customizer/customizer.js')}}"></script> -->

    <script src="{{asset('admin/assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{asset('admin/assets/js/dropzone/dropzone-script.js')}}"></script>
<script src="{{asset('admin/assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('admin/assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('admin/assets/js/email-app.js')}}"></script>
<script src="{{asset('admin/assets/js/form-validation-custom.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    @yield('script')
  </body>

<!-- Mirrored from admin.pixelstrap.com/zeta/theme/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Oct 2022 12:13:34 GMT -->
</html>