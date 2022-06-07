<?php
    $login = filter_var(($_POST['login']),FILTER_SANITIZE_STRING);
    $email = filter_var(($_POST['email']),FILTER_SANITIZE_STRING);
    $password = filter_var(($_POST['password']),FILTER_SANITIZE_STRING);
    $password_suc = filter_var(($_POST['password_suc']),FILTER_SANITIZE_STRING);

    if ($password == $password_suc)
    {
    $password = md5($password."aasdtggdf31");

    $mysql = new mysqli('localhost', 'root', 'root', 'gameviews-bd');
    //$mysql = new mysqli('localhost', 'viteksl9_game_db', 'KarapuZ23', 'viteksl9_game_db');
    $mysql->query("INSERT INTO users (login, email, password) VALUES('$login', '$email', '$password')");
    $mysql->close();
    header('Location: /');
    }
    else {
        print "Пароли не совпали!";
    }

?>