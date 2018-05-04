<?php
include '../class/class.select.php';
$select=new select;
?>
 <div class="row">
	  <div class="col-lg-12">
		<div class="card">
		  <div class="card-header">
			<i class="fa fa-align-justify"></i> OLS System Information			
			<span style="float:right;">
				<button class="btn btn-primary" title="Klik untuk kembali" onClick="loadMenu('001')"><i class="fa fa-undo"></i> Back</button>
				<button class="btn btn-primary" title="Klik untuk reload data" onClick="loadMenu('005')"><i class="fa fa-refresh"></i> Reload</button>
			</span> 			
		  </div>		  
		  <div class="card-body">
			<table class="table table-responsive-sm table-bordered table-striped table-sm">
			  <thead>
				<tr>
				  <th>Code</th>
				  <th>CPU Load (%)</th>
				  <th>Temperature (&#8451;)</th>
				  <th>Free Memory (Mb)</th>
				  <th>Disk Usage (%)</th>
				  <th>Ip Address</th>
  				  <th>Serial Number</th>
				  <th>Detail</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				$no=0;
				$sql=$select->sysinfo();
				while($row=mysql_fetch_array($sql)){
				$no=$no+1;
			  ?>
				<tr>
				  <td><?php echo $row['kode'];?></td>
				  <td><?php echo $row['cpuload'];?></td>
				  <td><?php echo $row['rpitemp'];?> <?php echo $select->tempi($row['rpitemp']);?></td>
				  <td><?php echo $row['ram_usage'];?> <?php echo $select->memi($row['ram_usage']);?></td>
				  <td><?php echo $row['disk'];?> <?php echo $select->diski($row['disk']);?></td>
				  <td><?php echo $row['ip'];?></td>
				  <td><?php echo $row['serial'];?></td>
				  <td><button class="btn btn-success" onClick="selId('<?php echo $row['kode'];?>');loadMenu('006')"><i class="fa fa-eye fa-2x text-warning"></i></button></td>
				</tr>      
			  <?php	
				}
			  ?>					  
			  </tbody>
			</table>
			<nav>
			  <ul class="pagination">
				<li class="page-item">
				  <a class="page-link" href="#">Prev</a>
				</li>
				<li class="page-item active">
				  <a class="page-link" href="#">1</a>
				</li>
				<li class="page-item">
				  <a class="page-link" href="#">2</a>
				</li>
				<li class="page-item">
				  <a class="page-link" href="#">3</a>
				</li>
				<li class="page-item">
				  <a class="page-link" href="#">4</a>
				</li>
				<li class="page-item">
				  <a class="page-link" href="#">Next</a>
				</li>
			  </ul>
			</nav>
		  </div>
		</div>
	  </div>
</div>
<script>
$('#top_menu').html('\
    <span class="breadcrumb-item">\
	<span><a href="home.php" onClick="loadMenu(\'001\')">Home</a></span> > \
	<a href="#" onClick="loadMenu(\'001\')">Dashboard</a> > \
	<a href="#" onClick="loadMenu(\'005\')">System Info</a></span>\
	');
	
	function selId(x){
		$('#did').html(x);
		RemoveCookie('kode');
		SetCookie('kode',x,1);
	}

</script>