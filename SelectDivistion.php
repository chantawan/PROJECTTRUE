
<?php
include 'connect.php';
if(isset($_POST['function']) && $_POST['function'] == "divistion_id"){
    echo "test1";
    $id = $_POST['id'];
    $emp_id = $_POST['emp_id'];
    $sql = "SELECT * FROM Employee a , position b WHERE a.Position_id = b.Position_id And a.divistion_id = '$id' And a.emp_id != '$emp_id' ";
    $query = mysqli_query($conn,$sql);
        echo '<option selected disabled>รายชื่อภายในกอง</option>';
    foreach($query as $value){
        echo '<option value="'.$value['emp_id'].'">'.$value['emp_firstname']."      ".$value['emp_lastname']."      ".$value['Position_name'].'</option>';
        
        
    }
    exit();
}
?>