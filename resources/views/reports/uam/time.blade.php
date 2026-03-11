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

  

    <div class="row g-3 mt-3">
      <div class="col-md-4 card p-2 m-1" style="width: 280px;">
        <label class="filter-label">District</label>
        <select class="form-select" style="height: 40px; border-radius: 15px;" id="district" onchange="filter()">
          <option value="">All</option>
          @foreach($districts as $entry)
            <option value="{{$entry}}">{{$entry}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-4 card p-2 m-1" style="width: 280px;">
        <label class="filter-label">Major Activity</label>
        <select id="majorActivity" class="form-select" multiple style="width: 100%" id="activity" onchange="filter()">
          <option value="">Select All</option>
          @foreach($major_activities as $entry)
          <option value="{{$entry}}">{{$entry}}</option>
          @endforeach
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
    const $select = $('#majorActivity');
    $(document).ready(function () {

      $select.select2({
        placeholder: "Select",
        closeOnSelect: false,
        width: '100%'
      });

      function getAllOptionsExceptSelectAll() {
        return $select.find('option').not('[value="selectAll"]').map(function () {
          return $(this).val();
        }).get();
      }

      $select.on('select2:select', function (e) {
        if (e.params.data.id === 'selectAll') {
          const allValues = getAllOptionsExceptSelectAll();
          $select.val(allValues).trigger('change.select2');
        }
      });

      $select.on('select2:unselect', function (e) {
        if (e.params.data.id === 'selectAll') {
          $select.val(null).trigger('change.select2');
        }
      });

      // Deselect "Select All" if any option is manually removed
      $select.on('change', function () {
        const selected = $select.val() || [];
        const allValues = getAllOptionsExceptSelectAll();

        if (selected.length < allValues.length) {
          // Not all selected, so remove "Select All"
          if (selected.includes("selectAll")) {
            const filtered = selected.filter(v => v !== "selectAll");
            $select.val(filtered).trigger("change.select2");
          }
        }
      });
    });
  </script>




  <!-- Cumulative growth -->

  <!-- hero chart container script -->

  <script>
    // Store chart in a variable so you can update it later
    const labels = [
      @foreach($chart_one as $chart_data) "{{$chart_data['range']}}", @endforeach
    ];

    const udyamChartCtx = document.getElementById('chart1').getContext('2d');

    const udyamChart = new Chart(udyamChartCtx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [
          {
            type: 'line',
            label: '% Growth',
            data: [@foreach($chart_one as $chart_data) {{$chart_data['growth']}}, @endforeach],
            borderColor: 'black',
            backgroundColor: 'transparent',
            yAxisID: 'y1',
          },
          {
            type: 'bar',
            label: 'Udyam Registration',
            data: [@foreach($chart_one as $chart_data) {{$chart_data['count']}}, @endforeach],
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

    function updateUdyamChart(newLabels, newCounts, newGrowth) {
      udyamChart.data.labels = newLabels;
      udyamChart.data.datasets[0].data = newGrowth;
      udyamChart.data.datasets[1].data = newCounts;
      udyamChart.update();
    }

    // Chart 2 - MSME Growth
    const msmeChartCtx = document.getElementById('chart2').getContext('2d');
    const msmeChart = new Chart(msmeChartCtx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [
          {
            type: 'line',
            label: '% Growth',
            data: [@foreach($chart_two as $chart_data) {{$chart_data['growth']}}, @endforeach],
            borderColor: '#000',
            backgroundColor: 'transparent',
            yAxisID: 'y1',
          },
          {
            type: 'bar',
            label: 'No. of New MSMEs',
            data: [@foreach($chart_two as $chart_data) {{$chart_data['count']}}, @endforeach],
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

    function updateMsmeChart(newLabels, newCounts, newGrowth) {
      msmeChart.data.labels = newLabels;
      msmeChart.data.datasets[0].data = newGrowth;
      msmeChart.data.datasets[1].data = newCounts;
      msmeChart.update();
    }

    function filter() {
      let district = $('#district').val();
      let activity = $select.val();
      let newLabels = [];
      let newCounts = [];
      let newGrowth = [];
      
      $.ajax({
          url: "{{route('msmeDashboard', 'time')}}",
          type: 'POST',
          data: {
              district: district, activity : activity, _token: "{{ csrf_token() }}"
          },
          success: function (res) {
            newLabels = res.chart_one.label;
            newCounts = res.chart_one.count;
            newGrowth = res.chart_one.growth;
            updateUdyamChart(newLabels, newCounts, newGrowth);
            newLabels = res.chart_two.label;
            newCounts = res.chart_two.count;
            newGrowth = res.chart_two.growth;
            updateMsmeChart(newLabels, newCounts, newGrowth);
          },
          error: function () {
            
          }
      });
    };
  </script>

</body>

</html>