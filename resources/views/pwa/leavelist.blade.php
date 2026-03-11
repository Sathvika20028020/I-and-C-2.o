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
            <div class="d-flex flex-row justify-center align-items-center mt-4">
                <a href="{{ route('pwa.leaves.create') }}" class="btn" style="border-radius:10px">Apply leave</a>
                <!-- <a href="{{ route('pwa.leaves.index') }}?available=1" class="btn" style="border-radius:10px">My Leaves</a> -->
            </div>
            <div class="container mt-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h4 class="mb-0 fw-bold text-center">My Leaves</h4>
                    </div>

                    <div class="card-body">
                        <div class="row g-3">

                            <!-- Screen 1 -->
                            @foreach($types as $type)
                            <div class="col-md-4">
                                <div class="card p-3 text-center mb-0 shadow-sm hover-shadow">
                                    <h4>{{$type->name}}</h4>


                                    <div class="row mt-2 g-2">
                                        <div class="col-6">
                                            <div class="card p-2 text-center mb-0 shadow-sm hover-shadow">
                                                <small class="text-muted">Taken</small>
                                                <h6 class="fw-bold">{{$type->taken}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card p-2 text-center mb-0 shadow-sm hover-shadow">
                                                <small class="text-muted">Remaining</small>
                                                <h6 class="fw-bold">{{$type->total - $type->taken}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered" style="width:100%">
                            <thead class="table-light">
                               <tr>
                                    <th style="width: 10%;white-space: nowrap;">Sl. No</th>
                                    <th style="width: 20%;white-space: nowrap;">Leave Date</th>
                                    <th style="width: 20%;white-space: nowrap;">Duration</th>
                                    <th style="width: 20%;white-space: nowrap;">Leave Type</th>
                                    <th style="width: 20%;white-space: nowrap;">Leave Status</th>
                                    <th style="width: 20%;white-space: nowrap;">Paid</th>
                                    <th style="width: 20%;white-space: nowrap;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($entries as $entry)
                                <tr>
                                    <td class="font-aneka">{{$loop->iteration}}</td>
                                    <td class="font-aneka">{{ $entry->dates?->first()?->date ? date('d-M-Y', strtotime($entry->dates->first()->date)) : '' }}
                                    </td>
                                    <td class="font-aneka">{{$entry->duration}}</td>
                                    <td class="font-aneka">{{$entry->leave_type->name}}</td>
                                    <td>
                                        @if($entry->duration == 'Multiple Days')
                                        <a href="{{ route('pwa.leaves.show', $entry->id) }}">
                                            View Status
                                        </a>
                                        @else
                                        <span
                                            class="badge text-white bg-{{$entry->dates?->first()?->status == 'Pending' ? 'warning' : ( $entry->dates?->first()?->status == 'Rejected' ? 'danger' : 'success')}} text-dark">{{$entry->dates?->first()?->status}}</span>
                                        @endif
                                    </td>
                                    <td>@if($entry->duration == 'Multiple Days')
                                        <a href="{{ route('pwa.leaves.show', $entry->id) }}">
                                            View All
                                        </a>
                                        @else
                                        {{$entry->dates->first()->paid == 1 ? 'Yes' : 'No'}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('pwa.leaves.show', $entry->id) }}"
                                            class="btn btn-sm btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        @if(count($entry->dates) == count($entry->dates->where('status', 'Pending')))
                                        <a href="{{ route('pwa.leaves.edit', $entry->id) }}"
                                            class="btn btn-sm btn-info text-white">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                {{--
                                <tr>
                                    <td class="font-aneka">2</td>
                                    <td class="font-aneka">15-Jan-2026</td>
                                    <td class="font-aneka">2 Days</td>
                                    <td class="font-aneka">Sick Leave</td>
                                    <td><span class="badge badge-pending font-aneka">Pending</span></td>
                                    <td>Yes</td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-aneka">3</td>
                                    <td class="font-aneka">22-Jan-2026</td>
                                    <td class="font-aneka">1 Day</td>
                                    <td class="font-aneka">Loss of Pay</td>
                                    <td><span class="badge badge-rejected font-aneka">Rejected</span></td>
                                    <td>No</td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-aneka">4</td>
                                    <td class="font-aneka">05-Feb-2026</td>
                                    <td class="font-aneka">3 Days</td>
                                    <td class="font-aneka">Casual Leave</td>
                                    <td><span class="badge badge-approved font-aneka">Approved</span></td>
                                    <td>Yes</td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-aneka">5</td>
                                    <td class="font-aneka">12-Feb-2026</td>
                                    <td class="font-aneka">1 Day</td>
                                    <td class="font-aneka">Sick Leave</td>
                                    <td><span class="badge badge-pending font-aneka">Pending</span></td>
                                    <td class="font-aneka">Yes</td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-aneka">6</td>
                                    <td class="font-aneka">20-Feb-2026</td>
                                    <td class="font-aneka">2 Days</td>
                                    <td class="font-aneka">Loss of Pay</td>
                                    <td><span class="badge badge-approved font-aneka">Approved</span></td>
                                    <td class="font-aneka">No</td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                --}}
                            </tbody>
                        </table>
                    </div>

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