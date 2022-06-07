<?php
$game_id = $_GET['game_id'];
$login = $_COOKIE['user'];
$errMsg = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment'])) {
    
    $review = trim($_POST['review']);

    if ($review === ''){
        array_push($errMsg, "Не заполнено поле");
    }else{
        $mysql = new mysqli('localhost', 'root', 'root', 'gameviews-bd');
        //$mysql = new mysqli('localhost', 'viteksl9_game_db', 'KarapuZ23', 'viteksl9_game_db');
        $mysql->query("INSERT INTO game_review (game_id, login, review) VALUES('$game_id', '$login', '$review')");
    }
}

?>