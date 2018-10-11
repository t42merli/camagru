<?php
include('db.php');

$req = requ_db("SELECT * FROM users WHERE ". $_GET['to_check'] . "= ?");
$req->execute(array($_GET['value']));
if ($req->fetch())
	echo "1";
else
	echo "0";

?>
