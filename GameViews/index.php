	<? include("templates/header.php"); ?>

	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="img/slider-1.jpg">
				<div class="hs-text">
					<div class="container">
						<h2>Отзывы об<span> Играх </span>Только Здесь</h2>
						<ul class="checks">
							<li>Читайте отзывы</li>
							<li>Находите игры на свой вкус</a></li>
							<li>И погружайтесь в эпичный виртуальный мир</li>
						</ul>
						<a href="contact.php" class="site-btn">О нас</a>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="img/slider-2.jpg">
				<div class="hs-text">
					<div class="container">
						<h2>Отзывы об<span> Играх </span>Только Здесь</h2>
						<ul class="checks">
							<li>Читайте отзывы</li>
							<li>Находите игры на свой вкус</a></li>
							<li>И погружайтесь в эпичный виртуальный мир</li>
						</ul>
						<a href="contact.php" class="site-btn">О нас</a>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="img/slider-3.jpg">
				<div class="hs-text">
					<div class="container">
						<h2>Отзывы об<span> Играх </span>Только Здесь</h2>
						<ul>
							<li>Читайте отзывы</li>
							<li>Находите игры на свой вкус</a></li>
							<li>И погружайтесь в эпичный виртуальный мир</li>
						</ul>
						<a href="contact.php" class="site-btn">О нас</a>
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
				<h2>Популярное</h2>
			</div>
			<div class="row">
				<?
				$mysql = new mysqli('localhost', 'root', 'root', 'gameviews-bd');
    			//$mysql = new mysqli('localhost', 'viteksl9_game_db', 'KarapuZ23', 'viteksl9_game_db');
				$result = $mysql->query("SELECT * FROM games ORDER BY game_rating DESC LIMIT 4");
    			while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
				?>
				<div class="col-lg-3 col-md-6">
					<div class="review-item brd">
						<div class="review-cover set-bg" data-setbg="<?print $row['game_image'];?>">
							<div class="score yellow"><?print $row['game_rating']?></div>
							<!-- <div class="rgi-extra">
								<div class="rgi-heart"><img src="img/icons/heart.png" alt=""></div>
							</div> -->
						</div>
					</div>
					<div class="review-text">
						<h5><a href="single-game.php?game_id=<?print $row['game_id'];?>"><?print $row['game_name']?></a></h5>
						<p><?print $row['game_desc']?></p>
					</div>
				</div>
			<?}?>
			</div>
			<div class="text-center pt-4">
				<button class="site-btn btn-sm"><a style="color:#131313" href="games.php">Больше</a></button>
			</div>
		</div>
	</section>
	<!-- Review section end -->
	
	<? include("templates/footer.php"); ?>