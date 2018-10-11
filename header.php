<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Camagru</title>
		<meta name="description" content="">
		<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
		<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
		<link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
<script language='javascript' type="text/javascript" src="script.js"></script>
<style>
header{
margin-left:10px;
margin-right:10px;
}
header form{
margin:10px;
}
</style>
	</head>
	<body>
		<header class="navbar">
			<section class="navbar-section">
				<a href="index.php" class="btn btn-link tooltip tooltip-bottom" data-tooltip="Acceuil">
					<img src="home.svg" width="32px" alt="Acceuil" ></a>
				<a href="Picture.php"class="btn btn-link tooltip tooltip-bottom" data-tooltip="Prendre une photo"i>
					<img src="camera.svg" width="32px" alt="Pendre une photo"></a>
				<form method="POST" action="Search.php">
					<div class="input-group input-inline">
						<input class="form-input" placeholder="search" type="text" name="search">
						<button class="btn btn-action btn-primary"><i class="icon icon-search">
						<input type="submit"></i></button>
					</div>
				</form>
			</section>
			<section class="navbar-center">
				<img src="logo.png" width="42px">
			</section>
			<section class="navbar-section">
				<?php
					if (isset($_SESSION['logged'])){
						echo "
						<a href=profile.php class=\"btn btn-link\" >Mon profile</a>
						<a href=SignOut.php class=\"btn btn-link\">Se deconnecter</a>";
					}
					else
					{
						echo "
						<a href=connexion.php class=\"btn btn-link\" >Se connecter</a>
						<div class=\"divider text-center\" data-content=\"OU\"></div>
						<a href=connexion.php class=\"btn btn-link\"> S'inscrire</a>";
					}
				?>
			</div>
			</section>
		</header>
		<hr>
