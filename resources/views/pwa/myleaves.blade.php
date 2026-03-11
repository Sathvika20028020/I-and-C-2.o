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

  

    .profile-box {
      border: 2px solid #183b4a;
      border-radius: 14px;
      padding: 7px;
      display: flex;
      gap: 14px;
      align-items: center;
      background: #fff;
    }

    .avatar {
      width: 50px;
      height: 50px;
      background: #183b4a;
      color: #fff;
      font-weight: 700;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .remaining-box {
      border: 2px solid #183b4a;
      border-radius: 14px;
      padding: 14px;
      text-align: center;
      font-weight: 700;
      color: #183b4a;
      background: #fff;
      height: 100%;
    }

    .leave-card {
      border-radius: 14px;
      border-left: 5px solid #6f42c1;
    }

    .leave-title {
      font-weight: 700;
      font-size: 16px;
    }

    .leave-value {
      font-weight: 600;
      font-size: 15px;
    }
    .table tbody tr {
  background: #fff;
  border-radius: 12px;
}

.table tbody tr td {
  padding: 14px;
}

  
    </style>
@endsection
@section('content')
    <div class="page-title page-title-small">
        <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>My Leaves</h2>
        <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
            data-src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"></a>
    </div>
    <div class="card header-card shape-rounded" data-card-height="90">
        <div class="card-overlay bg-highlight opacity-95"></div>
        <div class="card-overlay dark-mode-tint"></div>
        <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
    </div>

  


<div class="container-fluid mt-4">


  <!-- Profile + Remaining -->
  <div class="row g-3 mb-4 mt-4">
  <div class="col-6">
    <div class="profile-box">
      <div class="avatar font-aneka">SR</div>
      <div>
        <div class="fw-bold font-aneka">{{auth()->user()->name}}</div>
        <small class="text-muted font-aneka">{{auth()->user()->employee->designation}}</small><br>
        <small class="text-muted font-aneka"><b>Last Login </b>: {{auth()->user()->lastLogin ? date('d M Y', strtotime(auth()->user()->lastLogin->created_at)) : 'N/A'}}</small>
      </div>
    </div>
  </div>

  <div class="col-6">
    <div class="remaining-box h-100 font-aneka">
      Remaining Leaves
      <span class="fs-3 d-block mt-3 font-aneka">{{$types->sum('total') - $types->sum('taken')}}</span>
    </div>
  </div>
</div>


  <!-- Leaves Cards -->
  <h5 class="fw-semibold mb-3 font-aneka">Leaves Quota</h5>

  <div class="table-responsive">
  <table class="table table-bordered align-middle text-center">
    <thead class="table-light">
      <tr>
        <th class="font-aneka">Leave Type</th>
        <th class="font-aneka">Total</th>
        <th class="font-aneka">Taken</th>
        <th class="font-aneka">Remaining</th>
      </tr>
    </thead>

    <tbody>
      @foreach($types as $type)
      <tr>
        <td class="fw-bold text-start ps-3 font-aneka">{{$type->name}}</td>
        <td class="font-aneka">{{$type->total}}</td>
        <td class="font-aneka">{{$type->taken}}</td>
        <td class="font-aneka">{{$type->total - $type->taken}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
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


@endsection

