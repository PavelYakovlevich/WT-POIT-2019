<?php

	class Random{
	public function generate_code() 
	{    
		$chars = 'abdefhknrstyz23456789'; 
		$length = rand(4, 7); 
		$numChars = strlen($chars); 
		$str = '';

		for ($i = 0; $i < $length; $i++) {
			$str .= substr($chars, rand(1, $numChars) - 1, 1);
		} // Генерируем код

		// Перемешиваем, на всякий случай
		$array_mix = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
		srand ((float)microtime() * 1000000);
		shuffle ($array_mix);
		// Возвращаем полученный код
		return implode("", $array_mix);
	}
	}  
  