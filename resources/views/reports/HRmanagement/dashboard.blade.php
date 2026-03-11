@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    .card1 {
      box-shadow: 0px 4px 30px #86869b6e;
    }

    .card1:hover {
      box-shadow: 0px 4px 30px #86869b6e;
    }
    .whitespace {
    white-space: nowrap;
}

table.dataTable thead>tr>th.sorting:before {
    bottom: 50% !important;
}

table.dataTable thead>tr>th.sorting_asc:before {
    bottom: 50% !important;
}
  </style>
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- jQuery and DataTables JS -->
  
@endsection
@section('content')

<!-- <div id="loader"
            style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.8); z-index:9999; display:flex; justify-content:center; align-items:center;">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div> -->


<div class="container-fluid">
          <div class="page-title">
            <div class="row">
              <div class="col-12 col-sm-6">
                <!-- <h3>MSME Report</h3> -->
              </div>
              <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"> <a class="home-item" href="index.html"><i data-feather="home"></i></a>
                  </li>
                 
                  <li class="breadcrumb-item active"> Employees Details</li>
                </ol>
              </div>
            </div>
          </div>
          <h3 class="text-center m-3">
  Employees Report  
  </h3>




          <div class="card">
            <div class="card-body d-flex flex-column gap-4">
            <h3 class="text-center" class="text-dark" id="selectedDistrictText"></h3>
                <div class="d-flex flex-column align-items-end">
                    <div>
                    @if(Auth::check() && Auth::user()->isSuperadmin())

                   
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalCenter">Excel Import</button>
                    @endif

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenter" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form id="excelUploadForm" action="{{ route('admin.employees.import') }}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf 
                            <div class="modal-body">


                                <div class="mb-3">
                                <label for="formFile" class="form-label">Excel Import</label>
                                <input class="form-control" type="file" id="formFile" name="file" accept=".xls, .xlsx" required>
                                <div class="invalid-feedback">
                                    Please upload a valid Excel file (.xls or .xlsx).
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-success" type="submit">Import Excel</button>
                            </div>
                            </form>

                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div>




                <!----filtering data----->


                <div class="col-md-4 col-12">
                          <div class="mb-3">
                            <label class="col-form-label" for="filterDistrict">Districts</label>
                            <select class="form-select" id="filterDistrict">
                                <option value="">Select Districts</option>
                            </select>
                          </div>
                      
                        </div>

                <div class="d-flex row flex-wrap m-0 justify-content-center">

                


  <div class="col-md-6 col-12">
    <div>
      <h4 class="text-center">Group</h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 justify-content-center ">
          <div class="d-flex flex-row gap-3">
            <div class="d-flex flex-column text-center justify-content-center">
              <span class="fw-bold">A</span>
              <span  class="text-dark count-span"><div id="groupa"></div></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">B</span>
              <span  id="groupb" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">C</span>
              <span  id="groupc" class="count-span"></span>
            </div>
              <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">D</span>
              <span  id="groupd" class="count-span"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div>
      <h4 class="text-center">Social Category</h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-4 justify-content-center">
          <div class="d-flex flex-row gap-4 justify-content-center">
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">General</span>
              <span id="generalCount" class="count-span"></span>
            </div>
             <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">SC</span>
              <span id="scCount" class="count-span"></span>
            </div>
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>

            <div class="d-flex flex-column text-center">
              <span class="fw-bold">ST</span>
              <span id="stCount" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">3A</span>
              <span id="3A" class="count-span"></span>
            </div>
             <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">3B</span>
              <span id="3B" class="count-span"></span>
            </div>
             <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">2A</span>
              <span id="2A" class="count-span"></span>
            </div>
           
          </div>
        </div>
        <hr style="margin: 5px;">
        <div class="d-flex align-items-center gap-4 justify-content-center">
            <div class="d-flex flex-row gap-4 justify-content-center">
                  <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">2B</span>
              <span id="2B" class="count-span"></span>
            </div>
             <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">CAT-1</span>
              <span id="cat1" class="count-span"></span>
            </div>
             <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">CAT I</span>
              <span id="cati" class="count-span"></span>
            </div>
            </div>
        </div>
        
        
      </div>
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div>
      <h4 class="text-center">DR/PR</h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 justify-content-center">
          <div class="d-flex flex-row gap-3 justify-content-center">
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">DR</span>
              <span id="DR" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">PR</span>
              <span id="PR" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <!--<div style="border-left: 2px solid #ccc; height: 50px;"></div>-->
            <!--<div class="d-flex flex-column text-center">-->
            <!--  <span class="fw-bold">Manufacturing</span>-->
            <!--  <span id="manufacturingcount" class="count-span"></span>-->
            <!--</div>-->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div>
      <h4 class="text-center"> Type Ncadre / Xcadre</h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 justify-content-center">
          <div class="d-flex flex-row gap-3 justify-content-center">
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Ncadre</span>
              <span id="Ncadre" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">cadre</span>
              <span id="cadre" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Deputation-to AS</span>
              <span id="deputation" class="count-span"></span>
            </div>
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">On Suspension</span>
              <span id="suspension" class="count-span"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div>
  <div class="col-md-12 col-12">
    <div>
      <h4 class="text-center">Designation </h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 justify-content-center">
          <div class="d-flex flex-row gap-3 justify-content-center">
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Additional Director</span>
              <span id="additionaldirector" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Joint Director</span>
              <span id="jointdirector" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Deputy Director </span>
              <span id="directormsme" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Assistant Director  </span>
              <span id="assistantdirector" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
              <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Assistant Director  (statistics)</span>
              <span id="assistantdirectorstats" class="count-span"></span>
            </div>
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Accounts Officer</span>
              <span id="accountsofficer" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Superintendent  </span>
              <span id="superintendent" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Industrial Extension Officer  </span>
              <span id="deputydirector" class="count-span"></span>
            </div>
            
          </div>
        </div>
        <hr>
        <div class="d-flex align-items-center gap-3 justify-content-center">
             <div class="d-flex align-items-center gap-3 justify-content-center">
                 <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">First Division Assistant(FDA)</span>
              <span id="Society" class="count-span"></span>
            </div>
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Deputy Director (Statistics)</span>
              <span id="deputydirectorstats" class="count-span"></span>
            </div>
                  <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">SDA</span>
              <span id="cop" class="count-span"></span>
            </div>
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Instructor</span>
              <span id="Others" class="count-span"></span>
            </div>
              <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Assistant Instructor</span>
              <span id="Others" class="count-span"></span>
            </div>
              <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Stenographer</span>
              <span id="Others" class="count-span"></span>
            </div>
              <div style="border-left: 2px solid #ccc; height: 50px;"></div>
           
           </div>
        </div>
        <hr>
         <div class="d-flex align-items-center gap-3 justify-content-center">
             <div class="d-flex align-items-center gap-3 justify-content-center">
        
         <div class="d-flex flex-column text-center">
              <span class="fw-bold">Typist</span>
              <span id="Others" class="count-span"></span>
            </div>
              <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Enumerator</span>
              <span id="Others" class="count-span"></span>
            </div>
              <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">jamedar</span>
              <span id="Others" class="count-span"></span>
            </div>
              <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Group D</span>
              <span id="Others" class="count-span"></span>
            </div>
            </div>
            </div>
        
        
      </div>
    </div>
  </div>
</div>





<!-- dropdowns -->

                <form class="d-flex row mb-3" id="counts-wrapper">
                        
                      
                      
                      <div class="col-md-4 col-12">
                      <div class="mb-3">
                           <label class="col-form-label" for="filterGender">Gender</label>
                          <select class="form-select" id="filterGender">
                              <option value="">Select Gender</option>
                          </select>
                      </div>
                      </div>
                      <div class="col-md-4 col-12">
                           <div class="mb-3">
                           <label class="col-form-label" for="filterSocial">Social Category</label>
                          <select class="form-select" id="filterSocial">
                              <option value="">Select Social Category</option>
                          </select>
                      </div>
                     
                      </div>
                      <div class="col-md-4 col-12">
                          <div class="mb-3">
                           <label class="col-form-label" for="filterDRPR">DR/PR</label>
                          <select class="form-select" id="filterDRPR">
                              <option value="">Select DR/PR</option>
                          </select>
                      </div>
                     
                     

                      </div>
                      <div class="col-md-4 col-12">
                          <div class="mb-3">
                           <label class="col-form-label" for="filterDesignationType">Designation Type</label>
                            <select class="form-select" id="filterDesignationType">
                                <option value="">Select Designation Type</option>
                            </select>
                          </div>
                     
                      </div>
                      <div class="col-md-4 col-12">
                          <div class="mb-3">
                           <label class="col-form-label" for="filterGroupType">Group Type</label>
                          <select class="form-select" id="filterGroupType">
                              <option value="">Select Group Type</option>
                          </select>
                      </div>
                      
                      </div>

  <div class="col-md-4 col-12">
                          <div class="mb-3">
                           <label class="col-form-label" for="filtercadreType">Cadre Type</label>
                          <select class="form-select" id="filtercadreType">
                              <option value="">Select  Type Cadre</option>
                          </select>
                      </div>
                       </div>
<!-- date wise filter -->
                    
<!--<h6 class="text-start m-3">Date of birth</h6>-->
<!--                      <div class="col-md-4 col-12">-->
<!--                          <div class="mb-3">-->
<!--                              <label class="col-form-label" for="fromdate">From Date </label>-->
<!--                             <input class="form-control" type="date" name="fromdate" id="fromdate">-->
<!--                          </div>-->
<!--                      </div>-->

<!--                      <div class="col-md-4 col-12">-->
<!--                          <div class="mb-3">-->
<!--                              <label class="col-form-label" for="todate">To Date </label>-->
<!--                             <input class="form-control" type="date" name="todate" id="todate">-->
<!--                          </div>-->
<!--                      </div>-->
                      
                      
    <!--<h6 class="text-start m-3">Date of Joining </h6>-->
    <!-- <div class="col-md-4 col-12">-->
    <!--                      <div class="mb-3">-->
    <!--                          <label class="col-form-label" for="fromdate">From Date </label>-->
    <!--                         <input class="form-control" type="date" name="fromdate" id="fromdate">-->
    <!--                      </div>-->
    <!--                  </div>-->

    <!--                  <div class="col-md-4 col-12">-->
    <!--                      <div class="mb-3">-->
    <!--                          <label class="col-form-label" for="todate">To Date </label>-->
    <!--                         <input class="form-control" type="date" name="todate" id="todate">-->
    <!--                      </div>-->
    <!--                  </div>-->
                        <!--<h6 class="text-start m-3">Date of post held </h6>-->
     <!--<div class="col-md-4 col-12">-->
     <!--                     <div class="mb-3">-->
     <!--                         <label class="col-form-label" for="fromdate">From Date </label>-->
     <!--                        <input class="form-control" type="date" name="fromdate" id="fromdate">-->
     <!--                     </div>-->
     <!--                 </div>-->

     <!--                 <div class="col-md-4 col-12">-->
     <!--                     <div class="mb-3">-->
     <!--                         <label class="col-form-label" for="todate">To Date </label>-->
     <!--                        <input class="form-control" type="date" name="todate" id="todate">-->
     <!--                     </div>-->
     <!--                 </div>-->
     <!-- <h6 class="text-start m-3">Date of Resignation </h6>-->
     <!--<div class="col-md-4 col-12">-->
     <!--                     <div class="mb-3">-->
     <!--                         <label class="col-form-label" for="fromdate">From Date </label>-->
     <!--                        <input class="form-control" type="date" name="fromdate" id="fromdate">-->
     <!--                     </div>-->
     <!--                 </div>-->

     <!--                 <div class="col-md-4 col-12">-->
     <!--                     <div class="mb-3">-->
     <!--                         <label class="col-form-label" for="todate">To Date </label>-->
     <!--                        <input class="form-control" type="date" name="todate" id="todate">-->
     <!--                     </div>-->
     <!--                 </div>-->
                      
                      
    
                      
                      
                      
                      
                      
                </form>
                 

                <button id="exportSelected" class="btn btn-success mb-3">Export Selected</button>

<!-- dropdown ends here -->
                    <div class="table-responsive">
                    <table class="display" id="usersTable" class="table table-bordered">
                        <thead>
                        <tr>
                        <th class="whitespace d-flex flex-row gap-1 align-items-center">Select All<input type="checkbox" id="selectAll"></th> 
                            <th class="whitespace">SI No.</th>
                            <th class="whitespace">Salutation</th>
                            <th class="whitespace">Employee Name</th>
                            <th class="whitespace">Social Category</th>
                            <th class="whitespace">Sub-Category</th>
                            <th class="whitespace">District Name</th>
                              <th class="whitespace">Taluk Name</th>
                            <th class="whitespace">DR/PR</th>
                            <th class="whitespace"> Type Ncadre/Xcadre</th>
                             <th class="whitespace">working At/AS</th>
                            <th class="whitespace"> Date of birth</th>
                            <th class="whitespace">Date of joining</th>
                            <th class="whitespace">Post Held From</th>
                             <th class="whitespace">Date of Retirement</th>
                            <th class="whitespace">Designation </th>
                             <th class="whitespace">Group</th>
                             <th class="whitespace">Gender</th>
                             <th class="whitespace">Phone</th>
                             
                             <th class="whitespace">Date of Increment</th>
                             <th class="whitespace">Profile Status</th>
                             <th style="min-width:100px;">Action</th>
                               
                           
                           
                        </tr>
                        </thead>
                       
                    </table>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  let selectedRows = new Set();

// Initialize DataTable
var table = $('#usersTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route("admin.employee.data") }}',
       data: function (d) {
    d.gender = $('#filterGender').val();
    d.district = $('#filterDistrict').val();
    d.social = $('#filterSocial').val();
    d.drpr = $('#filterDRPR').val();
    d.designationtype = $('#filterDesignationType').val();
    d.grouptype = $('#filterGroupType').val();
    d.cadre_type = $('#filtercadreType').val();
    d.fromdate = $('#fromdate').val();
    d.todate = $('#todate').val();
},
        type: 'GET',
        dataType: 'json',
        beforeSend: function() {
            $('#loader').show();
        },
        complete: function() {
            $('#loader').hide();
            selectedRows.clear();
            $('#selectAll').prop('checked', false);
            $('.rowSelect').each(function () {
              $(this).prop('checked', false);
            });
        }
    },
    pageLength: 10,
    lengthMenu: [[10, 25, 50, 100, 500, 1000], [10, 25, 50, 100, 500, 1000]],
   columns: [
    {
        data: 'id',
        render: function (data) {
            return `<input type="checkbox" class="rowSelect" value="${data}">`;
        },
        orderable: false,
        searchable: false
    },
   { data: 'id' },                // SI No.
     { data: 'salutation' },  
  { data: 'emp_name' },          // Employee Name
  { data: 'category' }, 
    { data: 'sub_category' },          // Social Category
  { data: 'district' }, 
   { data: 'taluk' },           // District Name
  { data: 'DR_PR' },             // DR/PR
  { data: 'cadre_type' }, 
   { data: 'working_at' },        // Type Ncadre/Xcadre
  { data: 'dob' },               // Date of Birth
  { data: 'doj' },  
  {data:'post_held_from'},             // Date of Joining
  { data: 'dor' },               // Date of Retirement
  { data: 'designation' },       // Designation
  { data: 'group' },  
  { data: 'gender' },  
  { data: 'phone' },  

  { data: 'date_of_increment' }, 
  { 
    data: 'is_verified',
    render: function (data) {
      if(data == 0) return '<span class="badge badge-danger">Not Verified</span>';
      if(data == 1) return '<span class="badge badge-success">Verified</span>';
      else return '<span class="badge badge-warning">Edited</span>';
    }
   }, 
  {
    data: 'id',
    render: function (data) {
        return `<a href="{{url('employees/${data}')}}" class="btn btn-sm btn-info px-1 mr-2"><i class="fa-solid fa-eye fs-6"></i></a> <a href="{{url('employees/${data}/edit')}}" class="btn btn-sm btn-success px-1"><i class="fa-solid fa-pencil fs-6"></i></a>`;
    },
    orderable: false,
    searchable: false
    }, 
]
});


table.on('draw', function () {
    $('.rowSelect').each(function () {
        let rowId = $(this).val().toString();
        $(this).prop('checked', selectedRows.has(rowId));
    });

    
    const allVisibleChecked = $('.rowSelect').length &&
                              $('.rowSelect:checked').length === $('.rowSelect').length;
    $('#selectAll').prop('checked', allVisibleChecked);
});



$('#selectAll').on('click', function () {
    const isChecked = this.checked;

    
    let filters = {
        gender: $('#filterGender').val(),
        district: $('#filterDistrict').val(),
        social: $('#filterSocial').val(),
        drpr: $('#filterDRPR').val(),
        designationtype: $('#filterDesignationType').val(),
        grouptype: $('#filterGroupType').val(),
        cadre: $('#filtercadreType').val(),
      
        // fromdate: $('#fromdate').val(),
        // todate: $('#todate').val()
    };
    for (let key in filters) {
        if (filters[key]?.startsWith('Select')) {
            filters[key] = null;
        }
    }

    if (isChecked) {
       
        $.ajax({
            url: '{{ route("msmeusers.all_ids") }}',
            type: 'GET',
            data: filters,
            success: function (response) {
                if (Array.isArray(response.ids)) {
                  selectedRows.clear();
                    response.ids.forEach(id => selectedRows.add(id.toString()));
                    $('.rowSelect').each(function () {
                        if (selectedRows.has($(this).val().toString())) {
                            $(this).prop('checked', true);
                        }
                    });
                }
            },
            error: function () {
                alert('Failed to fetch filtered IDs');
                $('#selectAll').prop('checked', false);
            }
        });
    } else {
        // Only deselect visible rows
        $('.rowSelect').each(function () {
            selectedRows.delete($(this).val().toString());
        });
        $('.rowSelect').prop('checked', false);
    }
});


// Handle individual checkbox toggle
$('#usersTable').on('change', '.rowSelect', function () {
    const rowId = $(this).val().toString();
    if (this.checked) {
        selectedRows.add(rowId);
    } else {
        selectedRows.delete(rowId);
    }

    const allVisibleChecked = $('.rowSelect').length && $('.rowSelect:checked').length === $('.rowSelect').length;
    $('#selectAll').prop('checked', allVisibleChecked);
});

// Export selected rows
$('#exportSelected').on('click', function () {
    if (selectedRows.size === 0) {
        alert('Please select at least one row to export.');
        return;
    }

    const form = $('<form>', {
        method: 'POST',
        action: '{{ route("admin.employees.export") }}'
    });

    // Include CSRF token
    form.append($('<input>', {
        type: 'hidden',
        name: '_token',
        value: '{{ csrf_token() }}'
    }));

    // Include selected IDs in the form
    form.append($('<input>', {
        type: 'hidden',
        name: 'selected_ids',
        value: JSON.stringify(Array.from(selectedRows))
    }));

    // Include the filters applied (to ensure filtered export)
    let filters = {
        gender: $('#filterGender').val(),
        district: $('#filterDistrict').val(),
        social: $('#filterSocial').val(),
        drpr: $('#filterDRPR').val(),
        designationtype: $('#filterDesignationType').val(),
        grouptype: $('#filterGroupType').val(),
       cadre: $('#filtercadreType').val(),
        fromdate: $('#fromdate').val(),
        todate: $('#todate').val()
    };

    // Normalize filters (removing 'Select' placeholder values)
    for (let key in filters) {
        if (filters[key]?.startsWith('Select')) {
            filters[key] = null;
        }
    }

    // Send filters with selected IDs
    form.append($('<input>', {
        type: 'hidden',
        name: 'filters',
        value: JSON.stringify(filters)
    }));

    // Append and submit the form
    $('body').append(form);
    form.submit();
});

</script>








<script>
    // Pass the Laravel route URL to JS
    var countsUrl = "{{ route('admin.employee.counts') }}";

    function fetchCounts() {
        $.ajax({
            url: countsUrl,
            method: 'GET',
            data: {
                gender: $('#filterGender').val(),
                cadre: $('#filtercadreType').val(),
                district: $('#filterDistrict').val(),
                social: $('#filterSocial').val(),
                drpr: $('#filterDRPR').val(),
                designationtype: $('#filterDesignationType').val(),
                group: $('#filterGroupType').val(),
                fromdate: $('#fromdate').val(),
                todate: $('#todate').val()
            },
            success: function (data) {
                console.log("Counts response:", data);

                $('#male').text(data.genderCounts?.Male ?? 0);
                $('#female').text(data.genderCounts?.Female ?? 0);
                $('#others').text(data.genderCounts?.OTHERS ?? 0);

                $('#generalCount').text(data.socialCategoryCounts?.General ?? 0);
                $('#3B').text(data.socialCategoryCounts?.['3B'] ?? 0);
                $('#3A').text(data.socialCategoryCounts?.['3A'] ?? 0);
                $('#2B').text(data.socialCategoryCounts?.['2B'] ?? 0);
                $('#2A').text(data.socialCategoryCounts?.['2A'] ?? 0);
                $('#cat1').text(data.socialCategoryCounts?.['CAT-1'] ?? 0);
                $('#cati').text(data.socialCategoryCounts?.['Cat I'] ?? 0);
                $('#scCount').text(data.socialCategoryCounts?.SC ?? 0);
                $('#stCount').text(data.socialCategoryCounts?.ST ?? 0);

                $('#PR').text(data.drpr?.PR ?? 0);
                $('#DR').text(data.drpr?.DR ?? 0);

                $('#assistantdirectorstats').text(data.designationtype?.['Assistant Director (Statistics)'] ?? 0);
                $('#jointdirector').text(data.designationtype?.['Industrial Extension Officer'] ?? 0);
                $('#directormsme').text(data.designationtype?.['Director (MSME)'] ?? 0);
                $('#additionaldirector').text(data.designationtype?.['Additional Director'] ?? 0);
                $('#accountsofficer').text(data.designationtype?.['Accounts officer'] ?? 0);
                $('#hindu').text(data.designationtype?.['Joint Director'] ?? 0);
                $('#deputydirector').text(data.designationtype?.['Deputy Director'] ?? 0);
                $('#assistantdirector').text(data.designationtype?.['Assistant Director'] ?? 0);
                $('#deputydirectorstats').text(data.designationtype?.['Deputy Director (Statistics)'] ?? 0);
                $('#superintendent').text(data.designationtype?.Superintendent ?? 0);

                $('#groupa').text(data.grouptype?.A ?? 0);
                $('#groupb').text(data.grouptype?.B ?? 0);
                $('#groupc').text(data.grouptype?.C ?? 0);
                $('#groupd').text(data.grouptype?.D ?? 0);

                $('#Ncadre').text(data.cadre?.Ncadre ?? 0);
                $('#cadre').text(data.cadre?.Cadre ?? 0);
                $('#deputation').text(data.cadre?.['Deputation-to AS'] ?? 0);
                $('#suspension').text(data.cadre?.['On Suspension'] ?? 0);
            },
            error: function (err) {
                console.error('Error fetching counts:', err);
                alert('Fetch failed. See console for details.');
            }
        });
    }

    $(document).ready(function () {
        fetchCounts(); // Initial fetch

        // Re-fetch counts when any filter changes
        $('#filterGender, #filterDistrict, #filterSocial, #filterDRPR, #filterDesignationType, #filterGroupType, #filtercadreType, #fromdate, #todate').change(function () {
            fetchCounts();
        });
    });
</script>



<script>
    console.log("✅ Script loaded!");

    $(document).ready(function () {
        console.log("✅ jQuery is working!");

        // ✅ Initialize Select2 on all filter dropdowns
        function initializeSelect2() {
            $('#filterGender').select2({ placeholder: "Select Gender", allowClear: true });
            $('#filterDistrict').select2({ placeholder: "Select District", allowClear: true });
            $('#filterSocial').select2({ placeholder: "Select Social Category", allowClear: true });
            $('#filterDRPR').select2({ placeholder: "Select  DR/PR", allowClear: true });
            $('#filterDesignationType').select2({ placeholder: "Select Designation Type", allowClear: true });
            $('#filterGroupType').select2({ placeholder: "Select Group Type", allowClear: true });
            $('#filtercadreType').select2({ placeholder: "Select Type Cadre", allowClear: true });
        }

       
        function updateDropdowns(filters = {}) {
    console.log("Filters sent to server:", filters);

    $.ajax({
          url: '{{ route("adminfilter.employee.options") }}',
     //  url: 'integrateddata/employee/filter-options',
        method: 'GET',
        data: filters,
        success: function (response) {
            console.log("✅ Response from server:", response);

          // Gender
let genderOptions = '<option value="">Select Gender</option>';
$.each(response.gender, function (index, gender) {
    if (!gender || gender.toLowerCase() === 'gender') return;
    genderOptions += `<option value="${gender}">${gender}</option>`;
});
$('#filterGender').html(genderOptions).val(filters.gender || '');

// Social Category
let socialOptions = '<option value="">Select Social Category</option>';
$.each(response.category, function (index, social) {
    if (!social || social.toLowerCase() === 'category') return;
    socialOptions += `<option value="${social}">${social}</option>`;
});
$('#filterSocial').html(socialOptions).val(filters.social || '');

// District
let districtOptions = '<option value="">Select District</option>';
$.each(response.district, function (index, district) {
    if (!district || district.toLowerCase() === 'district') return;
    districtOptions += `<option value="${district}">${district}</option>`;
});
$('#filterDistrict').html(districtOptions).val(filters.district || '');

// DR/PR
let majorOptions = '<option value="">Select DR/PR</option>';
$.each(response.DR_PR, function (index, activity) {
    if (!activity || activity.toLowerCase() === 'dr/pr') return;
    majorOptions += `<option value="${activity}">${activity}</option>`;
});
$('#filterDRPR').html(majorOptions).val(filters.drpr || '');

// Designation Type
let orgOptions = '<option value="">Select Designation Type</option>';
$.each(response.designation, function (index, org) {
    if (!org || org.toLowerCase() === 'designation') return;
    orgOptions += `<option value="${org}">${org}</option>`;
});
$('#filterDesignationType').html(orgOptions).val(filters.designationtype || '');

// Group Type
let entOptions = '<option value="">Select Group Type</option>';
$.each(response.group, function (index, ent) {
    if (!ent || ent.toLowerCase() === 'group') return;
    entOptions += `<option value="${ent}">${ent}</option>`;
});
$('#filterGroupType').html(entOptions).val(filters.group || '');

// Cadre Type
let cadreOptions = '<option value="">Select Cadre Type</option>';
$.each(response.cadre_type, function (index, cadre) {
    if (!cadre || cadre.toLowerCase() === 'cadre_type') return;
    cadreOptions += `<option value="${cadre}">${cadre}</option>`;
});
$('#filtercadreType').html(cadreOptions).val(filters.cadre || '');


            // ✅ Re-initialize Select2 on updated dropdowns
            initializeSelect2();
        },
        error: function (xhr, status, error) {
            console.error("❌ AJAX error:", error);
            alert('Failed to load filter options.');
        }
    });
}
        function getSelectedFilters() {
            return {
                gender: $('#filterGender').val(),
                district: $('#filterDistrict').val(),
                social: $('#filterSocial').val(),
                drpr: $('#filterDRPR').val(),
                designationtype: $('#filterDesignationType').val(),
                group: $('#filterGroupType').val(),
              cadre: $('#filtercadreType').val(),
                fromdate: $('#fromdate').val(),
                todate: $('#todate').val()
            };
        }

       
        updateDropdowns();

        function updateDistrictDisplay(district) {
    $('#selectedDistrictText').text(district ? `Selected District: ${district}` : 'Selected District: None');
}


        // ✅ Trigger on dropdown change
        $('#filterGender, #filterDistrict, #filterSocial, #filterDRPR, #filterDesignationType, #filterGroupType,#filtercadreType,#fromdate, #todate').on('change', function () {
            const filters = getSelectedFilters();
            updateDistrictDisplay(filters.district);
            updateDropdowns(filters); // refresh dropdowns
            $('#usersTable').DataTable().ajax.reload(); // reload DataTable
        });
    });
</script>

<script>
    $(document).ready(function () {
    // ✅ Show loader for all AJAX calls
    $(document).ajaxStart(function () {
        $("#loader").fadeIn();
    }).ajaxStop(function () {
        $("#loader").fadeOut();
    });

  
    $(document).on('click', '.buttons-excel, .buttons-csv, .buttons-pdf, .buttons-print', function () {
        $("#loader").fadeIn();

       
        setTimeout(function () {
            $("#loader").fadeOut();
        }, 1000); // You can tune this based on expected duration
    });

    // ✅ Show loader for link clicks that navigate
    $(document).on("click", "a", function (e) {
        const href = $(this).attr("href");
        if (href && href !== "#" && !href.startsWith("javascript")) {
            $("#loader").fadeIn();
        }
    });

    // ✅ Hide loader after page is fully loaded
    window.addEventListener('load', function () {
        $("#loader").fadeOut();
    });

    // ✅ Auto-hide success messages
    setTimeout(function () {
        $(".alert-success").fadeOut("slow");
    }, 3000);
});

</script>

@endsection