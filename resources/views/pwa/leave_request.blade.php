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

      

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .badge-approved { background-color: #198754; }
        .badge-pending { background-color: #ffc107; color: #000; }
        .badge-rejected { background-color: #dc3545; }

        .pagination .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
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
                <a href="{{ route('pwa.leave-request.create') }}" class="btn" style="border-radius:10px">Leave Balance</a>
            </div>
            <div class="card shadow-sm mt-2">
                <div class="card-body">

                  

                    <div class="table-responsive">
                                  <table class="display table table-striped table-bordered mt-3" id="data-source-1" style="width:100%">

                            <thead class="table-light font-aneka">
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Employee Name</th>
                                    <th>Leave Date</th>
                                    <th>Duration</th>
                                    <th>Leave Status</th>
                                    <th>Leave Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($entries as $entry)
                                <tr>
                                    <td class="font-aneka">{{$loop->iteration}}</td>
                                    <td class="font-aneka">{{$entry->user?->employee?->emp_name}}</td>
                                    <td class="font-aneka">{{ date('d-M-Y', strtotime($entry->dates->first()->date)) }}</td>
                                    <td class="font-aneka">{{$entry->duration}}</td>
                                    <td>
                                      @if($entry->duration == 'Multiple Days')
                                        <a href="{{ route('pwa.leaves.show', $entry->id) }}">
                                            View Status
                                          </a>
                                      @else
                                        <span class="badge text-white bg-{{$entry->dates->first()->status == 'Pending' ? 'warning' : ( $entry->dates->first()->status == 'Rejected' ? 'danger' : 'success')}} text-dark">{{$entry->dates->first()->status}}</span>
                                      @endif
                                    </td>
                                    <td class="font-aneka">{{$entry->leave_type->name}}</td>
                                    <td>
                                        <a href="{{ route('pwa.leave-request.show', $entry->id) }}" class="btn btn-sm btn-info text-white">
                                            <i class="bi bi-eye"></i>
                                          </a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-end mt-3">
                        <nav>
                            <ul class="pagination pagination-sm" id="pagination"></ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@section('script')


<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

<!-- jQuery (must be first) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS (MISSING EARLIER) -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    $('#data-source-1').DataTable({
        pageLength: 5,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        pagingType: "simple_numbers"
    });
});
</script>

@endsection

