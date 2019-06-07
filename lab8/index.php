
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>lab8</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
</head>
<body>
    <h1> Статистика </h1>



<?php

    require_once('./MainFunctions.php');
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    // $user_os = getOS($user_agent);
    $user_os = 'Kostya Hitov';
    $stat_helper = new StatHelper();
    $stat_helper->connect(HOST, USER, PASSWORD, DB);
    $stat_helper->refresh_stats(TABLE_NAME, $user_os);
    $table = $stat_helper->get_table(TABLE_NAME);
    StatHelper::print_table($table);
    echo '</body></html>';

