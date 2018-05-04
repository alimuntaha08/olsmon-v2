<?php
include 'class/class.select.php';
include 'sesion.php';
class config{
	function setup($param){
		switch($param){
			case 'title': return 'OLS Monitoring System|';break;
			case 'title2': return 'OLSMS |';break;
			case 'ver': return '1.0';break;
			case 'telp': return '081333024950';break;
			case 'web': return '-';break;
			case 'email': return 'alimuntaha08@gmail.com';break;
		}
	}
}
$skr=date('d-m-Y');
$conf=new config;
$select=new select;
$xdt = explode('x',$_COOKIE['xdt']);
$res_w = $xdt[0]-10;
$res_h = $xdt[1];
$theme = $xdt[2];
$header = $xdt[3];
$header2 = $xdt[3];

	
?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="copyright" content="www.artharaya.co.id 2012">
		<meta name="author" content="www.artharaya.co.id">
		<meta name="email" content="ali@artharaya.co.id">
		<meta name="Charset" content="ISO-8859-1">
		<meta name="Distribution" content="Global">
		<meta name="Rating" content="General">
		<meta name="Robots" content="INDEX,FOLLOW">
		<meta name="Revisit-after" content="7 Days">
		<meta name="expires" content="14 Days">
		<title><?php echo $conf->setup('title').'&nbsp;'.$select->setup('nama'). ' (Ver '.$conf->setup('ver').')';?></title>
		<link rel="shortcut icon" href="images/cart_big-warnawarni.png" />
		<link type="text/css" href="css/style.css" rel="stylesheet" />
		<link type="text/css" href="css/runtext.css" rel="stylesheet" />
		<link type="text/css" href="css/<?php echo $theme;?>/jquery-ui-1.8.14.custom.css" rel="stylesheet" />
		<link type="text/css" href="mod/font-awesome/css/font-awesome.css" rel="stylesheet" />
		
		<script type="text/javascript" src="js/base64v1_0.js"></script>
		<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.14.custom.min.js"></script>
		
		<script type="text/javascript" src="js/home.js"></script>
		<script type="text/javascript" src="js/ajaxFunction.js"></script>
		<script type="text/javascript" src="js/topMenu.js"></script>
		<script type="text/javascript" src="js/pindah.js"></script>
		<script type="text/javascript" src="js/hanyaNomor.js"></script>
		<script type="text/javascript" src="js/currency.js"></script>
		
	<script language="JavaScript">
		document.onkeydown = checkKeycode
		function checkKeycode(e) {
		var keycode;
		if (window.event) keycode = window.event.keyCode;
		else if (e) keycode = e.which;
		if(keycode==112){
			goFullScreen(document.body);
		}
		if(keycode==27 || keycode==112 || keycode==113 || keycode==114 || keycode==115 || keycode==116 || keycode==117 || keycode==118 || keycode==119 || keycode==120 || keycode==121 || keycode==122 || keycode==123){
			return false;
		}
		}
		
	/* if (!window.screenTop && !window.screenY) { 
	$('#main_tb').css('height','<?php echo $res_h-216;?>');
	var xdt=ReadCookie('xdt').split('x',2);
		lebar=xdt[0];
		tinggi=(xdt[1]*1)+150;
		alert(tinggi)
		theme=xdt[2];
		//SetCookie('xdt',lebar+'x'+tinggi+'x'+theme,1);
	}else{
	var xdt=ReadCookie('xdt').split('x',2);
		lebar=xdt[0];
		tinggi=xdt[1];
		theme=xdt[2];
		//SetCookie('xdt',lebar+'x'+tinggi+'x'+theme,1);
	} */
	</script>
<script>
function oneAlert(txt){
	$('#body').append('<div id="oneAlert" style="width:99.8%; height:99.6%; background-color:#999; opacity:.7;  top:0px; position:fixed;"></div>')
}
function move() {
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
        if (width >= 100) {
            clearInterval(id);
        } else {
            width++;
            elem.style.width = width + '%';
        }
    }
}

</script>
<script>
var ALERT_TITLE ="Oops..";
var ALERT_BUTTON_TEXT = "Ok";

if(document.getElementById) {
	window.alert = function(txt) {
		var txt=txt+',2';
		createCustomAlert(txt);
	}
}
function jAlert(x){
	switch(x){
		case '1': return "Warning,<i class='fa fa-warning text-red'></i> "; break; //danger
		case '2': return "Info,<i class='fa fa-bullhorn text-green'></i> "; break; //info
		case '3': return "Success,<i class='fa fa-thumbs-o-up text-blue'></i> "; break; //sukses		
		default : return "Default,<i class='fa fa-thumbs-o-down text-blue'></i> "; break; //sukses		
	}
}
function createCustomAlert(txt) {
	d = document;
	var txtx=txt.split(',',2);
	var txt=txtx[0];
	var dt=jAlert(txtx[1]).split(',',2);
	var icon=dt[1];
	var ALERT_TITLE=dt[0];
	
	if(d.getElementById("modalContainer")) return;

	mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
	mObj.id = "modalContainer";
	mObj.style.height = d.documentElement.scrollHeight + "px";
	
	alertObj = mObj.appendChild(d.createElement("div"));
	alertObj.id = "alertBox";
	if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
	alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
	alertObj.style.visiblity="visible";

	h1 = alertObj.appendChild(d.createElement("h1"));
	h1.appendChild(d.createTextNode(ALERT_TITLE));

	msg = alertObj.appendChild(d.createElement("p"));
	//msg.appendChild(d.createTextNode(txt));
	msg.innerHTML = icon+txt;

	btn = alertObj.appendChild(d.createElement("a"));
	btn.id = "closeBtn";
	btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
	btn.href = "#";
	btn.focus();
	btn.onclick = function() { removeCustomAlert();return false; }

	alertObj.style.display = "block";
	switch(ALERT_TITLE){
		case 'Warning': return alertSound(1)+$('#closeBtn').css('background-color','red'); break; //danger
		case 'Info': return alertSound(2)+$('#closeBtn').css('background-color','green'); break; //info
		case 'Success': return alertSound(3)+$('#closeBtn').css('background-color','blue'); break; //sukses		
	}
}

function removeCustomAlert() {
	document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
	alertSound(4)
}

function ful(){
alert('Alert this pages');
}
function alertSound(x){
    document.getElementById('play'+x).play();
}

</script>
<style>
#modalContainer {
	background-color:rgba(0, 0, 0, 0.3);
	position:absolute;
	width:100%;
	height:100%;
	top:0px;
	left:0px;
	z-index:10000;
	background-image:url(tp.png); /* required by MSIE to prevent actions on lower z-index elements */
}

#alertBox {
	position:relative;
	width:300px;
	min-height:100px;
	margin-top:250px;
	border:0px solid #666;
	background-color:#fff;
	background-repeat:no-repeat;
	background-position:20px 30px;
	border-radius:4px 4px 0 0;
}

#modalContainer > #alertBox {
	position:fixed;
}

#alertBox h1 {
	margin:0;
	font:bold 1.2em verdana,arial;
	background-color:#3073BB;
	background-image:url('images/header2.png');
	border-radius:4px 4px 0 0;
	color:##666;
	border-bottom:0px solid #000;
	padding:4px 0 4px 5px;
}

#alertBox p {
	font:1.2em verdana,arial;
	height:50px;
	padding-left:10px;
	margin-left:0px;
	color:#000;
	background-color:none;
}

#alertBox #closeBtn {
	display:block;
	position:relative;
	margin:5px auto;
	padding:7px;
	border:0 none;
	width:70px;
	font:1.3em verdana,arial;
	text-transform:uppercase;
	text-align:center;
	color:#FFF;
	background-color:blue;
	border-radius: 3px;
	text-decoration:none;
}
#myProgress {
    position: relative;
    width: 80%;
    height: 20px;
    background-color: none;
	float:left;
	margin-left:4px;
}
#myBar {
    position: absolute;
    width: 1%;
    height: 100%;
    background-color: blue;
}
.loader {
    border: 6px solid #f3f3f3; /* Light grey */
    border-top: 6px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 12px;
    height: 12px;
    animation: spin 2s linear infinite;
	float:left;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
.loader {
 border-top: 2px solid blue;
 border-right: 2px solid green;
 border-bottom: 2px solid red;
 border-left: 2px solid pink;
 margin:2px;
 margin-right:4px;
}
</style>
	</head>
	<body onLoad="" id="body">
		<center>
		<div id="abs"></div>
		<div id="dHome"></div>
		<div id="top_menu" style="width:<?php echo $res_w;?>px; border-left:solid 1px #648CB4; border-right:solid 1px #648CB4;">
				<?php include 'main/top_menu.php';?>
		</div>
		<div id="main_tb" style="width:<?php echo $res_w;?>px; height:<?php echo $res_h-181;?>px;">
			<div id="submain_tb" style="float:left; width:99.79%; height:598px; border:solid 0px red; margin:1px;">
				<div style="width:100%; height:auto; border:solid 0px #648CB4;">
					<div class="row nobdr" id="hd" style="border:solid 1px #648CB4; border-bottom:none; width:99.99%; background-size: 100% 100%; background-image:url('images/<?php echo $header;?>.png'); height:27px;">
						<div class="col lf nobdr" id="capTitle" style="padding-left:2px; font-size:14px; width:400px; color:#fff; padding:2px;"></div>
						<div class="col nobdr" id="capTitleRight" style="font-size:14px; width:auto; float:right;"></div>
					</div>
					<div class="row header">
						<i id="hd_kolom"></i>
						 <input type="hidden" id="nil" value="0" style="font-weight:bold; font-size:11px; width:20px; height:12px; margin:1px;"/> 
					</div>					
					<div style="border:solid 0px red; overflow:auto; width:100%; height:auto; background-color:#fff; background-position:center; background-attachment: fixed; background-repeat:no-repeat;">
						<div id="main" style="border-bottom:solid 1px #648CB4;"><center><img style="margin-top:200px;" src="images/indicator.gif" /></center></div>
						<script>						
						function rm(nil){
						  for(i=1; i<=5; i++){
						  var nil=nil.replace(' ','+');
						  }
						  return nil;
						}

						function rmCurr(nil){                     
						  var nil=nil.replace('.','');                     
						  return nil;
						}
						
						function strip2gr(nil){
						  for(i=1; i<=2; i++){
						   var nil=nil.replace('-','/');
						  }						   
						  return nil;
						}
						
						//alert('<?php echo $res_h-178;?>');
						function resolusi(){
							$('#main_tb').css('height','<?php echo $res_h-216;?>');
							$('#submain_tb').css('height','<?php echo $res_h-240;?>');
							$('#main').css('height','<?php echo $res_h-300;?>');
							
							//jika browser fullscreen
							if (!window.screenTop && !window.screenY) {
							$('#main_tb').css('height','<?php echo $res_h-90;?>');
							$('#main').css('height','<?php echo $res_h-172;?>');
							}else{
							$('#main_tb').css('height','<?php echo $res_h-216;?>');
							$('#main').css('height','<?php echo $res_h-300;?>');
							}
						}
						
						function initCall(){
						  $('#hd_kolom').html('');
						  $('#capTitleRight').show();
						  //$('#foot_kolom').hide();
						  $('#main').css({width:'',height:''});
						  $('#main').css({float:'',border:''});
							resolusi();
							$('#top_menu').show();
							$('.tabel').css('height','465');
							$('#penj_item').css('height','319');
							$('#pagination').hide();
						}
						
						function click_in(id){
							document.getElementById('frame_menu').style.backgroundColor='#fff';
							resolusi();
							
							var ckmn=ReadCookie('menu');
							SetCookie('tbmn',id+'+'+ckmn,1);
							
							for(i=1; i<=7; i++){
								document.getElementById('tabs'+i).style.backgroundColor='#ABD3FA';
								document.getElementById('tabs'+i).style.height='20px';
							}
							document.getElementById(id).style.backgroundColor='#DEECF8';
							document.getElementById(id).style.height='21px';
							show_menu(id);
						}
						
						var cek_mnaktif=ReadCookie('menu');
						if(cek_mnaktif!=''){
							/* var ckmn=ReadCookie('tbmn').split('+',2);
							var tabs=ckmn[0];
							var menu=ckmn[1]; */
							  //click_in('tabs2');
							  loadMenu(cek_mnaktif,'1');

						  //$('#top_menu').hide();
						  //$('#hd').hide();
						}else{
						dashboard();
						click_in('tabs0');
						}
						
						function dashboard(){
							$('#main').load('main/dashboard.php');
						}
						
						function customer_list(){
							$('#main').load('mod/inventory/customer_list.php');
						}
						
						function loadMenu(menu,hal){
						SetCookie('menu',menu,1);
						aktifMenu(menu);
						//Panggil init call
						initCall();
						$('#logdiv').load('echo_log.php?menu='+menu+'&nama=<?php echo $person['nama'];?>');
						switch (menu){
								case '001': jQuery('#main').load('main/lap_supplier.php');break;
								case '002': jQuery('#main').load('main/lap_katalog.php'); break;
								case '005': jQuery('#main').load('main/purchasing_add.php'); break;
								case '006': jQuery('#main').load('main/lap_order.php'); break; //purchasing list. tidk bisa lgsg ke purchasing_rec.php
								case '007': jQuery('#main').load('main/lap_order.php'); break;
								case '008': jQuery('#main').load('main/lap_trm_barang.php'); break;
								case '009': jQuery('#main').load('main/lap_pembelian.php?stat=beli'); break;
								case '010': jQuery('#main').load('main/lap_penjualan.php'); break;
								case '011': jQuery('#main').load('main/lap_gudang.php'); break;
								case '012': jQuery('#main').load('main/lap_barang.php?hal='+hal); break;
								case '013': jQuery('#main').load('main/penjualan.php?jenis=penjualan');break;
								case '014': jQuery('#main').load('main/lap_pelanggan.php');break;
								//case '015': jQuery('#main').load('main/purchasing_add.php?jenis=beli');break;
								case '015': jQuery('#main').load('main/pembelian_lsg.php');break;
								case '016': jQuery('#main').load('main/purchasing_ret.php');break;
								case '017': jQuery('#main').load('main/return_penjualan.php');break;
								case '018': jQuery('#main').load('main/lap_ret_pemb.php');break;
								case '019': jQuery('#main').load('main/lap_ret_penjualan.php');break;
								case '020': jQuery('#main').load('main/setting.php');break;
								//case '021': jQuery('#main').load('main/lap_pelunasan.php');break;
								case '021': jQuery('#main').load('main/lap_labarugi.php');break;
								case '022': jQuery('#main').load('main/lap_hutang_dagang.php');break;
								//case '022': jQuery('#main').load('main/lap_hutang.php');break;
								case '023': jQuery('#main').load('main/lap_piutang_dagang.php');break;
								//case '023': jQuery('#main').load('main/lap_piutang.php');break;
								//case '023': jQuery('#main').load('main/lap_keuangan_detail.php');break;
								case '024': jQuery('#main').load('main/lap_kategori.php');break;
								case '025': jQuery('#main').load('main/tb_lap_stokbarang.php');break;
								case '026': jQuery('#main').load('main/penjualan_lsg.php');break;
								case '027': jQuery('#main').load('main/cpanel.php');break;
								case '028': jQuery('#main').load('main/acc_index.php');break;
								case '029': jQuery('#main').load('main/dashboard.php');break;
								case '030': jQuery('#main').load('main/penjualan_grosir.php?jenis=penjualan');break;
								case '031': jQuery('#main').load('main/bukakas.php');break;
								case '032': jQuery('#main').load('main/tutupkas_form.php');break;
							}
						}
						</script>
					</div>			
					<div class="hidden" style="margin-bottom:4px; opacity:.9;" id="pagination">xx</div>
					<div class="row footer" style="background-image:url('images/<?php echo $header;?>.png');">
						<div style="width:150px; float:left; height:18px;">
							<div class="loader hidden"></div>
							<div id="myProgress"><div id="myBar"></div></div>
						</div>
						<div id="foot_kolom" style="width:650px; float:left; height:18px;">
						<div class="marquee" >
							<i id="run_text"><?php echo $select->setup('running_text');?></i>
						</div>
						</div>
						<div id="foot_dlg" style="float:right; padding-right:5px;" class="rg">
							<span>
								<div  class="hidden" style="border-radius:20px 60px 0 20px; background-color:yellow; position:fixed; z-index:2; right:17px; top:488px; width:250px; height:40px; border:solid 1px #999;"></div>
							</span>
							<?php echo $person['nama'].' [ '.$person[kode].' ]';?>
						</div>
					</div>			
				</div>			
			</div>
		</div>

		</center><div id="logdiv" class="hidden">Log</div>
	</body>
	</html>

	<script>
	$(function(){
		incCounter();
	});
	//var cek_mnaktif=ReadCookie('menu');
	//browser.tabs.showAudioPlayingIcon;false
	function incCounter() {
			setTimeout('incCounter()',4000);
			var nil=parseInt($('#nil').val());
			var count=nil+1;
			var dsp=$('#nil').val(count);
			if(count==2){
			  $('#nil').val(0);
			}
			/* $.get('cek_session.php', function (msg){
				if(msg=='out'){
					window.location='logout.php';
				}
			}).fail( function(msg){
					window.location='logout.php';
				//alert('Violation action!');
			}); */
			window.focus();
		   $('#foot_dlg').html('<i class="fa fa-user text-red"></i> <?php echo $person['nama'].' [ '.$person[kode].' ]';?>').fadeIn();
			if(cek_mnaktif=='013'){
				//auto_nofaktur();
				totpending();	
				//penj_item_auto('PJ-170401000003');
			}
	}	
	
	//playSound(); //default sound loading
	//rgclick
	$(document).bind('contextmenu', function(e) {e.preventDefault(); });
	//zoom -/+
	$(document).keydown(function(event) {
	if (event.ctrlKey==true && (event.which == '61' || event.which == '107' || event.which == '173' || event.which == '109'  || event.which == '187'  || event.which == '189'  ) ) {
		event.preventDefault();
	 }
	});
	//zoom mouse
	$(window).bind('mousewheel DOMMouseScroll', function (event) {
	   if (event.ctrlKey == true) {
	   event.preventDefault();
	   }
	});

	/* $(document).keydown(function(event) {
		if(event.which == '112'){
			alert(event.which)
			//event.preventDefault();
			goFullScreen(document.body);
		}
	}); */
	//fullscreen

	function toggleFullScreen(elem) {
		// ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
		if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
			if (elem.requestFullScreen) {
				elem.requestFullScreen();
			} else if (elem.mozRequestFullScreen) {
				elem.mozRequestFullScreen();
			} else if (elem.webkitRequestFullScreen) {
				elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			} else if (elem.msRequestFullscreen) {
				elem.msRequestFullscreen();
			}
		}else {
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();			
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		}
	}

	function goFullScreen(elem) {
		// ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
		if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
			if (elem.requestFullScreen) {
				elem.requestFullScreen();
			}else if (elem.mozRequestFullScreen) {
				elem.mozRequestFullScreen();
			} else if (elem.webkitRequestFullScreen) {
				elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			} else if (elem.msRequestFullscreen) {
				elem.msRequestFullscreen();
			}
		}
		//alert(elem)
		$('#main_tb').css('height','<?php echo $res_h-90;?>');
		$('#main').css('height','<?php echo $res_h-172;?>');

	}
	function outFullScreen(elem) {
		// ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
		if (document.cancelFullScreen) {
			document.cancelFullScreen();
		} else if (document.mozCancelFullScreen) {
			document.mozCancelFullScreen();			
		} else if (document.webkitCancelFullScreen) {
			document.webkitCancelFullScreen();
		} else if (document.msExitFullscreen) {
			document.msExitFullscreen();
		}   
		$('#main_tb').css('height','<?php echo $res_h-216;?>');
		$('#main').css('height','<?php echo $res_h-300;?>');
	}

	if (!window.screenTop && !window.screenY) {
	$('#main_tb').css('height','<?php echo $res_h-90;?>');
	}else{
	$('#main_tb').css('height','<?php echo $res_h-216;?>');
	}

		
	$('#pagination').html('\
	<div class="row" style="width:99.7%; height:30px; border:solid 1px #999; margin-left:0px; margin-top:-32px; background-color:#ededed;">\
		<div class="col" style="height:30px; width:750px; border-right:solid 1px #ccc;">\
			<div class="col" style="height:15px; width:auto; border-right:solid 1px #ccc; padding:2px; margin:2px;">\
			<select onChange="load_grid(this.value,$(\'#hal\').val())" id="pp" style="width:45px">\
				<option value="46">46</option>\
				<option value="22">22</option>\
				<option value="30">30</option>\
				<option value="40">40</option>\
				<option value="48">48</option>\
				<option value="50">50</option>\
				<option value="100">100</option>\
				<option value="150">150</option>\
				<option value="200">200</option>\
				<option value="250">250</option>\
				<option value="300">300</option>\
				<option value="600">600</option>\
			</select>\
			</div>\
			<div class="col" style="height:15px; width:auto; border-right:solid 1px #ccc; padding:5px; margin:2px;">\
				<b onclick="pgfl(\'F\')"><img src="images/pagination_first.gif"></b>\
				<b onclick="pgpn(\'P\')"><img src="images/pagination_prev.gif"></b>\
			</div>\
			<div class="col" style="height:15px; width:auto; border-right:solid 1px #ccc; padding:5px; margin:2px;">\
				Page\
			</div>\
			<div class="col" style="height:15px; width:auto; border-right:solid 1px #ccc; padding:2px; margin:2px;">\
				 <input style="width:35px; height:15px; font-size:12px;" type="text" id="hal" name="hal" value="" onKeypress="return check_int(event);" onChange="pgreload()" /> of <b id="jhal"></b>\
			</div>\
			<div class="col" style="height:15px; width:auto; border-right:solid 1px #ccc; padding:5px; margin:2px;">\
				<b onclick="pgpn(\'N\')"><img src="images/pagination_next.gif"></b>\
				<b onclick="pgfl(\'L\')"><img src="images/pagination_last.gif"></b>\
			</div>\
			<div class="col" style="height:15px; width:auto; border-right:solid 1px #ccc; padding:5px; margin:2px;">\
				<b onclick="pgreload()"; id="imgload"><img src="images/pagination_load.png"></b>\
			</div>\
			<div class="col" style="height:15px; width:auto; border-right:solid 1px #ccc; padding:5px; margin:2px;">\
				Search\
			</div>\
			<div class="col" style="height:15px; width:auto; border-right:solid 1px #ccc; padding:2px; margin:2px;">\
				<input style="width:90px; height:15px; font-size:15px;" type="text" id="cari" name="cari" value="" onChange="cari(this.value)" />\
			</div>\
			<div class="col hidden" style="height:15px; width:auto; border-right:solid 1px #ccc; padding:5px; margin:2px;">\
				Export\
			</div>\
			<div class="col hidden" style="height:15px; width:auto; border-right:solid 1px #ccc; padding:5px; margin:2px;">\
				<b onclick="exp_pdf()"; class="cursor-pointer"><img src="images/pdf-icon.jpeg"></b>\
				<b onclick="exp_pdf()"; class="cursor-pointer"><img src="images/excel-icon.gif" style="height:18px; width:18px;"></b>\
			</div>\
			<div class="col hidden" style="height:15px; width:auto; border-right:solid 0px #ccc; padding:5px; margin:2px;">\
				From <input style="width:80px; height:10px; font-size:10px;" type="text" id="tgl1x" name="tgl1" value="" onChange="cari(this.value)" />\
				To <input style="width:80px; height:10px; font-size:10px;" type="text" id="tgl2x" name="tgl2" value="" onChange="cari(this.value)" />\
			</div>\
		</div>\
		<div class="col nobdr" style="width:auto; float:right;">\
			<div class="col nobdr" style="height:15px; width:auto; border-right:solid 0px #ccc; padding:5px; margin:2px;">\
				<b>Displaying <b id="dsp"></b> to <b id="to"></b> of <b id="tot_nsb"></b> items</b>\
			</div>\
		</div>\
	</div>\
	');


	function callback() {
					//$('#lap_datanom').hide();
					$('#imgload').html('<img style="width:16px;height:16px;" src="images/loading.gif">');
				setTimeout(function() {
					//$('#lap_datanom').show();
					$('#imgload').html('<img style="width:16px;height:16px;" src="images/pagination_load.png">');
				}, 1500 );
			}
		
	function pgpn(x){
		if(x=='P'){
			var pp=$('#pp').val();
			var hal=parseInt($('#hal').val())-1;
			if(hal>=1){
				load_grid(pp,hal);			
			}else{
				alert('Sudah halaman awal');
			}
		}else if(x=='N'){
			var pp=$('#pp').val();
			var hal=parseInt($('#hal').val())+1;
			var jhal=parseInt($('#jhal').html());
			if(hal<=jhal){
				load_grid(pp,hal);
			}else{
				alert('Sudah halaman terakhir');
			}
		}
	}
	function pgreload(){
		var pp=$('#pp').val();
		var hal=parseInt($('#hal').val());
		var jhal=parseInt($('#jhal').html());
		if(isNaN(hal)){alert('Masukan nomor bukan karakter!')
		}else if(hal<=0){
		alert('Page harus lebih besar dari 0');
		$('#hal').val(1);
		}else if(hal<=jhal){
		load_grid(pp,hal);		
		}else{
			alert('Halaman terakhir '+jhal);
			$('#hal').val(jhal);
		}
	}
	function pgfl(x){
		if(x=='F'){
			var hal=1;
			var pp=$('#pp').val();
			load_grid(pp,hal);	
		}else if(x=='L'){
			var hal=parseInt($('#jhal').html());
			var pp=$('#pp').val();
			load_grid(pp,hal);	
		}
	}
	function cari(nm){
		var nama=rm_spasi(nm.toUpperCase());
		var pp=$('#pp').val();
		var hal=parseInt($('#hal').val());
		load_grid(pp,hal);
	}
	function rm_spasi(nil){
			for(i=1; i<=4; i++){
			var nil=nil.replace(' ','+');
			}
			return nil;
	}
	</script>
<?php
}
?>