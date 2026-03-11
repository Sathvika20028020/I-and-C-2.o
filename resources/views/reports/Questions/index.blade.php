@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
@endsection
@section('content')


<div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3>List </h3>
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
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header pb-0">
                  <!-- <h5>Club List</h5> -->
                  <div class="mb-3 text-end">
                    <a href="{{route('question.create')}}">
                    <button class="btn btn-square btn-primary" type="button" data-bs-original-title="" title="">Add</button>
                    </a>
                    <a href="">
                        <button class="btn btn-square btn-success" type="button" data-bs-original-title="" title="">Excel Import</button>
                    </a>
                </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="display" id="advance-1">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Department</th>
                          <th>Question By</th>
                          <th>Question</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($entries as $entry)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$entry->department}}</td>
                          <td>{{$entry->asked_by}}</td>
                          <td>{{$entry->question}}</td>
                          <td>
                            <a href="{{route('questions.view')}}"><button class="btn btn-primary">View</button></a>
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