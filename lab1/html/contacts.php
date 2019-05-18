<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{PAGE_TITLE}}</title>
    <link rel="stylesheet" href="contacts.css">
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

    <article>
        <div class="inner-article">
            <h1>Свяжитесь с нами</h1>
            <section>
                <h2>ГОЛОВНОЙ ОФИС В БЕЛАРУСИ</h2>
                <p>Мы работаем круглосуточно</p>
                <p>Текущее время: {TIME}</p>
                <p>ул. Академика Купревича, 1-1-110</p>
                <p>220141 Минск, Беларусь</p>
                <p>{COMPANY_NAME}</p>
                <p>УНП 101546673</p>
            </section>
        </div>
    </article>

    <footer>
        <div class="inner-footer">
            <p> &copy; Health care service. Все права защищены</p>
        </div>
    </footer>
</body>
</html>