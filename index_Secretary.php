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
    
  <!-- =======================================================
  * Template Name: DevFolio - v4.7.1
  * Template URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

    <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active " href="#">หน้าแรก</a></li>
          <li><a class="nav-link scrollto " href="document_recive_Secretary.php">เอกสารถึงตัวท่าน</a></li>
          <li><a class="nav-link scrollto" href="#">แฟ้มเอกสาร</a></li>
          <li><a class="nav-link scrollto" href="#">คู่มือ</a></li>
          <li><a class="nav-link scrollto" href="logout.php?option=2">ออกจากระบบ</a></li>
        </ul>
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div style="text-align:right; float:right;">
        <label style="color:#FFFFFF83">ชื่อผู้ใช้ : <?php echo $emp_firstname ?> &nbsp</label>
        <label style="color:#FFFFFF83">บทบาท : <?php echo $Position_name ?> &nbsp</label>
      </div>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <div id="hero" class="hero route bg-image" style="background-image: url(assets/img/wall.jpg)">
    <div class="overlay-itro"></div>
    <div class="hero-content display-table">
      <div class="table-cell">
        <div class="container">
        
                
                   
        <div>
    <div class="col-10 mb-10" id="show_his" align="center" >
    <h3 class="text-pacha"><br>ข่าวประชาสัมพันธ์</h3>
    <div class="table-responsive-sm" style = "margin-top:10%;">
              <table class="table table-bordered table-sm" style="border:1px; width:100%;">
                <thead>
                  <tr style="background-color:#212529; color:white;">
                    <th class="thcenter"></th>
                  </tr>
                </thead>
                <tbody id="pacha" style="border:1px; width:20%">
                  <?php                 
                    $sql_query = "SELECT board_name
                    FROM board
                    ORDER BY `board_id` ASC";

                    $result = mysqli_query($conn,$sql_query);
                    $num_row = mysqli_num_rows($result);

                    while($row = $result->fetch_assoc()) {
                  ?>	
                      <th>
                          <?php
                      echo "<td>"."<img src='".$row['board_name']."' width='50%' hight>"."</td>"?>
                      </th>
                    <?php	
                    }                            
                    ?>
                </tbody>
                <tbody id="myTable5" style="border:1px; width:100%">

                </tbody>
              </table>
            </div>
<div class="row mx-auto" id="show_about">
<h2 class="text-white" style="padding-left:150px"><br><img src="img/logoUser.png" width="10%" alt=""> เทศบาลเมืองปัตตานี
ถนนเดชา ตำบลสะบารัง อำเภอเมือง จังหวัดปัตตานี 94000</h2>
        <p class="text-white" style="font-size:20px;">
        <img src="img/phone.png" width="5%" alt=""> โทร. 073-335918<br><br>
        <img src="img/phone.png" width="5%" alt=""> โทรสาร 073-335919<br><br>
        <img src="img/registration.jpg" width="5%" alt=""> saraban@patta<br>
      </div>
      
    </div>

  </main><!-- End #main -->
  
  

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>


        