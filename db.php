<?php

function requ_db($sql){
	$user = 'root';
	$pass = 'rootroot';
	try{
		$db = new PDO('mysql:host=localhost;dbname=camagru', $user, $pass);
		$req = $db->prepare($sql);
} catch (PDOEXCEPTION $e){
	echo "ERROR".$e->getMessage();
}
	return ($req);
}

?>
