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
     <span class=" text-center font-aneka text-dark font-inventory">Category - {{$subcategory->asset_category?->name}}</span>
     <span class="mb-2 text-center font-aneka text-dark font-inventory">Subcategory - {{$subcategory->name}} - {{$total}}</span>
 </div>
 <div class="d-flex flex-column gap-1">
     @foreach($inventories as $uid => $inventory)
     <div class="card card-style shadow-sm border-0">
         <div class="content mb-2">
             <div class="profile-container pt-2 pb-2">
              <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('asset-inventory.edit', $uid) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                <form action="{{ route('asset-inventory.destroy', $uid) }}" method="post">
                  @csrf @method('delete')
                    <button class="btn btn-sm btn-primary">Delete</button>
                </form>
              </div>
                 <table class="table table-bordered">
                     @foreach($inventory as $key => $ques)
                        @if(in_array($key, ['latitude','longitude']))
                        <tr class="font-aneka">
                          <th>{{ ucfirst($ques->type) }}</th>
                          <td id="name">{{ $ques->answer }}</td>
                        </tr>
                        @elseif(in_array($key, ['images']))
                          @foreach($ques as $image)
                            <tr class="font-aneka">
                              <th>{{ $image->type . ' ' . $loop->iteration }}</th>
                              <td id="name"><img height="100" src="{{ asset('/uploads/assets/'.$image->answer) }}" alt=""></td>
                            </tr>
                          @endforeach
                        @elseif(in_array($key, ['uimages']))
                          @foreach($ques as $image)
                            <tr class="font-aneka">
                              <th>Unusable asset image</th>
                              <td id="name"><img height="100" src="{{ asset('/uploads/assets/'.$image->answer) }}" alt=""></td>
                            </tr>
                          @endforeach
                        @else
                          <tr class="font-aneka">
                            <th>{{ $ques->question->question }}</th>
                            <td id="name">{{ $ques->answer }}</td>
                          </tr>
                        @endif
                     @endforeach
                     <tr>
                         <td colspan="2"></td>
                     </tr>
                 </table>
             </div>
         </div>
     </div>
     @endforeach
 </div>



 @endsection
 @section('script')
 @endsection