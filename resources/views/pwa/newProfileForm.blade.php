 @extends('pwa.layout.app')
 @section('title') Dashboard @endsection
 @section('style')
 <style>
.fontsize {
    font-size: 15px !important;
    font-weight: 600;
    color: black;
}

.otp-input {
    width: 40px;
    height: 40px;
    text-align: center;
    font-size: 20px;
    margin: 0 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.otp-input:focus {
    border-color: #007bff;
    outline: none;
}
 </style>
 @endsection
 @section('content')
 <div class="page-title page-title-small">
     <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Edit Profile
     </h2>
     <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
         data-src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"></a>
 </div>
 <div class="card header-card shape-rounded" data-card-height="90">
     <div class="card-overlay bg-highlight opacity-95"></div>
     <div class="card-overlay dark-mode-tint"></div>
     <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
 </div>

 <!-- <div class="card card-style">
            <div class="content">
                Packed with powerful built pages that are highly customizable and blazing fast to load. We've categorized our pages by purpose to make it easier for you to find them.
            </div>
        </div> -->
 @if(session('success'))
 <div id="success-alert">
     <h6 class="alert bg-success text-white">{{ session('success') }}</h6>
 </div>
 @endif
 <div class="d-flex flex-column gap-2  mt-5 mb-3">
     <!-- <div class="d-flex flex-column align-items-center">
                   <h5 class="font-aneka">Edit Profile</h5>
                </div> -->
     <div class="card m-2" style="border-radius: 20px;box-shadow: 0 0px 8px 0 rgb(0 0 0 / 38%);">
         <div class="card-body">
             <form action="{{ route('pwa.newProfileForm') }}" method="POST" id="form">
                 @csrf
                 <div class="mb-2">
                     <label for="Salutation" class="form-label mb-0 font-aneka fontsize ms-1">Salutation</label>
                     <select class="form-select" aria-label="Default select example" name="salutation"
                         class="font-aneka" style="font-size:12px">
                         <option selected class="font-aneka">Select salutation</option>
                         <option value="Sri" class="font-aneka" {{$employee->salutation == 'Sri' ? 'selected' : ''}}>Sri
                         </option>
                         <option value="Smt" class="font-aneka" {{$employee->salutation == 'Smt' ? 'selected' : ''}}>Smt
                         </option>
                     </select>
                 </div>
                 <div class="mb-2">
                     <label for="Name" class="form-label mb-0 font-aneka fontsize ms-1">Name</label>
                     <input type="text" class="form-control" id="Name" placeholder="enter name" name="emp_name"
                         value="{{$employee->emp_name}}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')">
                 </div>
                 <div class="mb-2">
                     <label for="Gender" class="form-label mb-0 font-aneka fontsize ms-1">Gender</label>
                     <select class="form-select" aria-label="Default select example" class="font-aneka"
                         style="font-size:12px" name="gender">
                         <option selected class="font-aneka">Select gender</option>
                         <option value="Male" class="font-aneka" {{$employee->gender == 'Male' ? 'selected' : ''}}>Male
                         </option>
                         <option value="Female" class="font-aneka" {{$employee->gender == 'Female' ? 'selected' : ''}}>
                             Female</option>
                         <option value="Others" class="font-aneka" {{$employee->gender == 'Others' ? 'selected' : ''}}>
                             Others</option>
                     </select>
                 </div>
                 <div class="mb-2">
                     <label for="DOB" class="form-label mb-0 font-aneka fontsize ms-1">DOB</label>
                     <input type="date" class="form-control" id="DOB" placeholder="enter dob" name="dob"
                         value="{{$employee->dob}}">
                 </div>
                 <div class="mb-2">
                     <label for="phoneNo" class="form-label mb-0 font-aneka fontsize ms-1">Phone No. <span class="" style="font-weight: 100 !important;font-size: 14px;">Note:- Phone number linked to HRMS</span>    </label>
                     <input type="text" class="form-control" id="phoneNo" placeholder="enter phone no" name="phone"
                         value="{{$employee->phone}}"  maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10)">
                 </div>
                 <div class="mb-2">
                     <label for="Permanent_Address" class="form-label mb-0 font-aneka fontsize ms-1">
                         Permanent Address
                     </label>
                     <input type="text" class="form-control" id="Permanent_Address"
                         placeholder="Enter permanent address" name="address" value="{{$employee->address}}">
                 </div>

                 <!-- <div class="form-check">
                     <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                         Same as Permanent Address
                     </label>
                 </div> -->

                 <div class="mb-2">
                     <label for="correspondance_Address" class="form-label mb-0 font-aneka fontsize ms-1">
                         Office Address
                     </label>
                     <input type="text" class="form-control" id="correspondance_Address"
                         placeholder="Enter office address" name="temp_address"
                         value="{{$employee->temp_address}}">
                 </div>

                 <hr>
                 <div class="mb-2 d-flex flex-column gap-2">
                     <span class="font-aneka text-center"
                         style="font-size: 17px;font-weight: 700;color: black;">Caste</span>

                     <span>
                         <label for="Category" class="form-label mb-0 font-aneka fontsize ms-1">Category</label>
                         <select id="category" class="form-select font-aneka" style="font-size:12px" name="category">
                             <option value="" selected>Select Category</option>
                             @foreach($categories as $category)
                             <option value="{{$category}}" {{ $employee->category == $category ? 'selected' : '' }}>
                                 {{$category}}</option>
                             @endforeach
                         </select>
                     </span>

                     <span>
                         <label for="Caste" class="form-label mb-0 font-aneka fontsize ms-1">Caste</label>
                         <select id="caste" class="form-select font-aneka" style="font-size:12px" name="sub_category">
                             <option value="" selected>Select Caste</option>
                             @foreach($castes as $caste)
                             <option value="{{$caste}}" {{ $employee->sub_category == $caste ? 'selected' : '' }}>
                                 {{$caste}}</option>
                             @endforeach
                         </select>
                     </span>

                     <span>
                         <label for="subCaste" class="form-label mb-0 font-aneka fontsize ms-1">Sub Caste</label>
                         <input type="text" class="form-control" id="subcaste" placeholder="enter sub caste"
                             name="sub_caste" value="{{ $employee->sub_caste }}">
                     </span>
                 </div>
                 <hr>

                 <div class="mb-2">
                     <label for="doj" class="form-label mb-0 font-aneka fontsize ms-1">Date of Joining</label>
                     <input type="date" class="form-control" id="doj" placeholder="" name="doj" value="{{ $employee->doj }}">
                 </div>
                 <div class="mb-2">
                     <label for="kgid" class="form-label mb-0 font-aneka fontsize ms-1">KGID / Metal Number</label>
                     <input type="text" class="form-control" id="kgid" name="kgid" placeholder="enter kgid / metal no"
                         value="{{ $employee->kgid }}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')">
                 </div>
                 <div class="mb-2">
                     <label for="kgid" class="form-label mb-0 font-aneka fontsize ms-1">Mode of Recuritment</label>
                     <select class="form-select" aria-label="Default select example" style="font-size:12px"
                         name="DR_PR">
                         <option value="" selected>select mode of recuritment</option>
                         <option value="DR" {{$employee->DR_PR == 'DR' ? 'selected' : ''}}>DR</option>
                         <option value="PR" {{$employee->DR_PR == 'PR' ? 'selected' : ''}}>PR</option>
                     </select>
                 </div>
                 <div class="mb-2">
                     <label for="kgid" class="form-label mb-0 font-aneka fontsize ms-1">HK / RPC</label>
                     <select class="form-select" aria-label="Default select example" style="font-size:12px" name="HK">
                         <option value="" selected>select mode of HK / RPC</option>
                         <option value="HK" {{$employee->HK == 'HK' ? 'selected' : ''}}>HK</option>
                         <option value="RPC" {{$employee->HK == 'RPC' ? 'selected' : ''}}>RPC</option>
                     </select>
                 </div>
                 <hr>
                 <div class="mb-2 d-flex flex-column gap-2">
                     <span class="font-aneka text-center" style="font-size: 17px;font-weight: 700;color: black;">Current Posting
                         Details</span>

                     <span>
                         <label for="postHeld" class="form-label mb-0 font-aneka fontsize ms-1">Post Held</label>
                         <input name="post_held" value="{{ $employee->post_held }}" type="text" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" class="form-control" id="postHeld" placeholder="Enter post held">
                     </span>

                     <span>
                         <label for="group" class="form-label mb-0 font-aneka fontsize ms-1">Group</label>
                         <select id="group" class="form-select font-aneka" style="font-size:12px" name="post_group"
                             onchange="getDesignations(this.value)">
                             <option value="" selected>Select Group</option>
                             @foreach($groups as $group)
                             <option value="{{$group}}" {{$employee->post_group == $group ? 'selected' : ''}}>{{$group}}</option>
                             @endforeach
                         </select>
                     </span>

                     <span>
                         <label for="designation" class="form-label mb-0 font-aneka fontsize ms-1">Designation</label>
                         <select id="designation" class="form-select font-aneka" style="font-size:12px" name="post_designation">
                             <option value="" selected disabled>Select designation</option>
                             @foreach($designations as $designation)
                             <option value="{{$designation}}" {{$employee->post_designation == $designation ? 'selected' : ''}}>{{$designation}}</option>
                             @endforeach
                         </select>
                     </span>

                     <span>
                         <label for="orgName" class="form-label mb-0 font-aneka fontsize ms-1">Organization Name</label>
                         <input name="post_organization" value="{{ $employee->post_organization }}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" type="text" class="form-control" id="orgName" placeholder="Enter organization name">
                     </span>

                     <span>
                         <label for="district" class="form-label mb-0 font-aneka fontsize ms-1">District</label>
                         <select id="district" class="form-select font-aneka" style="font-size:12px" name="post_district"
                             onchange="getTaluks(this.value)">
                             <option value="" selected>Select district</option>
                             @foreach($districts as $district)
                             <option value="{{$district}}" {{$employee->post_district == $district ? 'selected' : ''}}>{{$district}}</option>
                             @endforeach
                         </select>
                     </span>

                     <span>
                         <label for="taluk" class="form-label mb-0 font-aneka fontsize ms-1">Taluk</label>
                         <select id="taluk" class="form-select font-aneka" style="font-size:12px" name="post_taluk">
                             <option value="" selected>Select taluk</option>
                             @foreach($taluks as $taluk)
                             <option value="{{$taluk}}" {{$employee->post_taluk == $taluk ? 'selected' : ''}}>{{$taluk}}</option>
                             @endforeach
                         </select>
                     </span>

                     <!-- <div class="mb-2">
                         <label for="posting" class="form-label mb-0 font-aneka fontsize ms-1">Posting</label>
                         <select id="posting" class="form-select font-aneka" style="font-size:12px">
                             <option value="" selected>Select posting</option>
                             <option value="Regular">Regular</option>
                             <option value="Rule 32">Rule 32</option>
                             <option value="I/C">I/C</option>
                             <option value="Deputation">Deputation</option>
                         </select>
                     </div> -->

                     <div class="mb-2">
                         <label for="fromDate" class="form-label mb-0 font-aneka fontsize ms-1">From Date</label>
                         <input type="date" class="form-control" id="fromDate" name="post_from" value="{{ $employee->post_from }}">
                     </div>

                     <div class="mb-2">
                         <label for="toDate" class="form-label mb-0 font-aneka fontsize ms-1">To Date</label>
                         <input type="date" class="form-control" id="toDate" name="post_to" value="{{ $employee->post_to }}">
                     </div>

                     <div class="mb-2">
                         <label for="payScale" class="form-label mb-0 font-aneka fontsize ms-1">Pay Scale</label>
                         <input type="text" class="form-control" id="payScale" name="post_pay_scale" value="{{ $employee->post_pay_scale }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  placeholder="Enter pay scale">
                     </div>

                     <!-- <div class="mb-2">
                         <label for="incrementDate" class="form-label mb-0 font-aneka fontsize ms-1">Increment
                             Date</label>
                         <input type="date" class="form-control" id="incrementDate">
                     </div> -->

                     <!-- <div class="mb-2">
                         <label for="type" class="form-label mb-0 font-aneka fontsize ms-1">Type</label>
                         <select id="type" class="form-select font-aneka" style="font-size:12px">
                             <option value="" selected>Select type</option>
                             <option value="Ex-Cadre">Ex-Cadre</option>
                             <option value="En-Cadre">En-Cadre</option>
                             <option value="Cadre">Cadre</option>
                         </select>
                     </div> -->

                     <!-- <div class="d-flex flex-column align-items-center">
                         <button id="addBtn1" type="button" class="btn btn-primary"
                             style="border-radius:8px">Update</button>
                     </div> -->

                     <!-- Posting Table -->
                      {{--
                     <div id="postingTableContainer"
                         style="display:{{ $employee->postings->count() ? 'block' : 'none' }}; margin-top:20px;    overflow-x: scroll;">
                         <table class="table table-bordered text-center">
                             <thead class="table-dark">
                                 <tr>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Post Held</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Group</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Designation</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Organization
                                     </th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">District</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Taluk</th>
                                     <!-- <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Posting</th> -->
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">From</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">To</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Pay Scale</th>
                                     <!-- <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Increment</th> -->
                                     <!-- <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Type</th> -->
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Action</th>
                                 </tr>
                             </thead>
                             <tbody id="postingTableBody">
                                 @foreach($employee->postings as $posting)
                                 <tr id="posting_row-{{$posting->id}}">
                                     <td class="font-aneka">{{$posting->post_held}}</td>
                                     <td class="font-aneka">{{$posting->group}}</td>
                                     <td class="font-aneka">{{$posting->designation}}</td>
                                     <td class="font-aneka">{{$posting->organization}}</td>
                                     <td class="font-aneka">{{$posting->district}}</td>
                                     <td class="font-aneka">{{$posting->taluk}}</td>
                                     <!-- <td class="font-aneka">{{$posting->posting}}</td> -->
                                     <td class="font-aneka">{{$posting->from}}</td>
                                     <td class="font-aneka">{{$posting->to}}</td>
                                     <td class="font-aneka">{{$posting->pay_scale}}</td>
                                     <!-- <td class="font-aneka">{{$posting->increment_date}}</td> -->
                                     <!-- <td class="font-aneka">{{$posting->type}}</td> -->
                                     <td class="font-aneka"><button class="btn btn-edit" data-id="{{$posting->id}}"
                                             data-type="old" type="button" style="border-radius: 5px;"><i
                                                 class="bi bi-pencil-square"></i></button></td>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>--}}
                 </div>

                 <hr>
                 <div class="mb-2 d-flex flex-column gap-2">
                     <span class="font-aneka text-center" style="font-size: 17px;font-weight: 700;color: black;">
                         Spouse Details
                     </span>

                     <span>
                         <label for="areYouMarried" class="form-label mb-0 font-aneka fontsize ms-1">Are you
                             married</label>
                         <select id="areYouMarried" class="form-select font-aneka" style="font-size:12px" name="is_married">
                             <option value="" selected disabled>Select spouse</option>
                             <option value="Yes" {{$employee->is_married == 'Yes' ? 'selected' : ''}}>Yes</option>
                             <option value="No" {{$employee->is_married == 'No' ? 'selected' : ''}}>No</option>
                         </select>
                     </span>

                     <!-- Spouse fields container -->
                     <div id="spouseFields" style="display: {{$employee->is_married == 'Yes' ? 'block' : 'none'}};">
                         <div class="d-flex flex-column gap-2">
                             <span>
                                 <label for="SpouseName" class="form-label mb-0 font-aneka fontsize ms-1">Name</label>
                                 <input name="spouse_name" value="{{$employee->spouse_name }}" type="text" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" class="form-control" id="SpouseName" placeholder="Enter name">
                             </span>
                             <span>
                                 <label for="SpouseGender"
                                     class="form-label mb-0 font-aneka fontsize ms-1">Gender</label>
                                 <select id="SpouseGender" class="form-select font-aneka" style="font-size:12px" name="spouse_gender">
                                     <option value="" selected disabled>Select gender</option>
                                     <option value="Male" {{$employee->spouse_gender == 'Male' ? 'selected' : ''}}>Male</option>
                                     <option value="Female" {{$employee->spouse_gender == 'Female' ? 'selected' : ''}}>Female</option>
                                     <option value="Others" {{$employee->spouse_gender == 'Others' ? 'selected' : ''}}>Others</option>
                                 </select>
                             </span>
                             <span>
                                 <label for="SpousePhoneNO" class="form-label mb-0 font-aneka fontsize ms-1">Phone
                                     Number</label>
                                 <input name="spouse_phone" value="{{$employee->spouse_phone }}"  maxlength="10"
       oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10)" type="text" class="form-control" id="SpousePhoneNO"
                                     placeholder="Enter phone number">
                             </span>
                             <span>
                                 <label for="SpouseAretheyworking" class="form-label mb-0 font-aneka fontsize ms-1">
                                     Are they working
                                 </label>
                                 <select id="SpouseAretheyworking" class="form-select font-aneka" name="is_spouse_working"
                                     style="font-size:12px">
                                     <option value="" selected disabled>Select are they working</option>
                                     <option value="Yes" {{$employee->is_spouse_working == 'Yes' ? 'selected' : ''}}>Yes</option>
                                     <option value="No" {{$employee->is_spouse_working == 'No' ? 'selected' : ''}}>No</option>
                                 </select>
                             </span>

                             <!-- Hidden fields for "Yes" -->
                             <div id="workingFields" style="display: {{$employee->is_spouse_working == 'Yes' ? 'block' : 'none'}};">
                                 <div class="d-flex flex-column gap-2">
                                     <span>
                                         <label for="Spouseworkingin"
                                             class="form-label mb-0 font-aneka fontsize ms-1">Working in</label>
                                         <select id="Spouseworkingin" class="form-select font-aneka" name="spouse_working_in"
                                             style="font-size:12px">
                                             <option value="" selected disabled>Select work</option>
                                             <option value="Govt" {{$employee->spouse_working_in == 'Govt' ? 'selected' : ''}}>Govt</option>
                                             <option value="Private" {{$employee->spouse_working_in == 'Private' ? 'selected' : ''}}>Private</option>
                                         </select>
                                     </span>

                                     <!-- KGID Number (hidden initially) -->
                                     <span id="kgidField" style="display: {{$employee->spouse_working_in == 'Govt' ? 'block' : 'none'}};">
                                         <label for="SpouseKGIDNumber"
                                             class="form-label mb-0 font-aneka fontsize ms-1">KGID Number</label>
                                         <input name="spouse_kgid" value="{{$employee->spouse_kgid }}" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '')" type="text" class="form-control" id="SpouseKGIDNumber"
                                             placeholder="Enter KGID no">
                                     </span>

                                     <span>
                                         <label for="SpousePlaceWorking"
                                             class="form-label mb-0 font-aneka fontsize ms-1">Place of Working</label>
                                         <input name="spouse_working_place" value="{{$employee->spouse_working_place }}" type="text" class="form-control" id="SpousePlaceWorking"
                                             placeholder="Enter place of working">
                                     </span>

                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
                 <hr>
                 <div class="mb-2 d-flex flex-column gap-2">
                     <span class="font-aneka text-center" style="font-size: 17px;font-weight: 700;color: black;">Nominee
                         Details</span>

                     <span>
                         <label class="form-label mb-0 font-aneka fontsize ms-1">Name</label>
                         <input type="text" name="nominee_name" value="{{$employee->nominee_name }}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" id="nomineeName" class="form-control" placeholder="Enter name">
                     </span>

                     <span>
                         <label for="nomineeGender" class="form-label mb-0 font-aneka fontsize ms-1">Gender</label>
                         <select id="nomineeGender" class="form-select font-aneka" style="font-size:12px" name="nominee_gender">
                             <option value="" selected>Select gender</option>
                             <option value="Male" {{$employee->nominee_gender == 'Male' ? 'selected' : ''}}>Male</option>
                             <option value="Female" {{$employee->nominee_gender == 'Female' ? 'selected' : ''}}>Female</option>
                             <option value="Other" {{$employee->nominee_gender == 'Other' ? 'selected' : ''}}>Other</option>
                         </select>
                     </span>

                     <span>
                         <label for="nomineeDoB" class="form-label mb-0 font-aneka fontsize ms-1">DoB</label>
                         <input type="date" id="nomineeDoB" class="form-control" name="nominee_dob" value="{{$employee->nominee_dob }}">
                     </span>

                     <span>
                         <label class="form-label mb-0 font-aneka fontsize ms-1">Relationship</label>
                         <select id="nomineeRelationship" class="form-select font-aneka" style="font-size:12px" name="nominee_relation">
                             <option value="" selected>Select Relationship</option>
                             <option value="Wife" {{$employee->nominee_relation == 'Wife' ? 'selected' : ''}}>Wife</option>
                             <option value="Husband" {{$employee->nominee_relation == 'Husband' ? 'selected' : ''}}>Husband</option>
                             <option value="Mother" {{$employee->nominee_relation == 'Mother' ? 'selected' : ''}}>Mother</option>
                             <option value="Father" {{$employee->nominee_relation == 'Father' ? 'selected' : ''}}>Father</option>
                             <option value="Daughter" {{$employee->nominee_relation == 'Daughter' ? 'selected' : ''}}>Daughter</option>
                             <option value="Son" {{$employee->nominee_relation == 'Son' ? 'selected' : ''}}>Son</option>
                             <option value="Other" {{$employee->nominee_relation == 'Other' ? 'selected' : ''}}>Other</option>
                         </select>
                     </span>

                     <!-- <div class="d-flex flex-column align-items-center">
                         <button id="addNomineeBtn" type="button" class="btn btn-primary"
                             style="border-radius:8px">Update</button>
                     </div> -->

                     <!-- Table hidden initially -->
                     <!-- <div id="nomineeTableContainer"
                         style="display:{{ $employee->nominees->count() ? 'block' : 'none' }}; margin-top:20px;">
                         <table class="table table-bordered text-center">
                             <thead class="table-dark">
                                 <tr>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Name</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Gender</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">DOB</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Relationship
                                     </th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Action</th>
                                 </tr>
                             </thead>
                             <tbody id="nomineeTableBody">
                                 @foreach($employee->nominees as $nominee)
                                 <tr>
                                     <td class="font-aneka">{{$nominee->name}}</td>
                                     <td class="font-aneka">{{$nominee->gender}}</td>
                                     <td class="font-aneka">{{$nominee->dob}}</td>
                                     <td class="font-aneka">{{$nominee->relation}}</td>
                                     <td class="font-aneka"><button class="btn" type="button"
                                             style="border-radius: 5px;"><i class="bi bi-pencil-square"></i></button>
                                     </td>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div> -->
                 </div>

                 <hr>
                 <div class="mb-2 d-flex flex-column gap-2">
                     <span class="font-aneka text-center" style="font-size: 17px;font-weight: 700;color: black;">
                         Children Details
                     </span>

                     <span>
                         <label class="form-label mb-0 font-aneka fontsize ms-1">Name</label>
                         <input type="text" id="childrenName" class="form-control" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" placeholder="Enter name">
                     </span>

                     <span>
                         <label for="childrenGender" class="form-label mb-0 font-aneka fontsize ms-1">Gender</label>
                         <select id="childrenGender" class="form-select font-aneka" style="font-size:12px">
                             <option value="" selected>Select gender</option>
                             <option value="Male">Male</option>
                             <option value="Female">Female</option>
                         </select>
                     </span>

                     <span>
                         <label for="childrenDoB" class="form-label mb-0 font-aneka fontsize ms-1">DoB</label>
                         <input type="date" id="childrenDoB" class="form-control">
                     </span>

                     <div class="d-flex flex-column align-items-center">
                         <button id="addChildrenBtn" type="button" class="btn btn-primary" style="border-radius:8px">
                             Add
                         </button>
                     </div>

                     <!-- Table hidden initially -->
                     <div id="childrenTableContainer"
                         style="display:{{ $employee->children->count() ? 'block' : 'none' }}; margin-top:20px;">
                         <table class="table table-bordered text-center">
                             <thead class="table-dark">
                                 <tr>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Name</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Gender</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">DOB</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Action</th>
                                 </tr>
                             </thead>
                             <tbody id="childrenTableBody">
                                 @foreach($employee->children as $child)
                                 <tr id="child_row-{{$child->id}}">
                                     <td class="font-aneka">{{$child->name}}</td>
                                     <td class="font-aneka">{{$child->gender}}</td>
                                     <td class="font-aneka">{{$child->dob}}</td>
                                     <td class="font-aneka"><button data-id="{{$child->id}}" data-type="old"
                                             class="btn btn-edit" type="button" style="border-radius: 5px;"><i
                                                 class="bi bi-pencil-square"></i></button></td>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>


                 <hr>
                 <div id="policyFormSection" class="mb-2 d-flex flex-column gap-2">
                     <span class="font-aneka text-center" style="font-size: 17px;font-weight: 700;color: black;">
                         KGID Policy Details
                     </span>

                     <span>
                         <label class="form-label mb-0 font-aneka fontsize ms-1">Policy No.</label>
                         <input type="text" id="policyNo" class="form-control" placeholder="Enter policy no.">
                         <input type="hidden" id="policyId">
                     </span>

                     <span>
                         <label class="form-label mb-0 font-aneka fontsize ms-1">Policy Start Date</label>
                         <input type="date" id="policyStartDate" class="form-control">
                     </span>

                     <span>
                         <label for="premium" class="form-label mb-0 font-aneka fontsize ms-1">Premium</label>
                         <input type="text" id="premium" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Enter premium">
                     </span>

                     <div class="d-flex flex-column align-items-center">
                         <button id="addPolicyBtn" type="button" class="btn btn-primary" style="border-radius:8px">
                             Add
                         </button>
                     </div>

                     <!-- Table hidden initially -->
                     <div id="policyTableContainer"
                         style="display:{{ $employee->policies->count() ? 'block' : 'none' }}; margin-top:20px;">
                         <table class="table table-bordered text-center">
                             <thead class="table-dark">
                                 <tr>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Policy No.</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Policy Start
                                         Date</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Premium</th>
                                     <th class="font-aneka"
                                         style="background: #183b4a !important;color: #fff !important;">Action</th>
                                 </tr>
                             </thead>
                             <tbody id="policyTableBody">
                                 @foreach($employee->policies as $policy)
                                 <tr id="policy_row-{{$policy->id}}">
                                     <td class="font-aneka">{{$policy->number}}</td>
                                     <td class="font-aneka">{{$policy->start_date}}</td>
                                     <td class="font-aneka">{{$policy->premium}}</td>
                                     <td class="font-aneka"><button data-id="{{$policy->id}}" data-type="old"
                                             class="btn btn-edit" type="button" style="border-radius: 5px;"><i
                                                 class="bi bi-pencil-square"></i></button></td>
                                 </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>



                 <hr>


                 <div class="d-flex flex-column align-items-center justify-content-center mb-4">
                     <button class="btn btn-primary" id="submitBtn" type="button"
                         style="border-radius: 10px;">Update</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content" style="border-radius: 10px;">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="staticBackdropLabel">OTP Verification</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="text-center mb-3">
                     OTP has been sent via SMS to <span id="otp_number"> <strong> </strong> </span>
                 </div>
                 <div class="d-flex justify-content-center">
                     <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                     <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                     <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                     <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                     <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                     <input type="text" maxlength="1" class="otp-input" name="otp[]" required>
                 </div>
                 <div class="text-center mt-3">
                     <span class="text-danger" id="otp_err"></span>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" style="border-radius: 10px;"
                     data-bs-dismiss="modal">Cancel</button>
                 <button type="button" id="verify_otp" class="btn btn-primary" style="border-radius: 10px;">Verify
                     OTP</button>
             </div>
         </div>
     </div>
 </div>

 @endsection
 @section('script')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
     integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script>
let editingPolicyRowId = null; // Track row being edited
let editingPolicyRowType = null; // Track row being edited

// Handle Update / Add
document.getElementById("addPolicyBtn").addEventListener("click", function() {
    const policyNo = document.getElementById("policyNo").value.trim();
    const policyStartDate = document.getElementById("policyStartDate").value;
    const premium = document.getElementById("premium").value.trim();

    if (!policyNo || !policyStartDate || !premium) {
        alert("Please fill all fields");
        return;
    }

    if (editingPolicyRowId) {
        // Update existing row
        const row = document.getElementById(editingPolicyRowId);
        row.innerHTML = "";
        console.log(editingPolicyRowId);

        let newId = editingPolicyRowId.split("-").slice(1).join("-");
        let updated = `
              <td>${policyNo}</td>
              <td>${policyStartDate}</td>
              <td>${premium}</td>
              <td>
                <button type="button" class="btn btn-edit" data-id="${newId}" data-type="${editingPolicyRowType}">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </td>
              <input type="hidden" name="policies[${newId}][number]" value="${policyNo}"/>
              <input type="hidden" name="policies[${newId}][start_date]" value="${policyStartDate}"/>
              <input type="hidden" name="policies[${newId}][premium]" value="${premium}"/>`;
        if (editingPolicyRowType == 'old') updated +=
            `<input type="hidden" name="policies[${newId}][id]" value="${newId}"/>`;
        else updated += `<input type="hidden" name="policies[${newId}][id]" value=""/>`;
        row.innerHTML = updated;

        editingPolicyRowId = null; // reset edit mode
    } else {
        // Add new row
        const uuid = crypto.randomUUID();
        const rowId = "policy_row-" + uuid;

        const row = `
            <tr id="${rowId}">
              <td>${policyNo}</td>
              <td>${policyStartDate}</td>
              <td>${premium}</td>
              <td>
                <button type="button" class="btn btn-edit" data-id="${uuid}" data-type="new">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </td>
              <input type="hidden" name="policies[${uuid}][id]" value=""/>
              <input type="hidden" name="policies[${uuid}][number]" value="${policyNo}"/>
              <input type="hidden" name="policies[${uuid}][start_date]" value="${policyStartDate}"/>
              <input type="hidden" name="policies[${uuid}][premium]" value="${premium}"/>
            </tr>`;
        document.getElementById("policyTableBody").insertAdjacentHTML("beforeend", row);
    }

    // Clear inputs
    document.getElementById("policyNo").value = "";
    document.getElementById("policyStartDate").value = "";
    document.getElementById("premium").value = "";
});

// Handle Edit
document.getElementById("policyTableBody").addEventListener("click", function(e) {

    if (e.target.closest(".btn-edit")) {
        const btn = e.target.closest(".btn-edit");
        const rowId = 'policy_row-' + btn.getAttribute("data-id");
        const row = document.getElementById(rowId);

        console.log(rowId, row, btn);


        const policyNo = row.querySelector("td:nth-child(1)").innerText;
        const startDate = row.querySelector("td:nth-child(2)").innerText;
        const premium = row.querySelector("td:nth-child(3)").innerText;

        // Fill inputs
        document.getElementById("policyNo").value = policyNo;
        document.getElementById("policyStartDate").value = startDate;
        document.getElementById("premium").value = premium;

        // Set editing row
        editingPolicyRowId = rowId;
        editingPolicyRowType = btn.getAttribute("data-type")
    }
});
 </script>
 <script>
let editingChildRowId = null; // Track row being edited
let editingChildRowType = null; // Track row being edited

// Handle Update / Add
document.getElementById("addChildrenBtn").addEventListener("click", function() {
    const name = document.getElementById("childrenName").value.trim();
    const gender = document.getElementById("childrenGender").value;
    const dob = document.getElementById("childrenDoB").value;

    if (!name || !gender || !dob) {
        alert("Please fill all fields");
        return;
    }

    if (editingChildRowId) {
        // Update existing row
        const row = document.getElementById(editingChildRowId);
        row.innerHTML = "";

        let newId = editingChildRowId.split("-").slice(1).join("-");
        let updated = `
              <td class="font-aneka">${name}</td>
              <td class="font-aneka">${gender}</td>
              <td class="font-aneka">${dob}</td>
              <td>
                <button type="button" class="btn btn-edit" data-id="${newId}" data-type="${editingChildRowType}">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </td>
              <input type="hidden" name="children[${newId}][name]" value="${name}"/>
              <input type="hidden" name="children[${newId}][gender]" value="${gender}"/>
              <input type="hidden" name="children[${newId}][dob]" value="${dob}"/>`;
        if (editingChildRowType == 'old') updated +=
            `<input type="hidden" name="children[${newId}][id]" value="${newId}"/>`;
        else updated += `<input type="hidden" name="children[${newId}][id]" value=""/>`;
        row.innerHTML = updated;

        editingChildRowId = null; // reset edit mode
    } else {
        // Add new row
        const uuid = crypto.randomUUID();
        const rowId = "child_row-" + uuid;

        const row = `
            <tr id="${rowId}">
              <td class="font-aneka">${name}</td>
              <td class="font-aneka">${gender}</td>
              <td class="font-aneka">${dob}</td>
              <td>
                <button type="button" class="btn btn-edit" data-id="${uuid}" data-type="new">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </td>
              <input type="hidden" name="children[${uuid}][id]" value=""/>
              <input type="hidden" name="children[${uuid}][name]" value="${name}"/>
              <input type="hidden" name="children[${uuid}][gender]" value="${gender}"/>
              <input type="hidden" name="children[${uuid}][dob]" value="${dob}"/>
            </tr>`;
        document.getElementById("childrenTableBody").insertAdjacentHTML("beforeend", row);
    }

    // Clear inputs
    document.getElementById("childrenName").value = "";
    document.getElementById("childrenGender").value = "";
    document.getElementById("childrenDoB").value = "";
});

// Handle Edit
document.getElementById("childrenTableBody").addEventListener("click", function(e) {

    if (e.target.closest(".btn-edit")) {
        const btn = e.target.closest(".btn-edit");
        const rowId = 'child_row-' + btn.getAttribute("data-id");
        const row = document.getElementById(rowId);

        const childrenName = row.querySelector("td:nth-child(1)").innerText;
        const childrenGender = row.querySelector("td:nth-child(2)").innerText;
        const childrenDoB = row.querySelector("td:nth-child(3)").innerText;

        // Fill inputs
        document.getElementById("childrenName").value = childrenName;
        document.getElementById("childrenGender").value = childrenGender;
        document.getElementById("childrenDoB").value = childrenDoB;

        // Set editing row
        editingChildRowId = rowId;
        editingChildRowType = btn.getAttribute("data-type")
    }
});
 </script>
 <script>
let nomineeCount = 0;

document.getElementById("addNomineeBtn").addEventListener("click", function() {
    const name = document.getElementById("nomineeName").value.trim();
    const gender = document.getElementById("nomineeGender").value;
    const dob = document.getElementById("nomineeDoB").value;
    const relation = document.getElementById("nomineeRelationship").value.trim();

    if (!name || !gender || !dob || !relation) {
        alert("Please fill all fields");
        return;
    }

    nomineeCount++;

    // Show table
    document.getElementById("nomineeTableContainer").style.display = "block";
    let uuid = crypto.randomUUID();
    // Add row
    const row = `
        <tr>
          <input type="hidden" name="nominees[${uuid}][name]" value="${name}"/>
          <input type="hidden" name="nominees[${uuid}][gender]" value="${gender}"/>
          <input type="hidden" name="nominees[${uuid}][dob]" value="${dob}"/>
          <input type="hidden" name="nominees[${uuid}][relation]" value="${relation}"/>
          <td class="font-aneka" >${name}</td>
          <td class="font-aneka" >${gender}</td>
          <td class="font-aneka" >${dob}</td>
          <td class="font-aneka" >${relation}</td>
        </tr>`;
    document.getElementById("nomineeTableBody").insertAdjacentHTML("beforeend", row);

    // Clear inputs
    document.getElementById("nomineeName").value = "";
    document.getElementById("nomineeGender").value = "";
    document.getElementById("nomineeDoB").value = "";
    document.getElementById("nomineeRelationship").value = "";
});
 </script>
 <script>
document.getElementById("addBtn1").addEventListener("click", function() {
    let postHeld = document.getElementById("postHeld").value;
    let group = document.getElementById("group").value;
    let designation = document.getElementById("designation").value;
    let orgName = document.getElementById("orgName").value;
    let district = document.getElementById("district").value;
    let taluk = document.getElementById("taluk").value;
    let posting = document.getElementById("posting").value;
    let fromDate = document.getElementById("fromDate").value;
    let toDate = document.getElementById("toDate").value;
    let payScale = document.getElementById("payScale").value;
    let incrementDate = document.getElementById("incrementDate").value;
    let type = document.getElementById("type").value;

    if (!postHeld || !group || !designation || !orgName || !district || !taluk || !posting || !fromDate || !
        toDate || !payScale || !incrementDate || !type) {
        alert("Please fill all fields!");
        return;
    }

    document.getElementById("postingTableContainer").style.display = "block";
    let uuid = crypto.randomUUID();
    let row = `
      <tr>
        <input type="hidden" name="postings[${uuid}][post_held]" value="${postHeld}"/>
        <input type="hidden" name="postings[${uuid}][group]" value="${group}"/>
        <input type="hidden" name="postings[${uuid}][designation]" value="${designation}"/>
        <input type="hidden" name="postings[${uuid}][organization]" value="${orgName}"/>
        <input type="hidden" name="postings[${uuid}][district]" value="${district}"/>
        <input type="hidden" name="postings[${uuid}][taluk]" value="${taluk}"/>
        <input type="hidden" name="postings[${uuid}][posting]" value="${posting}"/>
        <input type="hidden" name="postings[${uuid}][from]" value="${fromDate}"/>
        <input type="hidden" name="postings[${uuid}][to]" value="${toDate}"/>
        <input type="hidden" name="postings[${uuid}][pay_scale]" value="${payScale}"/>
        <input type="hidden" name="postings[${uuid}][increment_date]" value="${incrementDate}"/>
        <input type="hidden" name="postings[${uuid}][type]" value="${type}"/>
        <td class="font-aneka">${postHeld}</td>
        <td class="font-aneka">${group}</td>
        <td class="font-aneka"d>${designation}</td>
        <td class="font-aneka">${orgName}</td>
        <td class="font-aneka">${district}</td>
        <td class="font-aneka">${taluk}</td>
        <td class="font-aneka">${posting}</td>
        <td class="font-aneka">${fromDate}</td>
        <td class="font-aneka">${toDate}</td>
        <td class="font-aneka">${payScale}</td>
        <td class="font-aneka">${incrementDate}</td>
        <td class="font-aneka">${type}</td>
      </tr>`;

    document.getElementById("postingTableBody").innerHTML += row;
});
 </script>
 <script>
const permanentInput = document.getElementById("Permanent_Address");
const correspondenceInput = document.getElementById("correspondance_Address");
const checkbox = document.getElementById("flexCheckDefault");

checkbox.addEventListener("change", function() {
    if (this.checked) {
        correspondenceInput.value = permanentInput.value;
        correspondenceInput.setAttribute("readonly", true); // lock input when copied
    } else {
        correspondenceInput.value = "";
        correspondenceInput.removeAttribute("readonly"); // allow typing again
    }
});

// Keep updating if user edits permanent address while checked
permanentInput.addEventListener("input", function() {
    if (checkbox.checked) {
        correspondenceInput.value = this.value;
    }
});
 </script>
 <script>
const addBtn = document.getElementById("addBtn");
const category = document.getElementById("category");
const caste = document.getElementById("caste");
const subcaste = document.getElementById("subcaste");
const tableContainer = document.getElementById("casteTableContainer");
const tableBody = document.getElementById("casteTableBody");



addBtn.addEventListener("click", function() {
    if (category.value && caste.value && subcaste.value) {
        // Show table
        tableContainer.style.display = "block";
        let uuid = crypto.randomUUID();
        // Insert row
        const row = `<tr>
                      <input type="hidden" name="castes[${uuid}][category]" value="${category.value}"/>
                      <input type="hidden" name="castes[${uuid}][caste]" value="${caste.value}"/>
                      <input type="hidden" name="castes[${uuid}][sub_caste]" value="${subcaste.value}"/>
                     <td class="font-aneka">${category.value}</td>
                     <td class="font-aneka">${caste.value}</td>
                     <td class="font-aneka">${subcaste.value}</td>
                   </tr>`;
        tableBody.insertAdjacentHTML("beforeend", row);

        // Reset selects
        category.value = "";
        caste.value = "";
        subcaste.value = "";
    } else {
        alert("Please select all fields before adding.");
    }
});
 </script>
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

 <script>
function getDesignations(group) {
    fetch('{{ url("/list/designations") }}/' + group)
        .then(response => {
            // Handle the response, e.g., check for success status
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            // Parse the response body (e.g., as JSON)
            return response.json();
        })
        .then(data => {
            let select = document.getElementById("designation");
            select.innerHTML = "";
            let dOption = document.createElement("option");
            dOption.value = '';
            dOption.textContent = 'Select designation';
            dOption.disabled = true; // disable
            dOption.selected = true; // show as default selected
            select.appendChild(dOption);
            data.list.forEach(function(item) {
                let option = document.createElement("option");
                option.value = item;
                option.textContent = item;
                select.appendChild(option);
            });
        })
        .catch(error => {
            // Handle any errors during the fetch operation
            console.error('Fetch error:', error);
        });
}

function getTaluks(district) {
    fetch('{{ url("/list/taluks") }}/' + district)
        .then(response => {
            // Handle the response, e.g., check for success status
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            // Parse the response body (e.g., as JSON)
            return response.json();
        })
        .then(data => {
            let select = document.getElementById("taluk");
            select.innerHTML = "";
            let dOption = document.createElement("option");
            dOption.value = '';
            dOption.textContent = 'Select taluk';
            dOption.disabled = true; // disable
            dOption.selected = true; // show as default selected
            select.appendChild(dOption);
            data.list.forEach(function(item) {
                let option = document.createElement("option");
                option.value = item;
                option.textContent = item;
                select.appendChild(option);
            });
        })
        .catch(error => {
            // Handle any errors during the fetch operation
            console.error('Fetch error:', error);
        });
}

const submitBtn = document.getElementById("submitBtn");
submitBtn.addEventListener("click", function() {
    fetch("{{route('pwa.otp.request')}}")
        .then(response => {
            // Handle the response, e.g., check for success status
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            // Parse the response body (e.g., as JSON)
            return response.json();
        })
        .then(data => {
            if (data.success) {
                $('#otp_number').text(data.number);
                $('#staticBackdrop').modal('show');
            }
        })
        .catch(error => {
            // Handle any errors during the fetch operation
            console.error('Fetch error:', error);
        });
});

const verifyOtp = document.getElementById("verify_otp");
verifyOtp.addEventListener("click", function() {
    let inputsOtp = document.querySelectorAll('input[name="otp[]"]');
    let otp = "";
    inputsOtp.forEach(input => {
        otp += input.value;
    });
    fetch("{{url('/pwa/verify-otp')}}/" + otp)
        .then(response => {
            // Handle the response, e.g., check for success status
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            // Parse the response body (e.g., as JSON)
            return response.json();
        })
        .then(data => {
            if (data.success) {
                $('#otp_err').text('');
                $('#staticBackdrop').modal('hide');
                document.getElementById("form").submit();
            } else {
                $('#otp_err').text(data.message);
            }
        })
        .catch(error => {
            // Handle any errors during the fetch operation
            console.error('Fetch error:', error);
        });
});
 </script>

 <script>
document.addEventListener("DOMContentLoaded", function() {
    const inputs = document.querySelectorAll(".otp-input");

    inputs.forEach((input, index) => {
        input.addEventListener("input", function() {
            if (this.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        input.addEventListener("keydown", function(e) {
            if (e.key === "Backspace" && this.value === "" && index > 0) {
                inputs[index - 1].focus();
            }
        });
    });
});
 </script>


 <script>
document.getElementById("areYouMarried").addEventListener("change", function() {
    let spouseFields = document.getElementById("spouseFields");
    if (this.value === "Yes") {
        spouseFields.style.display = "block";
    } else {
        spouseFields.style.display = "none";
    }
});
 </script>

 <script>
document.getElementById("SpouseAretheyworking").addEventListener("change", function() {
    let workingFields = document.getElementById("workingFields");
    if (this.value === "Yes") {
        workingFields.style.display = "block";
    } else {
        workingFields.style.display = "none";
    }
});
 </script>
 <script>
    document.getElementById("Spouseworkingin").addEventListener("change", function () {
        let kgidField = document.getElementById("kgidField");
        if (this.value === "Govt") {
            kgidField.style.display = "block";
        } else {
            kgidField.style.display = "none";
        }
    });
</script>

<script>
document.querySelectorAll(".btn-edit").forEach(function(button) {
    button.addEventListener("click", function () {

        document.getElementById("policyFormSection")
                .scrollIntoView({ behavior: "smooth" });

    });
});
</script>
 @endsection