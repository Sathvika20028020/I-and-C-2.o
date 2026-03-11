@extends('pwa.layout.app')
@section('title') Dashboard @endsection
@section('style')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

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


    .zeta-card {
      border: 1px solid #e5e7eb;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      background: #fff;
      margin-left: 5px;
      margin-right: 5px;
    }

    .label-text {
      font-weight: 500;
      color: #6b7280;
    }

    .value-text {
      font-weight: 600;
      color: #111827;
    }

    .section-badge {
      font-size: 12px;
      padding: 6px 10px;
      color: white !important;
    }
  </style>
@endsection
@section('content')
    <div class="page-title page-title-small">
        <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Leave View</h2>
        <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
            data-src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"></a>
    </div>
    <div class="card header-card shape-rounded" data-card-height="90">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
    </div>
    @if(isset($leave))
      @if($leave->duration == 'Multiple Days')
      <div class="card zeta-card mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
          <h6 class="mb-0 fw-bold" style="font-size: 20px;">Leave Details</h6>
          <span class="badge bg-primary section-badge">Multiple Day Leave</span>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-md-6">
              <div class="label-text">Applied On</div>
              <div class="value-text">{{ date('d-M-Y', strtotime($leave->created_at)) }}</div>
            </div>
            <div class="col-md-6">
              <div class="label-text">Applicant Name</div>
              <div class="value-text">{{$leave->user?->name}}</div>
            </div>
          </div>
          <div class="mb-3">
            <div class="label-text">Reason for Absence</div>
            <div class="value-text">{{$leave->reason}}</div>
          </div>
          @if($leave->file)
          <div class="mb-4">
            <div class="label-text">Files (Attached if any)</div>
            <a target="_blank" href="{{ asset($leave->file) }}" class="text-decoration-none">
              <i class="bi bi-paperclip"></i>
              click to view
            </a>
          </div>
          @endif
          <!-- Leave Dates Table -->
          <div class="table-responsive">
            <table class="isplay table table-striped table-bordered mt-3" id="data-source-1" style="width:100%">
              <thead class="table-light">
                <tr>
                  <th style="width: 10%;">Sl.No</th>
                  <th style="width: 20%;">Leave Date</th>
                  <th style="width: 20%;">Leave Type</th>
                  <th style="width: 20%;">Paid</th>
                  <th style="width: 20%;">Status</th>
                  <th style="width: 20%;">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($leave->dates as $leaveDate)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ date('d-M-Y', strtotime($leaveDate->date)) }}</td>
                  <td>{{$leave->leave_type->name}}</td>
                  <td>
                    <span class="badge bg-{{$leaveDate->paid ? 'success' : 'danger'}}">{{$leaveDate->paid ? 'Yes' : 'No'}}</span>
                  </td>
                  <td>
                    <span class="badge bg-{{$leaveDate->status == 'Pending' ? 'warning' : ( $leaveDate->status == 'Rejected' ? 'danger' : 'success')}} ">{{$leaveDate->status}}</span>
                  </td>
                  <td>

                    <!-- Approve -->
                    <button class="btn btn-sm btn-success me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                      title="Approve Leave" onclick="openActionModal('approve', {{$leaveDate->id}})"">
                      <i class="bi bi-check-circle"></i>
                    </button>
                    <!-- Reject -->
                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                      title="Reject Leave" onclick="openActionModal('reject', {{$leaveDate->id}})"">
                      <i class="bi bi-x-circle"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @else
      <div class="card zeta-card mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
          <h6 class="mb-0 fw-bold" style="font-size: 20px;">Leave Details</h6>
          <span class="badge bg-primary section-badge">Single Day Leave</span>
        </div>
        <div class="card-body">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="label-text">Applied On</div>
              <div class="value-text">{{ date('d-M-Y', strtotime($leave->created_at)) }}</div>
            </div>
            <div class="col-md-6">
              <div class="label-text">Applicant Name</div>
              <div class="value-text">{{$leave->user?->name}}</div>
            </div>
            <div class="col-md-6">
              <div class="label-text">Leave Date</div>
              <div class="value-text">{{ date('d-M-Y', strtotime($leave->dates->first()->date)) }}</div>
            </div>
            <div class="col-md-6">
              <div class="label-text">Leave Type</div>
              <div class="value-text">{{$leave->leave_type->name}}</div>
            </div>
            <div class="col-md-6">
              <div class="label-text">Paid</div>
              <div class="value-text">{{$leave->dates->first()->paid ? 'Yes' : 'No'}}</div>
            </div>
            <div class="col-md-6">
              <div class="label-text">Status</div>
              <span class="badge bg-{{$leave->dates->first()->status == 'Pending' ? 'warning' : ( $leave->dates->first()->status == 'Rejected' ? 'danger' : 'success')}} text-dark">{{$leave->dates->first()->status }}</span>
            </div>
            <div class="col-12">
              <div class="label-text">Reason for Absence</div>
              <div class="value-text">
                {{$leave->reason}}
              </div>
            </div>
            <div class="col-12">
              <div class="label-text">Reason for Leave Approval / Rejection</div>
              <div class="value-text text-muted">
                @if($leave->dates->first()->reason) {{$leave->dates->first()->reason }} @else — Not yet reviewed — @endif
              </div>
            </div>
            @if($leave->file)
            <div class="col-12">
              <div class="label-text">Files (Attached if any)</div>
              <a target="_blank" href="{{ asset($leave->file) }}" class="text-decoration-none">
                <i class="bi bi-paperclip"></i>
                click to view
              </a>
            </div>
            @endif
          </div>

          <!-- Leave Dates Table -->
          <div class="table-responsive">
            <table class="isplay table table-striped table-bordered mt-3" id="data-source-1" style="width:100%">
              <thead class="table-light">
                <tr>
                  <th style="width: 10%;">Sl.No</th>
                  <th style="width: 20%;">Leave Date</th>
                  <th style="width: 20%;">Leave Type</th>
                  <th style="width: 20%;">Paid</th>
                  <th style="width: 20%;">Status</th>
                  <th style="width: 20%;">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($leave->dates as $leaveDate)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ date('d-M-Y', strtotime($leaveDate->date)) }}</td>
                  <td>{{$leave->leave_type->name}}</td>
                  <td>
                    <span class="badge bg-{{$leaveDate->paid ? 'success' : 'danger'}}">{{$leaveDate->paid ? 'Yes' : 'No'}}</span>
                  </td>
                  <td>
                    <span class="badge bg-{{$leaveDate->status == 'Pending' ? 'warning' : ( $leaveDate->status == 'Rejected' ? 'danger' : 'success')}}">{{$leaveDate->status}}</span>
                  </td>
                  <td>

                    <!-- Approve -->
                    <button class="btn btn-sm btn-success me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                      title="Approve Leave" onclick="openActionModal('approve', {{$leaveDate->id}})"">
                      <i class="bi bi-check-circle"></i>
                    </button>
                    <!-- Reject -->
                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                      title="Reject Leave" onclick="openActionModal('reject', {{$leaveDate->id}})"">
                      <i class="bi bi-x-circle"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endif
    @endif

      <div class="modal fade" id="actionModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form action="{{ route('pwa.leave-request.store') }}" method="post">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitle">Approve Leave</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
              <input type="hidden" id="leaveId" name="id">
              <input type="hidden" id="status" name="status">

              <div class="mb-3">
                <label class="form-label" id="reasonLabel">Reason</label>
                <textarea name="reason" class="form-control" id="actionReason" placeholder="Enter reason..." rows="4"
                  required></textarea>
              </div>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
              <button class="btn btn-primary" type="submit">Submit</button>
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

<script>
  let currentAction = '';

  function openActionModal(action, leaveId) {
    currentAction = action;
    document.getElementById('leaveId').value = leaveId;

    if (action === 'approve') {
      document.getElementById('modalTitle').innerText = 'Approve Leave';
      document.getElementById('reasonLabel').innerText = 'Reason for Approval';
      document.getElementById('status').value = 'Approved';
    } else {
      document.getElementById('modalTitle').innerText = 'Reject Leave';
      document.getElementById('reasonLabel').innerText = 'Reason for Rejection';
      document.getElementById('status').value = 'Rejected';
    }

    document.getElementById('actionReason').value = '';

    new bootstrap.Modal(document.getElementById('actionModal')).show();
  }

  function submitAction() {
    const leaveId = document.getElementById('leaveId').value;
    const reason = document.getElementById('actionReason').value;

    if (reason.trim() === '') {
      alert('Please enter a reason');
      return;
    }

    // Example: AJAX / fetch call
    console.log({
      leave_id: leaveId,
      action: currentAction,
      reason: reason
    });

    alert(`Leave ${currentAction}d successfully`);

    bootstrap.Modal.getInstance(document.getElementById('actionModal')).hide();
  }
</script>

@endsection

