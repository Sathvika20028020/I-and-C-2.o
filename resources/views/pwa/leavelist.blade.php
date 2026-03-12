@extends('pwa.layout.app')
@section('title') Dashboard @endsection
@section('style')


<style>
.font-aneka {
    font-family: 'Anek Latin', sans-serif;
}

.fontsize {
    font-size: 18px;
    font-weight: 600;
    color: black;
}

.fontsize1 {
    font-size: 16px;
    font-weight: 500;
    color: rgba(0, 0, 0, 0.521);
}

.footer .footer-title {
    font-size: 23px;
}

.theme-light input,
select,
textarea {
    border-color: rgb(0 0 0 / 40%) !important;
    border-radius: 5px;
}

.form-select {
    border-color: rgb(0 0 0 / 40%) !important;
    border-radius: 5px;
    font-size: 12px;
}

.fontsize {
    color: black;
    font-size: 14px;
}

.btn:hover {
    background-color: #4d8ad9;
    border-color: #fff;
}

.btn {
    background-color: #4d8ad9;
    border-color: #fff;
}



.table th,
.table td {
    vertical-align: middle;
    text-align: center;
}

.badge-approved {
    background-color: #198754;
}

.badge-pending {
    background-color: #ffc107;
    color: #000;
}

.badge-rejected {
    background-color: #dc3545;
}

.pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.dataTables_length select {
    min-width: 80px;

}

.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
    margin-bottom: 10px;
}

table.dataTable {
    width: 100% !important;
}

.dataTables_wrapper .dataTables_length select {
    width: auto !important;
    display: inline-block;
}

.dataTables_wrapper .row {
    margin: 0;
}

table.dataTable {
    width: 100% !important;
}

.pagination .page-item.active .page-link {
    background-color: #183b4a;
    border-color: #183b4a;
}

.page-link {
    color: #183b4a;
}
</style>
@endsection
@section('content')
<div class="page-title page-title-small">
    <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Leave List </h2>
    <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
        data-src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"></a>
</div>
<div class="card header-card shape-rounded" data-card-height="90">
    <div class="card-overlay bg-highlight opacity-95"></div>
    <div class="card-overlay dark-mode-tint"></div>
    <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-row justify-center align-items-center mt-4 font-aneka">
                <a href="{{ route('pwa.leaves.create') }}" class="btn font-aneka" style="border-radius:10px">Apply leave</a>
                <!-- <a href="{{ route('pwa.leaves.index') }}?available=1" class="btn" style="border-radius:10px">My Leaves</a> -->
            </div>
            <div class="container mt-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h4 class="mb-0 fw-bold text-center font-aneka">My Leaves</h4>
                    </div>

                    <div class="card-body">
                        <div class="row g-3" style="margin-bottom: 0px !important;">

                            <!-- Screen 1 -->
                            @foreach($types as $type)
                            <div class="col-md-4">
                                <div class="card text-center mb-0 shadow-sm hover-shadow font-aneka">
                                    <h4>{{$type->name}}</h4>


                                    <div class="row mt-2 text-center">

                                        <div class="col-6">
                                            <small class="text-dark font-aneka">Taken</small><br>
                                            <span class="badge bg-danger px-3 font-aneka">{{$type->taken}}</span>
                                        </div>

                                        <div class="col-6">
                                            <small class="text-dark font-aneka">Remaining</small><br>
                                            <span class="badge bg-success px-3 font-aneka">{{$type->total - $type->taken}}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mb-2" style="border-radius:16px; overflow:hidden;">
                <div class="card-header fw-bold d-flex align-items-center gap-2 font-aneka fs-6"
                    style="background:#0c3040;color:white;">
                    <i class="bi bi-calendar-check"></i> Leave Entries
                </div>

                <div class="card-body p-0">
                    <!-- Leave Entry Example -->
                    <div class="border-bottom p-3">
                        <div class="d-flex justify-content-between">
                            <span class="text-dark font-aneka">Leave Date</span>
                            <span class="fw-semibold font-aneka">01-Mar-2026</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="text-dark font-aneka">Duration</span>
                            <span class="fw-semibold font-aneka">Single Day</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="text-dark font-aneka">Leave Type</span>
                            <span class="fw-semibold font-aneka">Sick Leave</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="text-dark font-aneka">Leave Status</span>
                            <span class="badge bg-success fw-semibold font-aneka">Approved</span>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span class="text-dark font-aneka">Paid</span>
                            <span class="fw-semibold font-aneka">Yes</span>
                        </div>
                        <div class="d-flex gap-2 mt-3 justify-content-end">
                            <a href="#" class="btn btn-sm btn-primary font-aneka">View</a>
                            <a href="#" class="btn btn-sm btn-secondary font-aneka">Edit</a>
                        </div>
                    </div>
                    <!-- Repeat the above block for more leave entries -->
                </div>
            </div>

        </div>
    </div>
</div>




@endsection
@section('script')


<!-- DataTables Bootstrap 5 CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- jQuery (must be first) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        ordering: true,
        searching: true,
        info: true
    });
});
</script>

@endsection