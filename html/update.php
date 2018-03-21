<?php
	include "../inc/dbinfo.inc";

	try{
	  //Setting Data Source Name
	  $pdo = new PDO("mysql:host=" . DB_SERVER .";dbname=assignmentdb", DB_USERNAME, DB_PASSWORD);

	  if(isset($_POST["id"]))
	  {
		$sql = "UPDATE events SET title=:title, start_event=:start_event, end_event=:end_event WHERE id=:id";

		$stmt = $pdo->prepare($sql);
		$stmt->execute(
			array(
				':title'  => $_POST['title'],
				':start_event' => $_POST['start'],
				':end_event' => $_POST['end'],
				':id'   => $_POST['id'])
		);
	  }

	}
	//Catch Connection Failure
	catch (PDOException $e) {
	echo 'Connection failed: ' . $e->getMessage();
	}

?>
