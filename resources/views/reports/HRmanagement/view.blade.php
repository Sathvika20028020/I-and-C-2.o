@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
.select2-container .select2-selection--single {
    border-color: #0000003d !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    font-size: 15px;
    color: black;
}

.needs-validation label {
    opacity: unset;
    margin-bottom: 0px;
}

.form-select {
    font-size: 15px;
}

.card1 {
    box-shadow: 0px 4px 30px #86869b6e;
}

.card1:hover {
    box-shadow: 0px 4px 30px #86869b6e;
}

.bg-left {
    background-color: #bcbeee !important;
    color: black !important;
}
.table-bordered td, .table-bordered th{
        border: 1px solid #00000045 !important;
} 
</style>
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- jQuery and DataTables JS -->

@endsection
@section('content')

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"> <a class="home-item" href="index.html"><i data-feather="home"></i></a>
                    </li>
                    <li class="breadcrumb-item"> Employees List</li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div>
        </div>
    </div>
    <h3 class="text-center m-3"> Employee Details </h3>
</div>
<div class="card">
    <div class="card-body d-flex flex-column gap-4">
        <div class="table-responsive">
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Salutation</th>
                    <td>{{$employee->salutation}}</td>
                </tr>
                <tr>
                    <th class="bg-left"> Name</th>
                    <td>{{$employee->emp_name}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Gender</th>
                    <td>{{$employee->gender}}</td>
                </tr>
                <tr>
                    <th class="bg-left">DOB</th>
                    <td>{{$employee->dob}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Phone Number</th>
                    <td>{{$employee->phone}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Permanent Address</th>
                    <td>{{$employee->address}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Office Address</th>
                    <td>{{$employee->temp_address}}</td>
                </tr>
                <tr>
                    <th class="bg-left">CATEGORY</th>
                    <td>{{$employee->category}}</td>
                </tr>
                <tr>
                    <th class="bg-left">CASTE</th>
                    <td>{{$employee->sub_category}}</td>
                </tr>
                <tr>
                    <th class="bg-left">SUB-CASTE</th>
                    <td>{{$employee->sub_caste}}</td>
                </tr>
                 <tr>
                    <th class="bg-left">DOJ</th>
                    <td>{{$employee->doj ? date('d-m-Y', strtotime($employee->doj)) : 'N/A'}}</td>
                </tr>
                 <tr>
                    <th class="bg-left">KGID / Metal Number</th>
                    <td>{{$employee->kgid}}</td>
                </tr>
                 <tr>
                    <th class="bg-left">Mode of Recuritment</th>
                    <td>{{$employee->DR_PR}} @if(!empty($employee->KPSC)) - {{$employee->KPSC}} @endif</td>
                </tr>
                 <tr>
                    <th class="bg-left">HK / RPC</th>
                    <td>{{$employee->HK}}</td>
                </tr>
            </table>
        </div>
        <div class="table-responsive d-flex flex-column gap-1">
            <h4>Posting Details</h4>
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Post Held</th>
                    <td>{{$employee->post_held}}</td>
                </tr>
                <tr>
                    <th class="bg-left"> Group</th>
                    <td>{{$employee->post_group}}</td>
                </tr>
                
                <tr>
                    <th class="bg-left">Designation</th>
                    <td>{{$employee->post_designation}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Organization Name</th>
                    <td>{{$employee->post_organization}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Place of Working Dirstict</th>
                    <td>{{$employee->post_district}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Place of Working Taluk</th>
                    <td>{{$employee->post_taluk}}</td>
                </tr>
                <tr>
                    <th class="bg-left">From Date</th>
                    <td>{{$employee->post_from ? date('d-m-Y', strtotime($employee->post_from)) : 'N/A'}}</td>
                </tr>
                <tr>
                    <th class="bg-left">To Date</th>
                    <td>{{$employee->post_to ? date('d-m-Y', strtotime($employee->post_to)) : 'N/A'}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Pay Scale</th>
                    <td>{{$employee->post_pay_scale}}</td>
                </tr>
                
            </table>
        </div>


        <div class="table-responsive d-flex flex-column gap-1">
            <h4>Spouse Details</h4>
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Are you married</th>
                    <td>{{$employee->is_married}}</td>
                </tr>
                @if($employee->is_married == 'Yes')
                <tr>
                    <th class="bg-left"> Name</th>
                    <td>{{$employee->spouse_name}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Gender</th>
                    <td>{{$employee->spouse_gender}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Phone Number</th>
                    <td>{{$employee->spouse_phone}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Are they working</th>
                    <td>{{$employee->is_spouse_working}}</td>
                </tr>
                @if($employee->is_spouse_working == 'Yes')
                <tr>
                    <th class="bg-left">Working in</th>
                    <td>{{$employee->spouse_working_in}}</td>
                </tr>
                @if($employee->spouse_working_in == 'Govt')
                <tr>
                    <th class="bg-left">Place of Working</th>
                    <td>{{$employee->spouse_working_place}}</td>
                </tr>
                @endif
                <tr>
                    <th class="bg-left">KGID Number</th>
                    <td>{{$employee->spouse_kgid}}</td>
                </tr>
                @endif
                @endif
            </table>
        </div>


        <div class="table-responsive d-flex flex-column gap-1">
            <h4>Nominee Details</h4>
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Name</th>
                    <td>{{$employee->nominee_name}}</td>
                </tr>
                <tr>
                    <th class="bg-left"> Gender</th>
                    <td>{{$employee->nominee_gender}}</td>
                </tr>
                <tr>
                    <th class="bg-left">DOB</th>
                    <td>{{date('d-m-Y', strtotime($employee->nominee_dob))}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Relationship</th>
                    <td>{{$employee->nominee_relation}}</td>
                </tr>
                
                
            </table>
        </div>
        @if(count($employee->children) > 0)
        <div class="table-responsive d-flex flex-column gap-1">
            <h4>Childern Details</h4>
            @foreach($employee->children as $child)
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Name</th>
                    <td>{{$child->name}}</td>
                </tr>
                <tr>
                    <th class="bg-left"> Gender</th>
                    <td>{{$child->gender}}</td>
                </tr>
                <tr>
                    <th class="bg-left">DOB</th>
                    <td>{{date('d-m-Y', strtotime($child->dob))}}</td>
                </tr>
            </table>
            <hr>
            @endforeach
        </div>
        @endif
        @if(count($employee->policies) > 0)
        <div class="table-responsive d-flex flex-column gap-1">
            <h4>KGID Policy Details</h4>
            @foreach($employee->policies as $policy)
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 25%;">
                    <col style="width: 75%;">
                </colgroup>
                <tr>
                    <th class="bg-left">Policy No</th>
                    <td>{{$policy->number}}</td>
                </tr>
                <tr>
                    <th class="bg-left"> Policy Start Date</th>
                    <td>{{date('d-m-Y', strtotime($policy->start_date))}}</td>
                </tr>
                <tr>
                    <th class="bg-left">Premium</th>
                    <td>{{$policy->premium}}</td>
                </tr>
            </table>
            <hr>
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection