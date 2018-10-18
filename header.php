<?php
session_start();
include('db.php');
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
		<link rel="icon" href="logo.png" />
<script language='javascript' type="text/javascript" src="script.js"></script>
<style>
header{
margin-left:15px;
margin-right:40px;
}
</style>
	</head>
	<body>
		<header class="navbar" style="background-color:white;  position: fixed;  top: 0;  width: 96%">
			<section class="navbar-section">
				<a href="index.php" class="btn btn-link tooltip tooltip-bottom" data-tooltip="Acceuil">
					<img src="home.svg" width="32px" alt="Acceuil" ></a>
				<a href="photo.php"class="btn btn-link tooltip tooltip-bottom" data-tooltip="Prendre une photo"i>
					<img src="camera.svg" width="32px" alt="Pendre une photo"></a>
				<form method="POST" action="Search.php">
				</form>
			</section>
			<section class="navbar-center">
				<img src="logo.png" width="42px">
			</section>
			<section class="navbar-section">
				<?php
					if (isset($_SESSION['pseudo'])){
						echo "
				<a href=\"profil.php\" class=\"btn btn-link tooltip tooltip-bottom\"
				data-tooltip=\"Profil\">
					<img src=\"profil.svg\" width=\"32px\" alt=\"profil\"></a>
				<a href=\"signout.php\" class=\"btn btn-link tooltip tooltip-bottom\"
				data-tooltip=\"Sign out\">
					<img src=\"signout.svg\" width=\"32px\" alt=\"profil\"></a>";
					}
					else
					{
						echo "
				<a href=\"connexion.php\" class=\"btn btn-link tooltip tooltip-bottom\"
				data-tooltip=\"Sign in / Sign up\">
					<img src=\"signin.svg\" width=\"32px\" alt=\"connexion\" ></a>";
					}
				?>
			</div>
			</section>
		</header>
		<div style="margin-bottom:50px"></div>
<?php 
if (isset($_SESSION['pseudo'])){
	$res = requ_db("SELECT email_confirmed FROM users WHERE pseudo = ?");
	$res->execute(array($_SESSION['pseudo']));
	$res = $res->fetch();
	if ($res['email_confirmed'] == 0)
	{
		echo 
			"<div class=\"modal active\" id=\"email_confirm\">
				<a onclick=\"close_modal('email_confirm')\"
				 class=\"modal-overlay\" aria-label=\"Close\"></a>
				<div class=\"modal-container\">
				 <div class=\"modal-header\">
					<a href=\"#\" \" class=\"btn btn-clear float-right\" 
					onclick=\"close_modal('email_confirm')\" aria-label=\"Close\"></a>
					<div class=\"modal-title h5\">Your e-mail is not confirmed</div>
				</div>
					<div class=\"modal-body\">Please confirm your email.</div>
				</div>
			</div>";
	}
}
?>
