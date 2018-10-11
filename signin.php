<?php
session_start();
include('db.php');
$req = requ_db("SELECT pseudo FROM users WHERE email= ? AND password= ?");
$req->execute(array($_POST['email'], hash('whirlpool', $_POST['password'])));
$res = $req->fetch();
if ($res)
{
	$_SESSION['pseudo'] = $res['pseudo'];
	header('Location: index.php');
}
else
	header('Location: connexion.php?error=1');
?>
