<?php
include "connect.php";

if(!isset($_SESSION['emp_id'])){
   header('Location: login_user.php');
}

$emp_id = $_SESSION['emp_id'];
$emp_firstname = $_SESSION['emp_firstname'];
$Position_name = $_SESSION['Position_name'];

date_default_timezone_set("Asia/Bangkok");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>เข้าสู่ระบบสมาชิก</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="img/login2.png" type="image/png">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
   <link href="assets/css/style.css" rel="stylesheet">
   <link rel="icon" href="img/logoUser1.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    * {
      font-family: 'Agency FB';
    }
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    
}

td, th {
    border: 0px solid #dddddd;
    text-align: center;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
#show_index{
      background-color: rgba(255,255,255,0.4)
    }
    </style>
  <!-- =======================================================
  * Template Name: DevFolio - v4.7.1
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

    <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active " style="font-size:25px;" href="#">หน้าแรก</a></li>
          <!-- Example single danger button -->
          <div class="dropdown">
          <button class="btn  btn-sm dropdown-toggle"  style="width:100%; margin-left:5%; color:white; font-size:25px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
           การจัดการเอกสาร
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="document_recive_manager.php" >เอกสารถึงตัวท่าน</a></li>
            <li><a class="dropdown-item" >เอกสารรอดำเนินการ</a></li>
            <li><a class="dropdown-item" href="sent_message.php" >ส่งข้อความ</a></li>
            
          </ul>
        </div>
          <li><a class="nav-link scrollto"style="font-size:25px;" href="document_storage.php">แฟ้มเอกสาร</a></li>
          <li><a class="nav-link scrollto"style="font-size:25px;" href="#">คู่มือ</a></li>
          <li><a class="nav-link scrollto"style="font-size:25px;" href="logout.php?option=2">ออกจากระบบ</a></li>
        </ul>
        
        <i class="bi bi-list mobile-nav-toggle"></i>
     <!-- .navbar -->
     
      <div style="text-align:right; float:right; margin-left:150px">
        <label style="color:#FFFFFF83;font-size:20px;">ชื่อผู้ใช้ : <?php echo $emp_firstname ?> &nbsp</label>
        <label style="color:#FFFFFF83;font-size:20px;">บทบาท : <?php echo $Position_name ?> &nbsp</label>
      </div>
      
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      

    </div>
    </nav>
  </header><!-- End Header -->
  <body>
  <!-- ======= Hero Section ======= -->
  <div id="hero" class="hero route bg-image" style="background-image: url(assets/img/wall.jpg)">
    <div class="overlay-itro"></div>
    <div class="hero-content display-table">
        <div class="container" style = "margin-top:10%">
        <table class="table table-responsive-md mx-auto" style="width:50%">
        <thead>
        <tr style="color:white;">
          
        <th class="thcenter">
          <?php
                          $sql = "SELECT * from document_status";

                          $result = mysqli_query($conn,$sql);
                        ?>
                        <select name="documentstatus_id" id="documentstatus_id">
                          <option value="สถานะ">สถานะเอกสาร</option>
                        <?php
                          while($row = mysqli_fetch_assoc($result)){
                        ?>
                              <option value="<?php echo $row["documentstatus_id"]?>"><?php echo $row["documentstatus_name"]?></option>              
                            <?php
                          }
                        ?>
                        </select>
          </th>
          <th class="thcenter">
          <?php
                          $sql = "SELECT * from documenttype";

                          $result = mysqli_query($conn,$sql);
                        ?>
                        <select name="documenttype_id" id="documenttype_id">
                          <option value="ประเภท">ประเภทเอกสาร</option>
                        <?php
                          while($row = mysqli_fetch_assoc($result)){
                        ?>
                              <option value="<?php echo $row["documenttype_id"]?>"><?php echo $row["documenttype_name"]?></option>              
                            <?php
                          }
                        ?>
                        </select>
          </th>
        </thead>
        <table class="table table-responsive-md mx-auto" style="width:100%">
        <thead>
          <tr style="background-color:#212529; color:white;">
          
          <th class="thcenter"></th>
            <th class="thcenter">หัวข้อ</th>
            <th class="thcenter">คำอธิบาย
              
            </th>
            <th class="thcenter">เวลา</th>
          </tr>
        </thead>
        <tbody id="document_now" style=" width:100%; height:100%">
          <?php                 
            $search1 = date("Y/m/d");
            $search2 = date("Y/m/d");

            $sql_query = "SELECT  a.document_name , a.document_detail , a.document_date , b.documenttype_name , c.documentstatus_name
            FROM document a, documenttype b, document_status c
            WHERE b.documenttype_id = a.documenttype_id and c.documentstatus_id = a.documentstatus_id and a.emp_id = '$emp_id' ORDER BY `a`.`document_date` DESC";

            $result = mysqli_query($conn,$sql_query);
            $num_row = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
          ?>	
              <tr style="background-color:white; color:black;">
              <td class="pl-3">
              <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="docId"/>
              <label class="custom-control-label" for="docId">&nbsp;</label>
              </div>
              </td>
                  <td><?=$row['document_name'];?></td>
                  <td><?=$row['document_detail'];?></td>
                  <td><?=$row['document_date'];?></td>
                  
              </tr>
            
            <?php	
             }  
             
            }else {
              echo "ไม่พบข้อความถึงท่าน";
            }
            ?>
           
            
        </tbody>
      </table>
      
    </div>
    
    </div> </div> </div>

  </main><!-- End #main -->
  
  

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  
  <script src="assets/js/main.js">
    show_document_now()
    function show_document_now() {

        $("#document_now").show();
        $("#show_history").hide();
        $("#show_manual").hide();
        $("#show_divistion").hide();
        $("#show_employee").hide();
}

  </script>
</body>


</html>


        