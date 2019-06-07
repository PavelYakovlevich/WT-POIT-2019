<?php
	session_start();
	
			$randomValue = rand(1000, 9999);
			$_SESSION['captcha'] = md5($randomValue);
		 
			$im = imagecreatetruecolor(150, 50);
		 
			$white = imagecolorallocate($im, 255, 255, 255);
			$grey = imagecolorallocate($im, 128, 128, 128);
			$black = imagecolorallocate($im, 0, 0, 0);
		 
			if(imagefilledrectangle($im, 0, 0, 100, 35, $black)){
		 
				$font = dirname(__FILE__) . '\..\font\16850.ttf';
				imagettftext($im, 35, 0, 0, 50, $grey, $font, $randomValue);
			
				header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				header("Cache-Control: no-store, no-cache, must-revalidate");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");
			
				header ("Content-type: image/gif");
				imagegif($im);
				imagedestroy($im);
			}