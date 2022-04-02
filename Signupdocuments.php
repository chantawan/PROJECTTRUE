<?php
	include 'connect.php';

	$Doc_id2=$_POST['Doc_id2'];
	

	$sql_query = "UPDATE `document`
	SET `documentstatus_id`='3'

     WHERE Doc_id = $Doc_id2";

    if(mysqli_query($conn,$sql_query)){
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>