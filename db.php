<?php

function conn_db(){
	$user = 'root';
	$pass = 'rootroot';
	try{
		$db = new PDO('mysql:host=localhost;dbname=camagru', $user, $pass);
	} catch (PDOEXCEPTION $e){
		if($e->getCode() == 1049)
		{
			try{
				include('config/database.php');

			} catch (PDOEXCEPTION $e2){
				echo "Error" . $e2->getMessage();
				die();
			}
		}
		echo "test";
	}
	return ($db);
}

?>
