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

function ResizeImage($im,$maxwidth,$maxheight,$name){
	$width = imagesx($im);
	$height = imagesy($im);
	if(($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)){
		if($maxwidth && $width > $maxwidth){
			$widthratio = $maxwidth/$width;
			$RESIZEWIDTH=true;
		}
		if($maxheight && $height > $maxheight){
			$heightratio = $maxheight/$height;
			$RESIZEHEIGHT=true;
		}
		if($RESIZEWIDTH && $RESIZEHEIGHT){
			if($widthratio < $heightratio){
				$ratio = $widthratio;
			}else{
				$ratio = $heightratio;
			}
		}elseif($RESIZEWIDTH){
			$ratio = $widthratio;
		}elseif($RESIZEHEIGHT){
			$ratio = $heightratio;
		}
    	$newwidth = $width * $ratio;
        $newheight = $height * $ratio;
		if(function_exists("imagecopyresampled")){
      		$newim = imagecreatetruecolor($newwidth, $newheight);
      		imagecopyresampled($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		}else{
			$newim = imagecreate($newwidth, $newheight);
      		imagecopyresized($newim, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		}
        ImageJpeg ($newim,$name . ".jpg");
		ImageDestroy ($newim);
	}else{
		ImageJpeg ($im,$name . ".jpg");
	}
}

?>
