<?php
session_start();
include('db.php');
$req = requ_db("INSERT INTO `comments` (`content`, `post`, `user`) VALUES (?,?,?)");
$req->execute(array($_GET['comment'], $_GET['post'], $_GET['user']));

$user_mail = requ_db("SELECT * FROM users WHERE id = (SELECT user FROM post WHERE post_id = ?)");
$user_mail->execute(array($_GET['post']));
$usermail = $user_mail->fetch();
if($usermail['notif'] == 1)
{
    mail($user_mail['email'], "Notif Camagru: Quelqun à commenté votre photo !", $_SESSION['pseudo']." à commenté:
        ".$_GET['comment']);
}
?>