<?php

    class Mailer{
        public static function send_mails($email, string $title, string $message, string $files){
            $headers = 'Content-type: text/html; charset=urf-8';
            return mail($email, $title, $message, $headers);
        }
    } 