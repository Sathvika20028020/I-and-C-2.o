@extends('reports.layouts.app')
@section('style')@endsection
@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>Add Sub-Category</h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item active"> Sub-Category </li>
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
                    <form id="actionForm" action="{{route('asset-subcategory.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <!-- Category Selection -->

                      <div class="row mb-4">
                      
                       <!-- Initiatives and Sub-Initiatives -->
                        
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">Select Category</label>
                          <select name="asset_category_id" class="form-select" required>
                            <option value="" selected disabled>Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">Sub-Category Name</label>
                          <input type="text" class="form-control" name="name" id="username" placeholder="Enter Sub-Category name" required>
                        </div>
                        <div class="col-md-6 mt-3">
                          <label class="form-label fw-bold">Sub-Category Icon</label>
                         <input type="file" name="icon" class="form-control">
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

