<?php
include ("commentaries.php")
?>

<? if ($_COOKIE != NULL):?>
<div class="comment-form-warp">
    <h4 class="comment-title">Оставьте свой отзыв</h4>
    <form class="comment-form" method="POST" action="single-game.php?game_id=<?print $game_id;?>">  
        <div class="row">
            <div class="col-lg-12">
                <input type="hidden" name="game_id" value="<?=$game_id?>">
                <textarea type="text" name="review"></textarea>
                <input class="btn btn-success" type="submit" name="goComment" value="Отправить">
            </div>
        </div>
    </form>
</div>
<? endif;?>
