@extends('reports.layouts.app')
@section('style')@endsection
@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Add User</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item active"> User </li>
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
                    <form id="actionForm" action="{{route('users.store')}}" method="post">
                      @csrf
                      <!-- Category Selection -->

                      <div class="row mb-4">
                      
                       <!-- Initiatives and Sub-Initiatives -->
                        
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">User Name</label>
                          <input type="text" class="form-control" name="name" id="username" placeholder="Enter User name" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input type="number" class="form-control" name="phone"  id="phone" placeholder="Enter phone number" required>
                        </div> 
                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold">Email Id</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email id" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold">Password <span class="text-danger"> *</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                        </div>
                       
                        <div class="col-md-6 mt-3">
                            <label class="col-form-label fw-bold">Modules</label>
                            <select class="js-example-placeholder-multiple col-sm-12" name="folders[]" multiple="multiple">
                              @foreach($folders as $folder)
                              <option value="{{$folder->id}}">{{$folder->name}}</option>
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
@endsection

