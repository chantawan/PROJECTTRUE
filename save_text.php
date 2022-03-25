<?php
	include 'connect.php';
	 
	$mes_name=$_POST['mes_name'];
	$mes_detial=$_POST['mes_detial'];
    $divistion_id=$_POST['divistion_id'];
	$emid=$_POST['emid'];
   

	$sql_query = "SELECT * from document where document_name = '$mes_name'";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row == 0){
		$sql = "INSERT INTO `document`( `document_name`,`document_detail`,`divistion_id`,`emp_id`) 
		VALUES ('$mes_name','$mes_detial','$divistion_id','$emid')";

		$result = mysqli_query($conn,$sql);
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>