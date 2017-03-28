<?php
try{
	$bdd = new PDO('mysql:host=localhost;dbname=chikai;charset=utf8', 'konki', 'yfNMePAq3JAy6O26lboO2wpYv');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
?>