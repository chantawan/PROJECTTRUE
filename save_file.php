<?php
	include 'connect.php';
	 
	$board_name=$_POST['board_name'];
	$board_num=$_POST['board_num'];

	$sql_query = "SELECT board_name ,board_num from board where board_name = '$board_name' And board_num = '$board_num'";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row == 0){
		$sql = "INSERT INTO `board`( `board_name`,`board_num`) 
		VALUES ('$board_name','$board_num')";

		$result = mysqli_query($conn,$sql);
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>