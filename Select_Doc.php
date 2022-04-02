<?php
	include 'connect.php';

    $Doc_id = $_POST['Doc_id'];
	
	$sql = "SELECT * FROM document where Doc_id = $Doc_id";
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $data = array(
        "Doc_id" => $row['Doc_id'],
        "document_number" => $row['document_number'],
        "document_name" => $row['document_name'],
        "document_detail" => $row['document_detail'],
        "divistion_id" => $row['divistion_id'],
        "emp_id" => $row['emp_id'],
        "documenttype_id" => $row['documenttype_id'],
        "documentstatus_id" => $row['documentstatus_id'],
        "speed_send" => $row['speed_send'],
        "secret_send" => $row['secret_send'],
        "document_date" => $row['document_date'],
        "document_date_Out" => $row['document_date_Out'],
        "document_dnow" => $row['document_dnow'],
        "download" => $row['download'],
        "statusCode"=>200
    );

    if(isset($data)){
        echo json_encode($data);
    }
    else{
        echo json_encode(array("statusCode"=>201));
    }

	mysqli_close($conn);
?>
  