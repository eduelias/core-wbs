<?php
// File and new size
//$imgfile = 'smp.jpg';
//$percent = 0.2;
header('Content-type: image/jpeg');

list($width, $height) = getimagesize($imgfile);
$newwidth = $width * $percent;
$newheight = $height * $percent;

$thumb = ImageCreateTrueColor($newwidth,$newheight);
$source = imagecreatefromjpeg($imgfile);

imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

imagejpeg($thumb);
?>