<?php
	include 'connect.php';
	
	$Doc_id=$_POST['Doc_id'];
    $divistion_id=$_POST['divistion_id'];
	$emid=$_POST['emid'];
   

	$sql_query = "UPDATE `document` 
	SET `divistion_id`='$divistion_id',
	`emp_id`='$emid', `documentstatus_id`= '2'

     WHERE Doc_id = $Doc_id";

    if(mysqli_query($conn,$sql_query)){
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);

?>