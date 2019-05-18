<?php 

class PageBuilder{
    public static function get_register_form(string $login, string $password){
        return 
        '<div class="register-form"><form action="index.php" method="GET">
        <h1>Регистрация</h1>
        <div class="login-block">
            <label>Login</label>
            <br>
            <input type="input" name="login" value="'. $login .'"> 
        </div>
        
        <br>

        <div class="password-block">
            <label>Password</label>
            <br>
            <input type="input" name="password" value="' . $password . '">
        </div>

        <br>

        <button type="submit">Зарегестрироваться</button>

        </form></div>';
    }

    public static function get_logged_form(){
        return 
        '<form action="index.php" method="GET">
            <button type="submit">Выйти</button>
            <br>
            <input type="hidden" name="hidden-exit" value="exit">
        </form>';
    }
}   