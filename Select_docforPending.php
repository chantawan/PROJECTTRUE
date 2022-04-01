<?php
	include 'connect.php';

    $Doc_id = $_POST['Doc_id'];
	
	$sql = "SELECT a.Doc_id , a.documentstatus_id , a.document_number,a.document_name,a.document_detail,a.documenttype_id, a.download , b.documenttype_name
    FROM document a , documenttype b where a.Doc_id = $Doc_id And a.documenttype_id = b.documenttype_id";
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $data = array(
        "Doc_id" => $row['Doc_id'],
        "document_number" => $row['document_number'],
        "document_name" => $row['document_name'],
        "document_detail" => $row['document_detail'],
        "documenttype_name" => $row['documenttype_name'],
        "download" => $row['download'],
        "statusCode"=>200
    );
    $sql_query = "UPDATE `document` 
	SET `documentstatus_id`= '3'

     WHERE Doc_id = $Doc_id";

    if(isset($data)){
		echo json_encode($data);
        
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}

    

	mysqli_close($conn);
    ?>