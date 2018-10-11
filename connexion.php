<?php
include('header.php');

?>
		<div class="container">
		<div class="columns"><div class="column">
<?php
if (isset($_GET['error']))
{
	echo "<div class=\"toast toast-error\">
		<button class=\"btn btn-clear float-right\" onclick=\"this.parentNode.parentNode.removeChild(this.parentNode);\">
		</button>
		Wrong email or password
		</div>";
}
?>
		<h2> Se connecter </h2>
		<form method="POST" action="signin.php">
			<div class="form-group">
			<label class="form-label" for="e-mail1">e-mail</label>
			<input class="form-input" name="email" type="email" id="e-mail1" placeholder="email@example.com" required>
			</div>
			<div class="form-group">
			<label class="form-label" for="password1">password</label>
			<input class="form-input" name="password" type="password" id="password1" placeholder="password" required>
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary">Sign-in</button>
			</div>
		</form>
		</div>
		<div class="divider-vert" data-content="OU"></div>
		<div class="column">
		<h2> S'inscrire </h2>
		<form method="post" action="signup.php">
			<div class="form-group">
			<label class="form-label" for="e-mail2">e-mail</label>
			<input class="form-input" type="email" id="e-mail2" placeholder="email@example.com" oninput="check_exist(this,'email')"  required>
			</div>
			<div class="form-group">
			<label class="form-label" for="pseudo">pseudo</label>
			<input class="form-input" type="text" id="pseudo" placeholder="pseudo" oninput="check_exist(this, 'pseudo')" required>
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
