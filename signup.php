<?php
session_start();
include('db.php');

function rand_str(){
	return (substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm7894561230"), 0,
			rand(10,34)));
}

$email_link = rand_str();
$req = requ_db("SELECT id FROM users WHERE email_link = ?");
$req->execute(array($email_link));
while ($res = $req->fetch())
{
	$email_link = rand_str();
	echo $email_link . "\n";
	$req->execute(array($email_link));
}
$req = requ_db("INSERT INTO `users` (`pseudo`, `password`, `notif`, `email`, `email_confirmed`, `email_link`)
	VALUES (?, ?, '1', ?, '0', ?)");
$req->execute(array($_POST['pseudo'], hash('whirlpool', $_POST['password']), $_POST['email'], 
	$email_link));
$req = requ_db("SELECT id FROM users WHERE pseudo = ?");
$req->execute(array($_POST['pseudo']));
$id = $req->fetch();
$_SESSION['pseudo'] = $_POST['pseudo'];
$_SESSION['id'] = $id['id'];
mail($_POST['email'], "Confirmation mail Camagru", "Veuillez confirmez votre adresse email en cliquant sur le lien ci dessous
	lien: 127.0.0.1:8080/camagru/confirm_mail.php?mail=".$email_link);
header('Location: index.php');
?>
