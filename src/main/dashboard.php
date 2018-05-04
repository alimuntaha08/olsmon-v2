
<div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-menu"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" onClick="loadMenu('002')">OLS List</a>
                        <a class="dropdown-item" href="#" onClick="loadMenu('005')">System Info</a>
                      </div>
                    </div>
                    <div class="text-value">170</div>
                    <div>OLS Healthy</div>
                  </div>
                  <div class="chart-wrapper mt-3 px-3" style="height:70px;">
                    <canvas id="card-chart1" class="chart" height="70"></canvas>
                  </div>
                </div>
              </div>
              <!--/.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-info">
                  <div class="card-body pb-0">
                    <button type="button" class="btn btn-transparent p-0 float-right">
                      <i class="icon-menu"></i>
                    </button>
                    <div class="text-value">20</div>
                    <div>OLS Alarm</div>
                  </div>
                  <div class="chart-wrapper mt-3 px-3" style="height:70px;">
                    <canvas id="card-chart2" class="chart" height="70"></canvas>
                  </div>
                </div>
              </div>
              <!--/.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-warning">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                    <div class="text-value">10</div>
                    <div>OLS Trip</div>
                  </div>
                  <div class="chart-wrapper mt-3" style="height:70px;">
                    <canvas id="card-chart3" class="chart" height="70"></canvas>
                  </div>
                </div>
              </div>
              <!--/.col-->
              <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-danger">
                  <div class="card-body pb-0">
                    <div class="btn-group float-right">
                      <button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                    <div class="text-value">200</div>
                    <div>Target online</div>					
                  </div>
                  <div class="chart-wrapper mt-3 px-3" style="height:70px;">
                    <canvas id="card-chart4" class="chart" height="70"></canvas>
                  </div>
                </div>
              </div>
			   <!--/.col-->		  	 
             
            </div>
            <!--/.row-->

            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-5">
                    <h4 class="card-title mb-0">Performance</h4>
                    <div class="small text-muted"><?php echo date('M Y');?></div>
                  </div>
                  <!--/.col-->
                  <div class="col-sm-7 d-none d-md-block">
                    <button type="button" class="btn btn-primary float-right">
                      <i class="icon-cloud-download"></i>
                    </button>
                    <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option1" autocomplete="off"> Day
                      </label>
                      <label class="btn btn-outline-secondary active">
                        <input type="radio" name="options" id="option2" autocomplete="off" checked> Month
                      </label>
                      <label class="btn btn-outline-secondary">
                        <input type="radio" name="options" id="option3" autocomplete="off"> Year
                      </label>
                    </div>
                  </div>
                  <!--/.col-->
                </div>
                <!--/.row-->
                <div class="chart-wrapper" style="height:300px;margin-top:40px;">
                  <canvas id="live-traffic" class="chart" height="300"></canvas>
                </div>
              </div>
              <!--<div class="card-footer">
                <div class="row text-center">
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Visits</div>
                    <strong>29.703 Users (40%)</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Unique</div>
                    <strong>24.093 Users (20%)</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Pageviews</div>
                    <strong>78.706 Views (60%)</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">New Users</div>
                    <strong>22.123 Users (80%)</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md mb-sm-2 mb-0">
                    <div class="text-muted">Bounce Rate</div>
                    <strong>40.15%</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>-->
            </div>
			
            <!--<div class="row">
              <div class="col-sm-6 col-lg-3">
                <div class="brand-card">
                  <div class="brand-card-header bg-facebook">
                    <i class="fa fa-facebook"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-1" height="90"></canvas>
                    </div>
                  </div>
                  <div class="brand-card-body">
                    <div>
                      <div class="text-value">89k</div>
                      <div class="text-uppercase text-muted small">friends</div>
                    </div>
                    <div>
                      <div class="text-value">459</div>
                      <div class="text-uppercase text-muted small">feeds</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="brand-card">
                  <div class="brand-card-header bg-twitter">
                    <i class="fa fa-twitter"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-2" height="90"></canvas>
                    </div>
                  </div>
                  <div class="brand-card-body">
                    <div>
                      <div class="text-value">973k</div>
                      <div class="text-uppercase text-muted small">followers</div>
                    </div>
                    <div>
                      <div class="text-value">1.792</div>
                      <div class="text-uppercase text-muted small">tweets</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="brand-card">
                  <div class="brand-card-header bg-linkedin">
                    <i class="fa fa-linkedin"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-3" height="90"></canvas>
                    </div>
                  </div>
                  <div class="brand-card-body">
                    <div>
                      <div class="text-value">500+</div>
                      <div class="text-uppercase text-muted small">contacts</div>
                    </div>
                    <div>
                      <div class="text-value">292</div>
                      <div class="text-uppercase text-muted small">feeds</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="brand-card">
                  <div class="brand-card-header bg-google-plus">
                    <i class="fa fa-google-plus"></i>
                    <div class="chart-wrapper">
                      <canvas id="social-box-chart-4" height="90"></canvas>
                    </div>
                  </div>
                  <div class="brand-card-body">
                    <div>
                      <div class="text-value">894</div>
                      <div class="text-uppercase text-muted small">followers</div>
                    </div>
                    <div>
                      <div class="text-value">92</div>
                      <div class="text-uppercase text-muted small">circles</div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
			-->

		    <!-- Plugins and scripts required by this view-->    
			<script src="node_modules/chart.js/dist/Chart.min.js"></script>
			<script src="node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
			<script src="src/js/main.js"></script>
			
			

<script>
$('#top_menu').html('\
    <span class="breadcrumb-item">\
	<span><a href="home.php" onClick="loadMenu(\'001\')">Home</a></span> > \
	<a href="#" onClick="loadMenu(\'001\')">Dashboard</a> > \
	</span>\
	');
</script>
<script>
var mainChart = new Chart($('#live-traffic'), {
    type: 'line',
    data: {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'CPU Load',
        backgroundColor: hexToRgba(getStyle('--info'), 10),
        borderColor: getStyle('--info'),
        pointHoverBackgroundColor: '#fff',
        borderWidth: 2,
        data: [5.2, 6.8, 7.4, 69, 77, 57, 125, 165, 172, 91, 173, 138, 155, 89, 50, 161, 65, 163, 160, 103, 114, 185, 125, 196, 183, 64, 137, 95, 112, 175]
      }, {
        label: 'Temperature',
        backgroundColor: 'transparent',
        borderColor: getStyle('--success'),
        pointHoverBackgroundColor: '#fff',
        borderWidth: 2,
        data: [40, 55, 80, 100, 86, 97, 83, 98, 87, 98, 93, 83, 87, 98, 96, 84, 91, 97, 88, 86, 94, 86, 95, 91, 98, 91, 92, 80, 83, 82]
      }, {
        label: 'Memory',
        backgroundColor: 'transparent',
        borderColor: getStyle('--danger'),
        pointHoverBackgroundColor: '#fff',
        borderWidth: 2,
        //borderDash: [8, 5],
        data: [45, 100, 132, 65, 65, 65, 95, 85, 65, 65, 65, 165, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65, 65]
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            drawOnChartArea: false
          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            maxTicksLimit: 5,
            stepSize: Math.ceil(250 / 5),
            max: 250
          }
        }]
      },
      elements: {
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4,
          hoverBorderWidth: 3
        }
      }
    }
  });
</script>
