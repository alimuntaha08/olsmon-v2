<?php
include 'koneksi.php';

class select{

	function user_list(){
	return $qry=mysql_query("select * from tbl_im_users");
	}

	function max_kode(){
		$qry=mysql_query("select max(userID) from tbl_im_users");
		$row=mysql_fetch_array($qry);
		return $row[0];
	}

	function max_kode_mgi(){
		$qry=mysql_query("select max(kode) from m_gi");
		$row=mysql_fetch_array($qry);
		return $row[0];
	}

	function max_kode_gi(){
		$qry=mysql_query("select max(kode_gi) from m_ols");
		$row=mysql_fetch_array($qry);
		return $row[0];
	}

	function max_kode_ols(){
		$qry=mysql_query("select max(kode) from m_ols");
		$row=mysql_fetch_array($qry);
		return $row[0];
	}

	function max_kode_ols_unit($kode){
		$qry=mysql_query("select max(kode_unit) from m_ols where kode_gi='".$kode."'");
		$row=mysql_fetch_array($qry);
		return $row[0];
	}

	function nama_gi($kode){
		$qry=mysql_query("select * from m_gi where kode='".$kode."'");
		$row=mysql_fetch_array($qry);
		return $row['nama'];
	}

	function det_ols($kode){
		return $qry=mysql_query("select * from m_ols where kode='".$kode."'");
		/* $row=mysql_fetch_array($qry);
		return $row['nama']; */
	}

	function det_gi($kode){
		return $qry=mysql_query("select * from m_gi where kode='".$kode."'");
	}

	function ols_list(){
	return $qry=mysql_query("
		SELECT
			m_ols.id,
			m_ols.kode,
			m_ols.kode_gi,
			m_ols.kd_group,
			m_gi.nama,
			m_ols.kode_unit,
			m_ols.nama as nama_unit,
			m_ols.kapasitas,
			m_ols.keterangan,
			m_ols.ct_primer,
			m_ols.ct_sekunder,
			m_ols.ratio,
			m_ols.set_ols,
			m_ols.t1,
			m_ols.t2,
			m_ols.t3,
			m_ols.t4,
			m_ols.dc,
			m_ols.aktif
		FROM
			m_ols
			Inner Join m_gi ON m_ols.kode_gi = m_gi.kode
		where m_ols.aktif='1' and m_ols.jenis='ols'
			order by m_ols.kode, m_ols.kd_group asc
		");
	}

	function ols_list_child($kd_group){
	return $qry=mysql_query("
		SELECT
			m_ols.id,
			m_ols.kode,
			m_ols.kode_gi,
			m_ols.kd_group,
			m_gi.nama,
			m_ols.kode_unit,
			m_ols.nama as nama_unit,
			m_ols.kapasitas,
			m_ols.keterangan,
			m_ols.ct_primer,
			m_ols.ct_sekunder,
			m_ols.ratio,
			m_ols.set_ols,
			m_ols.t1,
			m_ols.t2,
			m_ols.t3,
			m_ols.t4,
			m_ols.aktif
		FROM
			m_ols
			Inner Join m_gi ON m_ols.kode_gi = m_gi.kode
		where m_ols.aktif='1' AND m_ols.kd_group ='".$kd_group."'
		order by m_ols.id desc
		;
		");
	}

	function gi_list(){
	return $qry=mysql_query("select * from m_gi where aktif='1' order by kode asc ");
	}

	function notif_list0(){
	return $qry=mysql_query("select * from notif_list");
	}

	function notif_list($kd){
	return $qry=mysql_query("select * from notif_list where kode='".$kd."'");
	}

	function notif($kd){
	return $qry=mysql_query("select * from notif_list where kode='".$kd."'");
	}


	/* function status_baru(){
	return $qry=mysql_query("select * from event_log");
	} */

	function alarm_trip(){
		return $qry=mysql_query("SELECT
		event_log.id,
		event_log.kode,
		event_log.kode_gi,
		event_log.tanggal,
		event_log.event,
		event_log.status,
		event_log.keterangan,
		m_ols.dc
		FROM
		event_log
		Inner Join m_ols ON event_log.kode = m_ols.kode");
	}

	function fetchAll($table) {
	  $ret = [];
	  $sql = mysql_query("SELECT * FROM $table;");
		while($row=mysql_fetch_assoc($sql)) {
		  $ret[] = $row;
		}
		return $ret;
	}
	function zf($number,$width){
		return str_pad((string)$number, $width, "0", STR_PAD_LEFT);
	}
	function user($id,$fd){
		$sql=mysql_query("SELECT * FROM tbl_im_users WHERE userID='".$id."'");
		$row=mysql_fetch_array($sql);
		return $row[$fd];
	}

	function cek_user($kd,$fd){
		$sql=mysql_query("SELECT * FROM tbl_im_users WHERE userCode='".$kd."'");
		$row=mysql_fetch_array($sql);
		return $row[$fd];
	}

	function cek_notif(){
		return $qry=mysql_query("select a.*, c.nama, c.kapasitas, c.keterangan as keteranganGi, d.pesan, e.nama as nama_gi from event_log a
		inner join ( select id, kode, max(tanggal)from event_log where event=2 or event=10 group by kode) b on b.id = a.id
		inner join m_ols c on c.kode_gi = a.kode_gi
		inner join m_msg d on d.kode = a.event
		inner join m_gi e on e.kode = c.kode_gi
		");
	}

	function cek_ols($x){
		//$x=2;
		return $qry=mysql_query("
			select a.*, c.nama, c.kapasitas, c.keterangan as keteranganGi, d.pesan, e.arus as ia from event_log a
			inner join ( select id, kode, max(tanggal)from event_log where event='".$x."' group by kode) b on b.id = a.id
			inner join m_ols c on c.kode = a.kode
			inner join m_msg d on d.kode = a.event
			left  join  ( select id, kode, max(tanggal), arus from ia group by kode) e on e.kode = a.kode
		");
	}
	function dc($x){
		if($x==0){return '<b class="text-red fa fa-ban">&nbsp;</b>';}else{return '<b class="text-red fa fa-bolt">&nbsp;</b>';}
	}
	
	function aktif($x){
		if($x==0){return '<span class="badge badge-danger"><i class="text-red fa fa-ban"></i> Disconnect</span>';}else{return '<span class="badge badge-success"><i class="text-red fa fa-bolt"></i> Connect</span>';}
	}

	function cek_timer($act,$kode){
		$sql = mysql_query('select '.$act.' from t_target where kode ='.$kode);
		$dt=mysql_fetch_array($sql);
		$num = floatval(print_r($dt[$act], true)) ;
		return $num ;
	}
	
	function sysinfo(){
		/* if(!empty($kd)){
			$wh="Where sys_info.kode='".$kd."'";
		} */
		  //$ret = [];
		  $sql = mysql_query("
			SELECT
				sys_info.id,
				sys_info.kode,
				sys_info.cpuload,
				sys_info.rpitemp,
				sys_info.ram_usage,
				sys_info.disk,
				sys_info.ip,
				sys_info.serial
			FROM
				m_ols
			Inner Join sys_info ON m_ols.kode = sys_info.kode
			Inner Join m_gi ON m_ols.kode_gi = m_gi.kode
			WHERE
				m_ols.aktif='1' and m_ols.jenis='ols'
			order by m_ols.kode, m_ols.kd_group asc
			");
			/* while($row=mysql_fetch_assoc($sql)) {
			  $ret[] = $row;
			} */
			return $sql;	
	}
	
	function sysinfo_det($kd){
		  $sql = mysql_query("
			SELECT
				sys_info.id,
				sys_info.kode,
				sys_info.cpuload,
				sys_info.rpitemp,
				sys_info.ram_usage,
				sys_info.disk,
				sys_info.ip
			FROM
				m_ols
			Inner Join sys_info ON m_ols.kode = sys_info.kode
			Where sys_info.kode='".$kd."'
			");
			
			return $sql;	
	}
	
	function sysinfo_log($kd){
		  $sql = mysql_query("
			SELECT
				sys_info_log.id,
				sys_info_log.kode,
				sys_info_log.cpuload,
				sys_info_log.rpitemp,
				sys_info_log.ram_usage,
				sys_info_log.disk,
				sys_info_log.ip,
				sys_info_log.serial,
				sys_info_log.tanggal
			FROM
				m_ols
			Inner Join sys_info_log ON m_ols.kode = sys_info_log.kode
			Where sys_info_log.kode='".$kd."'
			");
			//and sys_info_log.tanggal like '%2018-05-06%'
			return $sql;	
	}
	
	function memi($x){
		if($x<50){
			return '<span class=""><i class="fa fa-pie-chart text-danger"></i></span>';
		}else if($x>=50 && $x <=130){
			return '<span class=""><i class="fa fa-pie-chart text-warning"></i></span>';
		}else if($x>130){
			return '<span class=""><i class="fa fa-pie-chart text-success"></i> </span>';
		}
	}
	
	function diski($x){
		if($x<50){
			return '<span class=""><i class="fa fa-pie-chart text-success"></i></span>';
		}else if($x>=50 && $x <=70){
			return '<span class=""><i class="fa fa-pie-chart text-warning"></i></span>';
		}else if($x>70){
			return '<span class=""><i class="fa fa-pie-chart text-danger"></i> </span>';
		}
	}
	function tempi($x){
		if($x<50){
			return '<span class=""><i class="fa fa-thermometer-quarter text-success"></i></span>';
		}else if($x>=50 && $x <=70){
			return '<span class=""><i class="fa fa-thermometer-half text-warning"></i></span>';
		}else if($x>70){
			return '<span class=""><i class="fa fa-thermometer-full text-danger"></i> </span>';
		}
	}
}
?>
