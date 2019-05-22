<?php
	session_start();
	// создаем случайное число и сохраняем в сессии
	$randomValue = rand(1000, 9999);
	$_SESSION['captcha'] = md5($randomValue);
 
	//создаем изображение
	$im = imagecreatetruecolor(150, 50);
 
	//цвета:
	$white = imagecolorallocate($im, 255, 255, 255);
	$grey = imagecolorallocate($im, 128, 128, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
 
	if(imagefilledrectangle($im, 0, 0, 100, 35, $black)){
 
		//путь к шрифту:
		
		$font = dirname(__FILE__) . '\16850.ttf';
		
		//рисуем текст:
		imagettftext($im, 35, 0, 0, 50, $grey, $font, $randomValue);
	
		// imagettftext($im, 35, 0, 15, 26, $white, $font, $randomValue);
	
		// предотвращаем кэширование на стороне пользователя
		header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
	
		//отсылаем изображение браузеру
		header ("Content-type: image/gif");
		imagegif($im);
		imagedestroy($im);
	}