<?php

    class _2kyMailer{

        public static function send_mails(array $emails, string $title, string $message, string $files){
            $users_emails = "";

            foreach($emails as $v){
                $users_emails .= $v . ', ';
            }

            $users_emails = substr($users_emails, 0, strlen($users_emails) - 2);
            $headers = "Content-type: text/plain; charset=UTF-8 \r\n"; 
            $headers .= "From: feedback <pipi757757@mail.ru>\r\n"; 
            $headers .= 'X-Mailer: PHP/' . phpversion() . "\n\r"; 
            $headers .="Subject: " . $title;
            return mail($users_emails, $title, $message, $headers);
        }
    } 