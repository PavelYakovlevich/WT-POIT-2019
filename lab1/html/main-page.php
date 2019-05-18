<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <title>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est laudantium dignissimos, sunt voluptas excepturi reiciendis similique doloribus, facere nostrum earum dolore. Illum cumque autem eos id labore et maiores numquam!    
    </title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" media="screen" href="../css/main-page.css" />
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
            <a href="consultations.php?consultation=true"               
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
    <h1>
        Health care service
    </h1>
    <article>
        <div class="inner-article">
            <p>Сервис предоставляет помощь в медицинском обслуживании.</p> 
        </div>
    </article>

    <div class="certificates">
        <p>Сервис польность сертифицирован</p>
        <ul>
            <li>
                <img src="../images/gost1.png" alt="certificate">
            </li>
            <li>
                <img src="../images/gost1.png" alt="certificate">
            </li>
            <li>
                <img src="../images/gost1.png" alt="certificate">
            </li>
            <li>
                <img src="../images/gost1.png" alt="certificate">
            </li>
        </ul>    
    </div>

    <footer>
        <div class="inner-footer">
            <p> &copy; Health care service. Все права защищены</p>
        </div>
    </footer>
</body>
</html>

