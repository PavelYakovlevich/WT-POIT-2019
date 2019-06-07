<?php
function cookie_show()
{

    echo $_COOKIE;
    $s = file_get_contents('cookies.txt');
    if ($s != '') {
        $words = explode(';', $s);


        echo "<table>

<tr>

<th>Name</th><th>Value</th><th>Delete</th>

</tr>";
        for ($i = 0; $i < count($words)-1; $i++) {



            echo "<tr>";
            echo "<th>" . $words[$i] . "</th>";
            echo "<th>" . $_COOKIE[$words[$i]] . "</th>";


            echo "<th><a href='http:/localhost:666/WT-POIT-2019/Work/lab6/lab6.php?name=" . $words[$i] . "'> удалить</a></th>";

            echo "</tr>";

        }
        echo "</table>";

    }
    else echo "List is empty";

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>COOKIE</title>
</head>
<body>
<form method="POST" >
    <p>Name of cookie</p>
    <p><input name="name" ></p>
    <p>Value of cookie</p>
    <p><input name="value" ></p>
    <p>Time alive</p>
    <p><input name="time" ></p>
    <p><input type="submit" value="Отправить"></p>
</form>
</body>
</html>

<?php

$file = fopen("cookies.txt",'a+');

    echo $_POST['name'] . '</br>';
    echo $_POST['value'] . '</br>';
    echo $_POST['time'] . '</br>';
if ((!empty($_POST['name'])) && (!empty($_POST['value'])) && (!empty($_POST['time']) ) ){

    $time = (int)$_POST['time'];

    
   if(($_POST['name'] !='') && ($_POST['value'] !='') && ($_POST['time'] !='') && ($time>0)){

       setcookie($_POST['name'],$_POST['value'],time()+(int)$_POST['time']);

       $s = file_get_contents('cookies.txt');
       $f=true;

           $words = explode(';', $s);

        //   print_r($words);

       for ($i=0;$i<count($words)-1;$i++) {


           if ($words[$i] === $_POST['name']) {

               $f = false;

           }
       }
           if ($f) {
               fwrite($file, $_POST['name'] . ';');
           }
       }
   else
       echo "Неверный ввод <br>";
}
 if (!empty($_GET['name'])){

    setcookie($_GET['name'],'',time()-3600);

     $s = file_get_contents('cookies.txt');

     $words = explode(';', $s);
     file_put_contents('cookies.txt', '');
     for ($i=0;$i<count($words)-1;$i++) {

        //  if ($words[$i] === $_GET['name']) {
        //      $words[$i]='';
        //       continue;
        //  }
         $words[$i].=';';
     }

     file_put_contents('cookies.txt', implode($words));


 }


 cookie_show();
?>