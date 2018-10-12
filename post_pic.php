<?php
session_start();
include('db.php');
$req = requ_db("INSERT INTO `post` (`user`, `date`, `pic`, `text`, `user_pseudo`) VALUES (?, (SELECT NOW()), ?, ?, ?)");
$req->execute(array($_SESSION['id'], $_SESSION['lastPic'][$_POST['i']], $_POST['post'], $_SESSION['pseudo']));
header("Location: index.php");
?>