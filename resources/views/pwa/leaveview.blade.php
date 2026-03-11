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

       .card {
            border-radius: 12px;
        }
        .label {
            font-weight: 600;
            color: #311F61;
        }
      

         .label {
            font-weight: 600;
            color: #311F61;
        }
        .value {
            color: #555;
        }
        table th {
            background-color: #f1f1f1;
            font-size: 14px;
        }
        table td {
            font-size: 14px;
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
  <div class="container-fluid mt-4 mb-5">
      <div class="card shadow-sm">
          <div class="card-header bg-white d-flex text-center justify-content-center">
            
              <span class="badge text-black font-aneka">Multiple Day Leave</span>
          </div>

          <div class="card-body">

              <!-- Applicant Info -->
              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Name :</div>
                  <div class="col-7 value font-aneka">{{$leave->user?->name}}</div>
              </div>

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Applied On :</div>
                  <div class="col-7 value font-aneka">{{ date('d-M-Y', strtotime($leave->created_at)) }}</div>
              </div>

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Total Days :</div>
                  <div class="col-7 value font-aneka">{{count($leave->dates)}} Days</div>
              </div>

              <div class="row mb-3">
                  <div class="col-5 label font-aneka">Reason :</div>
                  <div class="col-7 value font-aneka">{{$leave->reason}}</div>
              </div>

              <div class="row mb-3">
                  <div class="col-5 label font-aneka">Attachment :</div>
                  <div class="col-7">
                    @if($leave->file)
                      <a target="_blank" href="{{ asset($leave->file) }}" class="text-primary font-aneka">View File</a>
                    @endif
                  </div>
              </div>

              <!-- Multiple Days Table -->
              <div class="table-responsive mt-3">
                <table class="display table table-striped table-bordered mt-3 font-aneka"  style="width:100%">
                      <thead>
                          <tr>
                              <th style="width: 10%;">Sl No</th>
                              <th style="width: 20%;">Leave Date</th>
                              <th style="width: 20%;">Leave Type</th>
                              <th style="width: 20%;">Paid</th>
                              <th style="width: 20%;">Status</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($leave->dates as $leaveDate)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ date('d-M-Y', strtotime($leaveDate->date)) }}</td>
                              <td>{{$leave->leave_type->name}}</td>
                              <td>{{$leaveDate->paid ? 'Yes' : 'No'}}</td>
                              <td>
                                <span class="badge 
                                bg-{{$leaveDate->status == 'Pending' ? 'warning' : ( $leaveDate->status == 'Rejected' ? 'danger' : 'success')}}
                                ">
                                  {{$leaveDate->status}}
                                </span>
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>

          </div>

        
      </div>
  </div>
  @else
  <div class="container-fluid mt-5 mb-5">
      <div class="card shadow-sm rounded-4 ">
          <div class="card-header bg-white d-flex text-center justify-content-center">
            
              <span class="badge text-black font-aneka">Single Day Leave</span>
          </div>

          <div class="card-body">

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Name :</div>
                  <div class="col-7 value font-aneka">{{$leave->user?->name}}</div>
              </div>

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Applied On :</div>
                  <div class="col-7 value font-aneka">{{ date('d-M-Y', strtotime($leave->created_at)) }}</div>
              </div>

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Leave Date :</div>
                  <div class="col-7 value font-aneka">{{ date('d-M-Y', strtotime($leave->dates->first()->date)) }}</div> 
              </div>

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Duration :</div>
                  <div class="col-7 value font-aneka">{{count($leave->dates)}} Day</div>
              </div>

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Leave Type :</div>
                  <div class="col-7 value font-aneka">{{$leave->leave_type->name}}</div>
              </div>

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Paid :</div>
                  <div class="col-7 value font-aneka">{{$leave->dates->first()->paid ? 'Yes' : 'No'}}</div>
              </div>

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Leave Status :</div>
                  <div class="col-7">
                      <span class="badge 
                      bg-{{$leave->dates->first()->status == 'Pending' ? 'warning' : ( $leave->dates->first()->status == 'Rejected' ? 'danger' : 'success')}}
                      font-aneka">
                        {{$leave->dates->first()->status }}
                      </span>
                  </div>
              </div>

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Reason :</div>
                  <div class="col-7 value font-aneka">{{$leave->reason}}</div>
              </div>
              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Approved/Rejection Reason :</div>
                  <div class="col-7 value font-aneka">{{$leave->dates->first()->reason }}</div>
              </div>

              <div class="row mb-2">
                  <div class="col-5 label font-aneka">Attachment :</div>
                  <div class="col-7">
                    @if($leave->file)
                      <a target="_blank" href="{{ asset($leave->file) }}" class="text-primary font-aneka">View File</a>
                    @endif
                  </div>
              </div>

          </div>

        
      </div>
  </div>
  @endif
@endif



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

