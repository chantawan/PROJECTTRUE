
<?php
include 'connect.php';
if(isset($_POST['function']) && $_POST['function'] == "divistion_id"){
    echo "test1";
    $id = $_POST['id'];
    $sql = "SELECT * FROM Employee WHERE divistion_id = '$id'";
    $query = mysqli_query($conn,$sql);
        echo '<option selected disabled>รายชื่อภายในกอง</option>';
    foreach($query as $value){
        echo '<option value="'.$value['emp_id'].'">'.$value['emp_firstname'].$value['emp_lastname'].'</option>';
    }
    exit();
}
?>