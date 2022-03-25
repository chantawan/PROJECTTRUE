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
  <header id="header" class="fixed-top" > 
    <div class="container d-flex align-items-center justify-content-between" >

    <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto  " style="font-size:25px;" href="index_manager.php">หน้าแรก</a></li>
          <!-- Example single danger button -->
          <div class="dropdown">
          <button class="btn  btn-sm dropdown-toggle"  style="width:100%; margin-left:5%; color:white; font-size:25px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
           การจัดการเอกสาร
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="document_recive_manager.php" >เอกสารถึงตัวท่าน</a></li>
            <li><a class="dropdown-item" >เอกสารรอดำเนินการ</a></li>
            <li><a class="dropdown-item" >ส่งข้อความ</a></li>
            
          </ul>
        </div>
          <li><a class="nav-link scrollto"style="font-size:25px;" href="#">แฟ้มเอกสาร</a></li>
          <li><a class="nav-link scrollto"style="font-size:25px;" href="#">คู่มือ</a></li>
          <li><a class="nav-link scrollto"style="font-size:25px;" href="logout.php?option=2">ออกจากระบบ</a></li>
        </ul>
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div style="text-align:right; float:right;">
        <label style="color:#FFFFFF83;font-size:20px;">ชื่อผู้ใช้ : <?php echo $emp_firstname ?> &nbsp</label>
        <label style="color:#FFFFFF83;font-size:20px;">บทบาท : <?php echo $Position_name ?> &nbsp</label>
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
      
        <div class="container" style = "width = 100%; text-align: left" >
        
           <h2 style = "font-size: 40px; color:white;">เรื่อง     <input type="text" name="mes_name" id="mes_name" style = "text-align: center; margin-left:8%;font-size: 20px;width: 30%" placeholder = "กรุณาป้อนหัวเรื่อง"></h2>
          
          </input> 
           <br>
           <br>
           <h2 style = "font-size: 40px; color:white;">รายละเอียด </h2>    <textarea name="mes_detial" id="mes_detial" cols="50" rows="5"></textarea>
           
           <div>
           <h2 style = "font-size: 20px; color:white;">รายชื่อกอง
                        <?php
                          $sql = "SELECT * from divistion";

                          $result = mysqli_query($conn,$sql);
                        ?>
                        <select name="divistion_id" id="divistion_id" class="form-select"style = "text-align: center; width: 10%; " >
                          <option value="กอง">กอง</option>
                        <?php
                          while($row = mysqli_fetch_assoc($result)){
                        ?>
                              <option value="<?php echo $row["divistion_id"]?>"><?php echo $row["divistion_name"]?></option>              
                            <?php
                          }
                        ?>
                        
                        </select>
                        <h2 style = "font-size: 20px; color:white;">
                        <label for="emid">รายชื่อบุคลากรภายในกอง</label><br> 
                            <select name="emid" id="emid" class="form-select" style = "text-align: center; width: 20%;" aria-label="Default select example">
                                <option value="" selected disabled>กรุณาเลือกชื่อกอง</option>
                            </select>
                        <br> <br> 
                        <button type="button" class="btn btn-success" id="save_mes" style = "margin-left: 50%" >ส่งเอกสาร</button>
                        </div>
                  
        <div>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  
  </main><!-- End #main -->
  
  

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script>
    
    
    $(document).ready(function () {
      
      $('#divistion_id').change(function(){
        var divistion_id = $(this).val();
        
        $.ajax({
            type:"post",
            url:"SelectDivistion.php",
            data:{
                id:divistion_id,
                function:'divistion_id'
            },
            success: function(data){
                $('#emid').html(data);
            }    
        });
    });
      $('#save_mes').on('click', function () {

        var mes_name = $('#mes_name').val();
        var mes_detial = $('#mes_detial').val();
        var divistion_id = $('#divistion_id').val();
        var emid = $('#emid').val();
        


        if (mes_name != "" && mes_detial != "" && divistion_id != "" && emid != "" ) {
          $.ajax({
            url: "save_text.php",
            type: "POST",
            data: {
              mes_name: mes_name,
              mes_detial: mes_detial,
              divistion_id: divistion_id,
              emid: emid
            },
            cache: false,
            success: function (dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                Swal.fire({
                  icon: 'success',
                  title: 'ส่งข้อความสำเร็จ',

                })
                $('#g1').modal('show');
               
              }
              else if (dataResult.statusCode == 201) {
                Swal.fire({
                  icon: 'error',
                  title: 'ส่งข้อความไม่สำเร็จ',
                })
              }
             
            }
          });
        }
        else {
          Swal.fire('กรุณากรอกข้อมูลให้ครบ');
        }
        
      });
    });

    
  </script>
</body>

</html>


        