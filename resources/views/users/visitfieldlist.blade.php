@extends('reports.layouts.app')
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
    .container-fluid {
        margin-top: 10px !important;
        padding-top: 25px !important;
    }
</style>
@endsection
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h2>Visit Field list</h2>

                    </div>
                    <div class="table-responsive">
                        <table class="display table table-bordered align-middle" id="data-source-1" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th style="width:10%">Sl.No</th>
                                    <th style="width:20%">Name</th>
                                    <th style="width:20%">Date</th>
                                    <th style="width:20%">Field Location</th>
                                    
                                    <th style="width:20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01</td>
                                    <td>Mahesh K N</td>
                                    <td>10-01-2026</td>
                                    <td>Nandini Layout</td>

                                  
                                    <!-- Actions -->
                                    <td>
                                        <!-- View -->
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="View Leave Details"
                                            onclick="window.location.href='leave-view.html'">
                                            <i class="bi bi-eye"></i>
                                        </button>

                                    </td>
                                </tr>

                                <tr>
                                    <td>02</td>
                                    <td>Simran K C</td>
                                    <td>10-02-2026</td>
                                    <td>Jayanagara</td>

                                    
                                    <!-- Actions -->
                                    <td>
                                        <!-- View -->
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="View Leave Details"
                                            onclick="window.location.href='leave-view.html'">
                                            <i class="bi bi-eye"></i>
                                        </button>


                                    </td>
                                </tr>

                                <tr>
                                    <td>03</td>
                                    <td>Ram K C</td>
                                    <td>11-02-2026</td>
                                    <td>Banashankanri</td>

                                    
                                    <!-- Actions -->
                                    <td>
                                        <!-- View -->
                                        <button class="btn btn-sm btn-info me-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="View Leave Details"
                                            onclick="window.location.href='leave-view.html'">
                                            <i class="bi bi-eye"></i>
                                        </button>


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
@endsection