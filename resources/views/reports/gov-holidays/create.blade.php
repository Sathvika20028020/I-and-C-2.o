@extends('reports.layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Add Gov. Holidays</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item active"> Gov. Holidays </li>
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
                    <form id="actionForm" action="{{route('gov-holidays.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <!-- Category Selection -->

                      <div class="row mb-4">
                      
                       <!-- Initiatives and Sub-Initiatives -->
                        
                        <div class="col-md-12 mt-3">
                          <label class="form-label fw-bold">Gov Holidays</label> <br>
                          <input
                            type="text"
                            id="dates"
                            name="dates"
                            placeholder="Select multiple dates"
                            class="form-control w-100 rounded border px-4 py-2"
                          />
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr("#dates", {
    mode: "multiple",
    dateFormat: "Y-m-d"
  });
</script>

@endsection

