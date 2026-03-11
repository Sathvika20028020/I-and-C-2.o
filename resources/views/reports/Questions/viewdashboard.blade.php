@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
@endsection
@section('content')






<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>View </h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- View Card -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-12">
            <div class="card shadow-sm">

                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 40%;">Department Name</th>
                                <td>Mcware</td>
                            </tr>
                            <tr>
                                <th>Question No.</th>
                                <td>25</td>
                            </tr>
                            <tr>
                                <th>Question asked by</th>
                                <td>Saumya</td>
                            </tr>
                            <tr>
                                <th>Question answered by</th>
                                <td>Meghna</td>
                            </tr>
                            <tr>
                                <th>Answered by</th>
                                <td>Meghna</td>
                            </tr>
                            <tr>
                                <th>Question</th>
                                <td>Test</td>
                            </tr>
                            <tr>
                                <th>Answered</th>
                                <td>Demo</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection