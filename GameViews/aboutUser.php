<? include("templates/header.php"); 
	$mysql = new mysqli('localhost', 'root', 'root', 'gameviews-bd');
	//$mysql = new mysqli('localhost', 'viteksl9_game_db', 'KarapuZ23', 'viteksl9_game_db');
	$login = $_COOKIE['user'];
	$user_id = $mysql->query("SELECT user_id FROM users WHERE login='$login' ");
    $user_id=mysqli_fetch_array($user_id, MYSQLI_ASSOC);
    $user_id=$user_id['user_id'];
	$res = $mysql->query("SELECT * FROM users WHERE login='$login' ");
	$raw=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!-- Hero section -->
<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="img/slider-1.jpg">
				<div class="hs-text">
					<div class="container">
						<h2>Информация о пользователе</h2>
						<div class="ph">
							<img src="photo/1.jpg">
						</div>
						<ul class="check">
							<li>Логин: <span style="color:#ffb320"><?=$_COOKIE['user'];?></span></li>
							<li>Почта: <span style="color:#ffb320"><? print $raw['email'];?></span></li>
							<li>Дата регистрации: <span style="color:#ffb320"><? print $raw['date_reg'];?></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Review section -->
	<section class="review-section spad">
		<div class="container">
			<div class="section-title">
				<h2>Избранное</h2>
			</div>
			<div class="row">
				<?
				$mysql = new mysqli('localhost', 'root', 'root', 'gameviews-bd');
    			//$mysql = new mysqli('localhost', 'viteksl9_game_db', 'KarapuZ23', 'viteksl9_game_db');
				$result = $mysql->query("SELECT game_image, game_rating, game_name, game_desc FROM games INNER JOIN user_games ON games.game_id = user_games.game_id WHERE user_games.user_id='$user_id' ");
				while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
					$game_name = $row['game_name'];
					$res_for_id = $mysql->query("SELECT game_id FROM games WHERE game_name='$game_name' ");
					$row_for_id = mysqli_fetch_array($res_for_id, MYSQLI_ASSOC);
				?>
				<div class="col-lg-3 col-md-6">
					<div class="review-item">
							<div class="review-cover set-bg" data-setbg="<?print $row['game_image'];?>">
							<div class="score yellow"><?print $row['game_rating']?></div>
						</div>
						<div class="review-text">
							<h5><a href="single-game.php?game_id=<?print $row['game_id'];?>"><?print $row['game_name']?></a></h5>
							<p><?print $row['game_desc']?></p>
						</div>
						<h6 align="center" style="color:#FF0000"><a style="color:#FF0000" href="BasketManipulation/DelFrBasket.php?game_id=<?print $row_for_id['game_id'];?>">Удалить</a></h6>
					</div>
				</div>
				<?}?>
			</div>
		</div>
	</section>
	<!-- Review section end -->

<? include("templates/footer.php"); ?>