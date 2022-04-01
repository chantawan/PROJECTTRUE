<?php
	include 'connect.php';

	$Doc_id=$_POST['Doc_id'];

	$sql1 = "SELECT * from document where Doc_id = $Doc_id And documentstatus_id != 5";
	$result = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($result) == 0){
		echo json_encode(array("statusCode"=>201));
	}
	else{
		$sql = "DELETE FROM `document` WHERE Doc_id= $Doc_id";
		$result = mysqli_query($conn, $sql);
		echo json_encode(array("statusCode"=>200));
	}

	mysqli_close($conn);
?>