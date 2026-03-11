 @extends('pwa.layout.app')
 @section('title') Dashboard @endsection
 @section('style')
 <style>
.w-70 {
    width: 70% !important;

}

.w-30 {
    width: 30% !important;
}
 </style>
 @endsection
 @section('content')
 <div class="page-title page-title-small">
     <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Asset Details</h2>
     <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
         data-src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"></a>
 </div>
 <div class="card header-card shape-rounded" data-card-height="90">
     <div class="card-overlay bg-highlight opacity-95"></div>
     <div class="card-overlay dark-mode-tint"></div>
     <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
 </div>
 @if(session('success'))
 <div id="success-alert">
     <h6 class="alert bg-success text-white">{{ session('success') }}</h6>
 </div>
 @endif

 <div class="d-flex flex-column gap-2  mt-5 mb-3">
     <div class="card m-2" style="border-radius: 20px;box-shadow: 0 0px 8px 0 rgb(0 0 0 / 38%);">
         <div class="card-body">
             <div class="profile-container pt-2 pb-2 d-flex flex-column gap-1">
              @foreach($assets as $asset)
                 <table class="table table-bordered">
                     
                     <tr class="font-aneka">
                         <th class="w-30">Category</th>
                         <td class="w-70" id="">{{$asset->first()->first()->question->asset_category->name}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th class="w-30">Sub Category</th>
                         <td class="w-70" id=""><span class="d-flex flex-row gap-1 flex-wrap">{{$asset->first()->first()->question->asset_category->subcategory_names}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th class="w-30">Details</th>
                         <td class="w-70" id="">
                             <div class="d-flex flex-column">
                              @foreach($asset as $key => $detail)
                                <span class="d-flex flex-column gap-1">
                                  @foreach($detail as $set)
                                    <span><b>{{$set->question->question}}:</b> {{$set->answer}}</span>
                                    @endforeach
                                </span>
                                @if($loop->iteration < count($asset))
                                <hr>
                                @endif
                              @endforeach
                             </div>
                         </td>
                     </tr>
                 </table>
              @endforeach
             </div>
         </div>
     </div>
 </div>

 @endsection
 @section('script')
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


 @endsection