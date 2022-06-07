<!DOCTYPE html>
<html lang="ru">
<head>
	<?//header("Cache-control: no-cache")?>
	<title>GameViews</title>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="GameViews">
	<meta name="keywords" content="warrior, game, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a class="site-logo" href="index.php">
				<img src="img/logo.png" alt="">
			</a>
			<? if($_COOKIE['user'] == ''): ?>
			<div style="background-color:#1569c9" class="user-panel">
				<a style="color:#fff" href="#openModalSubmit">Вход</a>
				<div id="openModalSubmit" class="modalDialog">
					<div class="form">
						<a href="#close" title="Закрыть" class="close">X</a>
						<h1>Авторизация</h1>
						<form action="validation-form/auth.php" method="post">
							<div class="inputForm">
								<input type="login" placeholder="Логин" name="login" required> 
							</div>
							<div class="inputForm">
								<input type="password" placeholder="Пароль" name="password" required>
							</div>
							<div class=inputForm>
								<button class="btn btn-success" type="submit">Войти</button>
							</div>
							<h5 align="center" style="color:#fff">Не регистрировались? <a style="color:#ffb320" href="#openModalReg">Зарегистрироваться</a></h5>
						</form>
					</div>
				</div>
			</div>
			<div class="user-panel">
				<a href="#openModalReg">Регистрация</a>
				<div id="openModalReg" class="modalDialog">
					<div class="form">
						<a href="#close" title="Закрыть" class="close">X</a>
						<h1>Регистрация</h1>
						<form action="validation-form/check.php" method="post">
							<div class="inputForm">
								<input type="text" placeholder="Введите логин" name="login" required>
							</div>
							<div class="inputForm">
								<input type="text" placeholder="Введите почту" name="email">
							</div>
							<div class="inputForm">
								<input type="password" placeholder="Введите пароль" name="password" required>
							</div>
							<div class="inputForm">
								<input type="password" placeholder="Повторите пароль" name="password_suc" required>
							</div>
							<div class=inputForm>
								<button class="btn btn-success" type="submit">Зарегистрироваться</button>
							</div>
							<h5 align="center" style="color:#fff">Уже зарегистрированы? <a style="color:#ffb320" href="#openModalSubmit">Войти</a></h5>
						</form>
					</div>
				</div>
			</div>
			<? else:?>
				<div class="user-panel">
					<a href="aboutUser.php"><?=$_COOKIE['user']?></a>
					<button class="site-btn btn-sm"><a href="validation-form/exit.php"><h5>Выйти</h5></a></button>
				</div>
				<? endif;?>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
			<!-- site menu -->
			<nav class="main-menu">
				<ul>
					<li><a href="index.php">Главная</a></li>
					<li><a href="games.php">Игры</a></li>
					<li><a href="contact.php">О нас</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header section end -->

	