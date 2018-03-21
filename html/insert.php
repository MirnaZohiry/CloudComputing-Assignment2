<?php require "loginform.php"; ?>
<?php
	include "../inc/dbinfo.inc";

	try{
	  //Setting Data Source Name
	  $pdo = new PDO("mysql:host=" . DB_SERVER .";dbname=assignmentdb", DB_USERNAME, DB_PASSWORD);

      //Creating a PHP PDO instance
	  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	  if (isset($_POST['insert'])) {

	  	session_start();
	  	$loggenOnUser = $_SESSION['email'];

		$sql = "INSERT INTO events(email, title, start_event, end_event) VALUES('$_SESSION[email]', '$_POST[inputTask]', '$_POST[datetimepicker1]', '$_POST[datetimepicker2]')";

		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		header('location:todo.php');
	  }

	}
	//Catch Connection Failure
	catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
	}

?>	  

	  

