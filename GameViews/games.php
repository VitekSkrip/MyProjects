	<? include("templates/header.php"); ?>

	<!-- Page info section -->
	<section class="page-info-section set-bg" data-setbg="img/slider-3.jpg">
		<div class="pi-content">
			<div class="container">
				<div class="row">
					<div class="col-xl-5 col-lg-6 text-white">
						<h2>Каталог <span>Игр</span></h2>
						<p><h4>Выбирайте игры, которые вас интересуют</h4></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page info section -->
	

	<!-- Page section -->
	<section class="page-section review-page spad">
		<div class="container">
			<form method="post" name="form">
				<ul class="filt">
					<li><h4><input name="All" type="radio">Все</h4></li>	
					<li><h4><input name="Action" type="radio">Action</h4></li>
					<li><h4><input name="Shooter" type="radio">Shooter</h4></li>
					<li><h4><input name="Simulator" type="radio">Simulator</h4></li>
					<li><h4><input name="Racing" type="radio">Racing</h4></li>
					<input class="btn button-success" name="filter" type="submit" value="Подобрать"/>
				</ul>
			</form>
			<div class="row">
				<?
				include "FilterGames/filter.php";
    			while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
				{
				?>
				<div class="col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="<? print $row['game_image'];?>">
							<div class="score yellow"><?print $row['game_rating'];?></div>
						</div>
						<div class="review-text">
							<h4><a href="single-game.php?game_id=<?print $row['game_id'];?>"><?print $row['game_name']?></a></h4>
							<p><?print $row['game_desc']?></p>
						</div>
					</div>
				</div>
				<?}?>
			</div>
		</div>
	</section>
	<!-- Page section end -->

	<? include("templates/footer.php"); ?>
	