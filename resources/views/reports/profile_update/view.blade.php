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

.bg-left {
    background-color: #bcbeee !important;
    color: black !important;
}
.table-bordered td, .table-bordered th{
        border: 1px solid #00000045 !important;
} 
.marker{
  background: gold !important;
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
                    <li class="breadcrumb-item"> Profile Update Request List</li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div>
        </div>
    </div>
    <h3 class="text-center m-3"> Profile Update Request Details </h3>
</div>
<div class="card">
    <div class="card-body d-flex flex-column gap-4">
        <div class="table-responsive">
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Salutation</th>
                    <td class="{{$employee->salutation != $profileUpdate->salutation ? 'fw-bold marker' : ''}}">{{$profileUpdate->salutation}}</td>
                </tr>
                <tr>
                    <th class="bg-left"> Name</th>
                    <td class="{{$employee->emp_name != $profileUpdate->emp_name ? 'fw-bold marker' : ''}}">{{$profileUpdate->emp_name}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Gender</th>
                    <td class="{{$employee->gender != $profileUpdate->gender ? 'fw-bold marker' : ''}}">{{$profileUpdate->gender}}</td>
                </tr>
                <tr>
                    <th class="bg-left">DOB</th>
                    <td class="{{$employee->dob != $profileUpdate->dob ? 'fw-bold marker' : ''}}">{{$profileUpdate->dob}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Phone Number</th>
                    <td class="{{$employee->phone != $profileUpdate->phone ? 'fw-bold marker' : ''}}">{{$profileUpdate->phone}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Permanent Address</th>
                    <td class="{{$employee->address != $profileUpdate->address ? 'fw-bold marker' : ''}}">{{$profileUpdate->address}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Office Address</th>
                    <td class="{{$employee->temp_address != $profileUpdate->temp_address ? 'fw-bold marker' : ''}}">{{$profileUpdate->temp_address}}</td>
                </tr>
                <tr>
                    <th class="bg-left">CATEGORY</th>
                    <td class="{{$employee->category != $profileUpdate->category ? 'fw-bold marker' : ''}}">{{$profileUpdate->category}}</td>
                </tr>
                <tr>
                    <th class="bg-left">CASTE</th>
                    <td class="{{$employee->sub_category != $profileUpdate->sub_category ? 'fw-bold marker' : ''}}">{{$profileUpdate->sub_category}}</td>
                </tr>
                <tr>
                    <th class="bg-left">SUB-CASTE</th>
                    <td class="{{$employee->sub_caste != $profileUpdate->sub_caste ? 'fw-bold marker' : ''}}">{{$profileUpdate->sub_caste}}</td>
                </tr>
                 <tr>
                    <th class="bg-left">DOJ</th>
                    <td class="{{$employee->doj != $profileUpdate->doj ? 'fw-bold marker' : ''}}">{{$profileUpdate->doj ? date('d-m-Y', strtotime($profileUpdate->doj)) : 'N/A'}}</td>
                </tr>
                 <tr>
                    <th class="bg-left">KGID / Metal Number</th>
                    <td class="{{$employee->kgid != $profileUpdate->kgid ? 'fw-bold marker' : ''}}">{{$profileUpdate->kgid}}</td>
                </tr>
                 <tr>
                    <th class="bg-left">Mode of Recuritment</th>
                    <td class="{{$employee->DR_PR != $profileUpdate->DR_PR ? 'fw-bold marker' : ''}}">{{$profileUpdate->DR_PR}} @if(!empty($profileUpdate->KPSC)) - {{$profileUpdate->KPSC}} @endif</td>
                </tr>
                 <tr>
                    <th class="bg-left">HK / RPC</th>
                    <td class="{{$employee->HK != $profileUpdate->HK ? 'fw-bold marker' : ''}}">{{$profileUpdate->HK}}</td>
                </tr>
            </table>
        </div>
        <div class="table-responsive d-flex flex-column gap-1">
            <h4>Posting Details</h4>
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Post Held</th>
                    <td class="{{$employee->post_held != $profileUpdate->post_held ? 'fw-bold marker' : ''}}">{{$profileUpdate->post_held}}</td>
                </tr>
                <tr>
                    <th class="bg-left"> Group</th>
                    <td class="{{$employee->post_group != $profileUpdate->post_group ? 'fw-bold marker' : ''}}">{{$profileUpdate->post_group}}</td>
                </tr>
                
                <tr>
                    <th class="bg-left">Designation</th>
                    <td class="{{$employee->post_designation != $profileUpdate->post_designation ? 'fw-bold marker' : ''}}">{{$profileUpdate->post_designation}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Organization Name</th>
                    <td class="{{$employee->post_organization != $profileUpdate->post_organization ? 'fw-bold marker' : ''}}">{{$profileUpdate->post_organization}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Place of Working Dirstict</th>
                    <td class="{{$employee->post_district != $profileUpdate->post_district ? 'fw-bold marker' : ''}}">{{$profileUpdate->post_district}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Place of Working Taluk</th>
                    <td class="{{$employee->post_taluk != $profileUpdate->post_taluk ? 'fw-bold marker' : ''}}">{{$profileUpdate->post_taluk}}</td>
                </tr>
                <tr>
                    <th class="bg-left">From Date</th>
                    <td class="{{$employee->post_from != $profileUpdate->post_from ? 'fw-bold marker' : ''}}">{{$profileUpdate->post_from ? date('d-m-Y', strtotime($profileUpdate->post_from)) : 'N/A'}}</td>
                </tr>
                <tr>
                    <th class="bg-left">To Date</th>
                    <td class="{{$employee->post_to != $profileUpdate->post_to ? 'fw-bold marker' : ''}}">{{$profileUpdate->post_to ? date('d-m-Y', strtotime($profileUpdate->post_to)) : 'N/A'}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Pay Scale</th>
                    <td class="{{$employee->post_pay_scale != $profileUpdate->post_pay_scale ? 'fw-bold marker' : ''}}">{{$profileUpdate->post_pay_scale}}</td>
                </tr>
                
            </table>
        </div>


        <div class="table-responsive d-flex flex-column gap-1">
            <h4>Spouse Details</h4>
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Are you married</th>
                    <td class="{{$employee->is_married != $profileUpdate->is_married ? 'fw-bold marker' : ''}}">{{$profileUpdate->is_married}}</td>
                </tr>
                @if($profileUpdate->is_married == 'Yes')
                <tr>
                    <th class="bg-left"> Name</th>
                    <td class="{{$employee->spouse_name != $profileUpdate->spouse_name ? 'fw-bold marker' : ''}}">{{$profileUpdate->spouse_name}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Gender</th>
                    <td class="{{$employee->spouse_gender != $profileUpdate->spouse_gender ? 'fw-bold marker' : ''}}">{{$profileUpdate->spouse_gender}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Phone Number</th>
                    <td class="{{$employee->spouse_phone != $profileUpdate->spouse_phone ? 'fw-bold marker' : ''}}">{{$profileUpdate->spouse_phone}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Are they working</th>
                    <td class="{{$employee->is_spouse_working != $profileUpdate->is_spouse_working ? 'fw-bold marker' : ''}}">{{$profileUpdate->is_spouse_working}}</td>
                </tr>
                @if($profileUpdate->is_spouse_working == 'Yes')
                <tr>
                    <th class="bg-left">Working in</th>
                    <td class="{{$employee->spouse_working_in != $profileUpdate->spouse_working_in ? 'fw-bold marker' : ''}}">{{$profileUpdate->spouse_working_in}}</td>
                </tr>
                @if($profileUpdate->spouse_working_in == 'Govt')
                <tr>
                    <th class="bg-left">KGID Number</th>
                    <td class="{{$employee->spouse_kgid != $profileUpdate->spouse_kgid ? 'fw-bold marker' : ''}}">{{$profileUpdate->spouse_kgid}}</td>
                </tr>
                @endif
                <tr>
                    <th class="bg-left">Place of Working</th>
                    <td class="{{$employee->spouse_working_place != $profileUpdate->spouse_working_place ? 'fw-bold marker' : ''}}">{{$profileUpdate->spouse_working_place}}</td>
                </tr>
                @endif
                @endif
            </table>
        </div>


        <div class="table-responsive d-flex flex-column gap-1">
            <h4>Nominee Details</h4>
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Name</th>
                    <td class="{{$employee->nominee_name != $profileUpdate->nominee_name ? 'fw-bold marker' : ''}}">{{$profileUpdate->nominee_name}}</td>
                </tr>
                <tr>
                    <th class="bg-left"> Gender</th>
                    <td class="{{$employee->nominee_gender != $profileUpdate->nominee_gender ? 'fw-bold marker' : ''}}">{{$profileUpdate->nominee_gender}}</td>
                </tr>
                <tr>
                    <th class="bg-left">DOB</th>
                    <td class="{{$employee->nominee_dob != $profileUpdate->nominee_dob ? 'fw-bold marker' : ''}}">{{date('d-m-Y', strtotime($profileUpdate->nominee_dob))}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Relationship</th>
                    <td class="{{$employee->nominee_relation != $profileUpdate->nominee_relation ? 'fw-bold marker' : ''}}">{{$profileUpdate->nominee_relation}}</td>
                </tr>
                
                
            </table>
        </div>
        @if(count($profileUpdate->children) > 0)
        <div class="table-responsive d-flex flex-column gap-1">
            <h4>Childern Details</h4>
            @foreach($profileUpdate->children as $child)
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Name</th>
                    <td class="{{!$child->children_id ? 'fw-bold marker' : ($child->child->name != $child->name ? 'fw-bold marker' : '')}}">{{$child->name}}</td>
                </tr>
                <tr>
                    <th class="bg-left"> Gender</th>
                    <td class="{{!$child->children_id ? 'fw-bold marker' : ($child->child->gender != $child->gender ? 'fw-bold marker' : '')}}">{{$child->gender}}</td>
                </tr>
                <tr>
                    <th class="bg-left">DOB</th>
                    <td class="{{!$child->children_id ? 'fw-bold marker' : ($child->child->dob != $child->dob ? 'fw-bold marker' : '')}}">{{date('d-m-Y', strtotime($child->dob))}}</td>
                </tr>
            </table>
            <hr>
            @endforeach
        </div>
        @endif
        @if(count($profileUpdate->policies) > 0)
        <div class="table-responsive d-flex flex-column gap-1">
            <h4>KGID Policy Details</h4>
            @foreach($profileUpdate->policies as $policy)
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Policy No</th>
                    <td class="{{!$policy->policy_id ? 'fw-bold marker' : ($policy->policy->number != $policy->number ? 'fw-bold marker' : '')}}">{{$policy->number}}</td>
                </tr>
                <tr>
                    <th class="bg-left"> Policy Start Date</th>
                    <td class="{{!$policy->policy_id ? 'fw-bold marker' : ($policy->policy->start_date != $policy->start_date ? 'fw-bold marker' : '')}}">{{date('d-m-Y', strtotime($policy->start_date))}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Premium</th>
                    <td class="{{!$policy->policy_id ? 'fw-bold marker' : ($policy->policy->premium != $policy->premium ? 'fw-bold marker' : '')}}">{{$policy->premium}}</td>
                </tr>
            </table>
            <hr>
            @endforeach
        </div>
        @endif

        <div class="d-flex justify-content-center gap-1">
            <form id="approvalForm" action="{{route('profile_update.update', $profileUpdate->id)}}" method="POST">
                @csrf
                @method('PUT')
                @if (!session('admin_otp_verified'))
                <button id="acceptBtn" class="btn btn-primary" type="button">Accept</button>
                @else
                <button class="btn btn-primary" value="Accept" name="status" type="submit">Accept</button>
                @endif
                <button class="btn btn-danger" type="submit" value="Reject" name="status">Reject</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
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
      $('#otpRequested').val('1');
      $('#otpSuccess').show().text('OTP sent.');
    }).fail(function(xhr){
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

  $('#acceptBtn').on('click', function(e){
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
        $('#otpVerified').val('1');
        var form = $('#approvalForm');
        if(form.find('input[name="status"]').length===0){
          $('<input>').attr({type:'hidden', name:'status', value:'Accept'}).appendTo(form);
        } else {
          form.find('input[name="status"]').val('Accept');
        }
        hideOverlay();
        form[0].submit();
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
<script>
  document.getElementById("verifyOtpBtn").addEventListener("click", function (e) {

    e.preventDefault(); // Prevent form submission (important)

    let otpInput = document.getElementById("otpInput");
    let otpValue = otpInput.value.trim(); // Remove spaces

    if (otpValue === "") {
      Swal.fire({
        icon: 'warning',
        title: 'OTP Required',
        text: 'Please enter the OTP first.',
        confirmButtonColor: '#f39c12'
      });
      return;
    }

    if (otpValue === "1234") {
      Swal.fire({
        icon: 'success',
        title: 'OTP Verified!',
        text: 'Your OTP has been successfully verified.',
        confirmButtonColor: '#3085d6'
      });
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Invalid OTP',
        text: 'Please enter a valid OTP.',
        confirmButtonColor: '#d33'
      });
    }

  });
</script>
@endsection