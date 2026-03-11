@extends('reports.layouts.app')
@section('title') Dashboard @endsection
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
.table-wrapper {
    position: relative;
    /* border-radius: 0.5rem; */
    overflow: hidden;

    &::after {
        --shadow-size: 20px;
        content: "";
        position: absolute;
        inset: 0;
        box-shadow: inset 0 calc(var(--shadow-size) * -1) var(--shadow-size) calc(var(--shadow-size) * -1) rgb(0 0 0 / 0.35);
        pointer-events: none;
    }
}

.table-container {
    max-height: 24rem;
    overflow: auto;
    height: 100%;
}

table {
    width: 100%;
    border-collapse: separate;
    /* make border sticky */
}

th,
td {
    border: none;
    padding: 1rem 2rem;
    text-align: left;

    &:last-of-type {
        text-align: center;
    }
}

th {
    background-color: #d0f0ee;
    color: #15928a;
    font-weight: bold;
    position: sticky;
    top: 0;
    border-bottom: 2px solid #15928a;
}

tbody {
    tr:nth-of-type(even) {
        background-color: hsl(0 0 95);
    }
}

.kannada-table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Noto Sans Kannada', sans-serif;
}

.kannada-table th,
.kannada-table td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
}

.kannada-table th {
    background-color: #f2f2f2;
}

.btn-dark{
      background-color: #767f93de !important;
}
</style>
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
                    <li class="breadcrumb-item active">View </li>
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
                <div class="card-header pt-3 pb-3" style="border-bottom: 1px solid #00000096;">
                    <div class="d-flex flex-row m-0 gap-2 justify-content-center  align-items-center">
                        <div class=" d-flex flex-column gap-1 align-items-end">
                            <img src="{{asset('admin/assets/images/logo/karnataka.png')}}" width="25%">
                        </div>

                        <div class="">

                            <h6 class="text-dark fw-bold text-center mb-0">Integrated Data Management Software
                            </h6>
                        </div>
                        <div class="d-flex  flex-column gap-1 ">
                            <img src="{{asset('admin/assets/images/logo/resizeIClogo.jpg')}}" width="24%">
                        </div>

                    </div>
                </div>
                <div class="card-body d-flex flex-column gap-3">
                    <!-- PDF Viewer Style Toolbar -->
                    <div class="d-flex align-items-center justify-content-between px-3 py-2"
                        style="background:#2f2f2f; color:white; border-radius:5px;">
                        <!-- Left Section -->
                        <div class="d-flex align-items-center gap-2">
                            

                            
                                <h5 class="text-white mb-0">ಕರ್ನಾಟಕ ವಿಧಾನ ಸಭೆ</h5>
                           
                           
                        </div>

                        <!-- Right Section -->
                        <div class="d-flex align-items-center gap-2">
                            <a href="path/to/yourfile.pdf" download class="btn btn-sm btn-dark border-0 text-white">
                                <i class="bi bi-download"></i>
                            </a>
                            <button class="btn btn-sm btn-dark border-0 text-white">
                                <i class="bi bi-printer"></i>
                            </button>
                            <button class="btn btn-sm btn-dark border-0 text-white">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex flex-column gap-1">
                        <div class="d-flex row m-0 ">
                            <div class="col-4">
                                <span style="font-size: 16px;font-weight: 600;">ಚುಕ್ಕೆ ಗುರುತಿಲ್ಲದ ಪ್ರಶ್ನೆಸಂಖ್ಯೆ :</span>
                            </div>
                            <div class="col-8">
                                <span style="font-size:16px">560</span>
                            </div>
                        </div>
                        <div class="d-flex row m-0">
                            <div class="col-4">
                                <span style="font-size: 16px;font-weight: 600;">ವಿಧಾನ ಸಭೆ ಸದಸ್ಯರ ಹೆಸರು :</span>
                            </div>
                            <div class="col-8">
                                <span style="font-size:16px">ಶ್ರೀ. ಅಪ್ಪಾಜಿ ಸಿ.ಎಸ್.‌ ನಾಡಗೌಡ (ಮುದ್ದೇಬಿಹಾಳ )</span>
                            </div>
                        </div>
                        <div class="d-flex row m-0">
                            <div class="col-4">
                                <span style="font-size: 16px;font-weight: 600;">ಉತ್ತರಿಸುವ ಸಚಿವರು :</span>
                            </div>
                            <div class="col-8">
                                <span style="font-size:16px">ಮಾನ್ಯ ಬೃಹತ್‌ ಮತ್ತು ಮಧ್ಯಮ ಕೈಗಾರಿಕೆ ಹಾಗೂ ಮೂಲ ಸೌಲಭ್ಯ ಅಭಿವೃದ್ದಿ
                                    ಸಚಿವರು</span>
                            </div>
                        </div>
                        <div class="d-flex row m-0">
                            <div class="col-4">
                                <span style="font-size: 16px;font-weight: 600;">ಉತ್ತರಿಸುವ ದಿನಾಂಕ :</span>
                            </div>
                            <div class="col-8">
                                <span style="font-size:16px">14.03.2025</span>
                            </div>
                        </div>
                        <div class="d-flex row m-0">
                            <div class="col-4">
                                <span style="font-size: 16px;font-weight: 600;">ವಿಷಯ :</span>
                            </div>
                            <div class="col-8">
                                <span style="font-size:16px">“ ಹೊಸ ಕೈಗಾರಿಕೆ ಸ್ಥಾಪನೆ”</span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="table-wrapper">
                            <div class="table-container">
                                <table class="kannada-table" border="1" cellpadding="5" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ಕ್ರ.ಸಂ</th>
                                            <th>ವಿಷಯ</th>
                                            <th>ಉತ್ತರ ವಿವರ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td rowspan="2">ಅ)</td>
                                            <td rowspan="2">ರಾಜ್ಯದಲ್ಲಿ ಕಳೆದ ಮೂರು ವರ್ಷಗಳಿಂದ ಹೊಸದಾಗಿ ಎಷ್ಟು ಕೈಗಾರಿಕಾ
                                                ಕಾರ್ಖಾನೆಗಳನ್ನು ಪ್ರಾರಂಭಿಸಲಾಗಿದೆ? (ಜಿಲ್ಲಾವಾರು ವಿವರವನ್ನು ನೀಡುವುದು).</td>
                                            <td>ರಾಜ್ಯದಲ್ಲಿ ಕಳೆದ ಮೂರು ವರ್ಷಗಳಿಂದ ಇಲ್ಲಿಯವರೆಗೂ ರಾಜ್ಯ ಉನ್ನತ ಮಟ್ಟದ ಒಪ್ಪಿಗೆ
                                                ನೀಡಿಕೆ ಸಮಿತಿ ಹಾಗೂ ರಾಜ್ಯ ಮಟ್ಟದ ಏಕಗವಾಕ್ಷಿ ಅನುಮೋದನಾ ಸಮಿತಿ ಸಭೆಗಳಲ್ಲಿ ಒಟ್ಟು
                                                1511 ಬಂಡವಾಳ ಹೂಡಿಕೆ ಯೋಜನೆಗಳಿಗೆ ಅನುಮೋದನೆ ನೀಡಲಾಗಿರುತ್ತದೆ. ಈ ಪ್ರಸ್ತಾವನೆಗಳಿಂದ
                                                ಒಟ್ಟು ರೂ.437903.89 ಕೋಟಿ ಬಂಡವಾಳ ಹೂಡಿಕೆ ಮತ್ತು 159700 ಜನರಿಗೆ ಉದ್ಯೋಗ ಸೃಜನೆ
                                                ನಿರೀಕ್ಷಿಸಲಾಗಿದೆ.</td>
                                        </tr>
                                        <tr>
                                            <td style="background:white !important">ಮುಂದುವರೆದಂತೆ, 1511 ಯೋಜನೆಗಳ ಪೈಕಿ 61
                                                ಯೋಜನೆಗಳು ಅನುಷ್ಟಾನಗೊಂಡಿದ್ದು, ಈ ಪ್ರಸ್ತಾವನೆಗಳಿಂದ ಒಟ್ಟು ರೂ.61505.07 ಕೋಟಿ
                                                ಬಂಡವಾಳ ಹೂಡಿಕೆಯಾಗಿದ್ದು, 90811 ಜನರಿಗೆ ಉದ್ಯೋಗ ಸೃಜನೆ ನಿರೀಕ್ಷಿಸಲಾಗಿದೆ.
                                                ವಿವರಗಳನ್ನು ಅನುಬಂಧ-1 ರಲ್ಲಿ ಲಗತ್ತಿಸಿದೆ.</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">ಆ)</td>
                                            <td rowspan="2">ವಿಜಯಪುರ ಜಿಲ್ಲೆಯಲ್ಲಿ ಎಷ್ಟು ಎಕರೆ ಭೂಮಿ ಪ್ರದೇಶದಲ್ಲಿ
                                                ಕಾರ್ಖಾನೆಗಳನ್ನು ಪ್ರಾರಂಭಿಸಲು ಜಾಗ ಮಂಜೂರಾಗಿದೆ;ಮಂಜೂರಾಗಿರುವ ಕಾರ್ಖಾನೆಗಳಾವುವು
                                                ;(ಮಾಹಿತಿ ನೀಡುವುದು)</td>
                                            <td>ವಿಜಯಪುರ ಜಿಲ್ಲೆಯಲ್ಲಿ ಕಳೆದ ಮೂರು ವರ್ಷಗಳಿಂದ ಇಲ್ಲಿಯವರೆಗೂ ರಾಜ್ಯ ಉನ್ನತ ಮಟ್ಟದ
                                                ಒಪ್ಪಿಗೆ ನೀಡಿಕೆ ಸಮಿತಿ ಹಾಗೂ ರಾಜ್ಯ ಮಟ್ಟದ ಏಕಗವಾಕ್ಷಿ ಅನುಮೋದನಾ ಸಮಿತಿ ಸಭೆಗಳಲ್ಲಿ
                                                ಒಟ್ಟು 38 ಬಂಡವಾಳ ಹೂಡಿಕೆ ಯೋಜನೆಗಳಿಗೆ ಅನುಮೋದನೆ ನೀಡಲಾಗಿರುತ್ತದೆ.</td>
                                        </tr>
                                        <tr>
                                            <td style="background:white !important">ಈ ಪ್ರಸ್ತಾವನೆಗಳಿಂದ ಒಟ್ಟು ರೂ.5060.37
                                                ಕೋಟಿ ಬಂಡವಾಳ ಹೂಡಿಕೆ ಮತ್ತು 7994 ಜನರಿಗೆ ಉದ್ಯೋಗ ಸೃಜನೆ ನಿರೀಕ್ಷಿಸಲಾಗಿದೆ.
                                                ವಿವರಗಳನ್ನು ಅನುಬಂಧ-2 ರಲ್ಲಿ ಲಗತ್ತಿಸಿದೆ.
                                                ಹೆಚ್ಚಿನ ಮಾಹಿತಿಯನ್ನು ಕೆ.ಐ.ಎ.ಡಿ.ಬಿ ಇಲಾಖೆಯಿಂದ ಪಡೆಯಬಹುದು.</td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>





@endsection
@section('script')
@endsection