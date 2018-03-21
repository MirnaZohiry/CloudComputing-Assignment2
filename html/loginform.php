<?php
	include "../inc/dbinfo.inc";
	try{

	  //Creating a PHP PDO instance
	  $pdo = new PDO("mysql:host=" . DB_SERVER .";dbname=assignmentdb", DB_USERNAME, DB_PASSWORD);
	  
	  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
	  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	  if (isset($_POST['login'])) {
	  	session_start();

		$sql="SELECT * FROM users WHERE email='".$_POST[email_field]."' AND password='".$_POST[password_field]."' LIMIT 1";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();

		$q = $pdo->query("SELECT username FROM users WHERE email='".$_POST[email_field]."' AND password='".$_POST[password_field]."' LIMIT 1");

		$username = $q->fetchColumn();

		$_SESSION['user'] = $username;

		echo $_SESSION['user'];

		$qp = $pdo->query("SELECT email FROM users WHERE email='".$_POST[email_field]."' AND password='".$_POST[password_field]."' LIMIT 1");

		$email = $qp->fetchColumn();

		$_SESSION['email'] = $email;

		//echo $_SESSION['email'];

		$rowCount = $stmt->rowCount();
		if ($rowCount == 1) {
			echo " You have successfully logged in";
			echo "<script> window.location.assign('overview.php'); </script>";
			exit();
		}
		else{
			echo "Invalid login, try again";
			exit();
		}

	  }

	}
	//Catch Connection Failure
	catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
	}

?>