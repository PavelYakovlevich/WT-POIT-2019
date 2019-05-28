<?php
define('USER', 'root');
define('DB', 'lab8');
define('PASSWORD', 'admin');
define('HOST', '127.0.0.1');
define('TABLE_NAME', 'users_os');

function getOS($user_agent) { 
    $os_platform  = "Unknown OS Platform";
    $os_array     = array(

                          '/windows nt 10/i'      =>  'Windows 10',
                          '/windows nt 6.3/i'     =>  'Windows 8.1',
                          '/windows nt 6.2/i'     =>  'Windows 8',
                          '/windows nt 6.1/i'     =>  'Windows 7',
                          '/windows nt 6.0/i'     =>  'Windows Vista',
                          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                          '/windows nt 5.1/i'     =>  'Windows XP',
                          '/windows xp/i'         =>  'Windows XP',
                          '/windows nt 5.0/i'     =>  'Windows 2000',
                          '/windows me/i'         =>  'Windows ME',
                          '/win98/i'              =>  'Windows 98',
                          '/win95/i'              =>  'Windows 95',
                          '/win16/i'              =>  'Windows 3.11',
                          '/macintosh|mac os x/i' =>  'Mac OS X',
                          '/mac_powerpc/i'        =>  'Mac OS 9',
                          '/linux/i'              =>  'Linux',
                          '/ubuntu/i'             =>  'Ubuntu',
                          '/iphone/i'             =>  'iPhone',
                          '/ipod/i'               =>  'iPod',
                          '/ipad/i'               =>  'iPad',
                          '/android/i'            =>  'Android',
                          '/blackberry/i'         =>  'BlackBerry',
                          '/webos/i'              =>  'Mobile'
                    
                        );

    foreach ($os_array as $regex => $value)
        if (preg_match($regex, $user_agent))
            $os_platform = $value;

    return $os_platform;
}

class StatHelper{
    public $connection = null;
    function connect($host, $user, $password, $db){
        $this->connection = mysqli_connect($host, $user, $password, $db);
    }

    static function print_table($table){
        echo  '<table>
                <tr>
                    <td>
                        OS_name
                    </td>
                    <td>
                        use_count
                    </td>
                </tr>';
        foreach($table as $os){
            echo    '<tr>
                        <td>' . 
                            $os[1] .
                        '</td>
                        <td>' . 
                            $os[2] .
                        '</td>
                    </tr>';
        }
        echo  '</table>';
    } 

    function get_table($table_name){
        $result = mysqli_query($this->connection, 'SELECT * FROM ' . $table_name);
        return mysqli_fetch_all($result);
    }

    function refresh_stats($table_name, $os_name){
        $str = "SELECT use_count FROM ". $table_name . " WHERE os_name = '" . $os_name . "'";
        $result = mysqli_fetch_assoc(mysqli_query($this->connection, $str));
        if($result){
            $use_count = $result['use_count'];
            return mysqli_query($this->connection, "UPDATE " . TABLE_NAME . " SET  `use_count` = " . ++$use_count . " WHERE `os_name` = '". $os_name . "'");
        } else {
            return $this->add_os($os_name);
        }
    }

    function add_os($os_name){
        return mysqli_query($this->connection, 'INSERT INTO `users_os` (`id`, `os_name`, `use_count`, `some_var`) VALUES (NULL, \'' . $os_name . '\', 1, 1)');
    }
}
