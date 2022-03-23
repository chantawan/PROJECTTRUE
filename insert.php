<!DOCTYPE html>
<html>
  
<head>
    <link rel="icon" href="img/login2.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>นำเข้าสำเร็จ</title>
</head>
  
<body>
    <center>
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost", "root", "", "project");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $id = $_REQUEST['id'];
        $fname = $_REQUEST['fname'];
        $name = $_REQUEST['name'];
        $document_number =  $_REQUEST['document_number'];
        $document_name = $_REQUEST['document_name'];
        $document_detail =  $_REQUEST['document_detail'];
        $divistion_id = $_REQUEST['divistion_id'];
        $documenttype_id = $_REQUEST['documenttype_id'];
        $speed_send = $_REQUEST['speed_send'];
        $secret_send = $_REQUEST['secret_send'];
        $oject_send = $_REQUEST['oject_send'];
        $mydate = $_REQUEST['mydate'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO document  VALUES ('$id','$fname','$name','$document_number', 
            '$document_name','$document_detail','$divistion_id','$documenttype_id',
            '$speed_send','$secret_send','$oject_send','$mydate')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            echo nl2br("$id\n $fname\n $name\n $document_number\n $document_name\n "
                . "$document_detail\n $divistion_id\n $documenttype_id\n $speed_send\n $secret_send\n $oject_send\n $mydate");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>