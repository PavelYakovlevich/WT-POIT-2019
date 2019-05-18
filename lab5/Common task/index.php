<?php
    require('..\lab5-helper.php');

    $connection = mysqli_connect(HOST, USER, PASSWORD, DB);

    if ($connection){
            mysqli_query($connection, 'SET CHARACTER SET "UTF8"');
            mysqli_query($connection, 'SET NAMES "UTF8"');
            sql_get_items($connection, 'registration', '*', "id", 'ASC');
            // sql_join($connection);

            mysqli_close($connection);
    }
    else    
        echo '<p>Connection Error</p>'; 