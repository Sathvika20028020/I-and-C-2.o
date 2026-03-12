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

.swal-button {
    display: block !important;
    margin: 0 auto !important;
}

.swal-footer {
    text-align: center !important;
}


.swal-text {
    margin-bottom: 5px !important;
    padding-bottom: 0 !important;
    line-height: 1.4 !important;
    text-align: center !important;
}
 </style>
 @endsection
 @section('content')
 <div class="page-title page-title-small font-aneka">
     <h2 class="font-aneka"><a href="#" data-back-button><i
                 class="fa fa-arrow-left "></i></a>{{ auth()->guard('pwauser')->user()->employee?->post_district }}</h2>
     <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
         data-src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"></a>
 </div>
 <div class="card header-card shape-rounded" data-card-height="80">
     <div class="card-overlay bg-highlight opacity-95"></div>
     <div class="card-overlay dark-mode-tint"></div>
     <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
 </div>




 <div class="d-flex flex-column gap-2 mt-4">
     <div class="row m-0 mt-3 text-center" style="margin: 15px 10px 0px 10px !important;">
         <!-- Welcome Section -->
         <div class="text-center mb-2" style="margin-top:5px;">
             <h4 class="font-aneka" style="font-weight:900;color:#183b4a;">
                 Hello Sathvika
             </h4>
            
         </div>
         <!-- Profile -->
         <div class="col-6 ">
             <a href="{{url('/pwa/profile')}}" class="card p-2"
                 style="border-radius:10px;border:1px solid #183b4a87 !important;box-shadow:0 0px 8px 0 #183b4a54;">

                 <i class="bi bi-person-circle" style="font-size:20px;color:#183b4a;"></i>
                 <span class="font-aneka fontsize d-block mt-1">Profile</span>

             </a>
         </div>

         <!-- Assets -->
         @if(auth()->user()->employee?->asset_access == 1)
         <div class="col-6 ">
             <a href="{{ route('pwa.category') }}" class="card p-2"
                 style="border-radius:10px;border:1px solid #183b4a87 !important;box-shadow:0 0px 8px 0 #183b4a54;">

                 <i class="bi bi-box-seam" style="font-size:20px;color:#183b4a;"></i>
                 <span class="font-aneka fontsize d-block mt-1">Assets</span>

             </a>
         </div>
         @endif

         <!-- Apply -->
         <div class="col-6 ">
             <a href="" class="card p-2"
                 style="border-radius:10px;border:1px solid #183b4a87 !important;box-shadow:0 0px 8px 0 #183b4a54;">

                 <i class="bi bi-pencil-square" style="font-size:20px;color:#183b4a;"></i>
                 <span class="font-aneka fontsize d-block mt-1">Apply</span>

             </a>
         </div>

         <!-- Status -->
         <div class="col-6">
             <a href="" class="card p-2"
                 style="border-radius:10px;border:1px solid #183b4a87 !important;box-shadow:0 0px 8px 0 #183b4a54;">

                 <i class="bi bi-clipboard-check" style="font-size:20px;color:#183b4a;"></i>
                 <span class="font-aneka fontsize d-block mt-1">Status</span>

             </a>
         </div>

     </div>

     <div class="card mb-3 mt-1"
         style="margin: 0px 8px;border-radius: 20px;box-shadow: 0 0px 8px 0 #183b4a54;   border: 1px solid #183b4a87 !important">
         <div class="card-body d-flex flex-column gap-2">
             <h6 class="font-aneka mb-2 text-center" style="font-size:18px;font-weight: 700;">UPDATES</h6>

             <ul class="fontsize1" style="padding-left: 20px; margin: 0;">
                 <li class="fontsize1 font-aneka mb-2" style="text-align: justify;">Industry focuses on manufacturing
                     and creating value, whereas commerce focuses on exchange and delivering goods to the right place
                     and time.</li>
                 <li class="fontsize1 font-aneka" style="text-align: justify;">Commerce involves the activities of
                     buying, selling, and distributing goods and services, acting as the link between producers and
                     consumers, while Industry encompasses the production and transformation of raw materials into
                     finished products and services. Industry focuses on manufacturing and creating value, whereas
                     commerce focuses on exchange and delivering goods to the right place and time.</li>

             </ul>
         </div>
     </div>

 </div>

 @endsection
 @section('script')
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <script>
document.addEventListener("DOMContentLoaded", function() {
    @if($profile_updated == 'yes')
    swal({
        title: "Approved!",
        text: "Your profile request has been approved by the administrator.",
        icon: "success",
        button: "OK",
    });
    @endif
});
 </script>
 @endsection