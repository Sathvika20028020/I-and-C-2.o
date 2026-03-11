<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MSME Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/range-slider.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anek+Latin:wght@100..800&display=swap" rel="stylesheet">


    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Anek Latin', sans-serif;
        }

        .pointer {
            cursor: pointer;
        }

        .accordion-toggle i {
            transition: transform 0.2s;
        }

        .dashboard-header {
            background: linear-gradient(to right, #007bff, #0d6efd);
            color: white;
            padding: 20px;
            border-radius: 0 0 10px 10px;
        }

        .dashboard-header h4 {
            margin: 0;
            font-weight: bold;
        }

        .small-note {
            font-size: 12px;
        }

        .filter-label {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .kpi-card {
            border-radius: 10px;
            color: white;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        .kpi-red {
            background: linear-gradient(to bottom right, #f44336, #ef8382);
        }

        .kpi-blue {
            background: linear-gradient(to bottom right, #2196f3, #7fbaf5);
        }

        .kpi-green {
            background: linear-gradient(to bottom right, #4caf50, #8af390);
        }

        .kpi-pink {
            background: linear-gradient(to bottom right, #e91e63, #f58fb8);
        }

        .kpi-value {
            font-size: 24px;
        }

        .circular-percent {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: conic-gradient(#0d6efd 0% 9%, #e0e0e0 9% 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #000;
        }

        #districtChart {
            max-width: 100%;
        }

        /* multi select css */
        .select2-results__option {
            padding-left: 25px;
            position: relative;
        }

        .select2-results__option::before {
            content: '';
            position: absolute;
            left: 4px;
            top: 6px;
            width: 12px;
            height: 12px;
            border: 1px solid #999;
            background-color: #fff;
        }

        .select2-results__option[aria-selected="true"]::before {
            background-color: #2196F3;
            border-color: #2196F3;
        }

        /* msme chat line 451 */

        .herochart-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        canvas {
            width: 100% !important;
            max-height: 300px;
        }

        h3 {
            margin-bottom: 10px;

            /* tree css */
        }

        .chart-title {
            background: #3e6a91;
            color: white;
            font-size: 20px;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }

        #chart_div {
            overflow-x: scroll;
            border-radius: 10px;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .google-visualization-orgchart-node-medium {
            font-size: 0.8em;
            color: cadetblue;
        }

        .br-radius {
            border: 1px solid #000000b0;
            border-radius: 15px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <!-- HEADER -->
        <div class="dashboard-header d-flex justify-content-between align-items-center">
            <div>
                <h4>MSME Analytical Dashboard</h4>
                <div class="small-note">Department of Industries and Commerce, Government of Karnataka</div>
            </div>
            <div class="text-end">
                <div>Refreshed Date : <strong>21-05-2025 12:52:47</strong></div>
                <small>* Data reflects records as per the Udyam Registration date</small>
            </div>
        </div>

        <div class="row mt-3">
            <div class="chart-title">Overall Industry wise Categorization
                <div id="chart_div"></div>
            </div>
        </div>


        <div class="container-fuild mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white text-center fw-bold">
                            Overall Total No. of Enterprise Type - Sector wise
                        </div>
                        <div class="card-body p-2">
                            <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                                <table class="table table-bordered table-sm align-middle text-center">
                                    <thead class="table-primary align-middle">
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle;">Sector</th>
                                            <th>2022-23</th>
                                            <th>2023-24</th>
                                            <th>2024-25</th>
                                        </tr>
                                    </thead>
                                    <tbody id="accordionTable">
                                        @foreach($sectors as $key => $sector)
                                        <tr class="accordion-toggle pointer" data-bs-toggle="collapse"
                                            data-bs-target="#sector{{$key}}-details" aria-expanded="false"
                                            aria-controls="sector{{$key}}-details">
                                            <td class="text-start" style="width: 49%;">
                                                <i class="bi bi-plus-circle me-2"></i>
                                                {{$sector->name}}
                                            </td>
                                            <td>{{$sector->count_2223}}</td>
                                            <td>{{$sector->count_2324}}</td>
                                            <td>{{$sector->count_2425}}</td>
                                        </tr>
                                        <tr class="collapse bg-light" id="sector{{$key}}-details"
                                            data-bs-parent="#accordionTable">
                                            <td colspan="5" class="text-start">
                                                <table class="table table-bordered table-sm">
                                                    <tbody>
                                                        @foreach($sector->subsectors as $subsector)
                                                        <tr>
                                                          <td class="text-start">{{$subsector->name}}</td>
                                                          <td>{{$subsector->count_2223}}</td>
                                                          <td>{{$subsector->count_2324}}</td>
                                                          <td>{{$subsector->count_2425}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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


    </div>






    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- feather icon js-->
    <script src="../assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="../assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- scrollbar js-->
    <script src="../assets/js/scrollbar/simplebar.js"></script>
    <script src="../assets/js/scrollbar/custom.js"></script>
    <!-- Sidebar jquery-->
    <script src="../assets/js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <!-- Plugins JS start-->
    <script src="../assets/js/sidebar-menu.js"></script>
    <script src="../assets/js/range-slider/ion.rangeSlider.min.js"></script>
    <script src="../assets/js/range-slider/rangeslider-script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="../assets/js/script.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <!-- Tree charts script -->
    <script type="text/javascript">
        google.charts.load('current', { packages: ['orgchart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Name');
            data.addColumn('string', 'Manager');
            data.addColumn('string', 'ToolTip');

            data.addRows([
                [{ v: 'Total', f: '<b>Total MSMEs</b><div style="color:gray">{{number_format($entries)}}</div>' }, '', 'Total MSMEs'],
                @foreach($sectors as $sector)
                @if($sector->total > 0)
                [{ v: '{{$sector->name}}', f: '{{$sector->name}}<div style="color:gray">{{number_format($sector->total)}}</div>' }, 'Total', ''],
                @foreach($sector->subsectors as $subsector)
                @if($subsector->total > 0)
                [{ v: '{{$subsector->name}}', f: '{{$subsector->name}}<div style="color:gray">{{number_format($subsector->total)}}</div>' }, '{{$sector->name}}', ''],
                @endif
                @endforeach
                @endif
                @endforeach
            ]);

            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            chart.draw(data, { allowHtml: true });
        }
    </script>


    <script>
        // Icon toggle script
        const toggles = document.querySelectorAll('.accordion-toggle');

        toggles.forEach(row => {
            const icon = row.querySelector('i');
            const collapseId = row.getAttribute('data-bs-target');
            const collapseEl = document.querySelector(collapseId);

            collapseEl.addEventListener('show.bs.collapse', () => {
                icon.classList.remove('bi-plus-circle');
                icon.classList.add('bi-dash-circle');
            });

            collapseEl.addEventListener('hide.bs.collapse', () => {
                icon.classList.remove('bi-dash-circle');
                icon.classList.add('bi-plus-circle');
            });
        });
    </script>

</body>

</html>