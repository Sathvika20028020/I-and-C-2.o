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
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
      font-family: 'Segoe UI', sans-serif;
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
  --percent: 50; 
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: conic-gradient(#0d6efd calc(var(--percent) * 1%), #e0e0e0 0);
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

    .g
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
        <div class="mb-3">
          <label class="filter-label">Time</label>
        <select class="form-select" style="height: 40px; border-radius: 15px; border: 1px solid #46494a;">
            <option>All</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="filter-label">Sector</label>
          <select class="form-select" style="height: 40px; border-radius: 15px; border: 1px solid #46494a;">
            <option>All</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="filter-label">District</label>
          <select class="form-select" style="height: 40px; border-radius: 15px; border: 1px solid #46494a;">
            <option>All</option>
          </select>
        </div>
      </div>

      <!-- RIGHT FILTERS + KPIS -->
      <div class="col-md-10">
        <!-- Top Dropdown Row -->
         <div class="row mb-3">

          <div class="col-md-3 card p-2 m-1" style="width: 280px;">
            <label class="filter-label">District</label>
            <select class=" filter select-filter" id="filterDistrict" style="height: 40px; border-radius: 15px;">
            <option selected disabled>Select District</option>
            </select>
          </div>

          <div class="col-md-3 card p-2 m-1"  style="width: 280px;">
            <label class="filter-label">Major Activity</label>
            <select class="form-select filter select-filter" id="filterMajoractivity" style="height: 40px; border-radius: 15px;">
                <option selected disabled>Select Major Activity</option>
            </select>
          </div>
          <div class="col-md-3 card p-2 m-1" style="width: 280px;">
            <label class="filter-label">Gender</label>
       
            <select class=" filter select-filter" id="filterGender" style="height: 40px; border-radius: 15px;">
                <option selected disabled>Select Gender</option>
            </select>
          
          </div>
          <div class="col-md-3 card p-2 m-1" style="width: 280px;">
            <label class="filter-label">Social Category</label>
            <select class=" filter select-filter" id="filterSocial" style="height: 40px; border-radius: 15px;">
              <option selected disabled>Select Social Category</option>
            </select>
          </div>
        </div> 

     


        

        <!-- KPI CARDS -->
        <div class="row">
          <div class="col-md-3">
            <div class="kpi-card kpi-red">
              <div>Total No. of MSME's<br>Registered</div>
              <div class="kpi-value registeredcount" id="registeredcount"></div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="kpi-card kpi-blue">
              <div>Total No. of<br>Employees</div>
              <div class="kpi-value employeescount" id="employeescount"></div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="kpi-card kpi-green">
              <div>Total No. of Female<br>Entrepreneurs</div>
              <div class="kpi-value femaleentreprnuercount" id="femaleentreprnuercount"></div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="kpi-card kpi-pink">
              <div>Total No. of Specially Abled<br>Entrepreneurs</div>
              <div class="kpi-value">0</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- range section -->
    <div class="row g-3">

      <!-- Gender Classification -->

      <div class="col-md-4">
        <div class="card shadow-sm" style="height: 350px;">
          <div class="card-body">
           
             <div class=" d-flex justify-content-between align-items-center">
            <h6 class="text-center ms-5 fw-bold">Owner wise Gender Classifications</h6>
            <h5   id="exportgender" class="btn text-end float-end ">
            <img src="{{asset('admin/assets/images/downloadicon.png')}}" height="35px" width="35px"></h5></div>
   <h5 class="text-center text-primary " id="registeredgendercount"></h5>
          

            <!-- Male -->
            <div class="mb-2 mt-4">
              <div class="d-flex justify-content-between">
  <span>Male</span>
  <span id="maleCount"></span>
</div>
<div class="progress mb-3" style="height: 18px;">
  <div class="progress-bar bg-primary" id="maleBar" role="progressbar" style="width: 50%;"></div>
</div>
            </div>

            <!-- Female -->
            <div class="mt-3">
             <div class="d-flex justify-content-between">
  <span>Female</span>
  <span id="femaleCount"></span>
</div>
<div class="progress mb-3" style="height: 18px;">
  <div class="progress-bar bg-success" id="femaleBar" role="progressbar" style="width: 33%;"></div>
</div>
            </div>
            <!-- others -->
             <div class="mt-3">
             <div class="d-flex justify-content-between">
  <span>Other</span>
  <span id="otherCount"></span>
</div>
<div class="progress" style="height: 18px;">
  <div class="progress-bar bg-info" id="otherBar" role="progressbar" style="width: 17%;"></div>
</div>
            </div>

          </div>
        </div>
      </div>

      <!-- Organization-Based Commencement Analysis -->
      <div class="col-md-4">
        <div class="card shadow-sm" style="height: 350px;">
          <div class="card-body text-center">
            <h6 class="fw-bold">Organization-Based Commencement Analysis</h6>
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

 <!-- Total Employment -->
   
        <div class="col-md-4">
        <div class="card shadow-sm" style="height: 350px;">
          <div class="card-body">
            <h6 class="fw-bold text-center">Total Employment</h6>
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
      


      

    <div class="row g-3">
      <!-- District-wise Total MSMEs -->
     <div class="col-md-8">
  <div class="card shadow-sm" >

    <div class="card-body" >
      <h5   id="exportServerData" class="btn text-end float-end">
            <img src="{{asset('admin/assets/images/downloadicon.png')}}" height="35px" width="35px"></h5>

      <h6 class="fw-bold text-center mb-4">District wise Total MSME’s</h6>

      <div class="chart-scroll-container"  style="height: 500px; overflow-y: auto; white-space: nowrap;">
        <canvas id="districtChart" ></canvas>
      </div>
    </div>
  </div>
</div>

  <!-- Social Category Wise Analysis -->
     <div class="col-md-4">
        <div class="card shadow-sm" style="height: 575px;">
      <div class=" d-flex justify-content-between align-items-center">
         <h6 class="fw-bold mt-2 text-center ms-5" >Social Category Wise Analysis</h6>
                <h5 id="exportsocialcategory" class="btn  float-end text-end">
                <img src="{{asset('admin/assets/images/downloadicon.png')}}" height="35px" width="35px"></h5>
                </div>

          <div class="card-body" id="socialBreakdownContainer">
           
            <div class="d-flex justify-content-between align-items-center border p-2 rounded mb-3" >
            
            
            </div>
           
          </div>
        </div>
      </div> 

     


    </div>

    </div>

    <div class="row g-3">
      <div class="col-md-12">
        <div class="card shadow-sm">
          <div class="card-body">
            <h6 class="fw-bold text-center mb-3">Overall Total No. of Enterprise Type - Sector wise</h6>
            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
              <table class="table table-bordered table-sm align-middle text-center">
                <thead class="table-primary">
                  <tr>
                    <th rowspan="2" class="align-middle">Sector</th>
                    <!-- <th colspan="4">Enterprise Type</th> -->
                  </tr>
                  <tr>
                    <th>2020-21</th>
                    <th>2021-22</th>
                    <th>2022-23</th>
                    <th>2023-24</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Public Administration and Defence; Compulsory Social Security</td>
                    <td>74</td>
                    <td>181</td>
                    <td>121</td>
                    <td>135</td>
                  </tr>
                  <tr>
                    <td>Electricity, Gas, Steam and Air Conditioning Supply</td>
                    <td>467</td>
                    <td>1,026</td>
                    <td>1,757</td>
                    <td>1,882</td>
                  </tr>
                  <tr>
                    <td>Water Supply; Sewerage, Waste Management and Remediation Activities</td>
                    <td>398</td>
                    <td>1,016</td>
                    <td>1,370</td>
                    <td>1,490</td>
                  </tr>
                  <tr>
                    <td>Arts, Entertainment and Recreation</td>
                    <td>1,631</td>
                    <td>3,802</td>
                    <td>6,463</td>
                    <td>7,230</td>
                  </tr>
                  <tr>
                    <td>Education</td>
                    <td>1,267</td>
                    <td>4,350</td>
                    <td>5,831</td>
                    <td>6,440</td>
                  </tr>
                  <tr class="table-warning fw-bold">
                    <td>Medium</td>
                    <td>576</td>
                    <td>1,245</td>
                    <td>1,572</td>
                    <td>1,689</td>
                  </tr>
                  <tr class="table-warning fw-bold">
                    <td>Small</td>
                    <td>5,276</td>
                    <td>9,249</td>
                    <td>11,483</td>
                    <td>12,214</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row g-3">
      <div class="col-md-4 card p-2 m-1" style="width: 280px;">
        <label class="filter-label">District</label>
        <select class="form-select" style="height: 40px; border-radius: 15px;">
          <option>All</option>
        </select>
      </div>
      <div class="col-md-4 card p-2 m-1" style="width: 280px;">
        <label class="filter-label">Major Activity</label>
        <select id="majorActivity2" class="form-select" multiple style="width: 100%">
          <option value="selectAll">Select All</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>
    </div>

    <div class="row g-3 mt-2">
      <div class="herochart-container">
        <h3>Udyam Registration Over Time</h3>
        <canvas id="chart1"></canvas>
      </div>
    </div>

    <div class="row g-3">
      <div class="herochart-container">
        <h3>MSME Growth Over Time</h3>
        <canvas id="chart2"></canvas>
      </div>
    </div>
    <div class="row g-3">
      <div class="chart-title">Overall Industry wise Categorization
        <div id="chart_div"></div>
      </div>
    </div>


  
    <div class="row g-3">
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
                    <th>2020-21</th>
                    <th>2021-22</th>
                    <th>2022-23</th>
                    <th>2023-24</th>
                  </tr>
                </thead>
                <tbody id="accordionTable">
                  <!-- Row 1 -->
                  <tr class="accordion-toggle pointer" data-bs-toggle="collapse" data-bs-target="#sector1-details"
                    aria-expanded="false" aria-controls="sector1-details" >
                    <td class="text-start" style="width: 49%;">
                      <i class="bi bi-plus-circle me-2"></i>
                      Public Administration and Defence; Compulsory Social Security
                    </td>
                    <td>74</td>
                    <td>181</td>
                    <td>121</td>
                    <td>135</td>
                  </tr>
                  <tr class="collapse bg-light" id="sector1-details" data-bs-parent="#accordionTable">
                    <td colspan="5" class="text-start">
                      <table class="table table-bordered table-sm">
                        <tbody>
                          <tr>
                            <td class="text-start">Sub-sector 1A</td>
                            <td>20</td>
                            <td>50</td>
                            <td>30</td>
                            <td>40</td>
                          </tr>
                          <tr>
                            <td class="text-start">Sub-sector 1B</td>
                            <td>54</td>
                            <td>131</td>
                            <td>91</td>
                            <td>95</td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>

                  <!-- Row 2 -->
                  <tr class="accordion-toggle pointer" data-bs-toggle="collapse" data-bs-target="#sector2-details"
                    aria-expanded="false" aria-controls="sector2-details">
                    <td class="text-start" style="width: 49%;">
                      <i class="bi bi-plus-circle me-2"></i>
                      Electricity, Gas, Steam and Air Conditioning Supply
                    </td>
                    <td>467</td>
                    <td>1,026</td>
                    <td>1,757</td>
                    <td>1,882</td>
                  </tr>
                  <tr class="collapse bg-light" id="sector2-details" data-bs-parent="#accordionTable">
                    <td colspan="5" class="text-start">
                      <table class="table table-bordered table-sm">
                        <tbody>
                          <tr>
                            <td class="text-start">Sub-sector 2A</td>
                            <td>200</td>
                            <td>500</td>
                            <td>800</td>
                            <td>900</td>
                          </tr>
                          <tr>
                            <td class="text-start">Sub-sector 2B</td>
                            <td>267</td>
                            <td>526</td>
                            <td>957</td>
                            <td>982</td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>

                  <!-- Row 3 -->
                  <tr class="accordion-toggle pointer" data-bs-toggle="collapse" data-bs-target="#sector3-details"
                    aria-expanded="false" aria-controls="sector3-details">
                    <td class="text-start" style="width: 49%;">
                      <i class="bi bi-plus-circle me-2"></i>
                      Water Supply; Sewerage, Waste Management and Remediation Activities
                    </td>
                    <td>398</td>
                    <td>1,016</td>
                    <td>1,370</td>
                    <td>1,490</td>
                  </tr>
                  <tr class="collapse bg-light" id="sector3-details" data-bs-parent="#accordionTable">
                    <td colspan="5" class="text-start">
                      <table class="table table-bordered table-sm">
                        <tbody>
                          <tr>
                            <td class="text-start">Sub-sector 3A</td>
                            <td>100</td>
                            <td>300</td>
                            <td>450</td>
                            <td>500</td>
                          </tr>
                          <tr>
                            <td class="text-start">Sub-sector 3B</td>
                            <td>298</td>
                            <td>716</td>
                            <td>920</td>
                            <td>990</td>
                          </tr>
                        </tbody>
                      </table>
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

  <!-- charts script -->
  <script>
    const ctx = document.getElementById('donutChart');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Not Commenced', 'Commenced'],
        datasets: [{
          label: 'Commencement',
          data: [1684494, 414488],
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
  </script>




  <!-- Cumulative growth -->

  <!-- hero chart container script -->

  <script>
    const labels = ['2020-21', '2021-22', '2022-23', '2023-24', '2024-25', '2025-26'];

    // Chart 1 - Udyam Registration
    const udyamChartCtx = document.getElementById('chart1').getContext('2d');
    new Chart(udyamChartCtx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [
          {
            type: 'line',
            label: '% Growth',
            data: [0, 210, 91, 58, 44, 100],
            borderColor: 'black',
            backgroundColor: 'transparent',
            yAxisID: 'y1',
          },
          {
            type: 'bar',
            label: 'Udyam Registration',
            data: [150413, 464120, 885124, 515360, 288147, 410014],
            backgroundColor: '#91cd56',
            yAxisID: 'y',
          }
        ]
      },
      options: {
        responsive: true,
        interaction: {
          mode: 'index',
          intersect: false
        },
        scales: {
          y: {
            beginAtZero: true,
            position: 'left',
            title: {
              display: true,
              text: 'No. of Udyam Registrations'
            }
          },
          y1: {
            beginAtZero: true,
            position: 'right',
            grid: { drawOnChartArea: false },
            title: {
              display: true,
              text: '% Growth'
            }
          }
        }
      }
    });

    // Chart 2 - MSME Growth
    const msmeChartCtx = document.getElementById('chart2').getContext('2d');
    new Chart(msmeChartCtx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [
          {
            type: 'line',
            label: '% Growth',
            data: [0, 107, 35, 22, 18, -87],
            borderColor: '#000',
            backgroundColor: 'transparent',
            yAxisID: 'y1',
          },
          {
            type: 'bar',
            label: 'No. of New MSMEs',
            data: [151538, 313707, 422004, 513200, 610154, 77380],
            backgroundColor: '#28a745',
            yAxisID: 'y',
          }
        ]
      },
      options: {
        responsive: true,
        interaction: {
          mode: 'index',
          intersect: false
        },
        scales: {
          y: {
            beginAtZero: true,
            position: 'left',
            title: {
              display: true,
              text: 'No. of New MSMEs'
            }
          },
          y1: {
            beginAtZero: true,
            position: 'right',
            grid: { drawOnChartArea: false },
            title: {
              display: true,
              text: '% Growth'
            }
          }
        }
      }
    });
  </script>

  <!-- Tree charts script -->
  <script type="text/javascript">
    google.charts.load('current', { packages: ['orgchart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Name');
      data.addColumn('string', 'Manager');
      data.addColumn('string', 'ToolTip');

      // Add data (Node, Parent, Tooltip)
      data.addRows([
        [{ v: 'Total', f: '<b>Total MSMEs</b><div style="color:gray">2,089,982</div>' }, '', 'Total MSMEs'],

        [{ v: 'Manufacturing', f: 'MANUFACTURING<div style="color:gray">394,368</div>' }, 'Total', ''],
        [{ v: 'Retail', f: 'WHOLESALE & RETAIL TRADE<div style="color:gray">405,558</div>' }, 'Total', ''],
        [{ v: 'FoodService', f: 'ACCOMMODATION AND FOOD SERVICES<div style="color:gray">214,318</div>' }, 'Total', ''],
        [{ v: 'Transport', f: 'TRANSPORT AND STORAGE<div style="color:gray">184,662</div>' }, 'Total', ''],
        [{ v: 'Others', f: 'Others<div style="color:gray">145,314</div>' }, 'Total', ''],

        [{ v: 'FoodProd', f: 'Manufacture of food products<div style="color:gray">124,007</div>' }, 'Manufacturing', ''],
        [{ v: 'Textiles', f: 'Manufacture of textiles<div style="color:gray">81,012</div>' }, 'Manufacturing', ''],
        [{ v: 'Apparel', f: 'Manufacture of wearing apparel<div style="color:gray">56,160</div>' }, 'Manufacturing', ''],
        [{ v: 'OtherManu', f: 'Other manufacturing<div style="color:gray">52,718</div>' }, 'Manufacturing', ''],
        [{ v: 'Churros', f: 'Manufacture of churros<div style="color:gray">28,094</div>' }, 'Manufacturing', ''],

        [{ v: 'OtherFood', f: 'Manufacture of other food products<div style="color:gray">61,587</div>' }, 'FoodProd', ''],
        [{ v: 'Dairy', f: 'Manufacture of dairy products<div style="color:gray">19,625</div>' }, 'FoodProd', ''],
        [{ v: 'Grain', f: 'Manufacture of grain mill products<div style="color:gray">15,108</div>' }, 'FoodProd', ''],

        [{ v: 'Preserve', f: 'Other unprocessed, preserved<div style="color:gray">2,711</div>' }, 'OtherFood', ''],
        [{ v: 'Ghee', f: 'Manufacture of butter, ghee<div style="color:gray">1,401</div>' }, 'OtherFood', '']
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

  
 <script>
document.addEventListener('DOMContentLoaded', function () {
  const filterIds = ['#filterDistrict', '#filterGender', '#filterSocial', '#filterMajoractivity'];

  // Initial dropdown population
  fetch('{{ route("admin.dropdwnoptions") }}')
    .then(res => res.json())
    .then(data => {
      populateOptions('#filterDistrict', data.districts);
      populateOptions('#filterGender', data.genders);
      populateOptions('#filterSocial', data.social_categories);
      populateOptions('#filterMajoractivity', data.major_activities);
    })
    .then(() => updateDashboardCards()); // Load initial card values

  // Add change event listener to all filters
  document.querySelectorAll('.filter').forEach(el => {
    el.addEventListener('change', () => {
      updateDependentFilters();
      updateDashboardCards();
    });
  });

  // Helper: Populate options
 function populateOptions(selector, items, selected = null) {
  const select = document.querySelector(selector);
  if (!select) return console.warn(`Selector not found: ${selector}`);

  const currentValue = select.value;

  select.innerHTML = '';
  const defaultOption = document.createElement('option');
  defaultOption.value = '';
  defaultOption.textContent = 'Select';
  select.appendChild(defaultOption);

  items.forEach(item => {
    const option = document.createElement('option');
    option.value = item;
    option.textContent = item;
    if (item === selected || item === currentValue) option.selected = true;
    select.appendChild(option);
  });
}


  // Get selected filter values
  function getFilters() {
    const filters = {};
    filterIds.forEach(id => {
      const el = document.querySelector(id);
      if (el && el.value && !el.value.startsWith('Select')) {
        const key = id.replace('#filter', '').toLowerCase();
        filters[key] = el.value;
      }
    });
    return filters;
  }

  // Used inside updateDashboardCards
  function getValue(selector) {
    const el = document.querySelector(selector);
    return el && el.value && !el.value.startsWith('Select') ? el.value : '';
  }

  // Update dropdown options based on selection
  function updateDependentFilters() {
    const filters = getFilters();

    fetch(`{{ url("/api/dynamic-filters") }}?` + new URLSearchParams(filters))
      .then(res => res.json())
      .then(data => {
        populateOptions('#filterDistrict', data.districts, filters.district);
        populateOptions('#filterGender', data.genders, filters.gender);
        populateOptions('#filterSocial', data.social_categories, filters.social);
        populateOptions('#filterMajoractivity', data.major_activities, filters.majoractivity);
      });
  }

  // Update cards and progress bars
  function updateDashboardCards() {
    const filters = {
      district: getValue('#filterDistrict'),
      gender: getValue('#filterGender'),
      social: getValue('#filterSocial'),
      majoractivity: getValue('#filterMajoractivity')
    };

    fetch('{{ url("dashboardnew/filter-data") }}?'  + new URLSearchParams(filters))
      .then(res => res.json())
      .then(data => {
        // Update count cards
        document.getElementById('registeredgendercount').textContent = numberWithCommas(data.totalregistered);
        document.getElementById('registeredcount').textContent = numberWithCommas(data.totalregistered);
        document.getElementById('employeescount').textContent = numberWithCommas(data.totalemployees);
        document.getElementById('femaleentreprnuercount').textContent = numberWithCommas(data.totalfemale);

        // Gender counts
        document.getElementById('maleCount').textContent = numberWithCommas(data.totalmale);
        document.getElementById('femaleCount').textContent = numberWithCommas(data.totalfemale);
        document.getElementById('otherCount').textContent = numberWithCommas(data.others);

        // Progress bars
        setProgress('maleBar', data.percentages.male);
        setProgress('femaleBar', data.percentages.female);
        setProgress('otherBar', data.percentages.others);

           // Social Category Breakdown
const container = document.getElementById('socialBreakdownContainer');
container.innerHTML = ''; // Clear previous entries

data.social_breakdown.forEach(item => {
  const wrapper = document.createElement('div');
  wrapper.className = 'd-flex justify-content-between align-items-center border p-2 rounded mb-3';
  wrapper.innerHTML = `
    <div>
      <strong>${item.category}</strong><br>
      <small>Total MSME's</small><br>
      <span class="fw-bold">${numberWithCommas(item.total)}</span>
    </div>
    <div>
      <div class="circular-percent" style="--percent:${item.percent}%">
        <span>${item.percent}%</span>
      </div>
    </div>
  `;
  container.appendChild(wrapper);
});



            // District Chart
            updateDistrictChart(data.district_chart.labels, data.district_chart.data);
    




      });
  }

  function setProgress(id, percent) {
    const el = document.getElementById(id);
    if (el) {
      el.style.width = percent + '%';
      el.textContent = percent + '%';
    }
  }

  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
});
</script> 

  <!-- 2nd section -->
  <script>
let districtChartInstance;

function updateDistrictChart(labels, values) {
  const canvas = document.getElementById('districtChart');
  const ctx = canvas.getContext('2d');

  const heightPerBar = 50;
  const visibleBars = 10;

  // Set full height (scrollable)
  canvas.height = labels.length * heightPerBar;

  if (districtChartInstance) {
    districtChartInstance.destroy();
  }

  districtChartInstance = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Total MSME’s',
        data: values,
        backgroundColor: '#d1d800',
        borderRadius: 4,
        barThickness: 7
      }]
    },
    options: {
      indexAxis: 'y',
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false }
      },
      scales: {
        x: {
          beginAtZero: true,
          ticks: {
            callback: value => value.toLocaleString()
          }
        },
        y: {
          offset: true,
          ticks: {
            autoSkip: false,
            font: { size: 12 },
            maxRotation: 0,
            minRotation: 0
          }
        }
      }
    }
  });
}

</script>



<script>
function getValue(selector) {
  const el = document.querySelector(selector);
  return el ? el.value : '';
}

document.getElementById('exportgender').addEventListener('click', function () {
  const filters = {
    district: getValue('#filterDistrict'),
    gender: getValue('#filterGender'),
    social: getValue('#filterSocial'),
    majoractivity: getValue('#filterMajoractivity')
  };

  const url = '{{ url("/dashboardnew/export-districts") }}?' + new URLSearchParams(filters).toString();

  // For CSV, we trigger download using hidden link
  const link = document.createElement('a');
  link.href = url;
  link.setAttribute('download', 'district_msme_data.csv');
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
});

document.getElementById('exportgender').addEventListener('click', function () {
  const filters = {
    district: getValue('#filterDistrict'),
    gender: getValue('#filterGender'),
    social: getValue('#filterSocial'),
    majoractivity: getValue('#filterMajoractivity')
  };

  const url = '{{ url("dashboardnew/export-gender-details") }}?' + new URLSearchParams(filters).toString();

  const link = document.createElement('a');
  link.href = url;
  link.setAttribute('download', 'gender_msme_data.csv');
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
});


function getValue(selector) {
  const el = document.querySelector(selector);
  return el ? el.value : '';
}
//social category
document.getElementById('exportsocialcategory').addEventListener('click', function () {
  const filters = {
    district: getValue('#filterDistrict'),
    gender: getValue('#filterGender'),
    social: getValue('#filterSocial'),
    majoractivity: getValue('#filterMajoractivity')
  };

  const url = '{{ url("dashboardnew/export-category") }}?' + new URLSearchParams(filters).toString();

  // For CSV, we trigger download using hidden link
  const link = document.createElement('a');
  link.href = url;
  link.setAttribute('download', 'district_msme_data.csv');
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
});
</script>

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


</body>

</html>