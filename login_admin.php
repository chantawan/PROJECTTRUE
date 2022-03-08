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

      <h1 class="logo"><a href="index.html">Pattani City Municipality Office</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.html">Home</a></li>
          <li><a class="nav-link scrollto active" href="login_admin.php">ADMIN</a></li>
          <li><a class="nav-link scrollto" href="login_user.php">USER</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <div id="hero" class="hero route bg-image" style="background-image: url(assets/img/wall.jpg)">
    <div class="overlay-itro"></div>
    <div class="hero-content display-table">
      <div class="table-cell">
        <div class="container">
        
                
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 ">
                            <center><img src="img/login2.png" width="70%" alt=""></center>
                            </div>
                            <div class="col-md-6"><br>
                            <center><h1 style="color:white;">ผู้ดูแล</h1></center><br>
                                <div class="mb-3 mx-auto" style="width:70%" >
                                    <center><input type="text" class="form-control"style = "width:100%; font-size: 25px" id="emp_firstname" name="emp_firstname" placeholder="ชื่อผู้ใช้" required></center>
                                </div>
                                <div class="mb-3 mx-auto" style="width:70%">
                                    <center><input type="password" class="form-control" style = "width:100%; font-size: 25px" id="emp_password" name="emp_password" placeholder="รหัสผ่าน" required></center>
                                </div>
                                <div class="mb-3">
                                    <center><button id="but_submit" style = "width:60%; font-size: 25px" class="btn-success btn btn-login">เข้าสู่ระบบ</button></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div><!-- End Hero Section -->

  </main><!-- End #main -->
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
        $(document).ready(function(){
            $("#but_submit").on('click',function(){
                var emp_firstname = $("#emp_firstname").val();
                var emp_password = $("#emp_password").val();

                if( emp_firstname != "" && emp_password != "" ){
                    $.ajax({
                        url:'checkAdmin.php',
                        type:'post',
                        data:{
                            emp_firstname: emp_firstname,
                            emp_password: emp_password
                        },
                        success: function(dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                location.href = "index_admin.php";
                                
                            }else if(dataResult.statusCode == 201){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
                                })
                            }
                        }
                    });
                }
                else{
                    Swal.fire('กรุณากรอกข้อมูลให้ครบ');
                }
            });
        });
    </script>
</body>

</html>


    