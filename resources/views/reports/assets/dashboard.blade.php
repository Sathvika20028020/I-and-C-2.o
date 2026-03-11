@extends('reports.layouts.app')
@section('style')@endsection
@section('content')
  <div class="container-fluid">
      <div class="page-title">
          <div class="row">
              <div class="col-12 col-sm-6">
                  <h3>
                      Assets Dashboard
                  </h3>
              </div>
              <div class="col-12 col-sm-6 d-none d-sm-block">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                          <a href="dashboard.html">
                              <i data-feather="home"></i>
                          </a>
                      </li>
                      <li class="breadcrumb-item">Dashboard</li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
  <div class="dropdown-basic mb-4">
      <div class="d-flex align-items-center w-100">
          <!-- CENTER : ALL -->
          <!-- <div class="mx-auto">
              <div class="dropdown">
                  <div class="btn-group mb-0">
                      <button class="dropbtn btn-primary btn-round" type="button">
                          All
                          <span>
                              <i class="icofont icofont-arrow-down"></i>
                          </span>
                      </button>
                      <div class="dropdown-content">
                          <a href="#">Chaires</a>
                          <a href="#">Tables</a>
                          <a href="#">Mouse</a>
                      </div>
                  </div>
              </div>
          </div> -->
          <!-- END : DISTRICT -->
          <div class="">
              <div class="dropdown">
                  <div class="btn-group mb-0">
                      <button class="dropbtn btn-secondary btn-round" type="button">
                        {{$district->name??''}} - {{$count}}
                          <!-- Districts
                          <span>
                              <i class="icofont icofont-arrow-down"></i>
                          </span> -->
                      </button>
                      <!-- <div class="dropdown-content">
                          <a href="{{ url()->current() }}">All</a>
                          @foreach($entries as $entry)
                          <a href="{{ url()->current() }}?district={{$entry->id}}">{{$entry->name}}</a>
                          @endforeach
                      </div> -->
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="default-according" id="accordionicon">
      @foreach($collection as $category)
      <div class="card">
          <div class="card-header pb-0" id="heading1">
              <h5 class="mb-0">
                  <button
                      class="btn btn-link text-white bg-primary w-100 text-start d-flex justify-content-between align-items-center"
                      data-bs-toggle="collapse"
                      data-bs-target="#collapse{{$loop->iteration}}"
                      aria-expanded="{{$loop->iteration == 1 ? 'false' : 'false'}}"
                      {{--aria-expanded="{{$loop->iteration == 1 ? 'true' : 'false'}}"--}}
                      aria-controls="collapse{{$loop->iteration}}"
                  >
                      <span>
                          <i class="icofont icofont-briefcase-alt-2"></i>
                          {{$category['name']}}
                      </span>
                      <span>
                      {{$category['total']}}
                      <i class="fas fa-chevron-down arrow-icon"></i>
                      </span>
                  </button>
              </h5>
          </div>
          <div id="collapse{{$loop->iteration}}" 
          class="collapse " 
          {{-- class="collapse {{$loop->iteration == 1 ? 'show' : ''}}" --}}
          data-bs-parent="#accordionicon">
              <div class="card-body">
                  <div class="table-responsive text-center">
                      <table class="display table table-bordered" id="data-source-1" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Sl. No.</th>
                                  <th>Items</th>
                                  <th>Quantity</th>
                              </tr>
                          </thead>
                          <tbody>
                            @if(isset($category['subcategories']))
                            @foreach($category['subcategories'] as $subcategory)
                              <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$subcategory['name']}}</td>
                                  <td style="cursor:pointer;color:blue;font-size:18px;font-weight:bold" onclick="getAssets('{{$district->id}}','{{$category['id']}}','{{$subcategory['id']}}')">{{$subcategory['total']}}</td>
                              </tr>
                            @endforeach
                            @else
                              <tr>
                                  <td colspan=3>No Asset Found!</td>
                              </tr>
                            @endif
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      @endforeach
  </div>

  <button class="d-none btn btn-primary" id="modelButton" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-bs-original-title="" title="">Vertically centered</button>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenter" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Assets list</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
          </div>
          <div class="modal-body" id="assets_list">
            
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title="" title="">Close</button>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script>
  function getAssets(district, cat, subcat){
    $.ajax({
        method: "GET",
        url: `{{route('asset.index')}}/${district}?cat=${cat}&subcat=${subcat}`,
    })
    .done(function(res) {
      $('#assets_list').html(res.html);
      $('#exampleModalCenter').show();
      $('#modelButton').trigger("click");
    });
  }
</script>
@endsection

