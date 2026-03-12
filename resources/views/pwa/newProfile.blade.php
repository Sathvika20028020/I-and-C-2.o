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

.color-highlight {
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

    <div class="container mt-3 mb-3 d-flex flex-column gap-3">

        <!-- PERSONAL DETAILS -->
        <div class="card shadow-sm mb-2" style="border-radius:16px; overflow:hidden;">

            <div class="card-header fw-bold d-flex align-items-center gap-2 font-aneka fs-6" style="background:#0c3040;color:white;">
                <i class="bi bi-person"></i> Personal Details
            </div>

            <div class="card-body p-0">

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Salutation</span>
                    <span class="fw-semibold font-aneka">{{$employee->salutation ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Name</span>
                    <span class="fw-semibold font-aneka">{{$employee->emp_name ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Gender</span>
                    <span class="fw-semibold font-aneka">{{$employee->gender ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">DOB</span>
                    <span class="fw-semibold font-aneka">
                        {{$employee->dob ? date('d-m-Y', strtotime($employee->dob)) : 'N/A'}}
                    </span>
                </div>

                <div class="d-flex justify-content-between p-3">
                    <span class="text-dark font-aneka">Phone</span>
                    <span class="fw-semibold font-aneka">{{$employee->phone ?? 'N/A'}}</span>
                </div>

            </div>
        </div>


        <!-- ADDRESS -->
        <div class="card shadow-sm mb-2" style="border-radius:16px; overflow:hidden;">

            <div class="card-header fw-bold d-flex align-items-center gap-2 font-aneka fs-6" style="background:#0c3040;color:white;">
                <i class="bi bi-geo-alt"></i> Address
            </div>

            <div class="card-body p-0">

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Permanent Address</span>
                    <span class="fw-semibold font-aneka">{{$employee->address ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between p-3">
                    <span class="text-dark font-aneka">Office Address</span>
                    <span class="fw-semibold font-aneka">{{$employee->temp_address ?? 'N/A'}}</span>
                </div>

            </div>
        </div>


        <!-- CASTE -->
        <div class="card shadow-sm mb-2" style="border-radius:16px; overflow:hidden;">

            <div class="card-header fw-bold d-flex align-items-center gap-2 font-aneka fs-6" style="background:#0c3040;color:white;">
                <i class="bi bi-people"></i> Caste Details
            </div>

            <div class="card-body p-0">

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Category</span>
                    <span class="fw-semibold font-aneka">{{$employee->category ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Caste</span>
                    <span class="fw-semibold font-aneka">{{$employee->sub_category ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between p-3">
                    <span class="text-dark font-aneka">Sub Caste</span>
                    <span class="fw-semibold font-aneka">{{$employee->sub_caste ?? 'N/A'}}</span>
                </div>

            </div>
        </div>


        <!-- SERVICE DETAILS -->
        <div class="card shadow-sm mb-2" style="border-radius:16px; overflow:hidden;">

            <div class="card-header fw-bold d-flex align-items-center gap-2 font-aneka fs-6" style="background:#0c3040;color:white;">
                <i class="bi bi-briefcase"></i> Service Details
            </div>

            <div class="card-body p-0">

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Date of Joining</span>
                    <span class="fw-semibold font-aneka">
                        {{$employee->doj ? date('d-m-Y', strtotime($employee->doj)) : 'N/A'}}
                    </span>
                </div>

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">KGID</span>
                    <span class="fw-semibold font-aneka">{{$employee->kgid ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between p-3">
                    <span class="text-dark font-aneka">HK / RPC</span>
                    <span class="fw-semibold font-aneka">{{$employee->HK ?? 'N/A'}}</span>
                </div>

            </div>
        </div>


        <!-- POSTING DETAILS -->
        <div class="card shadow-sm mb-2" style="border-radius:16px; overflow:hidden;">

            <div class="card-header fw-bold d-flex align-items-center gap-2 font-aneka fs-6" style="background:#0c3040;color:white;">
                <i class="bi bi-building"></i> Posting Details
            </div>

            <div class="card-body p-0">

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Post Held</span>
                    <span class="fw-semibold font-aneka">{{$employee->post_held ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Designation</span>
                    <span class="fw-semibold font-aneka">{{$employee->post_designation ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Organization</span>
                    <span class="fw-semibold font-aneka">{{$employee->post_organization ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">District</span>
                    <span class="fw-semibold font-aneka">{{$employee->post_district ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Taluk</span>
                    <span class="fw-semibold font-aneka">{{$employee->post_taluk ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between p-3">
                    <span class="text-dark font-aneka">Pay Scale</span>
                    <span class="fw-semibold font-aneka">{{$employee->post_pay_scale ?? 'N/A'}}</span>
                </div>

            </div>
        </div>


        <!-- SPOUSE DETAILS -->
        <div class="card shadow-sm mb-2" style="border-radius:16px; overflow:hidden;">

            <div class="card-header fw-bold d-flex align-items-center gap-2 font-aneka fs-6" style="background:#0c3040;color:white;">
                <i class="bi bi-heart"></i> Spouse Details
            </div>

            <div class="card-body p-0">

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Married</span>
                    <span class="fw-semibold font-aneka">{{$employee->is_married ?? 'N/A'}}</span>
                </div>

                @if($employee->is_married == 'Yes')

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Name</span>
                    <span class="fw-semibold font-aneka">{{$employee->spouse_name}}</span>
                </div>

                <div class="d-flex justify-content-between p-3">
                    <span class="text-dark font-aneka">Phone</span>
                    <span class="fw-semibold font-aneka">{{$employee->spouse_phone}}</span>
                </div>

                @endif

            </div>
        </div>


        <!-- NOMINEE -->
        <div class="card shadow-sm mb-2" style="border-radius:16px; overflow:hidden;">

            <div class="card-header fw-bold d-flex align-items-center gap-2 font-aneka fs-6" style="background:#0c3040;color:white;">
                <i class="bi bi-person-check"></i> Nominee Details
            </div>

            <div class="card-body p-0">

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Name</span>
                    <span class="fw-semibold font-aneka">{{$employee->nominee_name ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between border-bottom p-3">
                    <span class="text-dark font-aneka">Gender</span>
                    <span class="fw-semibold font-aneka">{{$employee->nominee_gender ?? 'N/A'}}</span>
                </div>

                <div class="d-flex justify-content-between p-3">
                    <span class="text-dark font-aneka">Relationship</span>
                    <span class="fw-semibold font-aneka">{{$employee->nominee_relation ?? 'N/A'}}</span>
                </div>

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
                    <label class="form-check-label font-12 ms-n1" for="form3acsd">I have reviewed my profile details and
                        confirm that the information provided is accurate.</label>
                    <i style="margin-top:-1px;" class="icon-check-1 fa fa-circle color-gray-dark font-14"></i>
                    <i style="margin-top:-1px;" class="icon-check-2 fa fa-check-circle font-14 color-highlight"></i>
                </div>
                <span class="text-danger" id="verror" style="padding-left: 27px;display:none;">Please Mark
                    Checkbox</span>
                <div class="d-flex flex-column align-items-center">
                    <button type="submit" onclick="checMark()"
                        class="btn rounded btn-primary font-aneka d-flex flex-row gap-2">
                        <span><i class="bi bi-check-square"></i></span><span>Verified</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif
    <div style="
position:fixed;
bottom:80px;
right:20px;
z-index:9999;
">

        <a href="{{ route('pwa.profile.edit') }}" class="btn btn-primary d-flex align-items-center gap-2 font-aneka"
            style="border-radius:30px;padding:10px 18px;box-shadow:0 4px 12px rgba(0,0,0,0.25);">

            <i class="bi bi-pencil"></i>
            Edit

        </a>

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
function checMark() {
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