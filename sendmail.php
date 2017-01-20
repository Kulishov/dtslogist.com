<?php

    function clean($string) {
       $string = str_replace(' ', '-', $string);
       $string = preg_replace('/[^A-Za-z0-9\p{Cyrillic}\-\+\.\,]/', '', $string);

       return preg_replace('/-+/', '-', $string);
    }

    $result = 0;

    if(
        isset($_POST['name']) and
        isset($_POST['contact']) and
        isset($_POST['message']) and
        $_POST['name'] and
        $_POST['contact'] and
        $_POST['message']
    ){
        $to = "skoromny@gmail.com";

        $subject = "DTS Logistic. Заявка";
        $message = "Клиент: ".clean($_POST['name']);
        $message .= '<br>';
        $message .= "Контакты: ".clean($_POST['contact']);
        $message .= '<br>';
        $message .= "Сообщение: ".clean($_POST['message']);

        $headers = "From: no-replay@dtsmain.com\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";

        $result = mail($to,$subject,$message,$headers);
    }

    if(isset($_POST['language']) and $_POST['language'] == 'en'){
        header('Location:/en/?r='.$result);
        die;
    } else {
        header('Location:/?r='.$result);
        die;
    }
?>