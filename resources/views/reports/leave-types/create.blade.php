@extends('reports.layouts.app')
@section('style')@endsection
@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Add Leave Type</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item active"> Leave Type </li>
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
                    <form id="actionForm" action="{{route('leave-types.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <!-- Category Selection -->

                      <div class="row mb-4">
                      
                       <!-- Initiatives and Sub-Initiatives -->
                        
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">Leave Type</label>
                          <input type="text" class="form-control" name="name" id="username" placeholder="Enter Leave Type" required>
                        </div>
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">Leaves Allowed</label>
                          <input type="number" name="total" class="form-control" placeholder="Enter allowed leaves in days">
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
@endsection

