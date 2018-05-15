<?php
include '../class/class.select.php';
$select=new select;
?>
<?php
$kode=$_COOKIE['kode'];
$sql=$select->sysinfo_det($kode);
$row=mysql_fetch_array($sql);
?>
<div class="row">
	  <div class="col-lg-12">
		<div class="card">
		  <div class="card-header">
			<i class="fa fa-align-justify"></i> Detail System Information			
			<span style="float:right;">
				<button class="btn btn-primary" title="Klik untuk kembali" onClick="loadMenu('005')"><i class="fa fa-undo"></i> Back</button>
				<button class="btn btn-primary" title="Klik untuk reload data" onClick="loadMenu('006')"><i class="fa fa-refresh"></i> Reload</button>
			</span> 			
		  </div>		  
		  <div class="card-body">
				<div class="row">
					  <div class="col-sm-6 col-lg-3">
						<div class="card text-white bg-primary">
						  <div class="card-body pb-0">
							<div class="text-value"><h1><?php echo $row['cpuload'];?> %</h1></div>
							<div>CPU Load</div>
						  </div>
						  <div class="chart-wrapper mt-3 px-3" style="height:70px;">
							<canvas id="cpu" class="chart" height="70"></canvas>
						  </div>
						</div>
					  </div>
					  <!--/.col-->
					  <div class="col-sm-6 col-lg-3">
						<div class="card text-white bg-info">
						  <div class="card-body pb-0">
							 <div class="text-value"><h1><?php echo $row['rpitemp'];?> &#8451;</h1></div>
							<div>Temperature</div>
						  </div>
						  <div class="chart-wrapper mt-3 px-3" style="height:70px;">
							<canvas id="temp" class="chart" height="70"></canvas>
						  </div>
						</div>
					  </div>
					  <!--/.col-->
					  <div class="col-sm-6 col-lg-3">
						<div class="card text-white bg-warning">
						  <div class="card-body pb-0">
							<div class="text-value"><h1><?php echo $row['ram_usage'];?> Mb</h1></div>
							<div>Memory Usage</div>
						  </div>
						  <div class="chart-wrapper mt-3" style="height:70px;">
							<canvas id="mem" class="chart" height="70"></canvas>
						  </div>
						</div>
					  </div>
					  <!--/.col-->
					  <div class="col-sm-6 col-lg-3">
						<div class="card text-white bg-danger">
						  <div class="card-body pb-0">

							<div class="text-value"><h1><?php echo $row['disk'];?> %</h1></div>
							<div>Disk Usage</div>					
						  </div>
						  <div class="chart-wrapper mt-3 px-3" style="height:70px;">
							<canvas id="disk" class="chart" height="70"></canvas>
						  </div>
						</div>
					  </div>             
				</div>
			</div>
		</div>
	</div>
</div>

 
<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script src="node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
<script src="src/js/main.js"></script>

<script>
$('#top_menu').html('\
    <span class="breadcrumb-item">\
	<span><a href="home.php" onClick="loadMenu(\'001\')">Home</a></span> > \
	<a href="#" onClick="loadMenu(\'001\')">Dashboard</a> > \
	<a href="#" onClick="loadMenu(\'005\')">System Info</a> > \
	<a href="#" onClick="loadMenu(\'006\')">OLS Detail '+$('#did').html()+'</a> \
	</span>\
	');	
</script>
<?php
$data = array();
$sql=$select->sysinfo_log($kode);
while ( $row = mysql_fetch_array($sql) )
{
     $data[] = $row['cpuload'];
     $data1[] = $row['rpitemp'];
    $data10[] = $row['tanggal'];
}
echo $dt=json_encode( $data );
echo '<br>';
echo '<br>';
echo $dt=json_encode( $data1 );
//echo array_sum($data)/12;

$cpu  = array('4.2', '5.4', '7.8', '5.5', '6.3', '4.6', '4.2');
$temp = array('20', '40', '35', '60', '45', '30', '60');
$mem  = array('4.2', '5.4', '7.8', '5.5', '6.3', '4.6', '4.2');
$disk = array('78', '81', '80', '45', '34', '12', '40', '85', '65', '23', '12', '98', '34', '84', '67', '82');
?>
<script>
var cardChart1 = new Chart($('#cpu'), {
    type: 'line',
    data: {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [{
        label: 'CPU History',
        backgroundColor: getStyle('--primary'),
        borderColor: 'rgba(255,255,255,.55)',
        data: <?php echo json_encode($cpu); ?>
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
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
            min: 3,
            max: 9
          }
        }]
      },
      elements: {
        line: {
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  });
  var cardChart2 = new Chart($('#temp'), {
    type: 'line',
    data: {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [{
        label: 'Temperature History',
        backgroundColor: getStyle('--info'),
        borderColor: 'rgba(255,255,255,.55)',
        data: <?php echo json_encode($temp); ?>
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
            color: 'transparent',
            zeroLineColor: 'transparent'
          },
          ticks: {
            fontSize: 2,
            fontColor: 'transparent'
          }
        }],
        yAxes: [{
          display: false,
          ticks: {
            display: false,
            min: 10,
            max: 70
          }
        }]
      },
      elements: {
        line: {
          tension: 0.00001,
          borderWidth: 1
        },
        point: {
          radius: 4,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  }); // eslint-disable-next-line no-unused-vars

  var cardChart3 = new Chart($('#mem'), {
    type: 'line',
    data: {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgba(255,255,255,.2)',
        borderColor: 'rgba(255,255,255,.55)',
        data: <?php echo json_encode($mem); ?>
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          display: false
        }],
        yAxes: [{
          display: false
        }]
      },
      elements: {
        line: {
          borderWidth: 2
        },
        point: {
          radius: 0,
          hitRadius: 10,
          hoverRadius: 4
        }
      }
    }
  }); // eslint-disable-next-line no-unused-vars

  var cardChart4 = new Chart($('#disk'), {
    type: 'bar',
    data: {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgba(255,255,255,.2)',
        borderColor: 'rgba(255,255,255,.55)',
        data: <?php echo json_encode($disk); ?>
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          display: false,
          barPercentage: 0.6
        }],
        yAxes: [{
          display: false
        }]
      }
    }
  }); // eslint-disable-next-line no-unused-vars
</script>