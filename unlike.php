<?php
include('db.php');
$req = requ_db("DELETE FROM likes WHERE post = ? AND user = ?");
$req->execute(array($_GET['post'], $_GET['user']));
$req = requ_db("SELECT COUNT(*) FROM likes WHERE post = ?");
$req->execute(array($_GET['post']));
$res = $req->fetch();
echo $res[0].' like(s)';
?>