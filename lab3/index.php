<!DOCTYPE html>

<html>
<head>
    <title>lab2</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "indexStyle.css">
</head>

<body>
    <h2>Вариант 4:</h2>
    <p id="task">Написать функцию, формирующую полный список файлов в указанном каталоге (включая подкаталоги) и считающую общий объём файлов. Имя каталога, в котором следует выполнять поиск, получать через веб-форму. Отобразить в табличном виде.</p>
    <form display="index.php" method="POST">
        <input id="choseDirr" type="file" name="file-path" webkitdirectory>
        <br>
        <h3>Введите имя дирректория</h3>
        <input id="nameOfDirr" type="text" name="fullPath">
        <input id="searchFiles" type="submit" name="search">
        <hr size="10" color="black">
    </form>
</body>
</html>

<?php

// Получает массив всех файлов в директории $directory

function getAllFiles($directory, &$resultArray, &$sizeOfFiles = 0)
{
	$fileList = scandir($directory);

	foreach($fileList as $item)
	{
		if ($item != '.' && $item != '..')
		{
			$path = $directory . '\\' . $item; 
			if (is_dir($path))
			{
				getAllFiles($path, $resultArray, $sizeOfFiles);
			}
			else 
			{
				$sizeOfFiles += filesize($path);
				array_push($resultArray, $path);
			}
		}
	}
}



if (!empty($_POST["fullPath"])) // Если строка для ввода непустая
{
    $mainDir = $_POST["fullPath"];
    if (is_dir($mainDir)) // Если введенный директорий существует
    {
        $fileArray = [];
        $sizeOfFiles = 0;
        getAllFiles($mainDir, $fileArray, $sizeOfFiles);

        echo '<table border="6" cellpadding="5" align="center">';
        echo '<th>Файл</th> <th>Размер</th>';

        foreach ($fileArray as $file)
        {
            echo '<tr>' . '<td id="file">' . $file . '</td>' . '<td id="fileSize">' . filesize($file) . '</td>' . '</tr>'; 
        }

        echo '<tr>' . '<td id="file">' . "Суммарный размер" . '</td>' . '<td id="fileSize">' . $sizeOfFiles . '</td>' . '</tr>'; 
        echo '</table>' ;
    } 
    else
    {
        echo '<p id="error"> Directory with name: ( ' . $mainDir . ' ) wasn`t found! </p>';
    }
}
else // Если строка пустая   
{
    echo '<p id="error"> Please, enter a path to input box </p>';
}

?>
