<?php require "loginform.php"; ?>
<?php
	include "../inc/dbinfo.inc";

	try{
	  //Setting Data Source Name
	  $pdo = new PDO("mysql:host=" . DB_SERVER .";dbname=assignmentdb", DB_USERNAME, DB_PASSWORD);

	  session_start();
	  $loggenOnUser = $_SESSION['email'];

	  $title_fetch = $_GET['title'];
	  $start_fetch = $_GET['start_event'];
	  $end_fetch = $_GET['end_event'];

	  $sql = "DELETE FROM events WHERE email ='$loggenOnUser' and title='$title_fetch' and start_event='$start_fetch' and end_event ='$end_fetch'";

	  $stmt = $pdo->prepare($sql);
	  $stmt->execute();

	  header('location:todo.php');

	}
	//Catch Connection Failure
	catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
	}

?>