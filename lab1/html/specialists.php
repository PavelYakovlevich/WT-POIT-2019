<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Health care spec.</title>
    <link rel="stylesheet" href="../css/specialists.css" />
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
                Highlight();?>
            >Консультация</a> 
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

    <section>
        <div class="spealist">
            <img src="../images/doctor1.jpg" alt="doctor">
            <div class="spealist-info">
                <h3>Васильев О.М</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci necessitatibus repellendus voluptatibus eius accusamus tenetur libero mollitia asperiores dolore culpa sint, porro ratione fuga. Odit deserunt culpa ut minus iure.</p>
                <a href = "../images/doctor1.jpg">подробнее...</a>
            </div>
        </div>
        <div class="spealist">
            <img src="../images/doctor2.jpg" alt="doctor">
            <div class="spealist-info">
                <h3>Иванова И.И</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci necessitatibus repellendus voluptatibus eius accusamus tenetur libero mollitia asperiores dolore culpa sint, porro ratione fuga. Odit deserunt culpa ut minus iure.</p>
                <a href = "../images/doctor2.jpg">подробнее...</a>
            </div>
        </div>
        <div class="spealist">
            <img src="../images/doctor3.jpg" alt="doctor">
            <div class="spealist-info">
                <h3>Балунда Я.Б</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci necessitatibus repellendus voluptatibus eius accusamus tenetur libero mollitia asperiores dolore culpa sint, porro ratione fuga. Odit deserunt culpa ut minus iure.</p>
                <a href = "../images/doctor3.jpg">подробнее...</a>
            </div>
        </div>
        <div class="spealist">
            <img src="../images/doctor4.jpg" alt="doctor">
            <div class="spealist-info">
                <h3>Иванов П.О</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci necessitatibus repellendus voluptatibus eius accusamus tenetur libero mollitia asperiores dolore culpa sint, porro ratione fuga. Odit deserunt culpa ut minus iure.</p>
                <a href = "../images/doctor4.jpg">подробнее...</a> 
            </div>
        </div>
        <div class="spealist">
            <img src="../images/doctor5.jpg" alt="doctor">
            <div class="spealist-info">
                <h3>Елагова И.И</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci necessitatibus repellendus voluptatibus eius accusamus tenetur libero mollitia asperiores dolore culpa sint, porro ratione fuga. Odit deserunt culpa ut minus iure.</p>
                <a href = "../images/doctor5.jpg">подробнее...</a>
            </div>
        </div>
    </section>
    <footer>
        <div class="inner-footer">
            <p> &copy; Health care service. Все права защищены</p>
        </div>
    </footer>
    
</body>
</html>