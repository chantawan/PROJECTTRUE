<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
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
        //$name =  $_POST['name'];
        $document_id =  $_POST['document_id'];
        $document_id =  $_POST['documenttype_id'];
        $divistion_id = $_POST['divistion_id'];
        //$document_date =  $_POST['document_date'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO document  VALUES ('$document_id', 
            '$documenttype_id','$divistion_id')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            echo nl2br("\n$document_id\n $documenttype_id\n "
                . "$divistion_id\n");
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