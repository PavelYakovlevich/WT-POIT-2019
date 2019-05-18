<?php
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title>lab7</title>
        <link rel="stylesheet" href="main.css">
    </head>

    <body>
        <form action="index.php" method="POST">
            <label for="title">Заголовок письма</label>
</br>
            <input type="input" name="title">
            
</br>

            <label>Сообщение</label>
</br>
            <textarea name="message">
            </textarea>
</br>       
            <!-- <label for="file-chose"></label>     
</br>
            <input type="file" multiple name="file-chose"> -->
</br>
            <button type="submit">Отправить письма</button>
        </form>
    </body>
</html>

<?php

    if((!empty($_POST["title"]) && !empty($_POST["message"]))){
        require_once("SQL_Helper.php");
        require_once("Mailer.php");
        $sql_helper = new SQL();
        $sql_helper->connect(HOSTNAME, USER, PASSWORD, DB);
        if($sql_helper->isConnected()){
            $emails_array = $sql_helper->get_emails(TABLE);
            _2kyMailer::send_mails($emails_array, $_POST["title"], $_POST["message"], "");
            echo "<h1> Success </h1>";
        }
        else    
            echo "<h1>Connection error</h1>";
    }

