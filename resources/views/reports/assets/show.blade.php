@extends('reports.layouts.app')
@section('style')@endsection
@section('content')


<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>Assets Details</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item active"> Assets Details</li>
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
                    <div class="d-flex flex-column gap-3">

                        <div class="d-flex row m-0">
                            <div class="col-md-6 col-12 mb-3">
                                <span class="d-flex flex-row gap-1" style="font-size:15px">
                                    <span><b>District Name:</b> </span>
                                    <span>{{$asset->name}}</span>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex row m-0">
                            <div class="col-md-6 col-12 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Category</label>
                                <select disabled class="form-control" aria-label="Default select example" onchange="getSubCat(this.value)">
                                    <option selected disabled>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$cat_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Sub-Category</label>
                                <select disabled class="form-control" aria-label="Default select example" id="subcats" onchange="window.location.href=`{{ route('asset.show', $asset->id) }}?id=${this.value}`;">
                                    <option selected>Select Sub-Category</option>
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}" {{$subcat_id == $subcategory->id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2">
                          @foreach($inventories as $inventory)
                            {{$loop->iteration}}) <table class="table table-bordered mb-0">
                                <tbody>
                                  @foreach($inventory as $key => $item)
                                   @if(in_array($key, ['latitude','longitude']))
                                    <tr>
                                        <th scope="row" style="width: 50%;background:#dadded">{{ucfirst($item->type)}}:</th>
                                        <td>{{$item->answer}}</td>
                                    </tr>
                                   @elseif(in_array($key, ['images']))
                                    @foreach($item as $image)
                                    <tr>
                                        <th scope="row" style="width: 50%;background:#dadded">{{ $image->type . ' ' . $loop->iteration }}:</th>
                                        <td><img height="100" src="{{ asset('/uploads/assets/'.$image->answer) }}" alt=""></td>
                                    </tr>
                                    @endforeach
                                   @else
                                    <tr>
                                        <th scope="row" style="width: 50%;background:#dadded">{{$item->question->question}}:</th>
                                        <td>{{$item->answer}}</td>
                                    </tr>
                                    @endif
                                  @endforeach
                                </tbody>
                            </table>
                          @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script>
  function getSubCat(id) {
    $.ajax({
        method: "GET",
        url: `{{route('asset.index')}}/${id}/edit`,
    })
    .done(function(res) {
      if(res.success){
        var options = '';
        $.each(res.list, function(key, value){
            options += '<option value="' + value.id + '">' + value.name + '</option>';
        });
        options = '<option value="" selected disabled>Select Sub-Category</option>' + options;
        $('#subcats').html(options);
      }
    });

  }
</script>
@endsection