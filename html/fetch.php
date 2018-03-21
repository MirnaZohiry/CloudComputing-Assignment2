<?php require "loginform.php"; ?>
<?php
	include "../inc/dbinfo.inc";

	try{
	  //Setting Data Source Name
	  $pdo = new PDO("mysql:host=" . DB_SERVER .";dbname=assignmentdb", DB_USERNAME, DB_PASSWORD);

	  session_start();
	  $loggenOnUser = $_SESSION['email'];

	  $sql = "SELECT * FROM events WHERE email ='$loggenOnUser' ORDER BY id";

	  $stmt = $pdo->prepare($sql);
	  $stmt->execute();

	  $rowCount = $stmt->rowCount();

	}
	//Catch Connection Failure
	catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
	}

?>