<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Some web page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/bootstrap-4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        <div id="root">
            
        
<?php

require_once('./footer_generator.php');
require_once('./header_generator.php');
Header_Generator::generate();
Footer_Generator::generate();

echo '
        </div>
            </body>
            <script scr="../js/bootstrap.min.js"></script>
        </html>
';