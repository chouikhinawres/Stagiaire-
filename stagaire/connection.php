<?php
$dsn = 'mysql:host=localhost;dbname=stagiaires';
	$login = "root";
	$password = "";
	try
	{
		$dbh = new PDO( $dsn, $login, $password) ;
	}
	catch (PDOException $e)
	{
		die ($e->getMessage()) ;
	}
?>

