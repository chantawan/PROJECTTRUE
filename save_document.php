<?php
	include 'connect.php';
	 
	$document_number=$_POST['document_number'];
	$document_name=$_POST['document_name'];
    $document_detail=$_POST['document_detail'];
    $documenttype_id=$_POST['documenttype_id'];
	$speed_send=$_POST['speed_send'];
    $secret_send=$_POST['secret_send'];
    $document_date=$_POST['document_date'];
    $download=$_POST['download'];
	$documentstatus_id=$_POST['documentstatus_id'];


	$sql_query = "SELECT document_number from document where document_number = '$document_number'";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row == 0){
		$sql = "INSERT INTO `document`( `document_number`,`document_name`,`document_detail`,`documenttype_id`,`speed_send`,`secret_send`,`document_date`,`download`,documentstatus_id) 
		VALUES ('$document_number','$document_name','$document_detail','$documenttype_id','$speed_send','$secret_send','$document_date','$download','$documentstatus_id')";

		$result = mysqli_query($conn,$sql);
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>