@extends('reports.layouts.app')
@section('style')@endsection
@section('content')

<div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <h3>View User</h3>
                  </div>
                  <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                      <li class="breadcrumb-item">Home</li>
                      <li class="breadcrumb-item active">View User</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          
            <!-- View Card -->
            <div class="container-fluid">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12">
                  <div class="card shadow-sm">
                    <!-- <div class="card-header bg-light d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 text-dark">School Usage Summary</h5>
                      
                    </div> -->
                    <div class="card-body">
                      <table class="table table-bordered table-striped mb-0">
                        <tbody>
                          <tr>
                            <th scope="row" style="width: 40%;">User Name</th>
                            <td>{{$user->name}}</td>
                          </tr>
                          <tr>
                            <th>Phone Number</th>
                            <td>{{$user->phone}}</td>
                          </tr>
                          <tr>
                            <th>Email ID</th>
                            <td>{{$user->email}} </td>
                          </tr>
                          
                          <tr>
                            <th>Modules</th>
                            <td>   @foreach($assignedFolders as $folder)
            <option>
                <p>{{ $folder->name }}</p>
            </option>
        @endforeach</td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>



@endsection
@section('script')
@endsection

