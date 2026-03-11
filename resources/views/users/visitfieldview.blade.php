@extends('reports.layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
.container-fluid {
    margin-top: 10px !important;
    padding-top: 25px !important;
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
</style>
@endsection
@section('content')


<div class="container-fluid">
    <div class="card zeta-card mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h6 class="mb-0 fw-bold" style="font-size: 20px;">Visit Field Details</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="label-text"> Name</div>
                    <div class="value-text">Mahesh K N</div>
                </div>
                <div class="col-md-6">
                    <div class="label-text">Date</div>
                    <div class="value-text">28-12-2025</div>
                </div>
                <div class="col-md-6">
                    <div class="label-text">Place/field location</div>
                    <div class="value-text">Bengaluru</div>
                </div>
                <div class="col-md-6">
                    <div class="label-text">
                        <strong>Time</strong>
                    </div>
                    <div class="value-text">From: 3:40 PM</div>
                    <div class="value-text">To: 4:40 PM</div>
                </div>
                <div class="col-12">
                    <div class="label-text">Purpose of Visit</div>
                    <div class="value-text">
                        Table visit to check the soil quality.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection