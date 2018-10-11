<?php
include('db.php');

$conn = conn_db();
$req = $conn->prepare("SELECT * FROM users WHERE ". $_GET['to_check'] . "= ?");
$req->execute(array($_GET['value']));
if ($req->fetch())
	echo "1";
else
	echo "0";

?>
