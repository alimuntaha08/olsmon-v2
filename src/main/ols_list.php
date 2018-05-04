<?php
include '../class/class.select.php';
$select=new select;
?>
 <div class="row">
	  <div class="col-lg-12">
		<div class="card">
		  <div class="card-header">
			<i class="fa fa-align-justify"></i> Daftar Ols			
			<span style="float:right;">
				<button class="btn btn-primary" title="Klik untuk reload data"><i class="fa fa-refresh"></i> Reload</button>
				<button class="btn btn-primary"><i class="fa fa-user-plus"></i> Add</button>
			</span> 			
		  </div>		  
		  <div class="card-body">
			<table class="table table-responsive-sm table-bordered table-striped table-sm">
			  <thead>
				<tr>
				  <th>Kode</th>
				  <th>Kode GI</th>
				  <th>Nama</th>
				  <th>Status</th>
				</tr>
			  </thead>
			  <tbody>
			  <?php
				$no=0;
				$sql=$select->ols_list();
				while($row=mysql_fetch_array($sql)){
				$no=$no+1;
			  ?>
				<tr>
				  <td><?php echo $row['kode'];?></td>
				  <td><?php echo $row['kode_gi'];?></td>
				  <td><?php echo $row['nama'];?></td>
				  <td class="cursor-pointer"><?php echo $select->aktif($row['dc']);?></td>
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
	<a href="#" onClick="loadMenu(\'002\')">OLS List</a></span>\
	');
	//alert(ReadCookie('menu'))
</script>