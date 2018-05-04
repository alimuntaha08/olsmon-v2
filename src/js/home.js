	function print_direct()
	{ //download addons nya di https://addons.mozilla.org/en-US/firefox/addon/js-print-setup/
		
		jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);
		// set top margins in millimeters
		jsPrintSetup.setOption('marginTop', 5);
		jsPrintSetup.setOption('marginBottom', 5);
		jsPrintSetup.setOption('marginLeft', 5);
		jsPrintSetup.setOption('marginRight', 5);
		// set page header
		jsPrintSetup.setOption('headerStrLeft', '');
		jsPrintSetup.setOption('headerStrCenter', '');
		jsPrintSetup.setOption('headerStrRight', '');
		// set empty page footer
		jsPrintSetup.setOption('footerStrLeft', '');
		jsPrintSetup.setOption('footerStrCenter', '');
		jsPrintSetup.setOption('footerStrRight', '');
		// Suppress print dialog
		jsPrintSetup.setSilentPrint(true);/** Set silent printing */
		// Do Print
		jsPrintSetup.print();
		// Restore print dialog
		jsPrintSetup.setSilentPrint(false); /** Set silent printing back to false */	

	}
	function encodeurl(url){
		return B64.encode(url);
	}
	function check_int(evt) {
	var charCode = ( evt.which ) ? evt.which : event.keyCode;
	return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
	}
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
	
	function RemoveCookie(cookieName){
		SetCookie(cookieName,'',-10);
	}

	function zf( number, width )
	{
	  width -= number.toString().length;
	  if ( width > 0 )
	  {
		return new Array( width + (/\./.test( number ) ? 2 : 1) ).join( '0' ) + number;
	  }
	  return number;
	}
