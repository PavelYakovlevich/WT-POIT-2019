<?php    
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', 'admin');
    define('DB', 'lab5');
    define('HR', '______________________');
    define('CERR', 'Connection Error');

    function convert_to_simple_array($matrix){
        $result = [];
        array_walk_recursive($matrix, function ($item, $key) use (&$result) {
                $result[] = $item;    
            }
        );

        return $result;
    }

    class SQL_Helper{
        private $connection;
        public static $column_values = ["Field", "Type", "Null", "Key", "Default", "Extra"];

        public static function sql_connect(string $host, string $user, string $password, string $db){
            return mysqli_connect($host, $user, $password, $db);
        } 

        public static function get_all_tables($connection){
            if (!$connection) return false;

            $result = mysqli_query($connection, 'SHOW TABLES');

            return convert_to_simple_array(mysqli_fetch_all($result));
        }

        public static function get_db_struct($connection, $db){

            $sqli_result = mysqli_query($connection, 'SHOW COLUMNS FROM ' . $db);
            $keys = [];
            while($temp = mysqli_fetch_assoc($sqli_result))
                $keys[] = $temp;

            return $keys;
        }

        public static function print_table_content($table_info){
            if($table_info){
                echo '<table>';

                foreach($table_info[0] as $k => $v)
                    echo '<th>' . $k .  '</th>';

                
                foreach($table_info as $arr){
                    echo '<tr>';

                    foreach($arr as $v)
                        echo '<td class="content">' . $v . '</td>';

                    echo '</tr>';
                }

                echo '</table>';
                return true;
            }
            
            return false;
        }

        public static function print_table_struct($table_struct){
            if($table_struct){
                echo '<table>';

                foreach(SQL_Helper::$column_values as $v)
                    echo '<th>' . $v .  '</th>';

                foreach($table_struct as $arr){
                    echo '<tr>';
                    foreach($arr as $k => $v)
                        echo '<td class="'. $k .'">' . $v . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
                return true;
            }

            return false;
        }

    }

    function sql_get_items($connection, string $table, $value = '*', $sort_value = 0, $sort_type = 0){
        
        $sql_query_str = 'SELECT ' . $value . ' FROM ' . $table;
        
        if($sort_value)      
            $sql_query_str .= ' ORDER BY ' . $sort_value . ' ';
        
        if($sort_type)
            $sql_query_str .= $sort_type;


        $sql_query_str .= ';';
        
        $query_res = mysqli_query($connection, $sql_query_str);
        if (!$query_res) return false;

        sql_print_result($query_res);

        $result = [];
        while($temp = mysqli_fetch_assoc($query_res))
            $result[] = $temp;

        return $result;
    }

    function sql_print_result(&$result){
        
        $arr = mysqli_fetch_all($result);
        
        foreach($arr as $key => $v){
            foreach($v as $k => $value)
                echo $value .'</br>';
            echo HR . '</br>' . ' ' . '</br>';
        }
    }

    function sql_join($connection){

        $mysql_query_str = 'SELECT registration.name, articles.title FROM registration, articles WHERE articles.author_id = registration.id;';
        $result = mysqli_query($connection, $mysql_query_str);
        sql_print_result($result);
    }