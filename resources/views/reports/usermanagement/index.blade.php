@extends('reports.layouts.app')
@section('style')@endsection
@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>User Management </h3>
                </div>
                <div class="col-12 col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item active"> User Management </li>
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
                        <a href="{{route('users.create')}}">
                        <button class="btn btn-square btn-primary" type="button" data-bs-original-title="" title="">Add User</button>
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="display" id="advance-1">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>User Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->phone}}</td>
                          <td>{{$user->email}}</td>
                          
                          <td>
                            <a href="{{route('users.show',['user'=>$user->id])}}"><button class="btn btn-primary">View</button></a>
                            <a href="{{route('users.edit',['user'=>$user->id])}}"><button class="btn btn-danger">Edit</button></a>
                          </td>
                        </tr>
                        
                        @endforeach
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
         </div>


@endsection
@section('script')
@endsection

