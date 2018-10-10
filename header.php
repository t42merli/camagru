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
	</head>
	<body>
		<header class="navbar">
			<section class="navbar-section">
				<a href="Acceuil.php" class="btn btn-link">Acceuil</a>
				<a href="Picture.php" class="btn btn-link">Prendre une photo</a>
				<form method="POST" action="Search.php">
					<div class="input-group input-inline">
						<input class="form-input" placeholder="search" type="text" name="search">
						<button class="btn btn-action btn-primary"><i class="icon icon-search">
						<input type="submit"></i></button>
					</div>
				</form>
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
						<a href=SignIn.php class=\"btn btn-link\" >Se connecter</a>
						<div class=\"divider text-center\" data-content=\"OU\"></div>
						<a href=SignUp.php class=\"btn btn-link\"> S'inscrire</a>";
					}
				?>
			</div>
			</section>
		</header>
		<hr>
