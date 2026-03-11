@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
<style>
        .select2-container .select2-selection--single {
            border-color: #0000003d !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            font-size: 15px;
            color: black;
        }

        .needs-validation label {
            opacity: unset;
            margin-bottom: 0px;
        }

        .form-select {
            font-size: 15px;
        }

        .fontsize {
            font-size: 15px;
        }

        .subfont {
            color: #00000096;
        }

        .headftw {
            font-weight: 500;
        }
    </style>
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
@endsection
@section('content')

<div id="loader"
            style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.8); z-index:9999; display:flex; justify-content:center; align-items:center;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div> 
 <a href="{{ url()->previous() }}" class=" m-3 btn btn-primary">Back</a>
<div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3>View Details</h3>
                            </div>
                            <div class="col-12 col-sm-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"> <a class="home-item" href="index.html"><i
                                                data-feather="home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"> Saroji Maharshi Report</li>
                                    <li class="breadcrumb-item active"> View Details</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="card">
                       <div class="card-body">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">District : </span>
                                    <span class="subfont">{{$user->district}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6"> Division: </span>
                                    <span class="subfont">{{$user->divisions}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Kannada Group A: </span>
                                    <span class="subfont">{{$user->kannadiga_g1}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Others Group A: </span>
                                    <span class="subfont">{{$user->others_g1}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Total Group A: </span>
                                    <span class="subfont">{{$user->total_g1}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Percentage of Group A: </span>
                                    <span class="subfont">{{$user->percent_g1}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                     <span class="fs-6">Kannada Group B: </span>
                                    <span class="subfont">{{$user->kannadiga_g2}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Others Group B : </span>
                                    <span class="subfont">{{$user->others_g2}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Total Group B: </span>
                                    <span class="subfont">{{$user->total_g2}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Percentage of Group B: </span>
                                    <span class="subfont">{{$user->percent_g2}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Kannada Group C: </span>
                                    <span class="subfont">{{$user->kannadiga_g3}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Others Group C: </span>
                                    <span class="subfont">{{$user->others_g3}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Total Group C : </span>
                                    <span class="subfont">{{$user->total_g3}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Percentage of Group C: </span>
                                    <span class="subfont">{{$user->percent_g3}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Kannada Group D: </span>
                                    <span class="subfont">{{$user->kannadiga_g4}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Others Group D: </span>
                                    <span class="subfont">{{$user->others_g4}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Total Group D: </span>
                                    <span class="subfont">{{$user->total_g4}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Percentage of Group D: </span>
                                    <span class="subfont">{{$user->percent_g4}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Total Kannada: </span>
                                    <span class="subfont">{{$user->total_kannadiga}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Others Total: </span>
                                    <span class="subfont">{{$user->others_total}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Total : </span>
                                    <span class="subfont">{{$user->total}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Total Percentage : </span>
                                    <span class="subfont">{{$user->percentage}}</span>
                                </div>
                               
                               
                            </div>

                        </div>

                    </div>

                </div>


@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{asset('admin/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('admin/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('admin/assets/js/sidebar-menu.js')}}"></script>
    <script src="{{asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <script src="{{asset('admin/assets/js/chart/apex-chart/chart-custom.js')}}"></script>
<script>
        $(document).ready(function() {
            // Show loader on form submission
            // $("form").on("submit", function() {
            //     $("#loader").fadeIn(); // Show loader
            // });

            // Hide loader and success message after 3 seconds
            setTimeout(function() {
                $(".alert-success").fadeOut("slow");
                $("#loader").fadeOut(); // Hide loader
            }, 1000);
        });
    </script>
  
   
  


@endsection