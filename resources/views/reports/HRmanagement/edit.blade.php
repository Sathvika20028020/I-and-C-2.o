@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
.select2-container .select2-selection--single {
    border-color: #0000003d !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    font-size: 15px;
    color: black;
}

.needs-validation label {
    opacity: unset;
    margin-bottom: 0px;
}

.form-select {
    font-size: 15px;
}

.card1 {
    box-shadow: 0px 4px 30px #86869b6e;
}

.card1:hover {
    box-shadow: 0px 4px 30px #86869b6e;
}
</style>
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- jQuery and DataTables JS -->

@endsection
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <a class="home-item" href="index.html"><i data-feather="home"></i></a>
                    </li>
                    <li class="breadcrumb-item"> Employees List</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
    <h3 class="text-center m-3"> Employee Edit </h3>
</div>
<div class="card">
    <div class="card-body d-flex flex-column gap-4">
        <div class="table-responsive">
            <form action="{{ route('employee.update', $employee->id) }}" method="post" id="employeeForm">
                @csrf
                <table class="table table-bordered">
                    <colgroup>
                        <col style="width: 25%;">
                        <col style="width: 75%;">
                    </colgroup>
                    <tr>
                        <th>Salutation</th>
                        <td><input type="text" class="form-control" value="{{$employee->salutation}}" name="salutation"
                                placeholder="Enter Salutation"></td>
                    </tr>
                    <tr>
                        <th>Employee Name</th>
                        <td><input type="text" class="form-control" value="{{$employee->emp_name}}" name="emp_name"
                                placeholder="Enter Employee Name"></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Select Gender</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="gender">
                                    @foreach($data['gender'] as $group)
                                    <option value="{{$group}}" {{ $employee->gender  == $group   ? 'selected' : '' }}>
                                        {{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>DOB</th>
                        <td><input style="width:160px" type="date" class="form-control" value="{{$employee->dob}}"
                                name="dob" placeholder="Enter DOB"></td>
                    </tr>

                    <tr>
                        <th>Phone Number</th>
                        <td><input type="text" class="form-control" value="{{$employee->phone}}" name="phone"
                                placeholder="Enter Phone Number"></td>
                    </tr>
                    <tr>
                        <th>Permanent Address</th>
                        <td><input type="text" class="form-control" value="{{$employee->address}}" name="address"
                                placeholder="Enter permanent address"></td>
                    </tr>
                    <tr>
                        <th>Office Address</th>
                        <td><input type="text" class="form-control" value="{{$employee->temp_address}}" name="temp_address" placeholder="Enter office address">
                        </td>
                    </tr>
                    <tr>
                        <th>CATEGORY</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Select Category</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="category">
                                    @foreach($data['category'] as $group)
                                    <option value="{{$group}}" {{ $employee->category  == $group   ? 'selected' : '' }}>
                                        {{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Caste</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Select Caste</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="sub_category">
                                    @foreach($data['sub_category'] as $group)
                                    <option value="{{$group}}"
                                        {{ $employee->sub_category  == $group   ? 'selected' : '' }}>{{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Sub Caste</th>
                        <td><input type="text" class="form-control" value="{{$employee->sub_caste}}" name="sub_caste" placeholder="Enter Sub Caste"></td>
                    </tr>
                    <tr>
                        <th>DOJ</th>
                        <td><input style="width:160px" type="date" class="form-control" value="{{$employee->doj}}"
                                name="doj" placeholder="Enter DOJ"></td>
                    </tr>
                    <tr>
                        <th>KGID / Metal No.</th>
                        <td><input type="text" class="form-control" value="{{$employee->kgid}}" name="kgid"
                                placeholder="Enter KGID / Metal No."></td>
                    </tr>
                    <tr>
                        <th>Mode of Recuritment</th>
                        <td>

                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Select Mode of
                                    Recuritment</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="DR_PR">
                                  <option value="" selected>Select Mode of Recuritment</option>
                                    @foreach($data['DR_PR'] as $group)
                                    <option value="{{$group}}" {{ $employee->DR_PR  == $group   ? 'selected' : '' }}>
                                        {{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>HK / RPC</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="">Select HK / RPC</label>
                                <select class="form-select digits" id="" name="HK">
                                  <option value="" selected>Select mode of HK / RPC</option>
                                    <option value="PR" {{ $employee->HK  == 'HK'   ? 'selected' : '' }}>HK</option>
                                    <option value="DR" {{ $employee->HK  == 'RPC'   ? 'selected' : '' }}>RPC</option>

                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>Current Posting Details</b></td>
                    </tr>
                    <tr>
                        <th>Post Held </th>
                        <td><input type="text" class="form-control" value="{{$employee->post_held}}"
                                name="post_held" placeholder="Enter Post Held "></td>
                    </tr>
                    <tr>
                        <th>Group</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Select Group</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="group">
                                  <option value="" selected>Select Group</option>
                                    @foreach($data['group'] as $group)
                                    <option value="{{$group}}" {{ $employee->group  == $group   ? 'selected' : '' }}>
                                        {{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Designation </th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Select Designation</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="designation">
                                  <option value="" selected>Select Designation</option>
                                    @foreach($data['designations'] as $group)
                                    <option value="{{$group}}"
                                        {{ $employee->designation  == $group   ? 'selected' : '' }}>{{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Organization Name</th>
                        <td><input type="text" class="form-control" value="{{$employee->post_organization}}" name="post_organization"
                                placeholder="Enter Organization Name"></td>
                    </tr>
                    <tr>
                        <th>District</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Select District</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="district">
                                    @foreach($data['district'] as $group)
                                    <option value="{{$group}}" {{ $employee->district  == $group   ? 'selected' : '' }}>
                                        {{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Taluk</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Select Taluk</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="taluk">
                                    @foreach($data['taluk'] as $group)
                                    <option value="{{$group}}" {{ $employee->taluk  == $group   ? 'selected' : '' }}>
                                        {{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>From Date</th>
                        <td><input style="width:160px" type="date" class="form-control" value="{{$employee->post_from}}" name="post_from" placeholder="">
                        </td>
                    </tr>
                    <tr>
                        <th>To Date</th>
                        <td><input style="width:160px" type="date" class="form-control" value="{{$employee->post_to}}" name="post_to" placeholder="">
                        </td>
                    </tr>
                    <tr>
                        <th>Pay Scale</th>
                        <td><input type="text" class="form-control" value="{{$employee->post_pay_scale}}" name="post_pay_scale" placeholder="Enter Pay Scale"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>Spouse Details</b></td>
                    </tr>
                    <tr>
                        <th>Are you Married</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="">Select</label>
                                <select class="form-select digits" id="" name="is_married" onchange="showSpouseDetails(this.value)">
                                  <option value="">Select</option>
                                    <option value="Yes" {{$employee->is_married == 'Yes' ? 'selected' : ''}}>Yes</option>
                                    <option value="No" {{$employee->is_married == 'No' ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr class="mrd" style="display: {{$employee->is_married == 'Yes' ? 'table-row' : 'none'}};">
                        <th>Name</th>
                        <td><input type="text" class="form-control" value="{{$employee->spouse_name}}" name="spouse_name" placeholder="Enter Name"></td>
                    </tr>
                    <tr class="mrd" style="display: {{$employee->is_married == 'Yes' ? 'table-row' : 'none'}};">
                        <th>Gender</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="">Select Gender</label>
                                <select class="form-select digits" id="" name="spouse_gender">
                                    <option value="Male" {{$employee->spouse_gender == 'Male' ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{$employee->spouse_gender == 'Female' ? 'selected' : ''}}>Female</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr class="mrd" style="display: {{$employee->is_married == 'Yes' ? 'table-row' : 'none'}};">
                        <th>Phone No.</th>
                        <td><input type="text" class="form-control" value="{{$employee->spouse_phone}}" name="spouse_phone" placeholder="Enter Phone No."></td>
                    </tr>
                    <tr class="mrd" style="display: {{$employee->is_married == 'Yes' ? 'table-row' : 'none'}};">
                        <th>Are they working</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="">Select</label>
                                <select class="form-select digits" id="" name="is_spouse_working" onchange="showSpouseWorkingDetails(this.value)">
                                  <option value="">Select</option>
                                    <option value="Yes" {{$employee->is_spouse_working == 'Yes' ? 'selected' : ''}}>Yes</option>
                                    <option value="No" {{$employee->is_spouse_working == 'No' ? 'selected' : ''}}>No</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr class="wrkng" style="display: {{($employee->is_married == 'Yes'&& $employee->is_spouse_working == 'Yes') ? 'table-row' : 'none'}};">
                        <th>Working in</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="">Select</label>
                                <select class="form-select digits" id="" name="spouse_working_in" onchange="showKgid(this.value)">
                                  <option value="">Select</option>
                                    <option value="Govt" {{$employee->spouse_working_in == 'Govt' ? 'selected' : ''}}>Government</option>
                                    <option value="Private" {{$employee->spouse_working_in == 'Private' ? 'selected' : ''}}>Private</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr class="govt" style="display: {{($employee->is_married == 'Yes' && $employee->is_spouse_working == 'Yes') ? 'table-row' : 'none'}};">
                        <th>KGID No.</th>
                        <td><input type="text" class="form-control" value="{{$employee->spouse_kgid}}" name="spouse_kgid" placeholder="Enter KGID No."></td>
                    </tr>
                    <tr class="wrkng" style="display: {{($employee->is_married == 'Yes' && $employee->is_spouse_working == 'Yes' && $employee->spouse_working_in == 'Govt') ? 'table-row' : 'none'}};">
                        <th>Place of Working</th>
                        <td><input type="text" class="form-control" value="{{$employee->spouse_working_place}}" name="spouse_working_place"
                                placeholder="Enter Place of Working"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>Nominee Details</b></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" class="form-control" value="{{$employee->nominee_name}}" name="nominee_name" placeholder="Enter Name"></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="">Select Gender</label>
                                <select class="form-select digits" id="" name="nominee_gender">
                                    <option value="Male" {{$employee->nominee_gender == 'Male' ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{$employee->nominee_gender == 'Female' ? 'selected' : ''}}>Female</option>
                                    <option value="Other" {{$employee->nominee_gender == 'Other' ? 'selected' : ''}}>Other</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>DOB</th>
                        <td><input style="width:160px" type="date" class="form-control" value="{{$employee->nominee_dob}}" name="nominee_dob"
                                placeholder="Enter DOB"></td>
                    </tr>
                    <tr>
                        <th>Relationship</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="">Select Relationship</label>
                                <select class="form-select digits" id="" name="nominee_relationship">
                                  <option value="" selected>Select Relationship</option>
                                  <option value="Wife" {{$employee->nominee_relation == 'Wife' ? 'selected' : ''}}>Wife</option>
                                  <option value="Husband" {{$employee->nominee_relation == 'Husband' ? 'selected' : ''}}>Husband</option>
                                  <option value="Mother" {{$employee->nominee_relation == 'Mother' ? 'selected' : ''}}>Mother</option>
                                  <option value="Father" {{$employee->nominee_relation == 'Father' ? 'selected' : ''}}>Father</option>
                                  <option value="Daughter" {{$employee->nominee_relation == 'Daughter' ? 'selected' : ''}}>Daughter</option>
                                  <option value="Son" {{$employee->nominee_relation == 'Son' ? 'selected' : ''}}>Son</option>
                                  <option value="Other" {{$employee->nominee_relation == 'Other' ? 'selected' : ''}}>Other</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><b>Childern Details</b></td>
                    </tr>
                    @foreach($employee->children as $child)
                    <tr>
                        <th>Name</th>
                        <td><input type="text" class="form-control" value="{{$child->name}}" name="children[{{$child->id}}][name]" placeholder="Enter Name"></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="">Select Gender</label>
                                <select class="form-select digits" id="" name="children[{{$child->id}}][gender]">
                                    <option value="Male" {{$child->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{$child->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                    <option value="Other" {{$child->gender == 'Other' ? 'selected' : ''}}>Other</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>DOB</th>
                        <td><input style="width:160px" type="date" class="form-control" value="{{$child->dob}}" name="children[{{$child->id}}][dob]"
                                placeholder="Enter DOB"></td>
                    </tr>
                    @if(!$loop->last)
                    <tr><td colspan="2"><hr class="m-0"></td></tr>
                    @endif
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-center"><b>KGID Policy Details</b></td>
                    </tr>
                    @foreach($employee->policies as $policy)
                    <tr>
                        <th>Policy No</th>
                        <td><input type="text" class="form-control" value="{{$policy->number}}" name="policies[{{$policy->id}}][number]" placeholder="Enter Policy No"></td>
                    </tr>
                    <tr>
                        <th>Policy Start Date</th>
                        <td><input style="width:160px" type="date" class="form-control" value="{{$policy->start_date}}"
                                name="policies[{{$policy->id}}][start_date]" placeholder="Enter Policy Start Date"></td>
                    </tr>
                    <tr>
                        <th>Premium</th>
                        <td><input type="text" class="form-control" value="{{$policy->premium}}" name="policies[{{$policy->id}}][premium]" placeholder="Enter Premium"></td>
                    </tr>
                    @if(!$loop->last)
                    <tr><td colspan="2"><hr class="m-0"></td></tr>
                    @endif
                    @endforeach
                    <!-- <tr>
                        <th>Reg/ (32)</th>
                        <td>{{$employee->reg}}<input type="text" class="form-control" value="{{$employee->reg}}"
                                name="reg" placeholder="Enter Reg/ (32)"></td>
                    </tr> -->
                    <!-- <tr>
                        <th>Type- Ncadre/ Xcadre</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Example select</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="cadre_type">
                                    @foreach($data['cadre_type'] as $group)
                                    <option value="{{$group}}"
                                        {{ $employee->cadre_type  == $group   ? 'selected' : '' }}>{{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr> -->
                    <!-- <tr>
                        <th>Working At/ As</th>
                        <td><input type="text" class="form-control" value="{{$employee->working_at}}" name="working_at"
                                placeholder="Enter Working At/ As"></td>
                    </tr> -->





                    <!-- <tr>
                        <th>DOR</th>
                        <td><input style="width:160px" type="date" class="form-control" value="{{$employee->dor}}"
                                name="dor" placeholder="Select DOR"></td>
                    </tr> -->


                    <!-- <tr>
                        <th>KPSC</th>
                        <td><input type="text" class="form-control" value="{{$employee->KPSC}}" name="KPSC"
                                placeholder="Enter KPSC"></td>
                    </tr> -->
                    <!-- <tr>
                        <th>HK</th>
                        <td><input type="text" class="form-control" value="{{$employee->hk}}" name="hk"
                                placeholder="Enter HK"></td>
                    </tr> -->
                    <!-- <tr>
                        <th>DR/PR</th>
                        <td>
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlSelect9">Example select</label>
                                <select class="form-select digits" id="exampleFormControlSelect9" name="DR_PR">
                                    @foreach($data['DR_PR'] as $group)
                                    <option value="{{$group}}" {{ $employee->DR_PR  == $group   ? 'selected' : '' }}>
                                        {{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr> -->
                    <!-- <tr>
                        <th>Increment</th>
                        <td><input type="text" class="form-control" value="{{$employee->increment}}" name="increment"
                                placeholder="Enter increment"></td>
                    </tr> -->
                    <!-- <tr>
                        <th>Date of Increment</th>
                        <td><input style="width:160px" type="date" class="form-control"
                                value="{{$employee->date_of_increment}}" name="date_of_increment"
                                placeholder="Select Date of Increment"></td>
                    </tr> -->


                    <tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <!-- Initially Disabled -->
                            <!-- <button type="submit" class="btn btn-success btn-sm" id="submitBtn" disabled>Submit</button> -->

                            <!-- Trigger OTP Modal -->
                            <button id="updateBtn" class="btn btn-primary" type="button" >Update</button>

                            <!--<button type="button" class="btn btn-primary btn-sm" onclick="prepareOtp()" >Update</button>-->
                        </td>
                    </tr>


                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<div id="otpOverlay" style="display:none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 1050; align-items: center; justify-content: center;">
  <div style="background: #fff; width: 100%; max-width: 400px; border-radius: 8px; padding: 16px;">
    <h5 class="mb-3">Enter OTP</h5>
    <div class="mb-2">
      <input id="otpInput" type="text" class="form-control" placeholder="6-digit OTP" maxlength="6" />
      <div id="otpError" class="text-danger mt-1" style="display:none;"></div>
      <div id="otpSuccess" class="text-success mt-1" style="display:none;"></div>
    </div>
    <div class="d-flex justify-content-end gap-2">
      <button id="resendOtpBtn" type="button" class="btn btn-outline-secondary">Resend OTP</button>
      <button id="cancelOtpBtn" type="button" class="btn btn-danger">Cancel</button>
      <button id="verifyOtpBtn" type="button" class="btn btn-primary">Verify</button>
    </div>
  </div>
  <input type="hidden" id="otpSending" value="0" />
  <input type="hidden" id="otpVerified" value="0" />
  <input type="hidden" id="otpRequested" value="0" />
  <input type="hidden" id="otpSubmitting" value="0" />
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  function showSpouseDetails(value){
    if(value == 'Yes'){
      $('.mrd').show();
    }else{
      $('.mrd').hide();
    }
  }
  function showSpouseWorkingDetails(value){
    if(value == 'Yes'){
      $('.wrkng').show();
    }else{
      $('.wrkng').hide();
    }
  }
  function showKgid(value){
    if(value == 'Govt'){
      $('.govt').show();
    }else{
      $('.govt').hide();
    }
  }
$(function(){
  var sendUrl = "{{ route('admin.approval.sendOtp') }}";
  var verifyUrl = "{{ route('admin.approval.verifyOtp') }}";
  var csrf = "{{ csrf_token() }}";

  function showOverlay(){
    $('#otpOverlay').css('display','flex');
    $('#otpInput').val('');
    $('#otpError').hide().text('');
    $('#otpSuccess').hide().text('');
  }
  function hideOverlay(){
    $('#otpOverlay').hide();
  }
  function sendOtp(){
    if($('#otpSending').val()==='1') return;
    $('#otpSending').val('1');
    $('#otpError').hide();
    $.ajax({
      url: sendUrl,
      method: 'POST',
      data: {_token: csrf},
    }).done(function(res){
      if(res && res.success){
        $('#otpRequested').val('1');
        $('#otpSuccess').show().text('OTP sent.');
      } else {
        $('#otpError').show().text((res && res.error) ? res.error : 'Failed to send OTP.');
      }
    }).fail(function(){
      $('#otpError').show().text('Failed to send OTP. Please try again.');
    }).always(function(){
      $('#otpSending').val('0');
    });
  }

  function verifyOtp(otp){
    return $.ajax({
      url: verifyUrl,
      method: 'POST',
      data: { _token: csrf, otp: otp }
    });
  }

  $('#updateBtn').on('click', function(e){
    e.preventDefault();
    showOverlay();
    sendOtp();
  });

  $('#resendOtpBtn').on('click', function(){
    sendOtp();
  });

  $('#cancelOtpBtn').on('click', function(){
    hideOverlay();
  });

  $('#verifyOtpBtn').on('click', function(){
    var otp = ($('#otpInput').val() || '').trim();
    if(otp.length !== 6 || !/^\d{6}$/.test(otp)){
      $('#otpError').show().text('Please enter a valid 6-digit OTP.');
      return;
    }
    $('#otpError').hide();
    verifyOtp(otp).done(function(res){
      if(res && res.success){
        var form = $('#employeeForm').first();
        hideOverlay();
        form.submit();
      } else {
        $('#otpSuccess').hide();
        $('#otpError').show().text((res && res.message) ? res.message : 'Invalid OTP.');
      }
    }).fail(function(xhr){
      var msg = 'Invalid or expired OTP.';
      if(xhr && xhr.responseJSON && xhr.responseJSON.message){ msg = xhr.responseJSON.message; }
      $('#otpError').show().text(msg);
      $('#otpSuccess').hide();
    });
  });
});
</script>

@endsection