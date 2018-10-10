<?php
$DB_DSN = 'mysql:host=localhost';
$DB_USER = 'root';
$DB_PASSWORD = 'rootroot';
$DB_NAME = 'camagru';

try{
$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
$db->exec('CREATE DATABASE ' . $DB_NAME  . ';');
$db = new PDO($DB_DSN . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASSWORD);
$db->exec(file_get_contents('script.sql'));
}catch (PDOEXCEPTION $e){
	echo "Error" . $e->getMessage();
}
?>
