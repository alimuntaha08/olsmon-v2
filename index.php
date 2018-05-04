<?php
$auth=exec('type C:\auth.db');
if($auth){
    $dt=explode('#',$auth,3);
    if($dt[0]=='PLN' && $dt[1]=='001'){		
		header("Location: login.php");
		/* echo'<style>
			.loader {
				border: 6px solid #f3f3f3;
				border-top: 6px solid #3498db;
				border-radius: 50%;
				width: 120px;
				height: 120px;
				animation: spin 2s linear infinite;
			}

			@keyframes spin {
				0% { transform: rotate(0deg); }
				100% { transform: rotate(360deg); }
			}
			.loader {
			 border-top: 20px solid blue;
			 border-right: 20px solid green;
			 border-bottom: 20px solid red;
			 border-left: 20px solid pink;
			}
			</style>';
			echo '<center><div class="loader"></div></center>'; */
    }else{
      exec('taskkill /im firefox.exe /f');
    }
}else{
	exec('devcon hwids *kingston* > C:\WINDOWS\system32\dong1.db');
	$auth=exec('type C:\WINDOWS\system32\dong1.db');	
	if (strpos($auth,'1 matching device(s) found') !== false) {
			header("Location: login.php");			
	}else{	
 	  echo $msg='<font color="red">Ilegal Access</font>';
	}
}
exec('echo OK Access from '.$_SERVER["REMOTE_ADDR"].'#'.$_SERVER["REQUEST_URI"].'#'.date('d/m/Y-h:i:s').' >> log/log.txt');
?>
<script>
function SetCookie(cookieName,cookieValue,nDays) {
			var today = new Date();
			var expire = new Date();
			if (nDays==null || nDays==0) nDays=1;
			expire.setTime(today.getTime() + 3600000*24*nDays);
			document.cookie = cookieName+"="+escape(cookieValue)
				 + ";expires="+expire.toGMTString();
	}
		
function ReadCookie(cookieName) {
		var theCookie=" "+document.cookie;
		var ind=theCookie.indexOf(" "+cookieName+"=");
		if (ind==-1) ind=theCookie.indexOf(";"+cookieName+"=");
		if (ind==-1 || cookieName=="") return "";
		var ind1=theCookie.indexOf(";",ind+1);
		if (ind1==-1) ind1=theCookie.length; 
		return unescape(theCookie.substring(ind+cookieName.length+2,ind1));
}
	
var lebar=screen.width;
	var tinggi=screen.height;
	var theme='start';
	var hdbg='header_blue';
	var xdt=lebar+'x'+tinggi+'x'+theme+'x'+hdbg;
	SetCookie('xdt',xdt,1);
//SetCookie('res_h',(tinggi-150),1);
		
if(lebar=="800"){
	alert('Resolusi monitor anda '+lebar+'x'+tinggi+'!! Program tidak dapat ditampilkan sempurna')
}
</script>