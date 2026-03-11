 @extends('pwa.layout.app')
 @section('title') Dashboard @endsection
 @section('style')
 @endsection
 @section('content')
 <div class="page-title page-title-small">
     <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Profile</h2>
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
     <div class="d-flex flex-column align-items-center">
         <form method="POST" action="{{route('pwa.otp.request')}}">
             @csrf
         </form>
     </div>
     <div class="card m-2" style="border-radius: 20px;box-shadow: 0 0px 8px 0 rgb(0 0 0 / 38%);">
         <div class="card-body">
             <div class="profile-container pt-2 pb-2">
                 <table class="table table-bordered">
                     <tr class="font-aneka">
                         <th>Employee Name</th>
                         <td id="name">{{$employee->emp_name}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Social Category</th>
                         <td id="phoneno">{{$employee->category}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Sub Category</th>
                         <td id="DOB">{{$employee->sub_category}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>District</th>
                         <td id="gender">{{$employee->district}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Taluk</th>
                         <td id="address">{{$employee->taluk}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>DR/PR</th>
                         <td id="drivinglicenceno">{{$employee->DR_PR}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Type Ncadre/Xcadre</th>
                         <td id="drivinglicencevalidity">{{$employee->cadre_type}}</td>
                     </tr>

                     <tr class="font-aneka">
                         <th> Date of birth</th>
                         <td id="drivinglicencephoto">{{$employee->dob}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Date of joining</th>
                         <td id="drivinglicencephoto">{{$employee->doj}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Post Held From</th>
                         <td id="drivinglicencephoto">2{{$employee->post_held_from}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Date of Retirement</th>
                         <td id="drivinglicencephoto">{{$employee->dor}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Designation </th>
                         <td id="drivinglicencephoto">{{$employee->designation}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Group </th>
                         <td id="drivinglicencephoto">{{$employee->group}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Gender </th>
                         <td id="drivinglicencephoto">{{$employee->gender}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Phone </th>
                         <td id="drivinglicencephoto">{{$employee->phone}}</td>
                     </tr>
                     <tr class="font-aneka">
                         <th>Date of Increment </th>
                         <td id="drivinglicencephoto">{{$employee->date_of_increment}}</td>
                     </tr>
                 </table>
             </div>
         </div>
     </div>
 </div>

 @endsection
 @section('script')
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



 <script>
// Hide success message after 30 seconds (30000 ms)
setTimeout(function() {
    let success = document.getElementById('success-alert');
    if (success) {
        success.style.display = 'none';
    }

    let error = document.getElementById('error-alert');
    if (error) {
        error.style.display = 'none';
    }
}, 30000);
 </script>
 @endsection