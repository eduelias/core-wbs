<? 
 define (__TRACE_ENABLED__, false);
 define (__DEBUG_ENABLED__, false);
								   
 require("barcode.php");		   
 require("i25object.php");
 require("c39object.php");
 require("c128aobject.php");
 require("c128bobject.php");
 require("c128cobject.php");
 
    

 
 $barcode1  = "7890100464924";
 $barcode2  = "CX-2167";
 $barcode3  = "7898426830584";
 $barcode4  = "7898426834087";
 $barcode5  = "7898426832380";
 
 
 
 
 /* Default value */
if (!isset($output))  $output   = "png"; 
if (!isset($type))    $type     = "C128A";
if (!isset($width))   $width    = "260";
if (!isset($height))  $height   = "80";
if (!isset($xres))    $xres     = "1";
if (!isset($font))    $font     = "14";

if (!isset($drawtext))    $drawtext     = "on";
/*********************************/ 
									
#if (isset($barcode) && strlen($barcode)>0) {    
  $style  = BCS_ALIGN_CENTER;					       
  $style |= ($output  == "png" ) ? BCS_IMAGE_PNG  : 0; 
  $style |= ($output  == "jpeg") ? BCS_IMAGE_JPEG : 0; 
  $style |= ($border  == "on"  ) ? BCS_BORDER 	  : 0; 
  $style |= ($drawtext== "on"  ) ? BCS_DRAW_TEXT  : 0; 
  $style |= ($stretchtext== "on" ) ? BCS_STRETCH_TEXT  : 0; 
  $style |= ($negative== "on"  ) ? BCS_REVERSE_COLOR  : 0; 
  
#}
  		
  switch ($type)
  {
    case "I25":
			  $obj = new I25Object(250, 120, $style, $barcode);
			  break;
    case "C39":
			  $obj = new C39Object(250, 120, $style, $barcode);
			  break;
    case "C128A":
			  $obj = new C128AObject(250, 120, $style, $barcode1);
			  $obj = new C128AObject(250, 120, $style, $barcode2);
			  $obj = new C128AObject(250, 120, $style, $barcode3);
			  $obj = new C128AObject(250, 120, $style, $barcode4);
			  $obj = new C128AObject(250, 120, $style, $barcode5);
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
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<table width="200" border="0" cellspacing="60">
  <tr>
    <td align="center"><img src="images/grupoipa_orc.gif" width="139" height="59" /></td>
  </tr>
  <tr>
    <td align="center"><span class="style1">N&Uacute;MERO DE S&Eacute;RIE </span><br />
    <img src="image.php?code=<? echo $barcode1 ?>&amp;style=<? echo $style ?>&amp;type=<? echo $type ?>&amp;width=<? echo $width ?>&amp;height=<? echo $height ?>&amp;xres=<? echo $xres ?>&amp;font=<? echo $font ?>" /></td>
  </tr>
</table>
</body>
</html>
