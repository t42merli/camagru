<?php
session_start();
include('db.php');
$db = conn_db();
$req = $db->prepare("SELECT pseudo FROM users WHERE email= ? AND password= ?");
$req->execute(array($_POST['email'], /*hash('whirlpool',*/ $_POST['password']));
$res = $req->fetch();
if ($res)
{
	$_SESSION['user'] = $res['pseudo'];
	header('Location: index.php');
}
else
	header('Location: connexion.php?error=1');
?>
