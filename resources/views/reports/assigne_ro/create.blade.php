@extends('reports.layouts.app')
@section('style')@endsection
@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Assign Reporting Officer</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item active"> Assign Reporting Officer</li>
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
                

                    <h5></h5>
                  </div>
                  <div class="card-body">
                    <form id="actionForm" action="{{route('assigned-list.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <!-- Category Selection -->

                      <div class="row mb-4">
                      
                       <!-- Initiatives and Sub-Initiatives -->
                        
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">Employee</label>
                          <select name="id" class="form-select" id="emp" required>
                            <option value=""></option>
                            @foreach($entries as $entry)
                            <option value="{{$entry->id}}">{{$entry->emp_name}} ({{$entry->designation}})</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">Reporting Officer</label>
                          <select name="reporting_officer_id" class="form-select" id="ro" required>
                            <option value=""></option>
                            @foreach($ros as $entry)
                            <option value="{{$entry->id}}">{{$entry->emp_name}} ({{$entry->designation}})</option>
                            @endforeach
                          </select>
                        </div>

                      </div>
                      <!-- Submit Button -->
                      <div class="text-end mt-4">
                        <button class="btn btn-primary" type="submit">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
 


@endsection
@section('script')
<script>
  $('#emp').select2({ placeholder: "Select Employee", allowClear: true });
  $('#ro').select2({ placeholder: "Select Reporting Officer", allowClear: true });
</script>
@endsection

