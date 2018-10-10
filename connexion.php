<?php
include('header.php');
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
		<div class="container">
		<div class="columns"><div class="column">
		<h2> Se connecter </h2>
		<form method="post" action="connect.php">
			<div class="form-group">
			<label class="form-label" for="e-mail1">e-mail</label>
			<input class="form-input" type="email" id="e-mail1" placeholder="email@example.com" required>
			</div>

			<div class="form-group">
			<label class="form-label" for="password1">password</label>
			<input class="form-input" type="password" id="password1" placeholder="password" required>
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary">Sign-in</button>
			</div>
		</form>
		</div>
		<div class="divider-vert" data-content="OU"></div>
		<div class="column">
		<h2> S'inscrire </h2>
		<form method="post" action="create_account.php">
			<div class="form-group">
			<label class="form-label" for="e-mail2">e-mail</label>
			<input class="form-input" type="email" id="e-mail2" placeholder="email@example.com" required>
			</div>
			<div class="form-group">
			<label class="form-label" for="password2">password</label>
			<input class="form-input" type="password" id="password2" placeholder="password" name="password"
			pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one 
			uppercase and lowercase letter, and at least 8 or more characters" required>
			</div>
			<div class="form-group">
			<label class="form-label" for="conf">confirm password</label>
			<input class="form-input" type="password" id="conf" placeholder="password" oninput="check(this)" required>
			<script language='javascript' type='text/javascript'>
			 function check(input) {
				if (input.value != document.getElementById('password2').value) {
					input.setCustomValidity('Password Must be Matching.');
				} else {
					input.setCustomValidity('');
				}
			 }
			</script>
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary">Sign-up</button>
			</div>
		</form>
		</div></div>
		</div>
</body>
