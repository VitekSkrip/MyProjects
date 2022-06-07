	<? include("templates/header.php"); ?>

	<?
		$game_id=$_GET['game_id'];
		$login = $_COOKIE['user'];
		$mysql = new mysqli('localhost', 'root', 'root', 'gameviews-bd');
    	//$mysql = new mysqli('localhost', 'viteksl9_game_db', 'KarapuZ23', 'viteksl9_game_db');
		$result = $mysql->query("SELECT * FROM games WHERE game_id='$game_id' ");
		$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
	?>

	<!-- Page info section -->
	<section class="page-info-section set-bg" data-setbg="img/page-top-bg/2.jpg">
		<div class="pi-content">
			<div class="container">
				<div class="row">
					<div class="col-xl-20 col-lg-20 text-white">
						<h2><? print $row['game_name'];?></h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page info section -->

	<!-- Page section -->
	<section class="page-section single-blog-page spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="blog-thumb set-bg" data-setbg="<?print $row['game_image'];?>">
					</div>
					<div class="blog-content">
						<h3><? print $row['game_name'];?></h3>
						<p><? print $row['game_desc_full']; ?></p>					
						
						<? if ($_COOKIE != NULL):?>
							<button style="background-color:#ff205f" class="site-btn btn-sm"><a style="color:#131313" href="BasketManipulation/addToBasket.php?game_id=<?print $row['game_id'];?>">В Избранное</a></button>
						<? endif; ?>																						
					</div>
					<? include ("DoComments/comments.php");
					$commentar = $mysql->query("SELECT * FROM game_review WHERE game_id='$game_id' ");
					$com = mysqli_fetch_array($commentar, MYSQLI_ASSOC);
					if(count($com) > 0): 
					?>
					<div class="comment-warp">
						<h4 class="comment-title">Отзывы об игре</h4>
						<ul class="comment-list">
							<?
							while ($row=mysqli_fetch_array($commentar, MYSQLI_ASSOC))
							{
							?>
							<li>
								<div class="comment">
									<div class="comment-avator set-bg" data-setbg="img/authors/1.jpg"></div>
									<div class="comment-content">
										<h5><? print $row['login'];?><span><? print $row['review_date'];?></span></h5>
										<p><? print $row['review'];?></p>
									</div>
								</div>
							</li>
							<?}?>
						</ul>
					</div>
					<? endif; ?>
				</div>	
			</div>
		</div>
	</section>
	<!-- Page section end -->

	<? include("templates/footer.php"); ?>