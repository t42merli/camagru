<?php

function conn_db(){
	$user = 'root';
	$pass = 'rootroot';
	try{
		$db = new PDO('mysql:host=localhost;dbname=camagru', $user, $pass);
} catch (PDOEXCEPTION $e){
	echo "ERROR".$e->getMessage();
}
	return ($db);
}

?>
