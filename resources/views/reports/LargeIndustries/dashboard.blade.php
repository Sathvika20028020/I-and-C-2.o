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
                  <li class="breadcrumb-item"> Industries Details</li>
                  <li class="breadcrumb-item active"> Industries Details</li>
                </ol>
              </div>
            </div>
          </div>
          <h3 class="text-center m-3">
  Large  Industries Report  
  </h3>
</div>



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
      <h4 class="text-center">Investment</h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 justify-content-center ">
          <div class="d-flex flex-row gap-3">
            <div class="d-flex flex-column text-center justify-content-center">
              <span class="fw-bold">Amount</span>
              <span  class="text-dark count-span"><div id="maleCount"></div></span>
            </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div>
      <h4 class="text-center"> Employment</h4>
    </div>
    <div class="card card1">
      <div class="card-body">
        <div class="d-flex align-items-center gap-4 justify-content-center">
          <div class="d-flex flex-row gap-4 justify-content-center">
            <div class="d-flex flex-column text-center">
              <span class="fw-bold">Count</span>
              <span id="generalCount" class="count-span"></span>
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
                           <label class="col-form-label" for="filterGender">Taluk</label>
                          <select class="form-select" id="filterGender">
                              <option value="">Select Taluk</option>
                          </select>
                      </div>
                      </div>
                      <div class="col-md-4 col-12">
                           <div class="mb-3">
                           <label class="col-form-label" for="filterSocial">Products </label>
                          <select class="form-select" id="filterSocial">
                              <option value="">Select Products </option>
                          </select>
                      </div>
                     
                      </div>
                    
                      
                      
                      
                      
                </form>
                 

                <!-- <button id="exportSelected" class="btn btn-success mb-3">Export Selected</button> -->

<!-- dropdown ends here -->
                    <div class="table-responsive">
    <table id="usersTable" class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>
                    <label class="mb-0">
                        <input type="checkbox" id="selectAll"> Select All
                    </label>
                </th>
                <th>SI No.</th>
                <th>Unit Name & Address</th>
                <th>District</th>
                <th>Taluk</th>
                <th>Product</th>
                <th>Investment</th>
                <th>Employment</th>
                <th>Company Representative</th>
                <th>Contact Number</th>
                <th>Actions</th>
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





@endsection