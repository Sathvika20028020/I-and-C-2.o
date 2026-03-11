@extends('reports.layouts.app')
@section('style')@endsection
@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Edit Restricted Holidays</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item active"> Restricted Holidays </li>
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
                    <form id="actionForm" action="{{route('restricted-holidays.update', $leaveType->id)}}" method="post" enctype="multipart/form-data">
                      @csrf @method('put')
                      <!-- Category Selection -->

                      <div class="row mb-4">
                      
                       <!-- Initiatives and Sub-Initiatives -->
                        
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">Restricted Holidays</label>
                          <input type="text" class="form-control" name="name" id="username" placeholder="Enter Restricted Holidays" required value="{{$leaveType->name}}">
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

