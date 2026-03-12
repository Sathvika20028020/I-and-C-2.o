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
.font-inventory{
    font-size: 18px !important;
    font-weight: 700 !important;
    align-items:center !important;
}
 </style>
 @endsection
 @section('content')
 <div class="page-title page-title-small">
     <h2 class="font-aneka"><a href="#" data-back-button><i
                 class="fa fa-arrow-left"></i></a>{{ auth()->guard('pwauser')->user()->employee?->post_district }}</h2>
     <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
         data-src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"></a>
 </div>
 <div class="card header-card shape-rounded" data-card-height="80">
     <div class="card-overlay bg-highlight opacity-95"></div>
     <div class="card-overlay dark-mode-tint"></div>
     <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
 </div>




 <div class="d-flex flex-column gap-2 mt-4">
     <div class="d-flex flex-column align-items-center justify-content-center mt-3">
        <span class="mb-2 text-center font-aneka text-dark font-inventory">Sub-Category</span>
     </div>
     <div class="row g-3 mx-2 flex-wrap">
      @foreach($categories as $category)
         <div class="col-6 col-md-4 col-lg-3">
             <a href="{{route('asset-inventory.show', $category->id)}}" class="card h-100 br-25 text-center mb-0">
                 <div class="card-body d-flex flex-column align-items-center gap-2 justify-content-center">
                     <img src="{{ asset($category->icon) }}" class="img-fluid"
                         style="max-width: 60%;">
                     <span class="font-aneka category-font">{{$category->name}}</span>
                     <span class="font-aneka badge rounded-pill" style="font-size:14px; background:#0c3040; color:white;">
                         Count: 3
                     </span>
                 </div>
             </a>
         </div>
      @endforeach
      

         <!-- Add more cards here -->
     </div>



 </div>

 @endsection
 @section('script')
 @endsection