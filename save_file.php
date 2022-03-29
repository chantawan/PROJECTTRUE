<?php
	include 'connect.php';
	 
	$board_name=$_POST['board_name'];
	$board_num=$_POST['board_num'];
	
	$sql_query = "SELECT board_num from board where board_num = '$board_num'";
    $result = mysqli_query($conn,$sql_query);
    $num_row2 = mysqli_num_rows($result);
	

if($num_row2 == 0){
	$sql_query = "SELECT board_num from board where board_num = '$board_num'";
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
}else if($num_row2 > 0){
	$sql = "UPDATE `board` 
	SET `board_name`='$board_name',
	`board_num`='$board_num'
	 WHERE board_num = $board_num";

	$result = mysqli_query($conn,$sql);
	echo json_encode(array("statusCode"=>200));
}
else{
	
}
   
	mysqli_close($conn);
?>