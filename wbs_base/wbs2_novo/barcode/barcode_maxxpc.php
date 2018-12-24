<? 
 define (__TRACE_ENABLED__, false);
 define (__DEBUG_ENABLED__, false);
								   
 require("barcode.php");		   
 require("i25object.php");
 require("c39object.php");
 require("c128aobject.php");
 require("c128bobject.php");
 require("c128cobject.php");
 
 $z = $ini2;
 #$z = 4;
 $y = $ini1;
 #$y = 1;
 $lote_dec = $lote;
 #$lote_dec = 70000001;
 $un_prod = $un;
 
 switch ($modelo)
  {
    case "2157":
			  $imgtopo = "TOPO_213M128RW.png";
			  $imgconf = "CONF_213M128RW.png";
			  break;
    case "2159":
			  $imgtopo = "TOPO_213M256RW.png";
			  $imgconf = "CONF_213M256RW.png";
			  break;
	 case "2159i":
			  $imgtopo = "TOPO_213M256RW.png";
			  $imgconf = "CONF_213M256RW.png";
			  break;
    case "2158":
			  $imgtopo = "TOPO_213M256DRWBLACK.png";
			  $imgconf = "CONF_213M256DRWBLACK.png";
			  break;
	case "2158i":
			  $imgtopo = "TOPO_213M256DRWBLACK.png";
			  $imgconf = "CONF_226M256DRWBLACK.png";
			  break;
	case "2176x":
			  $imgtopo = "TOPO_226X256DRWXBLACK.png";
			  $imgconf = "CONF_226X256DRWXBLACK.png";
			  break;
	case "2158xx":
			  $imgtopo = "TOPO_226X256DRWXXBLACK.png";
			  $imgconf = "CONF_226X256DRWXXBLACK.png";
			  break;
	case "2197x":
			  $imgtopo = "TOPO_226X256RWX.png";
			  $imgconf = "CONF_226X256RWX.png";
			  break;
 	case "2157m":
			  $imgtopo = "TOPO_213M128RW.png";
			  $imgconf = "CONF_MONITOR15TP.png";
			  break;
    case "2159m":
			  $imgtopo = "TOPO_213M256RW.png";
			  $imgconf = "CONF_MONITOR15TP.png";
			  break;
    case "2158m":
			  $imgtopo = "TOPO_213M256DRWBLACK.png";
			  $imgconf = "CONF_MONITOR17.png";
			  break;
	case "2158im":
			  $imgtopo = "TOPO_213M256DRWBLACK.png";
			  $imgconf = "CONF_MONITOR17.png";
			  break;
	case "2210":
			  $imgtopo = "TOPO_306X512DRWXBLACK.png";
			  $imgconf = "CONF_306X512DRWXBLACK.png";
			  break;
	case "2211":
			  $imgtopo = "TOPO_524X512DRWXBLACK.png";
			  $imgconf = "CONF_524X512DRWXBLACK.png";
			  break;
    case "2237":
			  $imgtopo = "TOPO_I226X256DRWXBLACKBOX.png";
			  $imgconf = "CONF_226X256DRWXBLACK.png";
			  break;
	case "2252":
			  $imgtopo = "TOPO_226M128RWX.png";
			  $imgconf = "CONF_226M128RWX.png";
			  break;
	case "2252m":
			  $imgtopo = "TOPO_226M128RWX.png";
			  $imgconf = "CONF_MONITOR15.png";		  
	
	
  }

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
	font-weight: bold;
}
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 7; }
.style9 {font-family: Verdana, Arial, Helvetica, sans-serif;  font-size: small;}
.style10 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; }
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<? for($k = 0; $k < 3; $k++ ){ ?>
  <tr>
    <td height="330" align="center"><br />
<?  
 
 
 $lote_hex = strtoupper(dechex($lote_dec));
 $unidade = 100000 + $y;
 $unidade = substr($unidade, 1,6);
 
 $barcode  = "MX".$un_prod."L".$lote_hex."UN".$unidade;
 /* Default value */
if (!isset($output))  $output   = "png"; 
if (!isset($type))    $type     = "C128A";
if (!isset($width))   $width    = "260";
if (!isset($height))  $height   = "70";
if (!isset($xres))    $xres     = "1";
if (!isset($font))    $font     = "3";

if (!isset($drawtext))    $drawtext     = "on";
/*********************************/ 
									
if (isset($barcode) && strlen($barcode)>0) {    
  $style  = BCS_ALIGN_CENTER;					       
  $style |= ($output  == "png" ) ? BCS_IMAGE_PNG  : 0; 
  $style |= ($output  == "jpeg") ? BCS_IMAGE_JPEG : 0; 
  $style |= ($border  == "on"  ) ? BCS_BORDER 	  : 0; 
  $style |= ($drawtext== "on"  ) ? BCS_DRAW_TEXT  : 0; 
  $style |= ($stretchtext== "on" ) ? BCS_STRETCH_TEXT  : 0; 
  $style |= ($negative== "on"  ) ? BCS_REVERSE_COLOR  : 0; 
  
}
  		
  switch ($type)
  {
    case "I25":
			  $obj = new I25Object(250, 120, $style, $barcode);
			  break;
    case "C39":
			  $obj = new C39Object(250, 120, $style, $barcode);
			  break;
    case "C128A":
			  $obj = new C128AObject(250, 120, $style, $barcode);
			  break;
    case "C128B":
			  $obj = new C128BObject(250, 120, $style, $barcode);
			  break;
    case "C128C":
              $obj = new C128CObject(250, 120, $style, $barcode);
			  break;
	default:
			$obj = false;
  }
 	
	?>
 <table width="283" height="238" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><img src="images/<? echo $imgtopo; ?>" width="283" height="21" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><img src="image.php?code=<? echo $barcode ?>&style=<? echo $style ?>&type=<? echo $type ?>&width=<? echo $width ?>&height=<? echo $height ?>&xres=<? echo $xres ?>&font=<? echo $font ?>"></td>
      </tr>
      <tr>
        <td rowspan="2"><img src="images/LOGOMAXXPC.png" width="54" height="144" /></td>
        <td><img src="images/<? echo $imgconf; ?>" width="229" height="84" /></td>
      </tr>
      <tr>
        <td><img src="images/RODAPE.png" width="229" height="60" /></td>
      </tr>
    </table>
<br /></td>
    <td height="330" align="center"><br />
<?
 
 
 $lote_hex = strtoupper(dechex($lote_dec));
 $unidade = 100000 + $z;
 $unidade = substr($unidade, 1,6);
 
 $barcode  = "MX".$un_prod."L".$lote_hex."UN".$unidade;
 		/* Default value */
if (!isset($output))  $output   = "png"; 
if (!isset($type))    $type     = "C128A";
if (!isset($width))   $width    = "260";
if (!isset($height))  $height   = "70";
if (!isset($xres))    $xres     = "1";
if (!isset($font))    $font     = "3";

if (!isset($drawtext))    $drawtext     = "on";
/*********************************/ 
									
if (isset($barcode) && strlen($barcode)>0) {    
  $style  = BCS_ALIGN_CENTER;					       
  $style |= ($output  == "png" ) ? BCS_IMAGE_PNG  : 0; 
  $style |= ($output  == "jpeg") ? BCS_IMAGE_JPEG : 0; 
  $style |= ($border  == "on"  ) ? BCS_BORDER 	  : 0; 
  $style |= ($drawtext== "on"  ) ? BCS_DRAW_TEXT  : 0; 
  $style |= ($stretchtext== "on" ) ? BCS_STRETCH_TEXT  : 0; 
  $style |= ($negative== "on"  ) ? BCS_REVERSE_COLOR  : 0; 
  
}				  

  switch ($type)
  {
    case "I25":
			  $obj = new I25Object(250, 120, $style, $barcode);
			  break;
    case "C39":
			  $obj = new C39Object(250, 120, $style, $barcode);
			  break;
    case "C128A":
			  $obj = new C128AObject(250, 120, $style, $barcode);
			  break;
    case "C128B":
			  $obj = new C128BObject(250, 120, $style, $barcode);
			  break;
    case "C128C":
              $obj = new C128CObject(250, 120, $style, $barcode);
			  break;
	default:
			$obj = false;
  }
 
?>
 <table width="283" height="238" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2"><img src="images/<? echo $imgtopo; ?>" width="283" height="21" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><img src="image.php?code=<? echo $barcode ?>&style=<? echo $style ?>&type=<? echo $type ?>&width=<? echo $width ?>&height=<? echo $height ?>&xres=<? echo $xres ?>&font=<? echo $font ?>"></td>
      </tr>
      <tr>
        <td rowspan="2"><img src="images/LOGOMAXXPC.png" width="54" height="144" /></td>
        <td><img src="images/<? echo $imgconf; ?>" width="229" height="84" /></td>
      </tr>
      <tr>
        <td><img src="images/RODAPE.png" width="229" height="60" /></td>
      </tr>
    </table>
 <br></td>
  </tr>
  <?
$y=$y+1;
  $z=$z+1;
}?>
</table>
</body>
</html>
