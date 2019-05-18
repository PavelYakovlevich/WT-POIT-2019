<?php
    require_once("Registration.php");    
    require_once("Page-Builder.php");

    session_start();

    if (isset($_GET['hidden-exit'])){
        unset($_SESSION["login"]);
        unset($_SESSION["password"]);
    }

    $logged = isset($_SESSION["login"]) && isset($_SESSION["password"]);
    
    if(!$logged){ // если пользователь не зареган, то зарегестировать 
        if(isset($_GET["login"]) && isset($_GET["password"])){
            $login = $_GET["login"];
            $passwordString = $_GET["password"];
            if(Register::check_login('/[A-Za-z\d_\s]{2,}/', $login) && Register::check_password('/[A-Za-z\d@$]{5,}/', $passwordString)) {
                $_SESSION["login"] = $login;
                $_SESSION["password"] = sha1($passwordString);
                $logged = true;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" href="main.css">
</head>
    
<body>


<?php
    
    if(!$logged){ // Если пользователь не зарегестрирован
        echo PageBuilder::get_register_form("", "");
    }
    else{ //если пользователь зареган
        echo "Hello, " . $_SESSION["login"];
        echo PageBuilder::get_logged_form();
    }

    echo '</body></html>';
