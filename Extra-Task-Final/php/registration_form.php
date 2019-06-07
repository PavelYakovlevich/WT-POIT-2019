<?php
    session_start();
    $user_registrated = false;
    if($_SESSION)
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            Extra-Task-Final
        </title>
        <link rel="stylesheet" href="../css/main.css">
    </head>
    <body>
        <div id="root">
               
<?php

    if(!$user_registrated){
        echo '    
                <form method="GET" action="./index.php">
                        <label class="login-label">Логин</label>  
                        <input type="text" placeholder="login" class="login-input" name="login" id="login">
                        <label class="password-label">Пароль</label>
                        <input type="password" placeholder="password" class="password-input" name="password" id="password">  
                        <img src="./captcha.php" alt="captcha">
                        <input type="text" placeholder="captcha" class="captcha-input" name="captcha" id="captcha">
                        <button class="registartion-end-button" type="submit" id="registartion-end-button" disabled="true">Зарегистрироваться</button>
                </form>';
            
    } else{
        echo '<h1>You have been registred</h1>';
    }

    echo '   
        </div>
    </body>
    <script src="../js/registration.js"></script>
</html>';
