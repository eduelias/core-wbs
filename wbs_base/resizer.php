<?php	
// File and new size
//$imgfile = 'smp.jpg';
//$percent = 0.2;
header('Content-type: image/jpeg');

list($width, $height) = getimagesize($imgfile);

if ($width <= 100){
	if ($height <= 100){$percent = 1;}
	if ($height >= 100 and $height < 200){$percent = 0.6;}
	if ($height >= 200 and $height < 300){$percent = 0.5;}
	if ($height >= 300 and $height < 400){$percent = 0.3;}
	if ($height >= 400 and $height < 500){$percent = 0.2;}
	if ($height >= 500){$percent = 0.2;}
}
if ($width >= 100 and $width < 200){

	if ($height <= 100){$percent = 0.7;}
	if ($height >= 100 and $height < 200){$percent = 0.6;}
	if ($height >= 200 and $height < 300){$percent = 0.5;}
	if ($height >= 300 and $height < 400){$percent = 0.3;}
	if ($height >= 400 and $height < 500){$percent = 0.2;}
	if ($height >= 500){$percent = 0.2;}
}
if ($width >= 200 and $width < 300){
	
	if ($height <= 100){$percent = 0.6;}
	if ($height >= 100 and $height < 200){$percent = 0.5;}
	if ($height >= 200 and $height < 300){$percent = 0.5;}
	if ($height >= 300 and $height < 400){$percent = 0.3;}
	if ($height >= 400 and $height < 500){$percent = 0.2;}
	if ($height >= 500){$percent = 0.2;}
}
if ($width >= 300 and $width < 400) {
	if ($height <= 100){$percent = 0.5;}
	if ($height >= 100 and $height < 200){$percent = 0.4;}
	if ($height >= 200 and $height < 300){$percent = 0.4;}
	if ($height >= 300 and $height < 400){$percent = 0.3;}
	if ($height >= 400 and $height < 500){$percent = 0.2;}
	if ($height >= 500){$percent = 0.2;}
}
if ($width >= 400 and $width < 500){
	if ($height <= 100){$percent = 0.4;}
	if ($height >= 100 and $height < 200){$percent = 0.4;}
	if ($height >= 200 and $height < 300){$percent = 0.3;}
	if ($height >= 300 and $height < 400){$percent = 0.3;}
	if ($height >= 400 and $height < 500){$percent = 0.2;}
	if ($height >= 500){$percent = 0.2;}

}
if ($width >= 500){
	if ($height <= 100){$percent = 0.4;}
	if ($height >= 100 and $height < 200){$percent = 0.4;}
	if ($height >= 200 and $height < 300){$percent = 0.3;}
	if ($height >= 300 and $height < 400){$percent = 0.3;}
	if ($height >= 400 and $height < 500){$percent = 0.2;}
	if ($height >= 500){$percent = 0.2;}

}


$newwidth = $width * $percent;
$newheight = $height * $percent;

$thumb = ImageCreateTrueColor($newwidth,$newheight);
$source = imagecreatefromjpeg($imgfile);

imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

imagejpeg($thumb);
?>