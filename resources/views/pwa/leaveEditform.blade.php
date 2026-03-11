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

.table-wrapper {
    overflow-x: auto;
    overflow-y: hidden;
    white-space: nowrap;
}

.table-wrapper::-webkit-scrollbar {
    height: 3px;
}

.table-wrapper::-webkit-scrollbar-track {
    background: #f1f1f1 !important;
}

.table-wrapper::-webkit-scrollbar-thumb {
    background: #6c63ff !important;
    border-radius: 10px !important;
}

.table-wrapper::-webkit-scrollbar-thumb:hover {
    background: #4b47cc !important;
}

/* Default SweetAlert text size */
.swal-responsive {
  font-size: 16px;
}

/* Small screens (mobile) */
@media (max-width: 576px) {
  .swal-responsive {
    font-size: 13px;
  }

  .swal-responsive .swal2-title {
    font-size: 16px;
  }

  .swal-responsive .swal2-html-container {
    font-size: 13px;
  }

  .swal-responsive .swal2-confirm {
    font-size: 13px;
    padding: 6px 14px;
  }
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
<div class="page-title page-title-small">
    <h2 class="font-aneka"><a href="#" data-back-button><i class="fa fa-arrow-left"></i></a>Edit Leave </h2>
    <a href="#" data-menu="menu-main" class="bg-fade-highlight-light shadow-xl preload-img"
        data-src="https://cdn.pixabay.com/photo/2015/03/04/22/35/avatar-659652_1280.png"></a>
</div>
<div class="card header-card shape-rounded" data-card-height="90">
    <div class="card-overlay bg-highlight opacity-95"></div>
    <div class="card-overlay dark-mode-tint"></div>
    <div class="card-bg preload-img" data-src="images/pictures/20s.jpg"></div>
</div>

<div class="d-flex flex-column gap-2 mt-5 mb-3">
    <div class="card m-2" style="border-radius: 20px;">
        <div class="card-body">
          <form class="needs-validation" method="post" action="{{ route('pwa.leaves.update', $leave->id) }}" enctype="multipart/form-data" novalidate>
          @csrf @method('put')
            <!-- Applicant Name -->
            <div class="mb-3">
              <label class="form-label font-aneka">Applicant Name</label>
              <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}"
                     placeholder="Enter your full name" required readonly>
              <div class="invalid-feedback font-aneka">Please enter your name.</div>
            </div>

            <!-- Leave Type -->
            <div class="mb-3">
              <label class="form-label font-aneka">Leave Type</label>
              <select class="form-select font-aneka" id="leaveType" required name="leave_type_id">
                <option value="" disabled selected>Select leave type</option>
                @foreach($types as $type)
                <option value="{{$type->id}}" {{$leave->leave_type_id == $type->id ? 'selected' : ''}}>{{$type->name}}</option>
                @endforeach
              </select>
              <div class="invalid-feedback font-aneka">Please select leave type.</div>
            </div>

            <!-- Duration -->
            <div class="mb-3">
              <label class="form-label font-aneka">Duration</label>
              <select class="form-select font-aneka" required name="duration">
                <option value="" disabled selected>Select leave duration</option>
                <option value="Full Day" {{$leave->duration == 'Full Day' ? 'selected' : ''}}>Full Day</option>
                <option value="Multiple Days" {{$leave->duration == 'Multiple Days' ? 'selected' : ''}}>Multiple Days</option>
                <option value="First Half" {{$leave->duration == 'First Half' ? 'selected' : ''}}>First Half</option>
                <option value="Second Half" {{$leave->duration == 'Second Half' ? 'selected' : ''}}>Second Half</option>
              </select>
              <div class="invalid-feedback font-aneka">Please select duration.</div>
            </div>

            <!-- Date -->
            <div class="mb-3 {{$leave->duration == 'Multiple Days' ? 'd-none' : ''}}" id="singleDateDiv">
              <label class="form-label font-aneka">Date of Leave</label>
              <input type="text" class="form-control" id="leaveDate" min="{{date('Y-m-d')}}" value="{{$leave->dates->first()->date}}"
                    placeholder="Select leave date" {{$leave->duration == 'Multiple Days' ? '' : 'required'}} name="date">
              <div class="invalid-feedback font-aneka">Please select a date.</div>
            </div>

            <div class="mb-3 {{$leave->duration == 'Multiple Days' ? '' : 'd-none'}}" id="multipleDateDiv">
              <label class="form-label font-aneka">Leave Dates</label>

              <div class="row g-2">
                <div class="col-md-6">
                  <label class="form-label font-aneka small">From Date</label>
                  <input type="date" class="form-control" id="fromDate" value="{{$leave->dates->first()->date}}"
                        name="from_date" {{$leave->duration == 'Multiple Days' ? 'required' : ''}}>
                  <div class="invalid-feedback font-aneka">
                    Please select start date.
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label font-aneka small">To Date</label>
                  <input type="date" class="form-control" id="toDate" value="{{ $leave->dates->last()?->date }}"
                        name="to_date" {{$leave->duration == 'Multiple Days' ? 'required' : ''}}>
                  <div class="invalid-feedback font-aneka">
                    Please select end date.
                  </div>
                </div>
              </div>
            </div>



            <!-- Reason -->
            <div class="mb-3">
              <label class="form-label font-aneka">Reason</label>
              <textarea class="form-control" style="border-radius: 5px !important;" rows="3"
                name="reason"  placeholder="Enter reason for leave" required>{{ $leave->reason }}</textarea>
              <div class="invalid-feedback font-aneka">Please provide a reason.</div>
            </div>

            <!-- File -->
            <div class="mb-3">
              <label class="form-label font-aneka">Attach File</label>
              <input 
                name="file" 
                type="file" 
                class="form-control" 
                accept=".jpg,.jpeg,.png,.pdf"
              >
              <div class="invalid-feedback font-aneka">
                Please upload a JPG, PNG, or PDF file only.
              </div>
            </div>


            <div class="text-center">
              <button type="submit" class="btn btn-primary font-aneka rounded m-2">Submit</button>
            </div>

          </form>
        </div>
    </div>
</div>



@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  let datePicker;
  const restrictedDates = @json($rls);

  function initDatePicker(mode = 'ALL') {
    if (datePicker) {
      datePicker.destroy();
    }
    if(mode == 'ALL')
    datePicker = flatpickr("#leaveDate", {
      minDate: "today",
      dateFormat: "Y-m-d",
      allowInput: false,
    });
    else
    datePicker = flatpickr("#leaveDate", {
      minDate: "today",
      dateFormat: "Y-m-d",
      allowInput: false,
      enable: restrictedDates
    });
  }

  // default → all dates
  initDatePicker();

  document.getElementById('leaveType').addEventListener('change', function () {
  const selectedText = this.options[this.selectedIndex].text;
    console.log(selectedText);
    
  if (selectedText.includes('Restricted Holiday')) {
    initDatePicker('RH');
  } else {
    initDatePicker('ALL');
  }
});

</script>

<script>
@if(session()->has('success'))
{{session()->forget('success')}}
    Swal.fire({
      icon: 'success',
      title: 'Leave Applied Successfully!',
      text: 'Your leave request has been submitted.',
      confirmButtonColor: '#0d6efd',
      customClass: {
        popup: 'swal-responsive'
      }
    }).then(() => {
      window.location.href = "{{ url('/pwa/leaves') }}";
    });
@endif
(function () {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {

      if (form.checkValidity()) {
        
      }else{
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    })
  })
})()

// document.getElementById('leaveDate').valueAsDate = new Date()

if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('sw.js')
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

  const duration = document.querySelector('select[name="duration"]');
  const singleDate = document.getElementById('singleDateDiv');
  const multipleDate = document.getElementById('multipleDateDiv');

  const leaveDate = document.getElementById('leaveDate');
  const fromDate = document.getElementById('fromDate');
  const toDate = document.getElementById('toDate');

  duration.addEventListener('change', function () {

    if (this.value === 'Multiple Days') {
      singleDate.classList.add('d-none');
      multipleDate.classList.remove('d-none');

      leaveDate.removeAttribute('required');
      fromDate.setAttribute('required', true);
      toDate.setAttribute('required', true);
    } else {
      singleDate.classList.remove('d-none');
      multipleDate.classList.add('d-none');

      leaveDate.setAttribute('required', true);
      fromDate.removeAttribute('required');
      toDate.removeAttribute('required');
    }

  });

});
</script>



@endsection