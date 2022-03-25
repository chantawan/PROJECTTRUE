<?php
	include 'connect.php';

	$board_id=$_POST['ID'];

	$sql1 = "SELECT * from upload_files where ID = $board_id";
	$result = mysqli_query($conn, $sql1);

	if(mysqli_num_rows($result) == 0){
		echo json_encode(array("statusCode"=>201));
	}
	else{
		$sql = "DELETE FROM `upload_files` WHERE ID=$board_id";
		$result = mysqli_query($conn, $sql);
		echo json_encode(array("statusCode"=>200));
	}

	mysqli_close($conn);
?>