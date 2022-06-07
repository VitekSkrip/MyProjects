<?
  $mysql = new mysqli('localhost', 'root', 'root', 'gameviews-bd');
  //$mysql = new mysqli('localhost', 'viteksl9_game_db', 'KarapuZ23', 'viteksl9_game_db');
  $result = $mysql->query("SELECT * FROM games ORDER BY game_rating DESC");
    if (!empty($_POST["filter"])){
        
        if ($_POST["All"]){
            $result = $mysql->query("SELECT * FROM games ORDER BY game_rating DESC");
        }

        if (($_POST["Action"])) {
            $result = $mysql->query("SELECT * FROM games where game_cat='Action' ORDER BY game_rating DESC");
        }

        if ($_POST["Shooter"]){
            $result = $mysql->query("SELECT * FROM games where game_cat='Shooter' ORDER BY game_rating DESC");
        }

        if ($_POST["Racing"]){
            $result = $mysql->query("SELECT * FROM games where game_cat='Racing' ORDER BY game_rating DESC");
        }
        
        if ($_POST["Simulator"]){
            $result = $mysql->query("SELECT * FROM games where game_cat='Simulator' ORDER BY game_rating DESC");
        }
    }
    
?>
