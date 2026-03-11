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
  </style>
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- jQuery and DataTables JS -->
  
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
                <!-- <h3>MSME Report</h3> -->
              </div>
              <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"> <a class="home-item" href="index.html"><i data-feather="home"></i></a>
                  </li>
                  <li class="breadcrumb-item active"> Udyog Aadhaar Memorandum Report</li>
                </ol>
              </div>
            </div>
          </div>
          <h3 class="text-center m-3">
    Karnataka State Udyog Aadhaar Memorandum Report  ({{ $fromDateFormatted }} - {{ $toDateFormatted }})
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
                            <form id="excelUploadForm" action="{{ route('admin.exelimport.import') }}" method="POST" enctype="multipart/form-data" novalidate>
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
      <h4 class="text-center">Gender</h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 justify-content-center ">
          <div class="d-flex flex-row gap-3">
            <div class="d-flex flex-column text-center justify-content-center">
              <span class="fw-bold">Male</span>
              <span  class="text-dark count-span"><div id="maleCount"></div></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Female</span>
              <span  id="femaleCount" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Others</span>
              <span  id="othersCount" class="count-span"></span>
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
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">OBC</span>
              <span id="obcCount" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
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
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div>
      <h4 class="text-center">Major Activity</h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 justify-content-center">
          <div class="d-flex flex-row gap-3 justify-content-center">
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Services</span>
              <span id="Servicecount" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Trading</span>
              <span id="tradingcount" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Manufacturing</span>
              <span id="manufacturingcount" class="count-span"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div>
      <h4 class="text-center">Enterprise Type</h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 justify-content-center">
          <div class="d-flex flex-row gap-3 justify-content-center">
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Micro</span>
              <span id="micro" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Small</span>
              <span id="small" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Medium</span>
              <span id="medium" class="count-span"></span>
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
      <h4 class="text-center">Organizations Type</h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 justify-content-center">
          <div class="d-flex flex-row gap-3 justify-content-center">
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Proprietary</span>
              <span id="Proprietary" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Partnership</span>
              <span id="Partnership" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Private Limited Company</span>
              <span id="vtlmtco" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Limited Liability Partnership</span>
              <span id="lmtlbtpart" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Trust</span>
              <span id="trust" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Hindu Undivided Family</span>
              <span id="hindu" class="count-span"></span>
            </div>
            <!-- Vertical Line -->
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Self Help Group</span>
              <span id="self" class="count-span"></span>
            </div>
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Society</span>
              <span id="Society" class="count-span"></span>
            </div>
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Co-Operative</span>
              <span id="cop" class="count-span"></span>
            </div>
            <div style="border-left: 2px solid #ccc; height: 50px;"></div>
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Others</span>
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
                           <label class="col-form-label" for="filterMajoractivity">Major Activity</label>
                          <select class="form-select" id="filterMajoractivity">
                              <option value="">Select Major Activity</option>
                          </select>
                      </div>
                     
                     

                      </div>
                      <div class="col-md-4 col-12">
                          <div class="mb-3">
                           <label class="col-form-label" for="filterOrganizeType">Organizations Type</label>
                            <select class="form-select" id="filterOrganizeType">
                                <option value="">Select Organizations Type</option>
                            </select>
                          </div>
                     
                      </div>
                      <div class="col-md-4 col-12">
                          <div class="mb-3">
                           <label class="col-form-label" for="filterEnterpriseType">Enterprise Type</label>
                          <select class="form-select" id="filterEnterpriseType">
                              <option value="">Select Enterprise Type</option>
                          </select>
                      </div>
                      
                      </div>



                      <div class="col-md-4 col-12">
                          <div class="mb-3">
                              <label class="col-form-label" for="filterpincode">Pincode </label>
                              <select class="form-select" id="filterpincode">
                                  <option value="">Select Pincode</option>
                              </select>
                          </div>
                      </div>

                      <div class="col-md-4 col-12">
                          <div class="mb-3">
                              <label class="col-form-label" for="fromdate">From Date </label>
                             <input class="form-control" type="date" name="fromdate" id="fromdate">
                          </div>
                      </div>

                      <div class="col-md-4 col-12">
                          <div class="mb-3">
                              <label class="col-form-label" for="todate">To Date </label>
                             <input class="form-control" type="date" name="todate" id="todate">
                          </div>
                      </div>
                </form>
                 

                <button id="exportSelected" class="btn btn-success mb-3">Export Selected</button>

<!-- dropdown ends here -->
                    <div class="table-responsive">
                    <table class="display" id="usersTable" class="table table-bordered">
                        <thead>
                        <tr>
                        <th>Select All<input type="checkbox" id="selectAll"></th> 
                            <th>SI No.</th>
                            <th>Udyog Aadhar No</th>
                            <th>Social Category</th>
                            <th>District Name</th>
                            <th>Major Activity</th>
                            <th>Organization Type</th>
                            <th>Enterprise Type</th>
                            <th>Pincode</th>
                            <th>Create date</th>
                            <th>View</th>
                            <!-- <th>Update</th> -->
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
<!--<script>-->
<!--    $('#selectAll').on('click', function () {-->
<!--        $('.rowSelect').prop('checked', this.checked);-->
<!--    });-->
<!--    $('#exportSelected').on('click', function () {-->
<!--        var selected = [];-->

<!--        $('.rowSelect:checked').each(function () {-->
<!--            selected.push($(this).val());-->
<!--        });-->

<!--        if (selected.length > 0) {-->
           
<!--            const form = $('<form>', {-->
<!--                method: 'POST',-->
<!--                action: '{{ route("adminexport.selected") }}'-->
<!--            });-->

         
<!--            form.append($('<input>', {-->
<!--                type: 'hidden',-->
<!--                name: '_token',-->
<!--                value: '{{ csrf_token() }}'-->
<!--            }));-->

          
<!--            selected.forEach(function (id) {-->
<!--                form.append($('<input>', {-->
<!--                    type: 'hidden',-->
<!--                    name: 'selected_ids[]',-->
<!--                    value: id-->
<!--                }));-->
<!--            });-->

           
<!--            $('body').append(form);-->
<!--            form.submit();-->
<!--        } else {-->
<!--            alert('Please select at least one row to export.');-->
<!--        }-->
<!--    });-->
<!--</script>-->

<!--    <script>-->
<!--$(document).ready(function() {-->
<!--    var table = $('#usersTable').DataTable({-->
<!--        processing: true,-->
<!--        serverSide: true,-->
<!--        ajax: {-->
<!--            url: '{{ route('adminusers.data') }}',-->
<!--            data: function(d) {-->
<!--                    let gender = $('#filterGender').val();-->
<!--                    let district = $('#filterDistrict').val();-->
<!--                    let social = $('#filterSocial').val();-->
<!--                    let majoractivity = $('#filterMajoractivity').val();-->
<!--                    let orgType = $('#filterOrganizeType').val();-->
<!--                    let enterprise = $('#filterEnterpriseType').val();-->
<!--                    let pincode = $('#filterpincode').val();-->
<!--                    let fromdate = $('#fromdate').val();-->
<!--                    let todate = $('#todate').val();-->

<!--                    d.gender = gender && gender !== 'Select Gender' ? gender : null;-->
<!--                    d.district = district && district !== 'Select District' ? district : null;-->
<!--                    d.social = social && social !== 'Select Social Category' ? social : null;-->
<!--                    d.majoractivity = majoractivity && majoractivity !== 'Select Major Activity' ? majoractivity : null;-->
<!--                    d.organizationtype = orgType && orgType !== 'Select Organizations Type' ? orgType : null;-->
<!--                    d.enterprisetype = enterprise && enterprise !== 'Select Enterprise Type' ? enterprise : null;-->
<!--                    d.pincodetype = pincode && pincode !== 'Select Pincode' ? pincode : null;-->
<!--                    d.fromdate = fromdate ? fromdate : null;-->
<!--                    d.todate = todate ? todate : null;-->
<!--                }-->

<!--        },-->
<!--        pageLength: 10, -->
<!--        lengthMenu: [ [10, 25, 50, 100, 500, 1000], [10, 25, 50, 100, 500, 1000] ],-->
<!--        columns: [-->
<!--          {-->
<!--        data: 'id',-->
<!--        render: function(data, type, row) {-->
<!--            return `<input type="checkbox" class="rowSelect" value="${data}">`;-->
<!--        },-->
<!--        orderable: false,-->
<!--        searchable: false-->
<!--    },-->
<!--            { data: 'id' },-->
<!--            { data: 'Gender' },-->
<!--            { data: 'SocialCategory' },-->
<!--            { data: 'DISTRICT_NAME' },-->
<!--            { data: 'MajorActivity' },-->
<!--            { data: 'OrganisationType' },-->
<!--            { data: 'EnterpriseType' },-->
<!--            { data: 'PINCode' },-->
<!--            { data: 'CreateDate' },-->
    
<!--     {-->
<!--        data: 'id',-->
<!--        name: 'view',-->
<!--        orderable: false,-->
<!--        searchable: false,-->
<!--        render: function(data, type, row, meta) {-->
<!--            return `<a href="/integrateddata/users/view/${data}" class="btn btn-sm btn-primary">View</a>`;-->
<!--        }-->
<!--    }-->
     <!--{-->
     <!--   data: 'id',-->
    <!--//     name: 'edit',-->
    <!--//     orderable: false,-->
    <!--//     searchable: false,-->
    <!--//     render: function(data, type, row, meta) {-->
    <!--//         return `<a href="/users/edit/${data}" class="btn btn-sm btn-primary">Update</a>`;-->
    <!--//     }-->
  <!--// }-->
    
           
<!--        ]-->
<!--    });-->

   
<!--    $('#filterGender, #filterDistrict,#filterSocial,#filterMajoractivity,#filterOrganizeType,#filterEnterpriseType,#filterpincode,#fromdate,#todate').change(function() {-->
<!--        table.ajax.reload();-->
<!--        fetchCounts();-->
<!--    });-->

<!--});-->

<!--</script>-->


<script>
  let selectedRows = new Set();

// Initialize DataTable
var table = $('#usersTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route("adminusers.data") }}',
        data: function (d) {
            let gender = $('#filterGender').val();
            let district = $('#filterDistrict').val();
            let social = $('#filterSocial').val();
            let majoractivity = $('#filterMajoractivity').val();
            let orgType = $('#filterOrganizeType').val();
            let enterprise = $('#filterEnterpriseType').val();
            let pincode = $('#filterpincode').val();
            let fromdate = $('#fromdate').val();
            let todate = $('#todate').val();

            d.gender = gender && gender !== 'Select Gender' ? gender : null;
            d.district = district && district !== 'Select District' ? district : null;
            d.social = social && social !== 'Select Social Category' ? social : null;
            d.majoractivity = majoractivity && majoractivity !== 'Select Major Activity' ? majoractivity : null;
            d.organizationtype = orgType && orgType !== 'Select Organizations Type' ? orgType : null;
            d.enterprisetype = enterprise && enterprise !== 'Select Enterprise Type' ? enterprise : null;
            d.pincodetype = pincode && pincode !== 'Select Pincode' ? pincode : null;
            d.fromdate = fromdate || null;
            d.todate = todate || null;
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
        { data: 'id' },
        { data: 'Gender' },
        { data: 'SocialCategory' },
        { data: 'DISTRICT_NAME' },
        { data: 'MajorActivity' },
        { data: 'OrganisationType' },
        { data: 'EnterpriseType' },
        { data: 'PINCode' },
        { data: 'CreateDate' },
        {
            data: 'id',
            render: function (data) {
                return `<a href="/integrateddata/users/view/${data}" class="btn btn-sm btn-primary">View</a>`;
            },
            orderable: false,
            searchable: false
        }
    ]
});

// On table draw, reflect checkbox state
// Update checkbox state after table draw
table.on('draw', function () {
    $('.rowSelect').each(function () {
        let rowId = $(this).val().toString();
        $(this).prop('checked', selectedRows.has(rowId));
    });

    // Determine if all visible rows are selected
    const allVisibleChecked = $('.rowSelect').length &&
                              $('.rowSelect:checked').length === $('.rowSelect').length;
    $('#selectAll').prop('checked', allVisibleChecked);
});


// Handle select all checkbox
$('#selectAll').on('click', function () {
    const isChecked = this.checked;

    // Collect and normalize filters
    let filters = {
        gender: $('#filterGender').val(),
        district: $('#filterDistrict').val(),
        social: $('#filterSocial').val(),
        majoractivity: $('#filterMajoractivity').val(),
        organizationtype: $('#filterOrganizeType').val(),
        enterprisetype: $('#filterEnterpriseType').val(),
        pincodetype: $('#filterpincode').val(),
        fromdate: $('#fromdate').val(),
        todate: $('#todate').val()
    };
    for (let key in filters) {
        if (filters[key]?.startsWith('Select')) {
            filters[key] = null;
        }
    }

    if (isChecked) {
        // Fetch all filtered IDs from the server
        $.ajax({
            url: '{{ route("msmeusers.all_ids") }}',
            type: 'GET',
            data: filters,
            success: function (response) {
                if (Array.isArray(response.ids)) {
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
        action: '{{ route("adminexport.selected") }}'
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
        majoractivity: $('#filterMajoractivity').val(),
        organizationtype: $('#filterOrganizeType').val(),
        enterprisetype: $('#filterEnterpriseType').val(),
        pincodetype: $('#filterpincode').val(),
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
    function fetchCounts() {
        $.ajax({
            url: '{{ route('adminusers.counts') }}',
            method: 'GET',
            data: {
                gender: $('#filterGender').val(),
                district: $('#filterDistrict').val(),
                social: $('#filterSocial').val(),
                majoractivity: $('#filterMajoractivity').val(),
                organizationtype: $('#filterOrganizeType').val(),
                enterprisetype: $('#filterEnterpriseType').val(),
                pincodetype: $('#filterpincode').val(),
                fromdate: $('#fromdate').val(),
                todate: $('#todate').val()
             
            },
            success: function (data) {
                console.log("Counts response:", data);

                $('#maleCount').text(data.genderCounts?.Male ?? 0);
                $('#femaleCount').text(data.genderCounts?.Female ?? 0);
                $('#othersCount').text(data.genderCounts?.OTHERS ?? 0);

                $('#generalCount').text(data.socialCategoryCounts?.General ?? 0);
                $('#obcCount').text(data.socialCategoryCounts?.OBC ?? 0);
                $('#scCount').text(data.socialCategoryCounts?.SC ?? 0);
                $('#stCount').text(data.socialCategoryCounts?.ST ?? 0);

                $('#Servicecount').text(data.majoractivity?.Services ?? 0);
                $('#tradingcount').text(data.majoractivity?.Trading ?? 0);
                $('#manufacturingcount').text(data.majoractivity?.Manufacturing ?? 0);

             

                $('#Proprietary').text(data.organizationtypes?.Proprietary ?? 0);
                $('#Partnership').text(data.organizationtypes?.Partnership ?? 0);
                $('#vtlmtco').text(data.organizationtypes?.['Private Limited Company'] ?? 0);
                $('#lmtlbtpart').text(data.organizationtypes?.['Limited Liability Partnership'] ?? 0);
                $('#trust').text(data.organizationtypes?.Trust ?? 0);
                $('#hindu').text(data.organizationtypes?.['Hindu Undivided Family'] ?? 0);
                $('#self').text(data.organizationtypes?.['Self Help Group'] ?? 0);
                $('#Society').text(data.organizationtypes?.Society ?? 0);
                $('#cop').text(data.organizationtypes?.['Co-Operative'] ?? 0);
                $('#Others').text(data.organizationtypes?.Others ?? 0);

              
                $('#micro').text(data.enterprisetype?.Micro ?? 0);
                $('#small').text(data.enterprisetype?.Small ?? 0);
                $('#medium').text(data.enterprisetype?.Medium ?? 0);


            },
            error: function (err) {
                console.error('Error fetching counts:', err);
                alert('Fetch failed. See console for details.');
            }
        });
    }

    // This should be placed AFTER fetchCounts is defined
    $(document).ready(function () {
        fetchCounts(); // Initial fetch

        // Re-fetch counts on filter change
        $('#filterGender, #filterDistrict, #filterSocial, #filterMajoractivity, #filterOrganizeType, #filterEnterpriseType,#filterpincode,#fromdate,#todate').change(function () {
            fetchCounts();
        });
    });
</script>
<!-- <script>
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
    </script> -->

<!-- <script>
    console.log("✅ Script loaded!");

    $(document).ready(function () {
        console.log("✅ jQuery is working!");

        
        // ✅ Function to update the dropdown options
        function updateDropdowns(filters = {}) {
            console.log("Filters sent to server:", filters);

            $.ajax({
                url: '/integrateddata/filter-options',
                method: 'GET',
                data: filters,
                success: function (response) {
                    console.log("✅ Response from server:", response);

                    // Gender
                    let genderOptions = '<option value="">Select Gender</option>';
                    $.each(response.genders, function (index, gender) {
                        genderOptions += `<option value="${gender}">${gender}</option>`;
                    });
                    $('#filterGender').html(genderOptions).val(filters.gender || '');

                    // District
                    let districtOptions = '<option value="">Select District</option>';
                    $.each(response.districts, function (index, district) {
                        districtOptions += `<option value="${district}">${district}</option>`;
                    });
                    $('#filterDistrict').html(districtOptions).val(filters.district || '');

                    // Social Category
                    let socialOptions = '<option value="">Select Social Category</option>';
                    $.each(response.socialCategories, function (index, social) {
                        socialOptions += `<option value="${social}">${social}</option>`;
                    });
                    $('#filterSocial').html(socialOptions).val(filters.social || '');

                    // Major Activity
                    let majorOptions = '<option value="">Select Major Activity</option>';
                    $.each(response.majorActivities, function (index, activity) {
                        majorOptions += `<option value="${activity}">${activity}</option>`;
                    });
                    $('#filterMajoractivity').html(majorOptions).val(filters.majoractivity || '');

                    // Organization Type
                    let orgOptions = '<option value="">Select Organization Type</option>';
                    $.each(response.organizationTypes, function (index, org) {
                        orgOptions += `<option value="${org}">${org}</option>`;
                    });
                    $('#filterOrganizeType').html(orgOptions).val(filters.organizationtype || '');

                    // Enterprise Type
                    let entOptions = '<option value="">Select Enterprise Type</option>';
                    $.each(response.enterpriseTypes, function (index, ent) {
                        entOptions += `<option value="${ent}">${ent}</option>`;
                    });
                    $('#filterEnterpriseType').html(entOptions).val(filters.enterprisetype || '');

                    // Pincode
                    let pinOptions = '<option value="">Select Pincode</option>';
                    $.each(response.pincodes, function (index, pin) {
                        pinOptions += `<option value="${pin}">${pin}</option>`;
                    });
                    $('#filterpincode').html(pinOptions).val(filters.pincodetype || '');
                },
                error: function (xhr, status, error) {
                    console.error("❌ AJAX error:", error);
                }
            });
        }

        // ✅ Collect filter values
        function getSelectedFilters() {
            return {
                gender: $('#filterGender').val(),
                district: $('#filterDistrict').val(),
                social: $('#filterSocial').val(),
                majoractivity: $('#filterMajoractivity').val(),
                organizationtype: $('#filterOrganizeType').val(),
                enterprisetype: $('#filterEnterpriseType').val(),
                pincodetype: $('#filterpincode').val()
            };
        }

        // ✅ Load dropdowns on page load
        updateDropdowns();

        // ✅ Update dropdowns and reload DataTable on filter change
        $('#filterGender, #filterDistrict, #filterSocial, #filterMajoractivity, #filterOrganizeType, #filterEnterpriseType, #filterpincode').on('change', function () {
            const filters = getSelectedFilters();
            updateDropdowns(filters); // refresh dropdowns based on current selections
            $('#usersTable').DataTable().ajax.reload(); // refresh DataTable
        });
    });
</script> -->

<script>
    console.log("✅ Script loaded!");

    $(document).ready(function () {
        console.log("✅ jQuery is working!");

        // ✅ Initialize Select2 on all filter dropdowns
        function initializeSelect2() {
            $('#filterGender').select2({ placeholder: "Select Gender", allowClear: true });
            $('#filterDistrict').select2({ placeholder: "Select District", allowClear: true });
            $('#filterSocial').select2({ placeholder: "Select Social Category", allowClear: true });
            $('#filterMajoractivity').select2({ placeholder: "Select Major Activity", allowClear: true });
            $('#filterOrganizeType').select2({ placeholder: "Select Organization Type", allowClear: true });
            $('#filterEnterpriseType').select2({ placeholder: "Select Enterprise Type", allowClear: true });
            $('#filterpincode').select2({ placeholder: "Select Pincode", allowClear: true });
        }

        // ✅ Function to update the dropdown options
        function updateDropdowns(filters = {}) {
            console.log("Filters sent to server:", filters);

            $.ajax({
                url: '/integrateddata/filter-options',
                method: 'GET',
                data: filters,
                success: function (response) {
                    console.log("✅ Response from server:", response);
                    initializeSelect2();
                    // Gender
                    let genderOptions = '<option value="">Select Gender</option>';
                    $.each(response.genders, function (index, gender) {
                        genderOptions += `<option value="${gender}">${gender}</option>`;
                    });
                   $('#filterGender').html(genderOptions).val(filters.gender || '');
               

                    // District
                    let districtOptions = '<option value="">Select District</option>';
                    $.each(response.districts, function (index, district) {
                        districtOptions += `<option value="${district}">${district}</option>`;
                    });
                   $('#filterDistrict').html(districtOptions).val(filters.district || '');
                 

                    // Social Category
                    let socialOptions = '<option value="">Select Social Category</option>';
                    $.each(response.socialCategories, function (index, social) {
                        socialOptions += `<option value="${social}">${social}</option>`;
                    });
                    $('#filterSocial').html(socialOptions).val(filters.social || '');
                 

                    // Major Activity
                    let majorOptions = '<option value="">Select Major Activity</option>';
                    $.each(response.majorActivities, function (index, activity) {
                        majorOptions += `<option value="${activity}">${activity}</option>`;
                    });
                    $('#filterMajoractivity').html(majorOptions).val(filters.majoractivity || '');
                

                    // Organization Type
                    let orgOptions = '<option value="">Select Organization Type</option>';
                    $.each(response.organizationTypes, function (index, org) {
                        orgOptions += `<option value="${org}">${org}</option>`;
                    });
                    $('#filterOrganizeType').html(orgOptions).val(filters.organizationtype || '');
                 
                    // Enterprise Type
                    let entOptions = '<option value="">Select Enterprise Type</option>';
                    $.each(response.enterpriseTypes, function (index, ent) {
                        entOptions += `<option value="${ent}">${ent}</option>`;
                    });
                    $('#filterEnterpriseType').html(entOptions).val(filters.enterprisetype || '');
                 

                    // Pincode
                    let pinOptions = '<option value="">Select Pincode</option>';
                    $.each(response.pincodes, function (index, pin) {
                        pinOptions += `<option value="${pin}">${pin}</option>`;
                    });
                    $('#filterpincode').html(pinOptions).val(filters.pincodetype || '');
                 


                    // ✅ Re-initialize Select2 on updated dropdowns
                  
                },
                error: function (xhr, status, error) {
                    console.error("❌ AJAX error:", error);
                }
            });
        }

        // ✅ Collect filter values into an object
        function getSelectedFilters() {
            return {
                gender: $('#filterGender').val(),
                district: $('#filterDistrict').val(),
                social: $('#filterSocial').val(),
                majoractivity: $('#filterMajoractivity').val(),
                organizationtype: $('#filterOrganizeType').val(),
                enterprisetype: $('#filterEnterpriseType').val(),
                pincodetype: $('#filterpincode').val(),
                fromdate: $('#fromdate').val(),
                todate: $('#todate').val()
            };
        }

        // ✅ Initial load
        updateDropdowns();

        function updateDistrictDisplay(district) {
    $('#selectedDistrictText').text(district ? `Selected District: ${district}` : 'Selected District: None');
}


        // ✅ Trigger on dropdown change
        $('#filterGender, #filterDistrict, #filterSocial, #filterMajoractivity, #filterOrganizeType, #filterEnterpriseType, #filterpincode,#fromdate, #todate').on('change', function () {
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