<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Helth care consult.</title>
    <link rel="stylesheet" href="../css/consultation.css">
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
    <div class="page-middle">
        <article>
            <form id="order-consult">
                <p>ФИО</p>
                <input placeholder="Имя" name="client" type="text">

                <p>Врач</p>
                <select>
                    <option>Васильев О.М</option>
                    <option>Иванова И.И</option>
                    <option>Балунда Я.Б</option>
                    <option>Иванов П.О</option>
                    <option>Елагова И.И</option>
                </select>

                <p>Дата</p>
                <input placeholder="Дата" name="consultation-date" type="text">

                <br>

                <button name="order-consultation" type="submit">
                    <img src="../images/order-consult.png">
                    <p>Записать на прием</p>
                </button>
            </form>
        </article>
        <div class="sidebar">
            <p id="current-date"></p>
            <script type="text/javascript">
                var now = new Date();
                var element = document.getElementById("current-date");
                element.innerHTML = now;
                document   
            </script>
        </div>
    </div>

    <footer>
        <div class="inner-footer">
            <p> &copy; Health care service. Все права защищены</p>
        </div>
    </footer>
</body>
</html>