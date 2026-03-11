@extends('pwa.layout.app')
@section('title') Dashboard @endsection
@section('style')
<style>
.bordered-table {
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.bordered-table th,
.bordered-table td {
    border: 1px solid #dee2e6;
    padding: 5px;
    text-align: center;
    vertical-align: middle;
}

.bordered-table thead th {
    background: #d1cccc;
    color: #000;
    font-weight: 600;
}

.bordered-table tbody tr:hover {
    background-color: #f8f9fa;
    transform: scale(1.01);
    transition: all 0.3s ease;
}

.bordered-table td:first-child,
.bordered-table th:first-child {
    border-left: none;
}

.bordered-table td:last-child,
.bordered-table th:last-child {
    border-right: none;
}

/* Chrome, Edge, Safari */
.scroll-table::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.scroll-table::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.scroll-table::-webkit-scrollbar-thumb {
    background: black;
    border-radius: 10px;
}

.scroll-table::-webkit-scrollbar-thumb:hover {
    background: #333;
}

/* Firefox */
.scroll-table {
    scrollbar-color: black #f1f1f1;
    scrollbar-width: thin;
}
.color-highlight{
  color: #0c3040 !important;
}
</style>
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

<div class="d-flex flex-column gap-2  mt-5 mb-3">
    
    <div class="card m-2" style="border-radius: 20px;box-shadow: 0 0px 8px 0 rgb(0 0 0 / 38%);">
        <div class="card-body">
            <div class="profile-container d-flex flex-column gap-2 pt-2 pb-2">
                <span class="d-flex flex-column">
                    <table class="table table-bordered">
                        <tr class="font-aneka">
                            <th>Salutation</th>
                            <td id="name">{{$employee->salutation ?? 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>Name</th>
                            <td id="phoneno">{{$employee->emp_name ?? 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>Gender</th>
                            <td id="DOB">{{$employee->gender ?? 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>DOB</th>
                            <td id="gender">{{$employee->dob ? date('d-m-Y', strtotime($employee->dob)) : 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>Phone Number</th>
                            <td id="drivinglicencevalidity">{{$employee->phone ?? 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>Permanent Address</th>
                            <td id="address">{{$employee->address ?? 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>Office Address</th>
                            <td id="drivinglicenceno">{{$employee->temp_address ?? 'N/A'}}</td>
                        </tr>

                    </table>
                </span>
                <span>
                    <span class="font-aneka text-dark ms-1"><b>Caste</b></span>
                    <div class="table-responsive">
                        <table class="bordered-table" style="border: 1px solid #00000042;">
                            <thead>
                                <tr>
                                    <th class="font-aneka">Category</th>
                                    <th class="font-aneka">Caste</th>
                                    <th class="font-aneka">Sub-Caste</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-aneka">{{$employee->category ?? 'N/A'}}</td>
                                    <td class="font-aneka">{{$employee->sub_category ?? 'N/A'}}</td>
                                    <td class="font-aneka">{{$employee->sub_caste ?? 'N/A'}}</td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </span>
                <span>
                    <table class="table table-bordered">
                        <tr class="font-aneka">
                            <th>Date of Joining</th>
                            <td id="name">{{$employee->doj ? date('d-m-Y', strtotime($employee->doj)) : 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>KGID / Metal Number</th>
                            <td id="phoneno">{{$employee->kgid ?? 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>Mode of Recuritment</th>
                            <td id="DOB">
                                <table class="table table-bordered">
                                    <tr class="font-aneka">
                                        @if(!empty($employee->DR_PR))
                                        <th>{{ $employee->DR_PR }}</th>
                                        @endif

                                        @if(!empty($employee->KPSC))
                                        <td id="name">{{ $employee->KPSC }}</td>
                                        @endif
                                    </tr>

                                </table>
                            </td>
                        </tr>
                        <tr class="font-aneka">
                            <th>HK / RPC</th>
                            <td id="gender">{{$employee->HK != '' ? $employee->HK : 'N/A'}}</td>
                        </tr>
                    </table>
                </span>
                <span class="mb-2">
                    <span class="font-aneka text-dark ms-1"><b>Posting Details</b></span>
                    <div class="table-responsive">
                        <table class="bordered-table scroll-table" style="border: 1px solid #00000042;">
                            <thead>
                                <tr>
                                    <th class="font-aneka">Post Held</th>
                                    <th class="font-aneka">Group</th>
                                    <th class="font-aneka">Designation</th>
                                    <th class="font-aneka">Organization Name</th>
                                    <th class="font-aneka">Place of Working Dirstict</th>
                                    <th class="font-aneka">Place of Working Taluk</th>
                                    <!-- <th class="font-aneka">Posting</th> -->
                                    <th class="font-aneka">From Date</th>
                                    <th class="font-aneka">To Date</th>
                                    <th class="font-aneka">Pay Scale</th>
                                    <!-- <th class="font-aneka">Increment Date</th> -->
                                    <!-- <th class="font-aneka">Type</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-aneka">{{$employee->post_held ?? 'N/A'}}</td>
                                    <td class="font-aneka">{{$employee->post_group ?? 'N/A'}}</td>
                                    <td class="font-aneka">{{$employee->post_designation ?? 'N/A'}}</td>
                                    <td class="font-aneka">{{$employee->post_organization ?? 'N/A'}}</td>
                                    <td class="font-aneka">{{$employee->post_district ?? 'N/A'}}</td>
                                    <td class="font-aneka">{{$employee->post_taluk ?? 'N/A'}}</td>
                                    <!-- <td class="font-aneka">{{--$posting->posting ?? 'N/A'--}}</td> -->
                                    <td class="font-aneka">
                                        {{$employee->post_from ? date('d-m-Y', strtotime($employee->post_from)) : 'N/A'}}</td>
                                    <td class="font-aneka">
                                        {{$employee->post_to ? date('d-m-Y', strtotime($employee->post_to)) : 'N/A'}}</td>
                                    <td class="font-aneka">{{$employee->post_pay_scale ?? 'N/A'}}</td>
                                    <!-- <td class="font-aneka">{{--$posting->increment_date ?? 'N/A'--}}</td> -->
                                    <!-- <td class="font-aneka">{{--$posting->type ?? 'N/A'--}}</td> -->

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </span>
                <span class="mb-2">
                     <span class="font-aneka text-dark ms-1"><b>Spouse Details</b></span><br>
                    <span class="font-aneka text-dark ms-1 d-flex flex-row gap-1"><span><b>Are you married  
                                :</b></span><span>{{$employee->is_married ?? 'N/A'}}</span></span>
                    @if($employee->is_married == 'Yes')
                    <table class="table table-bordered">
                        <tr class="font-aneka">
                            <th>Name</th>
                            <td id="Spousename">{{$employee->spouse_name ?? 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>Gender</th>
                            <td id="SpouseGender">{{$employee->spouse_gender ?? 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>Phone Number</th>
                            <td id="SpousePhoneno">{{$employee->spouse_phone ?? 'N/A'}}</td>
                        </tr>
                        <tr class="font-aneka">
                            <th>Are they working </th>
                            <td id="SpouseAreyouWorking">{{$employee->is_spouse_working ?? 'N/A'}}</td>
                        </tr>
                        @if($employee->is_spouse_working == 'Yes')
                        <tr class="font-aneka">
                            <th>Working in</th>
                            <td id="SpouseWorkingIn">{{$employee->spouse_working_in ?? 'N/A'}}</td>
                        </tr>
                        @if($employee->spouse_working_in == 'Govt')
                        <tr class="font-aneka">
                            <th>KGID Number</th>
                            <td id="SpouseKGIDNo">{{$employee->spouse_kgid ?? 'N/A'}}</td>
                        </tr>
                        @endif
                        <tr class="font-aneka">
                            <th>Place of Working</th>
                            <td id="SpousePlaceWorking">{{$employee->spouse_working_place ?? 'N/A'}}</td>
                        </tr>
                        @endif
                    </table>
                    @endif
                </span>
                <span class="mb-2">
                    <span class="font-aneka text-dark ms-1"><b>Nominee Details</b></span>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="font-aneka">
                                <th>Name</th>
                                <td id="name">{{$employee->nominee_name ?? 'N/A'}}</td>
                            </tr>
                            <tr class="font-aneka">
                                <th>Gender</th>
                                <td id="phoneno">{{$employee->nominee_gender ?? 'N/A'}}</td>
                            </tr>
                            <tr class="font-aneka">
                                <th>DOB</th>
                                <td id="DOB">{{$employee->nominee_dob ? date('d-m-Y', strtotime($employee->nominee_dob)) : 'N/A'}}</td>
                            </tr>
                            <tr class="font-aneka">
                                <th>Relationship</th>
                                <td id="gender">{{$employee->nominee_relation ?? 'N/A'}}</td>
                            </tr>

                        </table>
                        <!-- <table class="bordered-table" style="border: 1px solid #00000042;">
                            <thead>
                                <tr>
                                    <th class="font-aneka">Name</th>
                                    <th class="font-aneka">Gender</th>
                                    <th class="font-aneka">DOB</th>
                                    <th class="font-aneka">Relationship</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee->nominees as $nominee)
                                <tr>
                                    <td class="font-aneka">{{$nominee->name ?? 'N/A'}}</td>
                                    <td class="font-aneka">{{$nominee->gender ?? 'N/A'}}</td>
                                    <td class="font-aneka">
                                        {{$nominee->dob ? date('d-m-Y', strtotime($nominee->dob)) : 'N/A' }}</td>
                                    <td class="font-aneka">{{$nominee->relation ?? 'N/A'}}</td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table> -->
                    </div>
                </span>
                <span class="mb-2">
                    <span class="font-aneka text-dark ms-1"><b>Childern Details</b></span>
                    <div class="table-responsive">
                        <table class="bordered-table" style="border: 1px solid #00000042;">
                            <thead>
                                <tr>
                                    <th class="font-aneka">Name</th>
                                    <th class="font-aneka">Gender</th>
                                    <th class="font-aneka">DOB</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee->children as $child)
                                <tr>
                                    <td class="font-aneka">{{$child->name ?? 'N/A'}}</td>
                                    <td class="font-aneka">{{$child->gender ?? 'N/A'}}</td>
                                    <td class="font-aneka">
                                        {{$child->dob ? date('d-m-Y', strtotime($child->dob)) : 'N/A'}}</td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </span>
                <span>
                    <span class="font-aneka text-dark ms-1"><b>KGID Policy Details</b></span>
                    <div class="table-responsive">
                        <table class="bordered-table" style="border: 1px solid #00000042;">
                            <thead>
                                <tr>
                                    <th class="font-aneka">Policy No</th>
                                    <th class="font-aneka">Policy Start Date</th>
                                    <th class="font-aneka">Premium</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee->policies as $policy)
                                <tr>
                                    <td class="font-aneka">{{$policy->number ?? 'N/A'}}</td>
                                    <td class="font-aneka">
                                        {{$policy->start_date ? date('d-m-Y', strtotime($policy->start_date)) : 'N/A' }}
                                    </td>
                                    <td class="font-aneka">{{$policy->premium ?? 'N/A'}}</td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </span>

            </div>
        </div>
    </div>
    @if($employee->is_verified == 0)
    <div class="card m-2" style="border-radius: 20px;box-shadow: 0 0px 8px 0 rgb(0 0 0 / 38%);">
        <div class="card-body">
          <form method="POST" action="{{ route('pwa.verify.profile') }}">
          @csrf
            <div class="form-check icon-check">
              <input class="form-check-input" type="checkbox" name="mark" value="1" required id="form3acsd">
              <label class="form-check-label font-12 ms-n1" for="form3acsd">I have reviewed my profile details and confirm that the information provided is accurate.</label>
              <i style="margin-top:-1px;" class="icon-check-1 fa fa-circle color-gray-dark font-14"></i>
              <i style="margin-top:-1px;" class="icon-check-2 fa fa-check-circle font-14 color-highlight"></i>
            </div>
            <span class="text-danger" id="verror" style="padding-left: 27px;display:none;">Please Mark Checkbox</span>
            <div class="d-flex flex-column align-items-center">
              <button type="submit" onclick="checMark()" class="btn rounded btn-primary font-aneka d-flex flex-row gap-2">
                <span><i class="bi bi-check-square"></i></span><span>Verified</span>
              </button>
            </div>
        </form>
        </div>
    </div>
    @endif
    <div class="d-flex flex-column align-items-center">
        <form method="POST" action="">
            <a href="{{ route('pwa.newProfileForm') }}" class="btn btn-primary font-aneka d-flex flex-row gap-2"
                style="border-radius: 10px;">
                <span><i class="bi bi-pencil-square"></i></span><span>Edit</span>
            </a>
        </form>
    </div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  @if(session('success'))
  Swal.fire({
        icon: 'success',
        title: 'Submitted!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#3085d6'
      });
  @endif
</script>


<script>
  function checMark(){
    if ($('#form3acsd').is(':checked')) {
      $('#verror').hide();
    } else {
      $('#verror').show();
    }
  }
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