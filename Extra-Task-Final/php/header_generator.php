<?php

class Header_Generator{
    public static function generate(){
        echo '
            <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <ul>
                            <li><a href="./registration_form.php"> Регистрация </a></li>
                            <li><a> Статьи </a></li>
                        </ul>
                    </nav>
            </div>
        
        ';
    }    
}

