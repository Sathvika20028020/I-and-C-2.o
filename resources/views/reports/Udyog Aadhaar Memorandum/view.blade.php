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

<div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3>View Report</h3>
                            </div>
                            <div class="col-12 col-sm-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"> <a class="home-item" href="index.html"><i
                                                data-feather="home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"> Dashboard</li>
                                    <li class="breadcrumb-item active"> View Report</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                     <a href="{{ url()->previous() }}" class=" m-3 btn btn-primary">Back</a>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">UdyogAadhar No: </span>
                                    <span class="subfont">{{$user->UdyogAadharNo}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Enterprise Name: </span>
                                    <span class="subfont">{{$user->EnterpriseName}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Address: </span>
                                    <span class="subfont">{{$user->Address}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">PINCode: </span>
                                    <span class="subfont">{{$user->PINCode}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Total Emp: </span>
                                    <span class="subfont">{{$user->TotalEmp}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Owner Name: </span>
                                    <span class="subfont">{{$user->OwnerName}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Mobile No: </span>
                                    <span class="subfont">{{$user->MobileNo}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Email Id: </span>
                                    <span class="subfont">{{$user->EmailId}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Gender: </span>
                                    <span class="subfont">{{$user->Gender}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Social Category: </span>
                                    <span class="subfont">{{$user->SocialCategory}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Major Activity: </span>
                                    <span class="subfont">{{$user->MajorActivity}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Dic Name: </span>
                                    <span class="subfont">{{$user->Dic_Name}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Incorporation Date: </span>
                                    <span class="subfont">{{$user->IncorporationDate}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Commmence Date: </span>
                                    <span class="subfont">{{$user->CommmenceDate}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Create Date: </span>
                                    <span class="subfont">{{$user->CreateDate}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">State: </span>
                                    <span class="subfont">{{$user->State}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">District: </span>
                                    <span class="subfont">{{$user->District}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">State name: </span>
                                    <span class="subfont">{{$user->state_name}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">District Name: </span>
                                    <span class="subfont">{{$user->DISTRICT_NAME}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Organisation Type: </span>
                                    <span class="subfont">{{$user->OrganisationType}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Previous EMType: </span>
                                    <span class="subfont">{{$user->PreviousEMType}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Enterprise Type: </span>
                                    <span class="subfont">{{$user->EnterpriseType}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Activity Detail : </span>
                                    <span class="subfont">{{$user->ActivityDetail}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6"> Investment Cost : </span>
                                    <span class="subfont">{{$user->InvestmentCost}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6"> Net Turnover: </span>
                                    <span class="subfont">{{$user->NetTurnover}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6"> CreateDate1: </span>
                                    <span class="subfont">{{$user->CreateDate1}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6"> Latitude: </span>
                                    <span class="subfont">{{$user->Latitude}}</span>
                                </div>
                                <div class="d-flex flex-row gap-2 fontsize">
                                    <span class="fs-6">Longitude : </span>
                                    <span class="subfont">{{$user->Longitude}}</span>
                                </div>
                               
                            </div>

                        </div>

                    </div>

                </div>




@endsection
@section('script')
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
            }, 4000);
        });
    </script>


@endsection