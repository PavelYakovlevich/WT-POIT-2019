<?php 

class Register{
    public static function check_password(string $pattern_str, string $pass_str){
        return preg_match($pattern_str, $pass_str);
    }
     
    public static function check_login(string $pattern_str, string $login_str){
        return preg_match($pattern_str, $login_str);
    }
}

