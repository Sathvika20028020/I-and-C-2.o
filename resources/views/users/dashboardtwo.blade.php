@extends('users.layouts.app')
@section('title') Dashboard @endsection
@section('style')
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
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
              <h3 class="text-center m-3">
              Saroji Maharshi Report 
  </h3>

               
              </div>
              <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"> <a class="home-item" href="index.html"><i data-feather="home"></i></a>
                  </li>
                  <li class="breadcrumb-item"> Dashboard</li>
                  <li class="breadcrumb-item active"> Sarojini Mahishi Report</li>
                </ol>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body d-flex flex-column gap-4">
            <h3 class="text-center" class="text-dark" id="selectedDistrictText"></h3>
              <div class="d-flex flex-column align-items-end">

                <div>
                  <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter">Excel Import</button>
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenter" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form id="excelUploadForm" action="{{route('exelimport.importtwo')}}" method="POST" enctype="multipart/form-data" novalidate>
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
                            <button class="btn btn-primary" type="submit">Submit</button>
                          </div>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
             
                <div class="col-md-6 col-12">
                  <div class="mb-3">
                    <label class="col-form-label" for="filterDistrict">Districts</label>
                    <select class="form-select col-sm-12" id="filterDistrict">
                      <optgroup label="Districts">
                        <option>Select District</option>
                       @foreach($districts as $district)
                       <option value="{{ $district->district }}">{{ $district->district }}</option>
                       @endforeach
                      </optgroup>

                    </select>
                  </div>
                </div>

              
              
              
              <div class="d-flex row flex-wrap m-0 justify-content-center">
                <div class="col-md-6 col-12">
                  <div>
                    <h4 class="text-center">Group A</h4>
                  </div>
                  <div class="card card1">
                    <div class="card-body">

                      <div class="d-flex align-items-center gap-3">
                        <!-- Your Content -->
                        <div class="d-flex flex-row gap-3">
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Total</span><span id="group_a_total">0</span>
                          </div>
                          <!-- Vertical Line -->
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Kannadiga's</span>
                            <span id="group_a_kannadiga">0</span>
                          </div>
                          <!-- Vertical Line -->
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Others</span>
                            <span id="group_a_others">0</span>
                          </div>
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Kannadiga Percentage</span>
                            <span id="group_a_percentage_kannadiga">0</span>
                          </div>
                        </div>
                      </div>


                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div>
                    <h4 class="text-center">Group B</h4>
                  </div>
                  <div class="card card1">
                    <div class="card-body">
                      <div class="d-flex align-items-center gap-3">
                        <!-- Your Content -->
                        <div class="d-flex flex-row gap-3">
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Total</span>
                            <span id="group_b_total">0</span>
                          </div>
                          <!-- Vertical Line -->
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Kannadiga's</span>
                            <span id="group_b_kannadiga">0</span>
                          </div>
                          <!-- Vertical Line -->
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Others</span>
                            <span id="group_b_others">0</span>
                          </div>
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Kannadiga Percentage</span>
                            <span id="group_b_percentage">0</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div>
                    <h4 class="text-center">Group C</h4>
                  </div>
                  <div class="card card1">
                    <div class="card-body">
                      <div class="d-flex align-items-center gap-3">
                        <!-- Your Content -->
                        <div class="d-flex flex-row gap-3">
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Total</span>
                            <span id="group_c_total">0</span>
                          </div>
                          <!-- Vertical Line -->
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Kannadiga's</span>
                            <span id="group_c_kannadiga">0</span>
                          </div>
                          <!-- Vertical Line -->
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Others</span>
                            <span id="group_c_others">0</span>
                          </div>
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Kannadiga Percentage</span>
                            <span id="group_c_percentage">0</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div>
                    <h4 class="text-center">Group D</h4>
                  </div>
                  <div class="card card1">
                    <div class="card-body">
                      <div class="d-flex align-items-center gap-3">
                        <!-- Your Content -->
                        <div class="d-flex flex-row gap-3">
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Total</span>
                            <span id="group_d_total">0</span>
                          </div>
                          <!-- Vertical Line -->
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Kannadiga's</span>
                            <span id="group_d_kannadiga">0</span>
                          </div>
                          <!-- Vertical Line -->
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Others</span>
                            <span id="group_d_others">0</span>
                          </div>
                          <div style="border-left: 2px solid #ccc; height: 50px;"></div>
                          <div class="d-flex flex-column text-center">
                            <span class="fw-bold">Kannadiga Percentage</span>
                            <span id="group_d_percentage">0</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            
              <div>
              <button id="exportSelected" class="btn btn-success mb-3">Export Selected</button>
                <div class="table-responsive">
                  <table class="display" id="dashboardtwo">
                    <thead>
                      <tr>
                      <th>Select All<input type="checkbox" id="selectAll"></th> 
                        <th>SI No.</th>
                        <th>District</th>
                        <th>Group A</th>
                        <th>Group B</th>
                        <th>Group C</th>
                        <th>Group D</th>
                        <th>Total</th>
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
    <script>
    // Select/Deselect all checkboxes
    $('#selectAll').on('click', function () {
        $('.rowSelect').prop('checked', this.checked);
    });

    // Export selected via POST
    $('#exportSelected').on('click', function () {
        var selected = [];

        $('.rowSelect:checked').each(function () {
            selected.push($(this).val());
        });

        if (selected.length > 0) {
            // Create a form
            const form = $('<form>', {
                method: 'POST',
                action: '{{ route("export.sarojini") }}'
            });

            // Add CSRF token
            form.append($('<input>', {
                type: 'hidden',
                name: '_token',
                value: '{{ csrf_token() }}'
            }));

            // Add selected IDs
            selected.forEach(function (id) {
                form.append($('<input>', {
                    type: 'hidden',
                    name: 'selected_ids[]',
                    value: id
                }));
            });

            // Append and submit form
            $('body').append(form);
            form.submit();
        } else {
            alert('Please select at least one row to export.');
        }
    });
</script>


<!-- <script>
$(document).ready(function() {
    var table = $('#dashboardtwo').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route("dashboardtwo.data") }}',
            type: 'GET',
            data: function(d) {
                let district = $('#filterDistrict').val();
                d.district = district && district !== 'Select District' ? district : null;
            },
            dataSrc: function(json) {
                updateSummaryCards(json.summary); // Update cards
                return json.datatable.data;       // Table rows
            }
        },
        pageLength: 10,
        lengthMenu: [ [10, 25, 50, 100], [10, 25, 50, 100] ],
        columns: [
          {
              data: 'id',
                render: function(data, type, row) {
                    return `<input type="checkbox" class="rowSelect" value="${data}">`;
                },
                orderable: false,
                searchable: false
            },
            { data: 'id' },
            { data: 'district' },
            { data: 'total_g1' },
            { data: 'total_g2' },
            { data: 'total_g3' },
            { data: 'total_g4' },
            { data: 'total' },
            {
                data: 'id',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return `<a href="/users/dashboardtwoview/${data}" class="btn btn-sm btn-primary">View</a>`;
                }
            }
        ]
    });

    $('#filterDistrict').change(function() {
      const district = $(this).val();
      updateDistrictDisplay(district && district !== 'Select District' ? district : null);
        table.ajax.reload();
    });

    function updateSummaryCards(summary) {
        $('#group_a_total').text(summary.group_a_total ?? 0);
        $('#group_a_kannadiga').text(summary.group_a_kannadiga ?? 0);
        $('#group_a_others').text(summary.group_a_others ?? 0);
        $('#group_a_percentage_kannadiga').text(summary.group_a_percentage_kannadiga ?? 0);

        $('#group_b_total').text(summary.group_b_total ?? 0);
        $('#group_b_kannadiga').text(summary.group_b_kannadiga ?? 0);
        $('#group_b_others').text(summary.group_b_others ?? 0);
        $('#group_b_percentage').text(summary.group_b_percentage ?? 0);


        $('#group_c_total').text(summary.group_c_total ?? 0);
        $('#group_c_kannadiga').text(summary.group_c_kannadiga ?? 0);
        $('#group_c_others').text(summary.group_c_others ?? 0);
        $('#group_c_percentage').text(summary.group_c_percentage ?? 0);

        $('#group_d_total').text(summary.group_d_total ?? 0);
        $('#group_d_kannadiga').text(summary.group_d_kannadiga ?? 0);
        $('#group_d_others').text(summary.group_d_others ?? 0);    
        $('#group_d_percentage').text(summary.group_d_percentage ?? 0);
    }

    function updateDistrictDisplay(district) {
    $('#selectedDistrictText').text(district ? `Selected District: ${district}` : 'Selected District: None');
}
});
</script> -->
<script>
$(document).ready(function () {
    let selectedRows = new Set();

    var table = $('#dashboardtwo').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route("dashboardtwo.data") }}',
            type: 'GET',
            data: function (d) {
                let district = $('#filterDistrict').val();
                d.district = district && district !== 'Select District' ? district : null;
            },
            // dataSrc: function (json) {
            //     updateSummaryCards(json.summary);
            //     return json.datatable.data;
            // }
            dataSrc: function (json) {
            // ✅ Update summary cards
            updateSummaryCards(json.summary);

            // ✅ Flatten structure for DataTables
            json.draw = json.datatable.draw;
            json.recordsTotal = json.datatable.recordsTotal;
            json.recordsFiltered = json.datatable.recordsFiltered;

            return json.datatable.data;
        }
        },
        pageLength: 10,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
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
            { data: 'district' },
            { data: 'total_g1' },
            { data: 'total_g2' },
            { data: 'total_g3' },
            { data: 'total_g4' },
            { data: 'total' },
            {
                data: 'id',
                orderable: false,
                searchable: false,
                render: function (data) {
                    return `<a href="/users/dashboardtwoview/${data}" class="btn btn-sm btn-primary">View</a>`;
                }
            }
            //  {
            //     data: 'id',
            //     orderable: false,
            //     searchable: false,
            //     render: function(data, type, row) {
            //           return `<a href="{{url('users/dashboardtwoedit')}}/${data}" class="btn btn-sm btn-primary">Update</a>`;
            //        // return `<a href="/users/dashboardtwoview/${data}" class="btn btn-sm btn-primary">View</a>`;
            //     }
          //  }
        ]
    });

    // On table draw, reflect selection state
    table.on('draw', function () {
        $('.rowSelect').each(function () {
            let rowId = $(this).val().toString();
            $(this).prop('checked', selectedRows.has(rowId));
        });

        const allVisibleChecked = $('.rowSelect').length && $('.rowSelect:checked').length === $('.rowSelect').length;
        $('#selectAll').prop('checked', allVisibleChecked);
    });

    // Select All (across all pages)
    $('#selectAll').on('click', function () {
        const isChecked = this.checked;
        if (isChecked) {
            let district = $('#filterDistrict').val();
            $.ajax({
                url: '{{ route("dashboardtwo.all_ids") }}',
                type: 'GET',
                data: {
                    district: district && district !== 'Select District' ? district : null
                },
                success: function (response) {
                    response.ids.forEach(id => selectedRows.add(id.toString()));
                    $('.rowSelect').each(function () {
                        $(this).prop('checked', true);
                    });
                },
                error: function () {
                    alert('Failed to fetch all IDs');
                    $('#selectAll').prop('checked', false);
                }
            });
        } else {
            selectedRows.clear();
            $('.rowSelect').prop('checked', false);
        }
    });

    // Track individual checkbox
    $('#dashboardtwo').on('change', '.rowSelect', function () {
        const rowId = $(this).val().toString();
        if (this.checked) {
            selectedRows.add(rowId);
        } else {
            selectedRows.delete(rowId);
        }

        const allVisibleChecked = $('.rowSelect').length && $('.rowSelect:checked').length === $('.rowSelect').length;
        $('#selectAll').prop('checked', allVisibleChecked);
    });

    // Export selected
    $('#exportSelected').on('click', function () {
        if (selectedRows.size === 0) {
            alert('Please select at least one row to export.');
            return;
        }

        const form = $('<form>', {
            method: 'POST',
            action: '{{ route("export.sarojini") }}'
        });

        form.append($('<input>', {
            type: 'hidden',
            name: '_token',
            value: '{{ csrf_token() }}'
        }));

        selectedRows.forEach(function (id) {
            form.append($('<input>', {
                type: 'hidden',
                name: 'selected_ids[]',
                value: id
            }));
        });

        $('body').append(form);
        form.submit();
    });

    // Filter change
    $('#filterDistrict').change(function () {
        const district = $(this).val();
        updateDistrictDisplay(district && district !== 'Select District' ? district : null);
        selectedRows.clear(); // clear previous selections on filter
        table.ajax.reload();
    });

    // Summary cards
    function updateSummaryCards(summary) {
        $('#group_a_total').text(summary.group_a_total ?? 0);
        $('#group_a_kannadiga').text(summary.group_a_kannadiga ?? 0);
        $('#group_a_others').text(summary.group_a_others ?? 0);
        $('#group_a_percentage_kannadiga').text(summary.group_a_percentage_kannadiga ?? 0);

        $('#group_b_total').text(summary.group_b_total ?? 0);
        $('#group_b_kannadiga').text(summary.group_b_kannadiga ?? 0);
        $('#group_b_others').text(summary.group_b_others ?? 0);
        $('#group_b_percentage').text(summary.group_b_percentage ?? 0);

        $('#group_c_total').text(summary.group_c_total ?? 0);
        $('#group_c_kannadiga').text(summary.group_c_kannadiga ?? 0);
        $('#group_c_others').text(summary.group_c_others ?? 0);
        $('#group_c_percentage').text(summary.group_c_percentage ?? 0);

        $('#group_d_total').text(summary.group_d_total ?? 0);
        $('#group_d_kannadiga').text(summary.group_d_kannadiga ?? 0);
        $('#group_d_others').text(summary.group_d_others ?? 0);
        $('#group_d_percentage').text(summary.group_d_percentage ?? 0);
    }

    // District text
    function updateDistrictDisplay(district) {
        $('#selectedDistrictText').text(district ? `Selected District: ${district}` : 'Selected District: None');
    }
});
</script>

<script>
    // Show loader on page load
    window.addEventListener('load', function () {
        $("#loader").fadeOut(); // hide when fully loaded
    });

    // Show loader before page unload/reload
    window.addEventListener('beforeunload', function () {
        $("#loader").fadeIn(); // show loader
    });

    $(document).ready(function () {
        // AJAX start: show loader
        $(document).ajaxStart(function () {
            $("#loader").fadeIn();
        });

        // AJAX complete: hide loader
        $(document).ajaxStop(function () {
            $("#loader").fadeOut();
        });

        // Optional: auto-hide success messages
        setTimeout(function () {
            $(".alert-success").fadeOut("slow");
        }, 3000);
    });
</script>

@endsection