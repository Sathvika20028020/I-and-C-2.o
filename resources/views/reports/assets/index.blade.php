@extends('reports.layouts.app')
@section('style')@endsection
@section('content')


<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3>Dashboard</h3>
      </div>
      <div class="col-12 col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
          <li class="breadcrumb-item"> Home</li>
          <li class="breadcrumb-item active"> Dashboard</li>
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
      <div class="card-body">
        <div class="table-responsive">
          <table class="display" id="advance-1">
            <thead>
              <tr>
                <th>SI No.</th>
                <th>Disrtict Name</th>
                <th>Total No. of Assets</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($entries as $entry)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$entry->name}}</td>
                <td>{{$entry->total}}</td>
                <td><a href="{{ route('assets.dashboard') }}?district={{$entry->id}}" class="btn btn-primary">View</a></td>
                <!-- <td><a href="{{route('asset.show', $entry->id)}}" class="btn btn-primary">View</a></td> -->
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

