<?php require "loginform.php"; ?>
<?php
	include "../inc/dbinfo.inc";

	try{
	  //Setting Data Source Name
	  $pdo = new PDO("mysql:host=" . DB_SERVER .";dbname=assignmentdb", DB_USERNAME, DB_PASSWORD);

	  session_start();
	  $loggenOnUser = $_SESSION['email'];

	  $data = array();

	  $sql = "SELECT * FROM events WHERE email ='$loggenOnUser' ORDER BY id";

	  $stmt = $pdo->prepare($sql);
	  $stmt->execute();

	  $result = $stmt->fetchAll();

	  foreach($result as $row)
	  {
	  	$data[] = array(
	  		'id'   => $row["id"],
	  		'title'   => $row["title"],
	  		'start'   => $row["start_event"],
	  		'end'   => $row["end_event"]
	  	);
	  }

	  echo json_encode($data);

	}
	//Catch Connection Failure
	catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
	}

?>