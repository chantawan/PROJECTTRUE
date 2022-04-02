<?php
	include 'connect.php';

	$Doc_id2=$_POST['Doc_id2'];
	$emp_id2=$_POST['emp_id2'];


	$document_number=$_POST['document_number'];
	$document_name=$_POST['document_name'];
    $document_detail=$_POST['document_detail'];
    $documenttype_id=$_POST['documenttype_id'];
	$documentstatus_id=$_POST['documentstatus_id'];
	$speed_send=$_POST['speed_send'];
	$secret_send=$_POST['secret_send'];
    $document_date=$_POST['document_date'];
    $document_dnow=$_POST['document_dnow'];
	$divistion_id=$_POST['divistion_id'];
	$download=$_POST['download'];
	
	

	$sql_query = "SELECT * from document Where Doc_id = '$Doc_id2'";
    $result = mysqli_query($conn,$sql_query);
    $num_row = mysqli_num_rows($result);

    if($num_row > 0){

		$sql = "INSERT INTO `document`( `document_number`,`document_name`,`document_detail`,`documenttype_id`,`documentstatus_id`,`speed_send`
		,`secret_send`,`document_date`,`document_dnow`,`emp_id`,`divistion_id`,`download`) 
		VALUES ('$document_number','$document_name','$document_detail','$documenttype_id','$documentstatus_id','$speed_send'
		,'$secret_send','$document_date','$document_dnow','$emp_id2','$divistion_id','$download')";

		$result = mysqli_query($conn,$sql);
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>
	
	


	