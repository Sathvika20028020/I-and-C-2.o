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

    .pointer {
      cursor: pointer;
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

    <!-- FILTER + KPI ROW -->
    <div class="row mt-4">
      <!-- LEFT FILTERS STACKED -->
      <div class="col-md-2">
        <div class="card mb-3 br-radius text-decoration-none pointer" data-bs-toggle="modal"
          data-bs-target="#exampleModal">
          <div class="card-body p-1">
            <span class="ms-2 d-flex flex-row gap-2"><span>Import</span> <span><i
                  class="bi bi-file-earmark-spreadsheet-fill"></i></span></span>
          </div>
        </div>
        <a href="{{route('msmeDashboard', 'time')}}" class="card mb-3 br-radius text-decoration-none pointer">
          <div class="card-body p-1">
            <span class="ms-2">Time</span>
          </div>
        </a>
        <a href="{{route('msmeDashboard', 'sector')}}" class="card mb-3 br-radius text-decoration-none pointer">
          <div class="card-body p-1">
            <span class="ms-2">Sector</span>
          </div>
        </a>
        <a href="{{route('msmeDashboard', 'district')}}" class="card mb-3 br-radius text-decoration-none pointer">
          <div class="card-body p-1">
            <span class="ms-2">District</span>
          </div>
        </a>

      </div>

      <!-- RIGHT FILTERS + KPIS -->
      <div class="col-md-10">
        <!-- Top Dropdown Row -->
        <div class="d-flex flex-row mb-3 gap-2">
          <div class="col-md-3 card p-2 " style="width: 270px;">
            <label class="filter-label">District</label>
            <select class="form-select" style="height: 40px; border-radius: 15px;" id="district" onchange="filter()">
              <option value="">All</option>
              @foreach($districts as $entry)
              <option value="{{$entry}}">{{$entry}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3 card p-2 " style="width: 270px;">
            <label class="filter-label">Major Activity</label>
            <select class="form-select" style="height: 40px; border-radius: 15px;" id="activity" onchange="filter()">
              <option value="">All</option>
              @foreach($major_activities as $entry)
              <option value="{{$entry}}">{{$entry}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3 card p-2 " style="width: 270px;">
            <label class="filter-label">Gender</label>
            <select class="form-select" style="height: 40px; border-radius: 15px;" id="gender" onchange="filter()">
              <option value="">All</option>
              @foreach($genders as $entry)
              <option value="{{$entry}}">{{$entry}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3 card p-2 " style="width: 270px;">
            <label class="filter-label">Social Category</label>
            <select class="form-select" style="height: 40px; border-radius: 15px;" id="category" onchange="filter()">
              <option value="">All</option>
              @foreach($social_categories as $entry)
              <option value="{{$entry}}">{{$entry}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- KPI CARDS -->
        <div class="row">
          <div class="col-md-3">
            <div class="kpi-card kpi-red">
              <div>Total No. of MSME's<br>Registered</div>
              <div class="kpi-value total_registered">{{ number_format($data['total_registered']) }}</div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="kpi-card kpi-blue">
              <div>Total No. of<br>Employees</div>
              <div class="kpi-value" id="total_employees">{{ number_format($data['total_employees']) }}</div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="kpi-card kpi-green">
              <div>Total No. of Female<br>Entrepreneurs</div>
              <div class="kpi-value total_female">{{ number_format($data['total_female']) }}</div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="kpi-card kpi-pink">
              <div>Total No. of Specially Abled<br>Entrepreneurs</div>
              <div class="kpi-value" >-</div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- range section -->
    <div class="row g-3 mb-3">

      <!-- Gender Classification -->

      <div class="col-md-4">
        <div class="card shadow-sm" style="height: 350px;">
          <div class="card-body">
            <h6 class="text-center fw-bold d-flex flex-row gap-2 justify-content-center"><span>Owner wise Gender
                Classifications</span> <span class="fs-5"><i class="bi bi-cloud-arrow-down-fill"></i></span></h6>
            <h5 class="text-center text-primary total_registered">{{ number_format($data['total_registered']) }}</h5>

            <!-- Male -->
            <div class="mb-2 mt-4">
              <div class="d-flex justify-content-between">
                <span>Male</span>
                <span id="total_male">{{ number_format($data['total_male']) }}</span>
              </div>
              <div class="progress" style="height: 18px;">
                <div class="progress-bar bg-warning" id="total_male_per" role="progressbar" 
                style="width: {{$data['total_registered'] > 0 ? round(( $data['total_male']/ $data['total_registered']) * 100) : 0}}%;">
                {{$data['total_registered'] > 0 ? round(( $data['total_male']/ $data['total_registered']) * 100) : 0}}%
                </div>
              </div>
            </div>

            <!-- Female -->
            <div class="mt-3">
              <div class="d-flex justify-content-between">
                <span>Female</span>
                <span class="total_female">{{ number_format($data['total_female']) }}</span>
              </div>
              <div class="progress" style="height: 18px;">
                <div class="progress-bar bg-danger" id="total_female_per" role="progressbar" 
                style="width: {{$data['total_registered'] > 0 ? round(( $data['total_female']/ $data['total_registered']) * 100) : 0}}%;">
                {{$data['total_registered'] > 0 ? round(( $data['total_female']/ $data['total_registered']) * 100) : 0}}%</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Organization-Based Commencement Analysis -->
      <div class="col-md-4">
        <div class="card shadow-sm" style="height: 350px;">
          <div class="card-body text-center">
            <h6 class="text-center fw-bold d-flex flex-row gap-2 justify-content-center"><span>Organization-Based
                Commencement Analysis</span> <span class="fs-5"><i class="bi bi-cloud-arrow-down-fill"></i></span></h6>

            <div style="width: 180px; height: 180px; margin: 0 auto;">
              <canvas id="donutChart"></canvas>
            </div>
            <div class="mt-3 d-flex justify-content-center gap-4">
              <div><span class="badge bg-primary">Not Commenced</span></div>
              <div><span class="badge bg-success">Commenced</span></div>
            </div>
          </div>
        </div>
      </div>


      <!-- Social Category Wise Analysis -->
      <div class="col-md-4">
        <div class="card shadow-sm" style="height: 350px;">
          <div class="card-body">
            <h6 class="text-center fw-bold d-flex flex-row gap-2 justify-content-center"><span>Social Category Wise
                Analysis</span> <span class="fs-5"><i class="bi bi-cloud-arrow-down-fill"></i></span></h6>
            @foreach($data['social'] as $key => $category)
            <div class="d-flex justify-content-between align-items-center border p-2 rounded mb-3">
              <div>
                <strong>{{$category['name']}}</strong><br>
                <small>Total MSME’s</small><br>
                <span class="fw-bold">{{$category['count']}}</span>
              </div>
              <div>
                <div class="circular-percent">
                  <span>{{$category['percent']}}%</span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>

    </div>

    <div class="row g-3 mb-3">
      <!-- District-wise Total MSMEs -->
      <div class="col-md-8">
        <div class="card shadow-sm" style="height: 370px;">
          <div class="card-body">

             <h6 class="text-center fw-bold d-flex mb-4 flex-row gap-2 justify-content-center"><span>District wise Total MSME’s</span> <span class="fs-5"><i class="bi bi-cloud-arrow-down-fill"></i></span></h6>
            <div style="height: 280px; overflow-x: auto;">
              <canvas id="districtChart"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Employment -->
      <div class="col-md-4">
        <div class="card shadow-sm" style="height: 370px;">
          <div class="card-body">
             <h6 class="text-center fw-bold d-flex flex-row gap-2 justify-content-center"><span>Total Employment</span> <span class="fs-5"><i class="bi bi-cloud-arrow-down-fill"></i></span></h6>
            
            <div class="mt-4">
              <div class="d-flex justify-content-between">
                <span>Male</span>
                <span>10,481,292</span>
              </div>
              <div class="progress mb-3" style="height: 18px;">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;">50%</div>
              </div>

              <div class="d-flex justify-content-between">
                <span>Female</span>
                <span>6,065,095</span>
              </div>
              <div class="progress mb-3" style="height: 18px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 33%;">33%</div>
              </div>

              <div class="d-flex justify-content-between">
                <span>Other</span>
                <span>3,327,423</span>
              </div>
              <div class="progress" style="height: 18px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: 17%;">17%</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row g-3 mb-3">
      <div class="col-md-12">
        <div class="card shadow-sm border-0">
          <div class="card-header bg-primary text-white text-center fw-bold d-flex flex-row gap-2 justify-content-center">
          <span>Overall Total No. of Enterprise Type - Sector wise</span>  <span class="fs-5"><i class="bi bi-cloud-arrow-down-fill"></i></span>
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
                  <tr class="accordion-toggle pointer" data-bs-toggle="collapse" data-bs-target="#sector{{$key}}-details"
                    aria-expanded="false" aria-controls="sector1-details">
                    <td class="text-start" style="width: 49%;">
                      <i class="bi bi-plus-circle me-2"></i>
                      {{$sector->name}}
                    </td>
                    <td>{{$sector->count_2223}}</td>
                    <td>{{$sector->count_2324}}</td>
                    <td>{{$sector->count_2425}}</td>
                  </tr>
                  <tr class="collapse bg-light" id="sector{{$key}}-details" data-bs-parent="#accordionTable">
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
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="formFile" class="form-label">Import File</label>
            <input class="form-control" type="file" id="formFile">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
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

  <!-- select all script -->
  <script>
    function setProgress(id, percent) {
      const el = document.getElementById(id);
      if (el) {
        el.style.width = percent + '%';
        el.textContent = percent + '%';
      }
    }
    function filter() {
      let district = $('#district').val();
      let activity = $('#activity').val();
      let gender = $('#gender').val();
      let category = $('#category').val();
      let newLabels = [];
      let newCounts = [];
      let newGrowth = [];
      
      $.ajax({
          url: "{{route('msmeDashboard', 'district')}}",
          type: 'POST',
          data: {
              district: district, activity : activity, gender:gender, category:category, _token: "{{ csrf_token() }}"
          },
          success: function (res) {
            $('.total_registered').text(res.data.total_registered);
            $('#total_employees').text(res.data.total_employees);
            $('.total_female').text(res.data.total_female);
            $('#total_male').text(res.data.total_male);
            setProgress('total_male_per', res.data.total_male_per);
            setProgress('total_female_per', res.data.total_female_per);
            updateDonutChart([res.data.nonCommmenceDate, res.data.CommmenceDate]);
            // newLabels = res.chart_one.label;
            // newCounts = res.chart_one.count;
            // newGrowth = res.chart_one.growth;
            // newLabels = res.chart_two.label;
            // newCounts = res.chart_two.count;
            // newGrowth = res.chart_two.growth;
            // updateMsmeChart(newLabels, newCounts, newGrowth);
          },
          error: function () {
            
          }
      });
    };
  </script>


  <!-- charts script -->
  <script>
    const ctx = document.getElementById('donutChart');
    const donutChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Not Commenced', 'Commenced'],
        datasets: [{
          label: 'Commencement',
          data: [{{$data['total_registered'] - $data['CommmenceDate']}}, {{$data['CommmenceDate']}}],
          backgroundColor: ['#0d6efd', '#28a745'],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '70%',
        plugins: {
          legend: {
            display: true,
            position: 'top',
            labels: {
              boxWidth: 15
            }
          }
        }
      }
    }); 
    function updateDonutChart(data) {
      donutChart.data.datasets[0].data = data;
      donutChart.update();
    }
  </script>

  <!-- 2nd section -->
  <script>
    const districtCtx = document.getElementById('districtChart');

    new Chart(districtCtx, {
      type: 'bar',
      data: {
        labels: [
          @foreach($data['district_chart'] as $district) '{{$district["name"]}}', @endforeach
        ],
        datasets: [{
          label: 'Total MSME’s',
          data: [@foreach($data['district_chart'] as $district) '{{$district["count"]}}', @endforeach],
          backgroundColor: '#d1d800',
          borderRadius: 4,
          barThickness: 20,
        }]
      },
      options: {
        indexAxis: 'y', // Makes it horizontal
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        scales: {
          x: {
            beginAtZero: true,
            ticks: {
              callback: function (value) {
                return value.toLocaleString(); // Add commas
              }
            }
          },
          y: {
            ticks: {
              font: { size: 12 }
            }
          }
        }
      }
    });
  </script>

  <!-- Cumulative growth -->


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