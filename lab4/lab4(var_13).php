<<<<<<< HEAD

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>lab4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body>
    <h1>
        Вариант 13
    </h1>
    <p class="task-text">
        Дан длинный текст, в нём встречаются слова длиннее 7 символов! Если слово длиннее 7 символов, то необходимо: оставить первые 6 символа и добавить звёздочку. Остальные символы вырезаются. Шаблон: "я стану крутым программистом после БГУИРа" . Результат: " я стану крутым програм* после БГУИРа ". Текст вводить через форму.
    </p> 
    <div class="task-block">
        <p>Вводить строку тут !</p>
        <form display="lab4(var_13).php" method="POST">
            <input type="text" id="mainString" name="inputString">
            <input type="submit" id="btnMain" name="getResult">
        </form>
    </div>

    
</body>
</html>

<?php  
include "lab_helper.php";

if (!empty($_POST["inputString"])){
    $inputString = $_POST["inputString"]; 
    $helper = new Lab4Helper($inputString);    
    $outputString = $helper->transform_string() . '<br>';
    echo '<div class="result">' . '<em id="inputString">' .  $inputString . ' </em> => <em id="outputString">' . $outputString . '</em></div>';
    // echo preg_replace('/.{' . 7 . ',}/', 'prekol', $inputString);
}
else    
    echo "Please, enter a string";




=======

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>lab4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body>
    <h1>
        Вариант 13
    </h1>
    <p class="task-text">
        Дан длинный текст, в нём встречаются слова длиннее 7 символов! Если слово длиннее 7 символов, то необходимо: оставить первые 6 символа и добавить звёздочку. Остальные символы вырезаются. Шаблон: "я стану крутым программистом после БГУИРа" . Результат: " я стану крутым програм* после БГУИРа ". Текст вводить через форму.
    </p> 
    <div class="task-block">
        <p>Вводить строку тут !</p>
        <form display="lab4(var_13).php" method="POST">
            <input type="text" id="mainString" name="inputString">
            <input type="submit" id="btnMain" name="getResult">
        </form>
    </div>

    
</body>
</html>

<?php  
include "lab_helper.php";

if (!empty($_POST["inputString"])){
    $inputString = $_POST["inputString"]; 
    $helper = new Lab4Helper();    
    $outputString = $helper->transform_string($inputString) . '<br>';
    echo '<div class="result">' . '<em id="inputString">' .  $inputString . ' </em> => <em id="outputString">' . $outputString . '</em></div>';
}
else    
    echo "Please, enter a string";




>>>>>>> 362a365b32ce5c3226849f6a12acde5a3a935133
