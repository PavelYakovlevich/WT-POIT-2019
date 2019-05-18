<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>lab5</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="..\main.css">
</head>
<body>
    
</body>
</html>

<?php

    require('..\lab5-helper.php');
    
    $connection = SQL_Helper::sql_connect(HOST, USER, PASSWORD, DB);
    
    if($connection){
        $tables  = SQL_Helper::get_all_tables($connection); // names of all tables
        
        foreach($tables as $v){
            $struct = SQL_Helper::get_db_struct($connection, $v); // indexes of tables and their info
            SQL_Helper::print_table_struct($struct);

            echo HR;

            $result = sql_get_items($connection, $v);
            SQL_Helper::print_table_content($result);

            echo '<hr>';
        }

        mysqli_close($connection);
    }
    else{
        echo CERR;
    }

