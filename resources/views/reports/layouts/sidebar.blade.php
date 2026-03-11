 @php
 $url_components = explode('/', Request::url())
 @endphp
 <style>
.fa-angle-right {
    display: none !important;
}
 </style>
 <div class="sidebar-wrapper">
     <div>
         <div class="logo-wrapper"><a href="index-2.html"><img class="img-fluid for-light "
                     src="{{asset('admin/assets/images/login/bbmplogo.png')}}" alt=""><img class="img-fluid for-dark"
                     src="../assets/images/logo/small-white-logo.png" alt=""></a>
             <div class="back-btn"><i class="fa fa-angle-left"></i></div>
         </div>
         <div class="logo-icon-wrapper"><a href="index-2.html"><img class="img-fluid"
                     src="{{asset('admin/assets/images/login/bbmplogo.png')}}" alt=""></a></div>
         <nav class="sidebar-main">
             <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
             <div id="sidebar-menu">
                 <ul class="sidebar-links" id="simple-bar">
                     <li class="back-btn"><a href="index-2.html"><img class="img-fluid"
                                 src="{{asset('admin/assets/images/login/bbmplogo.png')}}" alt=""></a>
                         <div class="mobile-back text-end"><span>Back</span><i class=" ps-2" aria-hidden="true"> </i>
                         </div>
                     </li>






                     @foreach($userModules as $folder)


                     @if($folder->name === "Udyog Aadhaar Memorandum")
                     {{--<li class="sidebar-list"><a class="sidebar-link sidebar-title d-flex flex-row gap-3"
                             href="{{route('msmedashboard')}}">
                             <i class="fa-solid fa-file fs-6"></i>
                             <span class="">{{ $folder->name }}</span></a>

                     </li>
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title d-flex flex-row gap-3"
                             href="{{route('msmedashboardnew')}}">
                             <i class="fa-solid fa-file fs-6"></i>
                             <span class="">{{ $folder->name }} Dashboard</span></a>

                     </li>--}}


                     @elseif($folder->name === "SarojiniMahishi")

                     {{--<li class="sidebar-list"><a class="sidebar-link sidebar-title"
                             href="{{route('sarojinidashboard')}}">
                             <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <g>
                                     <g>
                                         <path d="M15.596 15.6963H8.37598" stroke="#130F26" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round"></path>
                                         <path d="M15.596 11.9365H8.37598" stroke="#130F26" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round"></path>
                                         <path d="M11.1312 8.17725H8.37622" stroke="#130F26" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round"></path>
                                         <path fill-rule="evenodd" clip-rule="evenodd"
                                             d="M3.61011 12C3.61011 18.937 5.70811 21.25 12.0011 21.25C18.2951 21.25 20.3921 18.937 20.3921 12C20.3921 5.063 18.2951 2.75 12.0011 2.75C5.70811 2.75 3.61011 5.063 3.61011 12Z"
                                             stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                             stroke-linejoin="round"></path>
                                     </g>
                                 </g>
                             </svg>
                             <span class="">{{ $folder->name }}</span></a>
                     </li>--}}
                     @elseif($folder->name === "Questions")

                     <li class="sidebar-list"><a class="sidebar-link sidebar-title d-flex flex-row gap-3" href="#">
                             <i class="fa-solid fa-circle-question fs-6"></i>
                             <span class="">{{$folder->name}}</span></a>
                         <ul class="sidebar-submenu">
                             <li><a href="{{route('question.dashboard')}}"> Dashboard</a></li>
                             <li><a href="{{route('question.index')}}"> Questions List</a></li>

                         </ul>
                     </li>

                     @elseif($folder->name === "HRmanagement")
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title d-flex flex-row gap-3" href="#">
                      <i class="fa-solid fa-user fs-6"></i>
                      <span class="">HR Management</span></a>
                      <ul class="sidebar-submenu">
                        <li><a  href="{{ route('employee') }}"> Employee Report</a></li>
                        <li><a style="position:relative;"  href="{{route('profile_update.index')}}">
                           Profile Update Request 
                           @php $pr = App\Models\EmployeeTemp::count(); @endphp
                           <label style="position:absolute;top:9px;right:0px;" class="badge badge-light-danger">
                            {{$pr}}
                          </label>
                          </a>
                        </li>
                      </ul>
                    </li>

                     @elseif($folder->name === "LargeIndustries")
                     {{--<li class="sidebar-list">
                         <a class="sidebar-link sidebar-title d-flex flex-row gap-3" href="{{route('industries')}}">
                             <i class="fa-solid fa-industry fs-6"></i>
                             <span> {{$folder->name}}</span></a>

                     </li>--}}


                     @elseif($folder->name === "usermanagement")
                     {{--<li class="sidebar-list">
                         <a class="sidebar-link sidebar-title d-flex flex-row gap-3" href="{{route('users.index')}}">
                             <i class="fa-solid fa-users fs-6"></i>
                             <span> {{$folder->name}}</span></a>

                     </li>--}}


                     @endif

                     @endforeach
                <li class="sidebar-list"><a class="sidebar-link sidebar-title d-flex flex-row gap-3" href="#">
                  <i class="fa-solid fa-circle-question fs-6"></i>
                  <span class="">Asset Inventory Master</span></a>
                  <ul class="sidebar-submenu">
                    <!-- <li><a  href="{{ route('assets.dashboard') }}"> Dashboard</a></li> -->
                    <li><a  href="{{ route('asset.index') }}"> Dashboard</a></li>
                    <li><a  href="{{route('asset-category.index')}}"> Categories</a></li>
                    <li><a  href="{{route('asset-subcategory.index')}}">Sub-Categories </a></li>
                    <li><a  href="{{route('asset-question.index')}}">Questions </a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title d-flex flex-row gap-3" href="#">
                  <i class="fa-solid fa-circle-question fs-6"></i>
                  <span class="">Leaves Management</span></a>
                  <ul class="sidebar-submenu">
                    <li><a  href="{{route('leave-types.index')}}"> Leave Types</a></li>
                    <li><a  href="{{route('restricted-holidays.index')}}"> Restricted Holidays</a></li>
                    <li><a  href="{{ route('leaves.index') }}"> Leaves List</a></li>
                    <li><a  href="{{route('assigned-list.index')}}"> Assign Reporting Officer</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title d-flex flex-row gap-3" href="#">
                  <i class="fa-solid fa-circle-question fs-6"></i>
                  <span class="">Attendance</span></a>
                  <ul class="sidebar-submenu">
                    <li><a  href="{{route('attendance.index')}}"> Attendance List</a></li>
                    <li><a  href="{{route('gov-holidays.index')}}"> Gov. Holidays</a></li>
                  </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title d-flex flex-row gap-3"
                        href="{{route('asset-access.index')}}">
                        <i class="fa-solid fa-file fs-6"></i>
                        <span class="">Asset Access</span></a>

                </li>

                 </ul>
             </div>
             <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
         </nav>
     </div>
 </div>