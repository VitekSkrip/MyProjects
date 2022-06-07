<?php
    $login = filter_var(($_POST['login']),FILTER_SANITIZE_STRING);
    $password = filter_var(($_POST['password']),FILTER_SANITIZE_STRING);

    $password = md5($password."aasdtggdf31");

    $mysql = new mysqli('localhost', 'root', 'root', 'gameviews-bd');
    //$mysql = new mysqli('localhost', 'viteksl9_game_db', 'KarapuZ23', 'viteksl9_game_db');
    $result = $mysql->query("SELECT * FROM users WHERE login='$login' AND password='$password' ");
    $user = $result->fetch_assoc();
    if (count($user)==0) {
        ?>
        Нет пользователя!
       <? exit();
    }
    setcookie('user', $user['login'], time() + 3600, "/");

    $mysql->close();
    header('Location: /');

?>