@extends('reports.layouts.app')
@section('style')

@endsection
@section('content')


<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3>Attendance Master </h3>
      </div>
      <div class="col-12 col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
          <li class="breadcrumb-item"> Home</li>
          <li class="breadcrumb-item active"> Attendance Master </li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header pb-0">
          <div class="mb-3 text-end">
              <button class="btn btn-square btn-primary" onclick="getExcel()" type="button">Export</button>
              <button data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn btn-square btn-primary" type="button" data-bs-original-title="" title="">Import Attendance</button>
          </div>
      </div>
      
      <div class="card-body">
        <div class="table-responsive">
          <table class="display" id="list-table">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th class="text-center">
                  Department <br>
                  <select id="departments" multiple>
                    @foreach($departments as $name)
                    <option value="{{$name}}">{{$name}}</option>
                    @endforeach
                  </select>
                </th>
                <th class="text-center">
                  Name <br>
                  <select id="names" multiple>
                    @foreach($names as $name)
                    <option value="{{$name}}">{{$name}}</option>
                    @endforeach
                  </select>
                </th>
                <th>Attendance Date</th>
                <!-- <th>Shift</th> -->
                <!-- <th>Timetable</th> -->
                <th class="text-center">
                  Status <br>
                  <select id="statuses" multiple>
                    @foreach($statuses as $name)
                    <option value="{{$name}}">{{$name}}</option>
                    @endforeach
                  </select>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Late Minutes</th>
                <th>Early Leave Minutes</th>
                <!-- <th>Attended Minutes</th> -->
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <form id="excelUploadForm" action="{{ route('attendance.store') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf 
        <div class="modal-body">


            <div class="mb-3">
            <label for="formFile" class="form-label">Excel Import</label>
            <input class="form-control" type="file" id="formFile" name="file" accept=".xls, .xlsx, .csv" required>
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
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
      }
    });
    var table = $('#list-table').DataTable({
      // dom: 'lftip',
      processing: false,
      serverSide: true,
      ajax: {
        url: "{{route('attendance.create')}}",
          data: function(data) {
            data.status = $("#statuses").val();
            data.department = $("#departments").val();
            data.name = $("#names").val();
          }
      },
      order: [[0, 'asc']],
      columns: [
          { data: 'id' },
          { data: 'person_id' },
          { data: 'department',orderable : false },
          { data: 'name',orderable : false },
          { data: 'attendance_date' },
          // { data: 'shift' },
          // { data: 'timetable' },
          { data: 'status', orderable : false },
          { data: 'check_in' },
          { data: 'check_out' },
          { data: 'late_minutes' },
          { data: 'early_leave_minutes' },
          // { data: 'attended_minutes' },
      ]
    });
    $('#statuses').bind("change", function(){
        table.draw();
    });
    $('#departments').bind("change", function(){
        table.draw();
        $.ajax({
            method: "PUT",
            url: "{{ url('attendance/users') }}",
            data: {_token: "{{csrf_token()}}", departments:$("#departments").val(),},
          })
          .done(function (res) {        
          if(res.success){
            let select = $('#names');

            // Clear existing options
            select.empty();

            // Append new options
            res.users.forEach(function(name) {
                select.append(
                    $('<option>', {
                        value: name,
                        text: name
                    })
                );
            });

            // Refresh Select2
            select.trigger('change');
          }
          })
          .fail(function (err) {
            console.log(err);              
          });
    });
    $('#names').bind("change", function(){
        table.draw();
    });
    $('#names').select2({ placeholder: "Select Employee", allowClear: true });
    $('#departments').select2({ placeholder: "Select Department", allowClear: true });
    $('#statuses').select2({ placeholder: "Select Status", allowClear: true });
  });

  function getExcel() {
    let statuses = $("#statuses").val() || [];
    let departments = $("#departments").val() || [];
    let names = $("#names").val() || [];

    let params = new URLSearchParams();

    statuses.forEach(status => params.append('statuses[]', status));
    departments.forEach(dept => params.append('departments[]', dept));
    names.forEach(name => params.append('names[]', name));

    window.location.href = "{{route('attendance.show', 'export')}}?" + params.toString();
}

</script>
@endsection

