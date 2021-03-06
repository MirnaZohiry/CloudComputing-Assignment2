<?php 
	include "../inc/dbinfo.inc";

	try{
		//Setting Data Source Name
	    $pdo = new PDO("mysql:host=" . DB_SERVER .";dbname=assignmentdb", DB_USERNAME, DB_PASSWORD);

		//Creating a PHP PDO instance
		$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		session_start();
		session_destroy();
		header('location: http://ec2-54-187-59-168.us-west-2.compute.amazonaws.com');

	}
	//Catch Connection Failure
	catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}

?>