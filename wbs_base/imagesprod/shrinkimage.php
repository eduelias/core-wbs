<?

/*
 * This script is copyright PHPGarage.com (On Line Construction Inc.). It may be used,
 * changed, and distributed freely as long as this message and/or some type of recognition
 * is given to PHPGarage.com or On Line Construction Inc.
 * 
 * http://www.phpgarage.com
 * http://www.onlineconstructioninc.com
 *  
 */

// Filename to store image as (no extention)
$FILENAME="img$codprod";

// Width to reszie image to (in pixels) 
$RESIZEWIDTH=400;

// Width to reszie image to (in pixels) 
$RESIZEHEIGHT=400;

# the upload store directory (chmod 777)
$dir = "imagesprod";


$uploadpath=$dir."/";

// DO NOT EDIT BELOW HERE -----------------------------------------

include("function.php");

if($_FILES['image']['size']){
	if($_FILES['image']['type'] == "image/pjpeg"){
		$im = imagecreatefromjpeg($_FILES['image']['tmp_name']);
	}elseif($_FILES['image']['type'] == "image/x-png"){
		$im = imagecreatefrompng($_FILES['image']['tmp_name']);
	}elseif($_FILES['image']['type'] == "image/gif"){
		$im = imagecreatefromgif($_FILES['image']['tmp_name']);
	}
	if($im){
		if(file_exists($uploadpath."$FILENAME.jpg")){
			unlink($uploadpath."$FILENAME.jpg");
		}
    	#ResizeImage($im,$RESIZEWIDTH,$RESIZEHEIGHT,$FILENAME);
    	ImageDestroy ($im);
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
</head>
<body>

<br><br>

<img src="<? echo($FILENAME.".jpg?reload=".rand(0,999999)); ?>"><br><br>

<form enctype="multipart/form-data" method="post">
<b>Resize Image</b><br>
<input type="file" name="image" size="50"><br><br>
<input type="submit" value="Upload Photo">
</form> 

</body>
</html>
