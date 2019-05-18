<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <link rel="stylesheet" media="screen" href="../css/chat.css" />
</head>
<body>
    <?php
        function Highlight()
        {
            echo " style =\"background-color: pink; color: white;\"";
        }

    ?>
    <div class="page-top">
        <header>
            <div class="logo-pict">
                <img src="../images/logo-pict.png" id="logo-pict">
            </div>
            <p> | </p>
            <div class="">
                <p> Health care </p>
            </div>
        </header>
        <nav class="nav-bar">
            <a href="main-page.php?main=true" 
            <?php         
                if (isset($_GET['main']))
                Highlight();?>
            >Главная</a> 
            <p> | </p> 
            <a href="specialists.php?specialists=true"               
            <?php         
                if (isset($_GET['specialists']))
                Highlight();?>>Специалисты</a> 
            <p> | </p>
            <a href="consultation.php?consultation=true"               
            <?php         
                if (isset($_GET['consultation']))
                Highlight();?>>Консультация</a> 
            <p> | </p>
            <a href="contacts.php?contacts=true"               
            <?php         
                if (isset($_GET['contacts']))
                Highlight();?>>Контакты</a> 
            <p> | </p>
            <a href="chat.php?feedback=true"               
            <?php         
                if (isset($_GET['feedback']))
                Highlight();?>>Отзывы</a> 
        </nav>
    </div>
    <article>
        <form>
            <textarea name="chat"></textarea>
            <div class="user-inputpart">
                <input name="user-message" type="text">
                <button name="send-message" type="submit">Отправить</button>
            </div>
        </form>
    </article>
    <footer>
        <div class="inner-footer">
            <p> &copy; Health care service. Все права защищены</p>
        </div>
    </footer>    
</body>
</html>