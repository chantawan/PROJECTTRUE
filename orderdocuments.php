<?php
	include 'connect.php';

	$Doc_id3=$_POST['Doc_id3'];
	$emp_id3=$_POST['emp_id3'];

	$sql_query = "UPDATE `document`
	SET `documentstatus_id`='5',
	`emp_id`='$emp_id3'

     WHERE Doc_id = $Doc_id3";

    if(mysqli_query($conn,$sql_query)){
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>