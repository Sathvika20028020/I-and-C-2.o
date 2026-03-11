@extends('reports.layouts.app')
@section('style')
@section('style')
<style>
  .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
  }

  .switch input {
      opacity: 0;
      width: 0;
      height: 0;
  }

  .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: 0.4s;
      border-radius: 24px;
  }

  .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: 0.4s;
      border-radius: 50%;
  }

  input:checked+.slider {
      background-color: #4caf50;
  }

  input:checked+.slider:before {
      transform: translateX(26px);
  }

  .pointer {
      cursor: pointer;
  }
</style>
@endsection
@endsection
@section('content')


<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3>Asset Access</h3>
      </div>
      <div class="col-12 col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
          <li class="breadcrumb-item"> Home</li>
          <li class="breadcrumb-item active"> Asset Access </li>
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
              <a href="{{route('asset-access.create')}}">
              <button class="btn btn-square btn-primary" type="button" data-bs-original-title="" title="">Assign Asset Access</button>
              </a>
          </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="display" id="advance-1">
            <thead>
              <tr>
                <th>#</th>
                <th>Employee</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($entries as $key => $entry)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$entry->emp_name}} ({{$entry->designation}})</td>
                <td>
                  <a href="{{route('asset-access.show', $entry->id)}}"><button class="btn btn-danger">Remove</button></a>
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

