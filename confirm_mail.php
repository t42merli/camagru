<?php
include('db.php');
$req = requ_db('UPDATE users SET email_confirmed = 1 WHERE email_link = ?');
var_dump($req->execute(array($_GET['mail'])));
header('Location: index.php');
?>
