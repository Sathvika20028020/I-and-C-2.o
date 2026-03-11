@extends('reports.layouts.app')
@section('style')
@section('style')
<style>
    .footer {
      margin-left: 0px !important;
    }

    .zeta-card {
      border: 1px solid #e5e7eb;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      background: #fff;
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
@endsection
@section('content')


<div class="container-fluid">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-sm-6">
        <h3>
          Leave view
        </h3>
      </div>
      <div class="col-12 col-sm-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="./AdminListpage.html">
              <i data-feather="home"></i>
            </a>
          </li>
          <li class="breadcrumb-item">Leave view</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--  MULTIPLE DAY LEAVE -->
<div class="card zeta-card">
  <div class="card-header bg-white d-flex justify-content-between align-items-center">
    <h6 class="mb-0 fw-bold" style="font-size: 20px;">Leave Details</h6>
    <span class="badge bg-primary section-badge">{{$leave->duration}} Leave</span>
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
    <div class="mb-4">
      <div class="label-text">Files (Attached if any)</div>
      @if($leave->file)
      <a href="{{ asset($leave->file) }}" class="text-decoration-none">
        <i class="bi bi-paperclip"></i>
        view file
      </a>
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
              <span class="badge bg-{{$leaveDate->paid ? 'success' : 'danger'}}">{{$leaveDate->paid ? 'Paid' : 'Unpaid'}}</span>
            </td>
            <td>
              <span class="badge bg-{{$leaveDate->status == 'Pending' ? 'warning' : ( $leaveDate->status == 'Rejected' ? 'danger' : 'success')}}">{{$leaveDate->status}}</span>
            </td>
            <td>
            @if($leaveDate->status == 'Pending')
              <!-- Approve -->
              <button class="btn btn-sm btn-success me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Approve Leave" onclick="openActionModal('approve', {{$leaveDate->id}})">
                <i class="far fa-check-circle"></i>
              </button>
              <!-- Reject -->
              <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Reject Leave" onclick="openActionModal('reject', {{$leaveDate->id}})">
                <i class="far fa-times-circle"></i>
              </button>
            @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="actionModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="{{ route('leaves.store') }}" method="post">
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
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>


@endsection
@section('script')
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

