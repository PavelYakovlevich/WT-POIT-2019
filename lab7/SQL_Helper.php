<?php

    define("HOSTNAME", "localhost");
    define("USER", "root");
    define("PASSWORD", "admin");
    define("DB", "lab7");    
    define("TABLE", "users");

    class SQL{

        private $connection;
        private $connected = false;

        public function __construct()
        {
        }

        public function isConnected(){
            return $this->connected;
        }

        public function connect($hostname, $user, $password, $db_string){
            if(!($this->connection = mysqli_connect($hostname, $user, $password, $db_string))){
                echo "shiiit";
                return false;
            }

            $this->connected = true;
            return $this->connected;
        }

        public function get_emails(string $table_name){
            if(!$this->connected) return false;

            $query_result = mysqli_query($this->connection, "SELECT email from " . $table_name);
            if(!$query_result) return false;

            $result = [];   
            $temp = mysqli_fetch_all($query_result);
            array_walk_recursive($temp, function($value, $index) use (&$result){
                $result[] = $value;
            });
            return $result;
        }
    }