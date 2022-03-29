<?php
	include 'connect.php';

    $Doc_id = $_POST['Doc_id'];
	
	$sql = "SELECT * FROM document where Doc_id = $Doc_id";
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $data = array(
        "Doc_id" => $row['Doc_id'],
        "document_number" => $row['document_number'],
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
  