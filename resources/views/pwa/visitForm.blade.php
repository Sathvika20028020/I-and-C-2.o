@extends('pwa.layout.app')
@section('title') Dashboard @endsection
@section('style')
<style>


</style>
@endsection
@section('content')
<div class="page-title page-title-small">
    <h2>
        <a href="#" data-back-button>
            <i class="fa fa-arrow-left"></i>
        </a>
        Starter
    </h2>
    <a
        href="#"
        data-menu="menu-main"
        class="bg-fade-highlight-light shadow-xl preload-img"
        data-src="images/avatars/5s.png"
    ></a>
</div>
<div class="card header-card shape-rounded" data-card-height="150">
    <div class="card-overlay bg-highlight opacity-95"></div>
    <div class="card-overlay dark-mode-tint"></div>
    <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Visit Field List</h4>
                        <a href="leave-add.html" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle me-1"></i>
                            Add
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="display table table-bordered align-middle" id="data-source-1" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th style="width:10%">Sl.No</th>
                                    <th style="width:20%">Name</th>
                                    <th style="width:20%">Date</th>
                                    <th style="width:20%">Location</th>
                                    <th style="width:10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Mahesh K N</td>
                                    <td>10-01-2026</td>
                                    <td>bengaluru</td>
                                    <!-- Actions -->
                                    <td>
                                        <!-- View -->
                                        <a
                                            href="leave-view.html"
                                            class="btn btn-sm btn-info me-1"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="View Leave Details"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
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
<script>
  let currentAction = '';

  function openActionModal(action, leaveId) {
      currentAction = action;
      document.getElementById('leaveId').value = leaveId;

      if (action === 'approve') {
          document.getElementById('modalTitle').innerText = 'Approve Leave';
          document.getElementById('reasonLabel').innerText = 'Reason for Approval';
      } else {
          document.getElementById('modalTitle').innerText = 'Reject Leave';
          document.getElementById('reasonLabel').innerText = 'Reason for Rejection';
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