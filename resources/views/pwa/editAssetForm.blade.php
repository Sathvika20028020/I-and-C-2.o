 @extends('pwa.layout.app')
 @section('title') Dashboard @endsection
 @section('style')
 <style>
.category-font {
    font-size: 16px;
    font-weight: 600;
    color: black;
}

.fontsize {
    font-size: 17px;
    font-weight: 600;
    color: black;
}

.br-25 {
    border-radius: 25px;
    border: 1px solid #183b4a87 !important;
    box-shadow: 0 0px 8px 0 #183b4a54;
}

.font-inventory {
    font-size: 18px !important;
    font-weight: 700 !important;
    align-items: center !important;
}

.card-style {
    margin: 0px 15px 15px 15px !important;
}
 </style>
 @endsection
 @section('content')
 <div class="page-title page-title-small">
     <h2><a href="#" data-back-button><i
                 class="fa fa-arrow-left"></i></a>{{ auth()->guard('pwauser')->user()->employee?->post_district }}</h2>
     <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
         data-src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"></a>
 </div>
 <div class="card header-card shape-rounded" data-card-height="80">
     <div class="card-overlay bg-highlight opacity-95"></div>
     <div class="card-overlay dark-mode-tint"></div>
     <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
 </div>



 <div class="d-flex flex-column gap-1 mt-2 align-items-center justify-content-center">
 </div>
 <div class="d-flex flex-column gap-1">
     <div class="card card-style shadow-sm border-0">
         <div class="content mb-2">
             <div class="profile-container pt-2 pb-2">
              <form action="{{ route('asset-inventory.update', $uid) }}" method="post" enctype="multipart/form-data">
                @csrf @method('put')
                <div id="dynamicFields" class="border rounded p-2 mb-3 bg-white" style="display: block;">
                  <h5 id="formTitle" class="mb-3 font-inventory">{{$quess->first()?->question?->asset_subcategory?->name}} Details</h5>
                  <div id="questionsContainer" class="row g-3 mb-0 align-items-end">
                    @foreach($quess as $ques)
                      @if(!in_array($ques->type, ['image', 'uimage']))
                      <div class="col-md-4">
                        @if(in_array($ques->type, ['latitude', 'longitude']))
                        <label class="form-label font-aneka fontsize mb-0">
                          {{ucfirst($ques->type)}} <span class="text-danger">*</span>
                        </label>
                        @else
                        <label class="form-label font-aneka fontsize mb-0">
                          {{$ques->question?->question}} <span class="text-danger">*</span>
                        </label>
                        @endif
                        @if($ques->type == 'latitude')
                          <input type="text" class="form-control font-aneka" name="{{$ques->id}}" required="" placeholder="Latitude"
                          value="{{$ques->answer}}">
                        @elseif($ques->type == 'longitude')
                          <input type="text" class="form-control font-aneka" name="{{$ques->id}}" required="" placeholder="Longitude"
                          value="{{$ques->answer}}">
                        @elseif($ques->type == 'image')
                          <img src="{{ asset($ques->answer) }}" width=100 height=100 alt="">
                        @elseif($ques->type == 'uimage')
                          <img src="{{ asset($ques->answer) }}" width=100 height=100 alt="">
                        @elseif($ques->question?->type == 'number')
                          <input type="number" class="form-control font-aneka" name="{{$ques->id}}" value="{{$ques->answer}}" required=""
                            placeholder="{{$ques->question?->question}}">
                        @elseif($ques->question?->type == 'year')
                          <input type="text" class="form-control font-aneka" name="{{$ques->id}}" value="{{$ques->answer}}" maxlength="4" pattern="^[0-9]{4}$"
                            placeholder="{{$ques->question?->question}}">
                        @elseif($ques->question?->type == 'text')
                          <input type="text" class="form-control font-aneka" name="{{$ques->id}}" value="{{$ques->answer}}" required="" placeholder="{{$ques->question?->question}}">
                        @elseif($ques->question?->type == 'select')
                          <select class="form-select font-aneka" name="{{$ques->id}}" required="">
                              <option value="">-- Select --</option>
                              @foreach($ques->question?->options as $option)
                              <option value="{{$option->option}}" {{ $ques->answer == $option->option  ? 'selected' : ''}}>{{$option->option}}</option>
                              @endforeach
                          </select>
                        @endif

                        <div class="invalid-feedback mt-0">
                          Please enter {{$ques->question?->question}}
                        </div>
                      </div>
                      @endif
                    @endforeach
                    <div class="col-md-4">
                      <label class="form-label font-aneka fontsize mb-0">
                        Upload Assets Images
                      </label>

                      <input type="file" multiple class="form-control font-aneka" name="images[]" placeholder="Upload Assets Images">
                    </div>
                    <div class="col-md-4">
                      <label class="form-label font-aneka fontsize mb-0">
                        Upload unusable asset image 
                      </label>

                      <input type="file" class="form-control font-aneka" name="uimage" placeholder="upload unusable asset image">

                      
                    </div>
                    @if(count($quess->where('type', 'image')))
                    <div class="col-md-12">
                      <label class="form-label font-aneka fontsize mb-0">
                        Uploaded asset image
                      </label>
                      <div class="d-block">
                      @foreach($quess->where('type', 'image') as $ques)
                      <img width=150 height="150" src="{{ asset('/uploads/assets/'.$ques->answer) }}" alt="">
                      @endforeach
                      </div>
                      
                    </div>
                    @endif
                    @if(count($quess->where('type', 'uimage')))
                    <div class="col-md-12">
                      <label class="form-label font-aneka fontsize mb-0">
                        Uploaded unusable asset image
                      </label>

                      <div class="d-block">
                      @foreach($quess->where('type', 'uimage') as $ques)
                      <img width=150 height="150" src="{{ asset('/uploads/assets/'.$ques->answer) }}" alt="">
                      @endforeach
                      </div>
                      
                    </div>
                    @endif
                  </div>
                  <div class="text-center">
                    <button class="btn btn-success font-aneka mt-3" id="addBtn" type="submit">Update</button>
                  </div>
                </div>
              </form>
         </div>
     </div>
 </div>



 @endsection
 @section('script')
 @endsection