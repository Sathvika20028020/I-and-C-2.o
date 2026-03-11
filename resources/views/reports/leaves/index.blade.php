@extends('reports.layouts.app')
@section('style')
@section('style')
<style>
  .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
  }

  .switch input {
      opacity: 0;
      width: 0;
      height: 0;
  }

  .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: 0.4s;
      border-radius: 24px;
  }

  .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: 0.4s;
      border-radius: 50%;
  }

  input:checked+.slider {
      background-color: #4caf50;
  }

  input:checked+.slider:before {
      transform: translateX(26px);
  }

  .pointer {
      cursor: pointer;
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
                    Leave Details
                </h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./AdminListpage.html">
                            <i data-feather="home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Leave Details</li>

                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0 add"></h4>

                    </div>
                    <div class="table-responsive">
                        <table class="display table table-bordered align-middle" id="data-source-1"
                            style="width:100%">
                            <thead class="table-light">
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
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$entry->name}}</td>
                                    <td>@if($entry->dates->first()) {{ date('d-M-Y', strtotime($entry->dates->first()->date)) }} @endif</td>
                                    <td>{{$entry->duration}}</td>
                                    <td>
                                      @if($entry->duration == 'Multiple Days')
                                        <a href="{{ route('leaves.show', $entry->id) }}">
                                            View Status
                                          </a>
                                      @else
                                        <span class="badge text-white bg-{{$entry->dates->first()?->status == 'Pending' ? 'warning' : ( $entry->dates->first()?->status == 'Rejected' ? 'danger' : 'success')}} text-dark">{{$entry->dates->first()?->status}}</span>
                                      @endif
                                    </td>

                                    <td>{{$entry->leave_type?->name}}</td>

                                    <!-- Actions -->
                                    <td>
                                        <!-- View -->
                                        <button class="btn btn-sm btn-info me-1"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="View Leave Details"
                                            onclick="window.location.href=`{{ route('leaves.show', $entry->id) }}`">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                              @endforeach
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<script>
      const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    });
    function toggleStatus(e){
      let status = $(e).prop('checked') == true ? 1 : 0;
        $.ajax({
        method: "POST",
        url: "{{ route('asset-category.index') }}/"+$(e).attr("data-id"),
        data: {_token: "{{csrf_token()}}", status:status, _method:"PUT"},
        })
        .done(function (res) {        
        if(res.success){
          Toast.fire({
            icon: "success",
            title: "Status changed successfully!"
          });
        }else{
          Toast.fire({
            icon: "error",
            title: "Sorry! Faild to update status!"
          });
        }
        })
        .fail(function (err) {
        console.log(err);              
        });
    }
</script>
@endsection

