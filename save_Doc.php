<?php
	include 'connect.php';
	 
	$mes_name=$_POST['mes_name'];
	$mes_name=$_POST['mes_detial'];
    $mes_name=$_POST['file_mes'];
    $mes_name=$_POST['divistion_id'];
    $mes_name=$_POST['emp_id'];

	$sql_query = "SELECT divistion_name from divistion where divistion_name = '$divistion_name'";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row == 0){
		$sql = "INSERT INTO `divistion`( `divistion_name`, `divistion_number`) 
		VALUES ('$divistion_name','$divistion_number')";

		$result = mysqli_query($conn,$sql);
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>