<?php
    $game_id=$_GET['game_id'];
    $user_name = $_COOKIE["user"];
    
    $mysql = new mysqli('localhost', 'root', 'root', 'gameviews-bd');
   //$mysql = new mysqli('localhost', 'viteksl9_game_db', 'KarapuZ23', 'viteksl9_game_db');
    $user_id = $mysql->query("SELECT user_id FROM users WHERE login='$user_name' ");
    $user_id=mysqli_fetch_array($user_id, MYSQLI_ASSOC);
    $user_id=$user_id['user_id'];

    
    $mysql->query("DELETE FROM user_games WHERE user_id='$user_id' AND game_id='$game_id' ");

    $mysql->close();
    header('Location: /aboutUser.php');
?>