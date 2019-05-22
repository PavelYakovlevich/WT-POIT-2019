<?php
    session_start();
    if(isset($_SESSION['captcha']) && !empty($_POST['captcha'])){
        if(md5($_POST['captcha']) == $_SESSION['captcha']){
            require_once('Mailer.php');
            if(mail($_POST['email'], $_POST['title'], $_POST['message'], ''))
                echo '<h1>Succes</h1>';
            else    
                echo '<h1>Send mail error</h1>';
        }
        else    
            echo 'Robot';
        session_abort();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>lab7</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="..\css\main.css">
</head>
<body>
        <form action="index.php" method="POST">
        <label for="email">Email</label>
</br>
            <input type="input" name="email">
</br>
            <label for="title">Заголовок письма</label>
</br>
            <input type="input" name="title">       
</br>
            <label>Сообщение</label>
</br>
            <textarea name="message">
            </textarea>
</br>       
            <img src="captcha.php" alt="captcha">
            <input type="input" name="captcha">
</br>
            <button type="submit">Отправить письмо</button>
        </form>
    </body>
</html>