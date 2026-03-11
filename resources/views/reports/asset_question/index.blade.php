@extends('reports.layouts.app')
@section('style')@endsection
@section('content')


<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3>Asset Question Master </h3>
      </div>
      <div class="col-12 col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
          <li class="breadcrumb-item"> Home</li>
          <li class="breadcrumb-item active"> Asset Question Master </li>
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
              <a href="{{route('asset-question.create')}}">
              <button class="btn btn-square btn-primary" type="button" data-bs-original-title="" title="">Add Question</button>
              </a>
          </div>
      </div>
      
      <div class="card-body">
        <div class="table-responsive">
          <table class="display" id="advance-1">
            <thead>
              <tr>
                <th>#</th>
                <th>Category</th>
                <th>Sub-Category</th>
                <th>Question</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach($entries as $key => $entry)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$entry->asset_category?->name}}</td>
                <td>{{$entry->asset_subcategory?->name}}</td>
                <td>{{$entry->question}}</td>
                <td>{{$entry->options->count() > 0 ? implode(', ', $entry->options->pluck('option')->toArray()) : '-'}}</td>
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

