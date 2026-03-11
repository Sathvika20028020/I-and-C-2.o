<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('admin/assets/images/logo/bbmp.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/logo/bbmp.png') }}" type="image/x-icon">
    <title>Department of Industries & Commerce</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/flag-icon.css') }}') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/photoswipe.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('admin/assets/css/color-1.css" media="screen') }}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/select2.css') }}">

    <style>
        .unit-section {
            display: none;
        }

        .checkbox_animated:after {
            border: 2px solid #5b62688c;
        }

        .select2-container {
            border: 1px solid #00000061;
            border-radius: 5px;
        }

        .form-select {
            border: 1px solid #00000061;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 30px;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            top: 25%;
            left: 15%;
            width: 70%;
            height: 2px;
            background: #007bff;
            z-index: 0;
            transform: translateY(-50%);
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }

        .step-indicator>div {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 1;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #fff;
            border: 2px solid #007bff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
        }

        .step-circle.active {
            background-color: #007bff;
            color: #fff;
        }

        .step-circle.done {
            background-color: #28a745;
            color: #fff;
        }

        .step-label {
            margin-top: 5px;
            font-size: 13px;
            color: #333;
        }
    </style>
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader">
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-bar"></div>
            <div class="loader-ball"></div>
        </div>
    </div>
    <!-- Loader ends-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        <!-- Page Body Start-->
        <div class="page-body-wrapper">


            <div class="vh-auto d-flex flex-column align-items-center justify-content-center">

                <!-- Container-fluid starts-->
                <div class="container default-dash mt-3">
                    <div class="d-flex flex-row align-items-center justify-content-center">
                        <div class="d-flex flex-column card col-lg-6 col-md-11 col-11">
                            <div class="card-body d-flex flex-column gap-4">
                                <div class="card-header p-0">
                                    <h4 class="text-center">Sarojini Mahishi Details</h4>
                                </div>
                                <form action="{{ route('form.store') }}" method="post" class="needs-validation" novalidate enctype="multipart/form-data" >
                                  @csrf
                                    <div class="d-flex flex-column gap-2">
                                        <div class="d-flex row m-0">
                                            <div class="col-md-12 col-12">
                                                <div class="mb-3">
                                                    <label class="col-form-label mb-1"
                                                        style="font-weight: 500;">District<span class="text-danger">*</span></label>
                                                    <select class="form-select" aria-label="zone" required name="district">
                                                        <option selected disabled value="">Select District</option>
                                                        @foreach($districts as $district)
                                                        <option value="{{$district->name}}">{{$district->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Please select a district.</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Unit Type Checkboxes -->
                                        <div class="ms-3 mb-2">
                                            <label class="fw-semibold">Select Unit Type(s) <span
                                                    class="text-danger">*</span></label>
                                            <div class="d-flex flex-column gap-1">
                                                <div><input class="form-check-input me-2 unit-checkbox" id="small" name="unit_types[]" value="small"
                                                        type="checkbox" data-target="unit-small"><label
                                                        for="small">Small</label></div>
                                                <div><input class="form-check-input me-2 unit-checkbox" id="medium" name="unit_types[]" value="medium"
                                                        type="checkbox" data-target="unit-medium"><label
                                                        for="medium">Medium</label></div>
                                                <div><input class="form-check-input me-2 unit-checkbox" id="large" name="unit_types[]" value="large"
                                                        type="checkbox" data-target="unit-large"><label
                                                        for="large">Large</label></div>
                                                <div><input class="form-check-input me-2 unit-checkbox" id="mega" name="unit_types[]" value="mega"
                                                        type="checkbox" data-target="unit-mega"><label
                                                        for="mega">Mega</label></div>
                                                <div><input class="form-check-input me-2 unit-checkbox" id="ultramega" name="unit_types[]" value="ultramega"
                                                        type="checkbox" data-target="unit-ultramega"><label
                                                        for="ultramega">Ultra Mega</label></div>
                                                <div><input class="form-check-input me-2 unit-checkbox" id="supermega" name="unit_types[]" value="supermega"
                                                        type="checkbox" data-target="unit-supermega"><label
                                                        for="supermega">Super Mega</label></div>
                                                <div class="invalid-feedback" id="unitTypeError" style="display: none;">
                                                    Please select at least one unit type.
                                                </div>
                                            </div>
                                        </div>




                                        <div id="unit-small" class="unit-section pt-3">

                                            <div class="card-body p-0">
                                                <div>
                                                    <h3 class="text-center mb-2">Small</h3>
                                                </div>
                                                <!-- File Upload -->
                                                <div class="ms-3">
                                                    <div class="col-md-12 col-12 mb-3">
                                                        <label for="formFile2" class="form-label mb-1"
                                                            style="font-weight: 500;">Unit
                                                            Approval Document <span class="text-danger">*</span></label>
                                                        <input class="form-control small_input all" type="file" id="formFile2" name="small_doc">
                                                        <div class="invalid-feedback">Please upload a document.</div>
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="ms-3">
                                                    <div class="mb-3">
                                                        <label for="address" class="form-label mb-1"
                                                            style="font-weight:500">Address
                                                            <span class="text-danger">*</span></label>
                                                        <textarea class="form-control small_input all" id="address" rows="2" name="small_address"
                                                            placeholder="Enter Address" ></textarea>
                                                        <div class="invalid-feedback">Please enter an address.</div>
                                                    </div>
                                                </div>

                                                <div class="step-indicator mb-4">
                                                    <div>
                                                        <div class="step-circle active" onclick="goToStep(1)">A</div>
                                                        <div class="step-label">Group A</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToStep(2)">B</div>
                                                        <div class="step-label">Group B</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToStep(3)">C</div>
                                                        <div class="step-label">Group C</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToStep(4)">D</div>
                                                        <div class="step-label">Group D</div>
                                                    </div>
                                                </div>

                                                <div id="multi-step-form">
                                                    <div class="step step-1 active">
                                                        <div class="mb-3">
                                                            <label for="GroupAKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                1) Kannadigas <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control small_input all"
                                                                id="GroupAKannadigas" placeholder="Your Answer" name="small_kannadigas_group_a">
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="GroupAOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                2) Others <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control small_input all" id="GroupAOthers"
                                                                placeholder="Your Answer" name="small_others_group_a">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>

                                                        <!-- Total Group A - initially hidden -->
                                                        <div class="mb-3" id="groupATotalDiv" style="display: none;">
                                                            <label for="GroupATotal" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group A
                                                            </label>
                                                            <!-- <input type="text" class="form-control" id="GroupATotal"
                                                                readonly> -->
                                                        </div>

                                                        <div class="d-flex flex-column align-items-end">
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-2">

                                                        <div class="mb-3">
                                                            <label for="GroupBKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control small_input all"
                                                                id="GroupBKannadigas" placeholder="Your Answer" name="small_kannadigas_group_b">
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupBOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control small_input all" id="GroupBOthers"
                                                                placeholder="Your Answer" name="small_others_group_b">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <!-- Total Group B - initially hidden -->
                                                        <div class="mb-3" id="groupBTotalDiv" style="display: none;">
                                                            <label for="GroupBTotal" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group B
                                                            </label>
                                                            <!-- <input type="text" class="form-control" id="GroupBTotal"
                                                                readonly> -->
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end gap-2 justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-3">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupCKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control small_input all"
                                                                id="GroupCKannadigas" placeholder="Your Answer" name="small_kannadigas_group_c">
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupCOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control small_input all" id="GroupCOthers"
                                                                placeholder="Your Answer" name="small_others_group_c">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <!-- Total Group C - initially hidden -->
                                                        <div class="mb-3" id="groupCTotalDiv" style="display: none;">
                                                            <label for="GroupCTotal" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group C
                                                            </label>
                                                            <!-- <input type="text" class="form-control" id="GroupCTotal"
                                                                readonly> -->
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end justify-content-end gap-2">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>
                                                    <div class="step step-4">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupDKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control small_input all"
                                                                id="GroupDKannadigas" placeholder="Your Answer" name="small_kannadigas_group_d">
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupDOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control small_input all" id="GroupDOthers"
                                                                placeholder="Your Answer" name="small_others_group_d">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <!-- Total Group D - initially hidden -->
                                                        <div class="mb-3" id="groupDTotalDiv" style="display: none;">
                                                            <label for="GroupDTotal" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group D
                                                            </label>
                                                            <!-- <input type="text" class="form-control" id="GroupDTotal"
                                                                readonly> -->
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row gap-2 align-items-end justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3" id="overallTotalDiv" style="display: none;">
                                                    <label for="smallOverallTotalCount" class="form-label">Small Overall
                                                        Total Count</label>
                                                    <!-- <input type="text" class="form-control" id="smallOverallTotalCount"
                                                        readonly> -->
                                                </div>

                                            </div>
                                            <hr>
                                        </div>
                                        <div id="unit-medium" class="unit-section pt-3">

                                            <div class="card-body p-0">
                                                <div>
                                                    <h3 class="text-center mb-2">Medium</h3>
                                                </div>
                                                <!-- File Upload -->
                                                <div class="ms-3">
                                                    <div class="col-md-12 col-12 mb-3">
                                                        <label for="formFile1" class="form-label mb-1"
                                                            style="font-weight: 500;">Unit
                                                            Approval Document <span class="text-danger">*</span></label>
                                                        <input class="form-control  medium_input all" type="file" id="formFile1" name="medium_doc">
                                                        <div class="invalid-feedback">Please upload a document.</div>
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="ms-3">
                                                    <div class="mb-3">
                                                        <label for="address2" class="form-label mb-1"
                                                            style="font-weight:500">Address
                                                            <span class="text-danger">*</span></label>
                                                        <textarea class="form-control  medium_input all" id="address2" rows="2" name="medium_address"
                                                            placeholder="Enter Address" ></textarea>
                                                        <div class="invalid-feedback">Please enter an address.</div>
                                                    </div>
                                                </div>

                                                <div class="step-indicator mb-4">
                                                    <div>
                                                        <div class="step-circle active" onclick="goToMediumStep(1)">A
                                                        </div>
                                                        <div class="step-label">Group A</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToMediumStep(2)">B</div>
                                                        <div class="step-label">Group B</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToMediumStep(3)">C</div>
                                                        <div class="step-label">Group C</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToMediumStep(4)">D</div>
                                                        <div class="step-label">Group D</div>
                                                    </div>
                                                </div>

                                                <div id="multi-step-form-medium">
                                                    <div class="step step-1 active">
                                                        <div class="mb-3">
                                                            <label for="GroupAMediumKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control medium_input all"
                                                                id="GroupAMediumKannadigas" placeholder="Your Answer" name="medium_kannadigas_group_a"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupAMediumOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control medium_input all"
                                                                id="GroupAMediumOthers" placeholder="Your Answer" name="medium_others_group_a"
                                                                >
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <!-- Total Group B - initially hidden -->
                                                        <div class="mb-3" id="groupAMediumTotalDiv"
                                                            style="display: none;">
                                                            <label for="groupAMediumTotalDiv" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group A
                                                            </label>
                                                            <!-- <input type="text" class="form-control"
                                                                id="GroupAMediumTotal" readonly> -->
                                                        </div>
                                                        <div class="d-flex flex-column align-items-end">
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-2">

                                                        <div class="mb-3">
                                                            <label for="GroupBKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control medium_input all" name="medium_kannadigas_group_b"
                                                                id="GroupBKannadigas" placeholder="Your Answer"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupBOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control medium_input all" id="GroupBOthers"
                                                                placeholder="Your Answer" name="medium_others_group_b">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <!-- Total Group B - initially hidden -->
                                                        <div class="mb-3" id="groupBMediumTotalDiv"
                                                            style="display: none;">
                                                            <label for="groupBMediumTotalDiv" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group B
                                                            </label>
                                                            <!-- <input type="text" class="form-control"
                                                                id="GroupBMediumTotal" readonly> -->
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end gap-2 justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-3">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupCKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control medium_input all"
                                                                id="GroupCKannadigas" placeholder="Your Answer" name="medium_kannadigas_group_c"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupCOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control medium_input all" id="GroupCOthers"
                                                                placeholder="Your Answer" name="medium_others_group_c">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end justify-content-end gap-2">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>
                                                    <div class="step step-4">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupDKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control medium_input all"
                                                                id="GroupDKannadigas" placeholder="Your Answer" name="medium_kannadigas_group_d"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupDOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control medium_input all" id="GroupDOthers"
                                                                placeholder="Your Answer" name="medium_others_group_d">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row gap-2 align-items-end justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div id="unit-large" class="unit-section pt-3">

                                            <div class="card-body p-0">
                                                <div>
                                                    <h3 class="text-center mb-2">Large</h3>
                                                </div>
                                                <!-- File Upload -->
                                                <div class="ms-3">
                                                    <div class="col-md-12 col-12 mb-3">
                                                        <label for="formFile3" class="form-label mb-1"
                                                            style="font-weight: 500;">Unit
                                                            Approval Document <span class="text-danger">*</span></label>
                                                        <input class="form-control large_input all" type="file" id="formFile3" name="large_doc">
                                                        <div class="invalid-feedback">Please upload a document.</div>
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="ms-3">
                                                    <div class="mb-3">
                                                        <label for="address3" class="form-label mb-1"
                                                            style="font-weight:500">Address
                                                            <span class="text-danger">*</span></label>
                                                        <textarea class="form-control  large_input all" id="address3" rows="2" name="large_address"
                                                            placeholder="Enter Address" ></textarea>
                                                        <div class="invalid-feedback">Please enter an address.</div>
                                                    </div>
                                                </div>

                                                <div class="step-indicator mb-4">
                                                    <div>
                                                        <div class="step-circle active" onclick="goToLargeStep(1)">A
                                                        </div>
                                                        <div class="step-label">Group A</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToLargeStep(2)">B</div>
                                                        <div class="step-label">Group B</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToLargeStep(3)">C</div>
                                                        <div class="step-label">Group C</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToLargeStep(4)">D</div>
                                                        <div class="step-label">Group D</div>
                                                    </div>
                                                </div>

                                                <div id="multi-step-form-Large">
                                                    <div class="step step-1 active">
                                                        <div class="mb-3">
                                                            <label for="GroupAKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control large_input all" name="large_kannadigas_group_a"
                                                                id="GroupAKannadigas" placeholder="Your Answer"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupAOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control large_input all" id="GroupAOthers"
                                                                placeholder="Your Answer" name="large_others_group_a">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>

                                                        <div class="d-flex flex-column align-items-end">
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-2">

                                                        <div class="mb-3">
                                                            <label for="GroupBKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control large_input all" name="large_kannadigas_group_b"
                                                                id="GroupBKannadigas" placeholder="Your Answer"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupBOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control large_input all" id="GroupBOthers"
                                                                placeholder="Your Answer" name="large_others_group_b">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end gap-2 justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-3">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupCKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control large_input all" name="large_kannadigas_group_c"
                                                                id="GroupCKannadigas" placeholder="Your Answer">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupCOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control large_input all" id="GroupCOthers"
                                                                placeholder="Your Answer" name="large_others_group_c">
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end justify-content-end gap-2">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>
                                                    <div class="step step-4">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupDKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control large_input all" name="large_kannadigas_group_d"
                                                                id="GroupDKannadigas" placeholder="Your Answer">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupDOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control large_input all" id="GroupDOthers"
                                                                placeholder="Your Answer" name="large_others_group_d">
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row gap-2 align-items-end justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div id="unit-mega" class="unit-section pt-3">

                                            <div class="card-body p-0">
                                                <div>
                                                    <h3 class="text-center mb-2">Mega</h3>
                                                </div>
                                                <!-- File Upload -->
                                                <div class="ms-3">
                                                    <div class="col-md-12 col-12 mb-3">
                                                        <label for="formFile4" class="form-label mb-1"
                                                            style="font-weight: 500;">Unit
                                                            Approval Document <span class="text-danger">*</span></label>
                                                        <input class="form-control mega_input all" type="file" id="formFile4" name="mega_doc">
                                                        <div class="invalid-feedback">Please upload a document.</div>
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="ms-3">
                                                    <div class="mb-3">
                                                        <label for="address4" class="form-label mb-1"
                                                            style="font-weight:500">Address
                                                            <span class="text-danger">*</span></label>
                                                        <textarea class="form-control mega_input all" id="address4" rows="2" name="mega_address"
                                                            placeholder="Enter Address" ></textarea>
                                                        <div class="invalid-feedback">Please enter an address.</div>
                                                    </div>
                                                </div>

                                                <div class="step-indicator mb-4">
                                                    <div>
                                                        <div class="step-circle active" onclick="goToMegaStep(1)">A</div>
                                                        <div class="step-label">Group A</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToMegaStep(2)">B</div>
                                                        <div class="step-label">Group B</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToMegaStep(3)">C</div>
                                                        <div class="step-label">Group C</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToMegaStep(4)">D</div>
                                                        <div class="step-label">Group D</div>
                                                    </div>
                                                </div>

                                                <div id="multi-step-form-mega">
                                                    <div class="step step-1 active">
                                                        <div class="mb-3">
                                                            <label for="GroupAKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                1) Kannadigas <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control mega_input all"
                                                                id="GroupAKannadigas" placeholder="Your Answer" name="mega_kannadigas_group_a">
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="GroupAOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                2) Others <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control mega_input all" id="GroupAOthers"
                                                                placeholder="Your Answer" name="mega_others_group_a">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>

                                                        <!-- Total Group A - initially hidden -->
                                                        <div class="mb-3" id="groupATotalDiv" style="display: none;">
                                                            <label for="GroupATotal" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group A
                                                            </label>
                                                            <!-- <input type="text" class="form-control" id="GroupATotal"
                                                                readonly> -->
                                                        </div>

                                                        <div class="d-flex flex-column align-items-end">
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-2">

                                                        <div class="mb-3">
                                                            <label for="GroupBKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control mega_input all"
                                                                id="GroupBKannadigas" placeholder="Your Answer" name="mega_kannadigas_group_b">
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupBOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control mega_input all" id="GroupBOthers"
                                                                placeholder="Your Answer" name="mega_others_group_b">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <!-- Total Group B - initially hidden -->
                                                        <div class="mb-3" id="groupBTotalDiv" style="display: none;">
                                                            <label for="GroupBTotal" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group B
                                                            </label>
                                                            <!-- <input type="text" class="form-control" id="GroupBTotal"
                                                                readonly> -->
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end gap-2 justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-3">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupCKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control mega_input all"
                                                                id="GroupCKannadigas" placeholder="Your Answer" name="mega_kannadigas_group_c">
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupCOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control mega_input all" id="GroupCOthers"
                                                                placeholder="Your Answer" name="mega_others_group_c">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <!-- Total Group C - initially hidden -->
                                                        <div class="mb-3" id="groupCTotalDiv" style="display: none;">
                                                            <label for="GroupCTotal" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group C
                                                            </label>
                                                            <!-- <input type="text" class="form-control" id="GroupCTotal"
                                                                readonly> -->
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end justify-content-end gap-2">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>
                                                    <div class="step step-4">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupDKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control mega_input all"
                                                                id="GroupDKannadigas" placeholder="Your Answer" name="mega_kannadigas_group_d">
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupDOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control mega_input all" id="GroupDOthers"
                                                                placeholder="Your Answer" name="mega_others_group_d">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <!-- Total Group D - initially hidden -->
                                                        <div class="mb-3" id="groupDTotalDiv" style="display: none;">
                                                            <label for="GroupDTotal" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group D
                                                            </label>
                                                            <!-- <input type="text" class="form-control" id="GroupDTotal"
                                                                readonly> -->
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row gap-2 align-items-end justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3" id="overallTotalDiv" style="display: none;">
                                                    <label for="smallOverallTotalCount" class="form-label">Small Overall
                                                        Total Count</label>
                                                    <!-- <input type="text" class="form-control" id="smallOverallTotalCount"
                                                        readonly> -->
                                                </div>

                                            </div>
                                            <hr>
                                        </div>
                                        <div id="unit-ultramega" class="unit-section pt-3">

                                            <div class="card-body p-0">
                                                <div>
                                                    <h3 class="text-center mb-2">Ultra Mega</h3>
                                                </div>
                                                <!-- File Upload -->
                                                <div class="ms-3">
                                                    <div class="col-md-12 col-12 mb-3">
                                                        <label for="formFile5" class="form-label mb-1"
                                                            style="font-weight: 500;">Unit
                                                            Approval Document <span class="text-danger">*</span></label>
                                                        <input class="form-control  ultramega_input all" type="file" id="formFile5" name="ultramega_doc">
                                                        <div class="invalid-feedback">Please upload a document.</div>
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="ms-3">
                                                    <div class="mb-3">
                                                        <label for="address5" class="form-label mb-1"
                                                            style="font-weight:500">Address
                                                            <span class="text-danger">*</span></label>
                                                        <textarea class="form-control  ultramega_input all" id="address5" rows="2" name="ultramega_address"
                                                            placeholder="Enter Address" ></textarea>
                                                        <div class="invalid-feedback">Please enter an address.</div>
                                                    </div>
                                                </div>

                                                <div class="step-indicator mb-4">
                                                    <div>
                                                        <div class="step-circle active" onclick="goToUltramegaStep(1)">A
                                                        </div>
                                                        <div class="step-label">Group A</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToUltramegaStep(2)">B</div>
                                                        <div class="step-label">Group B</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToUltramegaStep(3)">C</div>
                                                        <div class="step-label">Group C</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToUltramegaStep(4)">D</div>
                                                        <div class="step-label">Group D</div>
                                                    </div>
                                                </div>

                                                <div id="multi-step-form-ultramega">
                                                    <div class="step step-1 active">
                                                        <div class="mb-3">
                                                            <label for="GroupAMediumKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control ultramega_input all"
                                                                id="GroupAMediumKannadigas" placeholder="Your Answer" name="ultramega_kannadigas_group_a"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupAMediumOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control ultramega_input all"
                                                                id="GroupAMediumOthers" placeholder="Your Answer" name="ultramega_others_group_a"
                                                                >
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <!-- Total Group B - initially hidden -->
                                                        <div class="mb-3" id="groupAMediumTotalDiv"
                                                            style="display: none;">
                                                            <label for="groupAMediumTotalDiv" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group A
                                                            </label>
                                                            <!-- <input type="text" class="form-control"
                                                                id="GroupAMediumTotal" readonly> -->
                                                        </div>
                                                        <div class="d-flex flex-column align-items-end">
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-2">

                                                        <div class="mb-3">
                                                            <label for="GroupBKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control ultramega_input all" name="ultramega_kannadigas_group_b"
                                                                id="GroupBKannadigas" placeholder="Your Answer"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupBOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control ultramega_input all" id="GroupBOthers"
                                                                placeholder="Your Answer" name="ultramega_others_group_b">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <!-- Total Group B - initially hidden -->
                                                        <div class="mb-3" id="groupBMediumTotalDiv"
                                                            style="display: none;">
                                                            <label for="groupBMediumTotalDiv" class="form-label mb-1"
                                                                style="font-weight: 500;">
                                                                Total Group B
                                                            </label>
                                                            <!-- <input type="text" class="form-control"
                                                                id="GroupBMediumTotal" readonly> -->
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end gap-2 justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-3">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupCKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control ultramega_input all"
                                                                id="GroupCKannadigas" placeholder="Your Answer" name="ultramega_kannadigas_group_c"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupCOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control ultramega_input all" id="GroupCOthers"
                                                                placeholder="Your Answer" name="ultramega_others_group_c">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end justify-content-end gap-2">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>
                                                    <div class="step step-4">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupDKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control ultramega_input all"
                                                                id="GroupDKannadigas" placeholder="Your Answer" name="ultramega_kannadigas_group_d"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupDOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control ultramega_input all" id="GroupDOthers"
                                                                placeholder="Your Answer" name="ultramega_others_group_d">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row gap-2 align-items-end justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div id="unit-supermega" class="unit-section pt-3">

                                            <div class="card-body p-0">
                                                <div>
                                                    <h3 class="text-center mb-2">Super Mega</h3>
                                                </div>
                                                <!-- File Upload -->
                                                <div class="ms-3">
                                                    <div class="col-md-12 col-12 mb-3">
                                                        <label for="formFile6" class="form-label mb-1"
                                                            style="font-weight: 500;">Unit
                                                            Approval Document <span class="text-danger">*</span></label>
                                                        <input class="form-control supermega_input all" type="file" id="formFile6" name="supermega_doc">
                                                        <div class="invalid-feedback">Please upload a document.</div>
                                                    </div>
                                                </div>

                                                <!-- Address -->
                                                <div class="ms-3">
                                                    <div class="mb-3">
                                                        <label for="address6" class="form-label mb-1"
                                                            style="font-weight:500">Address
                                                            <span class="text-danger">*</span></label>
                                                        <textarea class="form-control  supermega_input all" id="address6" rows="2" name="supermega_address"
                                                            placeholder="Enter Address" ></textarea>
                                                        <div class="invalid-feedback">Please enter an address.</div>
                                                    </div>
                                                </div>

                                                <div class="step-indicator mb-4">
                                                    <div>
                                                        <div class="step-circle active" onclick="goToSupermegaStep(1)">A
                                                        </div>
                                                        <div class="step-label">Group A</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToSupermegaStep(2)">B</div>
                                                        <div class="step-label">Group B</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToSupermegaStep(3)">C</div>
                                                        <div class="step-label">Group C</div>
                                                    </div>
                                                    <div>
                                                        <div class="step-circle" onclick="goToSupermegaStep(4)">D</div>
                                                        <div class="step-label">Group D</div>
                                                    </div>
                                                </div>

                                                <div id="multi-step-form-supermega">
                                                    <div class="step step-1 active">
                                                        <div class="mb-3">
                                                            <label for="GroupAKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control supermega_input all" name="supermega_kannadigas_group_a"
                                                                id="GroupAKannadigas" placeholder="Your Answer"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupAOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control supermega_input all" id="GroupAOthers"
                                                                placeholder="Your Answer" name="supermega_others_group_a">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>

                                                        <div class="d-flex flex-column align-items-end">
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-2">

                                                        <div class="mb-3">
                                                            <label for="GroupBKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control supermega_input all" name="supermega_kannadigas_group_b"
                                                                id="GroupBKannadigas" placeholder="Your Answer"
                                                                >
                                                            <div class="invalid-feedback">Please enter kannadigas.</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupBOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control supermega_input all" id="GroupBOthers"
                                                                placeholder="Your Answer" name="supermega_others_group_b">
                                                            <div class="invalid-feedback">Please enter others.</div>
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end gap-2 justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>

                                                    <div class="step step-3">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupCKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control supermega_input all" name="supermega_kannadigas_group_c"
                                                                id="GroupCKannadigas" placeholder="Your Answer">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupCOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control supermega_input all" id="GroupCOthers"
                                                                placeholder="Your Answer" name="supermega_others_group_c">
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row align-items-end justify-content-end gap-2">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                            <button type="button"
                                                                class="btn btn-primary next-btn">Next</button>
                                                        </div>
                                                    </div>
                                                    <div class="step step-4">
                                                        <!-- <h4>Step 3</h4> -->
                                                        <div class="mb-3">
                                                            <label for="GroupDKannadigas" class="form-label mb-1"
                                                                style="font-weight: 500;">1) Kannadigas <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control supermega_input all" name="supermega_kannadigas_group_d"
                                                                id="GroupDKannadigas" placeholder="Your Answer">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="GroupDOthers" class="form-label mb-1"
                                                                style="font-weight: 500;">2) Others <span
                                                                    Class="text-danger">*</span></label>
                                                            <input type="text" oninput="onlyNumber(this)" class="form-control supermega_input all" id="GroupDOthers"
                                                                placeholder="Your Answer" name="supermega_others_group_d">
                                                        </div>
                                                        <div
                                                            class="d-flex flex-row gap-2 align-items-end justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-secondary prev-btn">Previous</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="ms-3">
                                            <button class="btn btn-primary" id="submit_btn" type="submit">Submit</button>
                                        </div>
                                    </div>


                                </form>


                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

    <!-- Container-fluid Ends-->
    </div>


    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- latest jquery-->
    <script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('admin/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('admin/assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/select2/select2-custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/form-wizard/form-wizard-two.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>

    <!-- Form Validation Script -->
<!--    <script>-->
<!--        (() => {-->
<!--            'use strict';-->
<!--            const forms = document.querySelectorAll('.needs-validation');-->

<!--            Array.from(forms).forEach(form => {-->
<!--                const unitTypes = form.querySelectorAll('input[name="unit_types[]"]');-->
<!--                const unitTypeError = document.getElementById('unitTypeError');-->

                
<!--                unitTypes.forEach(cb => {-->
<!--                    cb.addEventListener('change', () => {-->
<!--                        const unitTypeChecked = Array.from(unitTypes).some(cb => cb.checked);-->
<!--                        if (unitTypeChecked) {-->
<!--                            unitTypeError.style.display = 'none';-->
<!--                        }-->
<!--                    });-->
<!--                });-->

             
<!--                form.addEventListener('submit', event => {-->
<!--                    const unitTypeChecked = Array.from(unitTypes).some(cb => cb.checked);-->
<!--console.log(unitTypeChecked)-->
<!--                    if (!form.checkValidity() || !unitTypeChecked) {-->
<!--                        event.preventDefault();-->
<!--                        event.stopPropagation();-->

<!--                        if (!unitTypeChecked) {-->
<!--                            unitTypeError.style.display = 'block';-->
<!--                        }-->
<!--                    } else {-->
<!--                        unitTypeError.style.display = 'none';-->
<!--                    }-->

<!--                    form.classList.add('was-validated');-->
<!--                }, false);-->
<!--            });-->
<!--        })();-->
<!--    </script>-->
<script>
  function onlyNumber(e) {
    var inputElement = e;
    var inputValue = inputElement.value;
    var sanitizedValue = inputValue.replace(/[^0-9]/g, '');
    inputElement.value = sanitizedValue;
  }
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');

        Array.from(forms).forEach(form => {
            const unitTypes = form.querySelectorAll('input[name="unit_types[]"]');
            const unitTypeError = document.getElementById('unitTypeError');

            unitTypes.forEach(cb => {
                cb.addEventListener('change', () => {
                    const unitTypeChecked = Array.from(unitTypes).some(cb => cb.checked);
                    if (unitTypeChecked) {
                        unitTypeError.style.display = 'none';
                    }
                });
            });

            form.addEventListener('submit', event => {
                const unitTypeChecked = Array.from(unitTypes).some(cb => cb.checked);

                if (!form.checkValidity() || !unitTypeChecked) {
                    event.preventDefault();
                    event.stopPropagation();

                    if (!unitTypeChecked) {
                        unitTypeError.style.display = 'block';
                    }
                } else {
                   // event.preventDefault(); // Prevent default submit to show alert
                   document.getElementById('submit_btn').disabled = true;
                    unitTypeError.style.display = 'none';
                }

                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>



    <script>
      @if(session()->has('success'))
      Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Form submitted successfully.',
          confirmButtonText: 'OK'
      });
      @endif
      {{session()->forget('success')}}
        // Small Unit Steps
        let smallCurrentStep = 1;
        function updateSmallSteps() {
            $("#unit-small .step").removeClass("active");
            $("#unit-small .step-" + smallCurrentStep).addClass("active");

            $("#unit-small .step-circle").removeClass("active done").each(function (index) {
                if (index + 1 < smallCurrentStep) {
                    $(this).addClass("done");
                } else if (index + 1 === smallCurrentStep) {
                    $(this).addClass("active");
                }
            });
        }
        function goToSmallStep(step) {
            smallCurrentStep = step;
            updateSmallSteps();
        }

        // Medium Unit Steps
        let mediumCurrentStep = 1;
        function updateMediumSteps() {
            $("#unit-medium .step").removeClass("active");
            $("#unit-medium .step-" + mediumCurrentStep).addClass("active");

            $("#unit-medium .step-circle").removeClass("active done").each(function (index) {
                if (index + 1 < mediumCurrentStep) {
                    $(this).addClass("done");
                } else if (index + 1 === mediumCurrentStep) {
                    $(this).addClass("active");
                }
            });
        }
        function goToMediumStep(step) {
            mediumCurrentStep = step;
            updateMediumSteps();
        }

        // Large Unit Steps
        let largeCurrentStep = 1;
        function updateLargeSteps() {
            $("#unit-large .step").removeClass("active");
            $("#unit-large .step-" + largeCurrentStep).addClass("active");

            $("#unit-large .step-circle").removeClass("active done").each(function (index) {
                if (index + 1 < largeCurrentStep) {
                    $(this).addClass("done");
                } else if (index + 1 === largeCurrentStep) {
                    $(this).addClass("active");
                }
            });
        }
        function goToLargeStep(step) {
            largeCurrentStep = step;
            updateLargeSteps();
        }

        // Mega Unit Steps
        let megaCurrentStep = 1;
        function updateMegaSteps() {
            $("#unit-mega .step").removeClass("active");
            $("#unit-mega .step-" + megaCurrentStep).addClass("active");

            $("#unit-mega .step-circle").removeClass("active done").each(function (index) {
                if (index + 1 < megaCurrentStep) {
                    $(this).addClass("done");
                } else if (index + 1 === megaCurrentStep) {
                    $(this).addClass("active");
                }
            });
        }
        function goToMegaStep(step) {
            megaCurrentStep = step;
            updateMegaSteps();
        }

        // Ultramega Unit Steps
        let ultramegaCurrentStep = 1;
        function updateUltramegaSteps() {
            $("#unit-ultramega .step").removeClass("active");
            $("#unit-ultramega .step-" + ultramegaCurrentStep).addClass("active");

            $("#unit-ultramega .step-circle").removeClass("active done").each(function (index) {
                if (index + 1 < ultramegaCurrentStep) {
                    $(this).addClass("done");
                } else if (index + 1 === ultramegaCurrentStep) {
                    $(this).addClass("active");
                }
            });
        }
        function goToUltramegaStep(step) {
            ultramegaCurrentStep = step;
            updateUltramegaSteps();
        }

        // Supermega Unit Steps
        let supermegaCurrentStep = 1;
        function updateSupermegaSteps() {
            $("#unit-supermega .step").removeClass("active");
            $("#unit-supermega .step-" + supermegaCurrentStep).addClass("active");

            $("#unit-supermega .step-circle").removeClass("active done").each(function (index) {
                if (index + 1 < supermegaCurrentStep) {
                    $(this).addClass("done");
                } else if (index + 1 === supermegaCurrentStep) {
                    $(this).addClass("active");
                }
            });
        }
        function goToSupermegaStep(step) {
            supermegaCurrentStep = step;
            updateSupermegaSteps();
        }

        $(document).ready(function () {
          // Small unit buttons
            $("#unit-small .next-btn").click(function () {
                if (smallCurrentStep < 4) {
                    smallCurrentStep++;
                    updateSmallSteps();
                }
            });
            $("#unit-small .prev-btn").click(function () {
                if (smallCurrentStep > 1) {
                    smallCurrentStep--;
                    updateSmallSteps();
                }
            });
            $("#multi-step-form-small").submit(function (e) {
                e.preventDefault();
                alert("Small Unit Form Submitted!");
            });

          // Medium unit buttons
            $("#unit-medium .next-btn").click(function () {
                if (mediumCurrentStep < 4) {
                    mediumCurrentStep++;
                    updateMediumSteps();
                }
            });
            $("#unit-medium .prev-btn").click(function () {
                if (mediumCurrentStep > 1) {
                    mediumCurrentStep--;
                    updateMediumSteps();
                }
            });
            $("#multi-step-form-medium").submit(function (e) {
                e.preventDefault();
                alert("Medium Unit Form Submitted!");
            });
          // large unit buttons
            $("#unit-large .next-btn").click(function () {
                if (largeCurrentStep < 4) {
                    largeCurrentStep++;
                    updateLargeSteps();
                }
            });
            $("#unit-large .prev-btn").click(function () {
                if (largeCurrentStep > 1) {
                    largeCurrentStep--;
                    updateLargeSteps();
                }
            });
            $("#multi-step-form-large").submit(function (e) {
                e.preventDefault();
                alert("Large Unit Form Submitted!");
            });

          // mega unit buttons
            $("#unit-mega .next-btn").click(function () {
                if (megaCurrentStep < 4) {
                    megaCurrentStep++;
                    updateMegaSteps();
                }
            });
            $("#unit-mega .prev-btn").click(function () {
                if (megaCurrentStep > 1) {
                    megaCurrentStep--;
                    updateMegaSteps();
                }
            });
            $("#multi-step-form-mega").submit(function (e) {
                e.preventDefault();
                alert("Mega Unit Form Submitted!");
            });
          // ultramega unit buttons
            $("#unit-ultramega .next-btn").click(function () {
                if (ultramegaCurrentStep < 4) {
                    ultramegaCurrentStep++;
                    updateUltramegaSteps();
                }
            });
            $("#unit-ultramega .prev-btn").click(function () {
                if (ultramegaCurrentStep > 1) {
                    ultramegaCurrentStep--;
                    updateUltramegaSteps();
                }
            });
            $("#multi-step-form-ultramega").submit(function (e) {
                e.preventDefault();
                alert("Ultramega Unit Form Submitted!");
            });
          // supermega unit buttons
            $("#unit-supermega .next-btn").click(function () {
                if (supermegaCurrentStep < 4) {
                    supermegaCurrentStep++;
                    updateSupermegaSteps();
                }
            });
            $("#unit-supermega .prev-btn").click(function () {
                if (supermegaCurrentStep > 1) {
                    supermegaCurrentStep--;
                    updateSupermegaSteps();
                }
            });
            $("#multi-step-form-supermega").submit(function (e) {
                e.preventDefault();
                alert("Supermega Unit Form Submitted!");
            });
          
        });
    </script>
    <!-- JavaScript -->
    <script>
        document.querySelectorAll('.unit-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const selectedValues = Array.from(document.querySelectorAll('input[name="unit_types[]"]:checked'))
                                      .map(checkbox => checkbox.value);
                const targetId = this.getAttribute('data-target');
                const targetDiv = document.getElementById(targetId);
                document.querySelectorAll('.all').forEach(function(el) {
                  el.removeAttribute('required');
                });
                selectedValues.forEach(checkbox => {
                  document.querySelectorAll('.'+checkbox+'_input').forEach(function(el) {
                    el.setAttribute('required', 'required');
                  });
                });
                if (this.checked) {
                    targetDiv.style.display = 'block';
                } else {
                    targetDiv.style.display = 'none';
                }
            });
        });
    </script>


    <!-- <script>
        // Group A Elements
        const groupAKannadigas = document.getElementById("GroupAKannadigas");
        const groupAOthers = document.getElementById("GroupAOthers");
        const groupATotalInput = document.getElementById("GroupATotal");
        const groupATotalDiv = document.getElementById("groupATotalDiv");

        // Group B Elements
        const groupBKannadigas = document.getElementById("GroupBKannadigas");
        const groupBOthers = document.getElementById("GroupBOthers");
        const groupBTotalInput = document.getElementById("GroupBTotal");
        const groupBTotalDiv = document.getElementById("groupBTotalDiv");

        // Group C Elements
        const groupCKannadigas = document.getElementById("GroupCKannadigas");
        const groupCOthers = document.getElementById("GroupCOthers");
        const groupCTotalInput = document.getElementById("GroupCTotal");
        const groupCTotalDiv = document.getElementById("groupCTotalDiv");

        // Group D Elements
        const groupDKannadigas = document.getElementById("GroupDKannadigas");
        const groupDOthers = document.getElementById("GroupDOthers");
        const groupDTotalInput = document.getElementById("GroupDTotal");
        const groupDTotalDiv = document.getElementById("groupDTotalDiv");

        // Medium Group A Elements
        const groupAMediumKannadigas = document.getElementById("GroupAMediumKannadigas");
        const groupAMediumOthers = document.getElementById("GroupAMediumOthers");
        const groupAMediumTotalInput = document.getElementById("GroupAMediumTotal");
        const groupAMediumTotalDiv = document.getElementById("groupAMediumTotalDiv");

        // Medium Group B Elements
        const groupBMediumKannadigas = document.getElementById("GroupBMediumKannadigas");
        const groupBMediumOthers = document.getElementById("GroupBMediumOthers");
        const groupBMediumTotalInput = document.getElementById("GroupBMediumTotal");
        const groupBMediumTotalDiv = document.getElementById("groupBMediumTotalDiv");

        // Overall Total Input
        const overallTotalInput = document.getElementById("smallOverallTotalCount");
        const overallTotalDiv = document.getElementById("overallTotalDiv");

        // Function to calculate total for a group
        function calculateGroupTotal(kInput, oInput, totalInput, totalDiv, groupKey = '') {
            const kValue = parseInt(kInput.value) || 0;
            const oValue = parseInt(oInput.value) || 0;
            const total = kValue + oValue;

            if (!isNaN(total) && total > 0) {
                totalInput.value = total;
                totalDiv.style.display = "block";

                // Show overall total only when Group A is filled
                if (groupKey === 'A') {
                    overallTotalDiv.style.display = "block";
                }
            } else {
                totalInput.value = "";
                totalDiv.style.display = "none";
            }

            updateOverallTotal();
        }

        // Function to update Small Overall Total Count
        function updateOverallTotal() {
            const totals = [
                parseInt(groupATotalInput.value) || 0,
                parseInt(groupBTotalInput.value) || 0,
                parseInt(groupCTotalInput.value) || 0,
                parseInt(groupDTotalInput.value) || 0,
                parseInt(groupAMediumTotalInput.value) || 0,
                parseInt(groupBMediumTotalInput.value) || 0
            ];

            const overall = totals.reduce((sum, val) => sum + val, 0);
            overallTotalInput.value = overall;
        }

        // Group A listeners
        groupAKannadigas.addEventListener("input", () => {
            calculateGroupTotal(groupAKannadigas, groupAOthers, groupATotalInput, groupATotalDiv, 'A');
        });
        groupAOthers.addEventListener("input", () => {
            calculateGroupTotal(groupAKannadigas, groupAOthers, groupATotalInput, groupATotalDiv, 'A');
        });

        // Group B listeners
        groupBKannadigas.addEventListener("input", () => {
            calculateGroupTotal(groupBKannadigas, groupBOthers, groupBTotalInput, groupBTotalDiv);
        });
        groupBOthers.addEventListener("input", () => {
            calculateGroupTotal(groupBKannadigas, groupBOthers, groupBTotalInput, groupBTotalDiv);
        });

        // Group C listeners
        groupCKannadigas.addEventListener("input", () => {
            calculateGroupTotal(groupCKannadigas, groupCOthers, groupCTotalInput, groupCTotalDiv);
        });
        groupCOthers.addEventListener("input", () => {
            calculateGroupTotal(groupCKannadigas, groupCOthers, groupCTotalInput, groupCTotalDiv);
        });

        // Group D listeners
        groupDKannadigas.addEventListener("input", () => {
            calculateGroupTotal(groupDKannadigas, groupDOthers, groupDTotalInput, groupDTotalDiv);
        });
        groupDOthers.addEventListener("input", () => {
            calculateGroupTotal(groupDKannadigas, groupDOthers, groupDTotalInput, groupDTotalDiv);
        });

        // Medium Group A listeners
        groupAMediumKannadigas.addEventListener("input", () => {
            calculateGroupTotal(groupAMediumKannadigas, groupAMediumOthers, groupAMediumTotalInput, groupAMediumTotalDiv);
        });
        groupAMediumOthers.addEventListener("input", () => {
            calculateGroupTotal(groupAMediumKannadigas, groupAMediumOthers, groupAMediumTotalInput, groupAMediumTotalDiv);
        });

        // Medium Group B listeners
        groupBMediumKannadigas.addEventListener("input", () => {
            calculateGroupTotal(groupBMediumKannadigas, groupBMediumOthers, groupBMediumTotalInput, groupBMediumTotalDiv);
        });
        groupBMediumOthers.addEventListener("input", () => {
            calculateGroupTotal(groupBMediumKannadigas, groupBMediumOthers, groupBMediumTotalInput, groupBMediumTotalDiv);
        });
    </script> -->



</body>

</html>