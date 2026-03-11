@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
<style>
  .col-form-label{
    padding-top: 0 !important;
}
</style>
@endsection
@section('content')

<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3> Dashboard</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item active">  </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
         <div class="container-fluid">


            <div class="row">
                <div class="col-xl-4 col-md-12 box-col-12">
                    <div class="form-group">
                        <label class="col-form-label fw-bold">Asked by</label>
                        <select class="js-example-basic-single" style="background:#fff;" id="asked_by">
                           <option value="">Select...</option>
                          @foreach($asked_users as $user)
                            <option value="{{$user}}">{{$user}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 box-col-12">
                    <div class="form-group">
                            <label for="exampleFormControlSelect1 fw-bold"><b>Department</b></label>
                            <select class="form-control" style="background:#fff;" id="department">
                                <option value="">Select...</option>
                                <option value="Department 1">Department 1</option>
                                <option value="Department 2">Department 2</option>
                                <option value="Department 3">Department 3</option>
                                <option value="Department 4">Department 4</option>
                            </select>
                    </div>
                </div>
            </div>


            <div class="row pt-4">
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">
                        <div class="media-body">
                            <h6 class="font-roboto" style="font-weight: 600;">Questions</h6>
                            <h4 class="mb-0 counter">{{$total}}</h4>
                        </div>
                        </div>
                        <div class="progress-widget">
                        <div class="progress sm-progress-bar progress-animate">
                            <div class="progress-gradient-success" role="progressbar" style="width: 60%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">
                        <div class="media-body">
                            <h6 class="font-roboto" style="font-weight: 600;">Department 1</h6>
                            <h4 class="mb-0 counter">47</h4>
                        </div>
                        </div>
                        <div class="progress-widget">
                        <div class="progress sm-progress-bar progress-animate">
                            <div class="progress-gradient-primary" role="progressbar" style="width: 20%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">
                        <div class="media-body">
                            <h6 class="font-roboto" style="font-weight: 600;">Department 2</h6>
                            <h4 class="mb-0 counter">104</h4>
                        </div>
                        </div>
                        <div class="progress-widget">
                        <div class="progress sm-progress-bar progress-animate">
                            <div class="progress-gradient-warning" role="progressbar" style="width: 35%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">
                        <div class="media-body">
                            <h6 class="font-roboto" style="font-weight: 600;">Department 3</h6>
                            <h4 class="mb-0 counter">17</h4>
                        </div>
                        </div>
                        <div class="progress-widget">
                        <div class="progress sm-progress-bar progress-animate">
                            <div class="progress-gradient-danger" role="progressbar" style="width: 10%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="animate-circle"></span></div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
               <div class="col-md-10">
                    <div class="input-group"><span class="input-group-text" id="basic-addon1">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input class="form-control" id="keyword" type="text" placeholder="Search here.." aria-label="search" aria-describedby="basic-addon1">
                    </div>
               </div>
            </div>

          <div class="row pt-3">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="mb-3 text-end">
                      <a href="">
                          <button class="btn btn-square btn-success" type="button" data-bs-original-title="" title="">Excel Export</button>
                      </a>
                    
                </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="display" id="ques-table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question answered by</th>
                          <th>Question</th>
                          <th>Answer</th>
                          <th>Department</th>
                          <th>Number</th>
                          <th>Asked by</th>
                          <th>Keywords</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </div>

@endsection
@section('script')
<script>

  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': "{{csrf_token()}}"
      }
    });
    var table = $('#ques-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{route('question.data')}}",
          data: function(data) {
            data.asked_by = $("#asked_by").val();
            data.department = $("#department").val();
            data.keyword = $("#keyword").val();
          }
      },
      order: [[0, 'desc']],
      columns: [
          { data: 'id' },
          { data: 'answered_by' },
          { data: 'question' },
          { data: 'answer' },
          { data: 'department' },
          { data: 'number' },
          { data: 'asked_by' },
          { data: 'keywords' },
          { data: 'action', orderable : false },
      ]
    });
    $('#asked_by').bind("change", function(){
        table.draw();
    });
    $('#department').bind("change", function(){
        table.draw();
    });
    let typingTimer;
    $('#keyword').bind("input", function(){
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => table.draw(), 300);
    });
  });
 
</script>
@endsection