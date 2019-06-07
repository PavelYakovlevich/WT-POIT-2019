<?php

class Captcha{

	function __construct(){
	}

	public static function generate_code(){    
		$chars = 'abdefhknrstyz23456789'; 
		$length = rand(4, 7); 
		$numChars = strlen($chars); 
		$str = '';

		for ($i = 0; $i < $length; $i++) {
			$str .= substr($chars, rand(1, $numChars) - 1, 1);
		} 

		$array_mix = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
		srand ((float)microtime() * 1000000);
		shuffle ($array_mix);

		return implode("", $array_mix);
	}

	public static function generate_captcha(){

		$randomValue = rand(1000, 9999);
		$_SESSION['captcha'] = md5($randomValue);
		
		$im = imagecreatetruecolor(150, 50);
		
		$white = imagecolorallocate($im, 255, 255, 255);
		$grey = imagecolorallocate($im, 128, 128, 128);
		$black = imagecolorallocate($im, 0, 0, 0);
		
		if(imagefilledrectangle($im, 0, 0, 100, 35, $black)){
		
			$font = '..\font\16850.ttf';
			
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
	}
}
