<?php
include "connect.php";

if (!isset($_SESSION['emp_id'])) {
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

  <title>แฟ้มเอกสารทั่วไป</title>
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

    td,
    th {
      border: 0px solid #dddddd;
      text-align: center;
      padding: 8px;
      font-size: 20px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

    #show_index {
      background-color: rgba(255, 255, 255, 0.4)
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
        <li><a class="nav-link scrollto active " style="font-size:25px;" href= "index_manager.php">หน้าแรก</a></li>
        <!-- Example single danger button -->
        <div class="dropdown">
          <button class="btn  btn-sm dropdown-toggle" style="width:100%; margin-left:5%; color:white; font-size:25px;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            การจัดการเอกสาร
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="document_recive_manager.php">เอกสารถึงตัวท่าน</a></li>
            <li><a class="dropdown-item">เอกสารรอดำเนินการ</a></li>
            <li><a class="dropdown-item" href="sent_message.php">ส่งข้อความ</a></li>

          </ul>
        </div>
        <li><a class="nav-link scrollto" style="font-size:25px;" href="document_storage.php">แฟ้มเอกสาร</a></li>
        <li><a class="nav-link scrollto" style="font-size:25px;" href="#">คู่มือ</a></li>
        <li><a class="nav-link scrollto" style="font-size:25px;" href="logout.php?option=2">ออกจากระบบ</a></li>
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
      <div class="container" style="margin-top:10%">
      <table id="dtable" class="table table-striped">
          <thead>

            <th>ชื่อไฟล์</th>
            <th>ขนาดไฟล์</th>
            <th>อัพโหลดโดย</th>
            <th>สถานะ</th>
            <th>วัน/เวลา</th>
            <th>ดาวน์โหลด</th>
            <th>ลบ</th>

          </thead>
          <tbody>

            <?php
            $sql_query = "SELECT ID
                    FROM upload_files
                    ORDER BY `ID` ASC";

            $result = mysqli_query($conn, $sql_query);
            $num_row = mysqli_num_rows($result);

            while ($row = $result->fetch_assoc()) {
            ?>
              <tr>
                <?php

                require_once("connect.php");

                $query = mysqli_query($conn, "SELECT ID,FILES_NAME,SIZE,EMAIL,ADMIN_STATUS,TIMERS,DOWNLOAD FROM upload_files group by FILES_NAME DESC") or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($query)) {
                  $id =  $row['ID'];
                  $name =  $row['FILES_NAME'];
                  $size =  $row['SIZE'];
                  $uploads =  $row['EMAIL'];
                  $status =  $row['ADMIN_STATUS'];
                  $time =  $row['TIMERS'];
                  $download =  $row['DOWNLOAD'];

                ?>

                  <td width="17%"><?php echo  $name; ?></td>
                  <td><?php echo floor($size / 1000) . ' KB'; ?></td>
                  <td><?php echo $status; ?></td>
                  <td><?php echo $status; ?></td>
                  <td><?php echo $time; ?></td>
                  <td <?php echo $download; ?>class="alert-success"><a href='download.php?filename=<?php echo $name; ?>'><img src="img/698569-icon-57-document-download-128.png" width="30px" height="30px" title="Download File"></a> </td>
                  <td onclick="OnDelete3(<?= $row['ID']; ?>)" type="button" class="alert-success"><img src="img/delete.png" width="30px" height="30px" title="Delete File"></a> </td>
              </tr>
              <?php }
               ?>
          <?php }
               ?>
          </tbody>
        </table>
      </div>

    </div>
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

  </script>
            <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>

            <script type="text/javascript" src="js/popper.min.js"></script>

            <script type="text/javascript" src="js/bootstrap.min.js"></script>

            <script type="text/javascript" src="js/mdb.min.js"></script>

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css">
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>
            <script>
              function OnDelete3(id) {
                //  alert(id);
                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: 'คุณต้องการลบข้อมูลนี้หรือไม่ ?',
                  icon: 'question',
                  // background: 'yellow',
                  showCancelButton: true,
                  cancelButtonText: 'ยกเลิก',
                  confirmButtonText: 'ยืนยัน',
                  reverseButtons: true
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({

                      url: "delete.php",
                      type: 'post',
                      data: {
                        ID: id
                      },
                      success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                          swalWithBootstrapButtons.fire(
                            'ลบข้อมูลสำเร็จ',
                            '',
                            'success'

                          )
                          header("Refresh:0; url=document_storage.php");
                        } else {
                          Swal.fire({
                            icon: 'error',
                            title: 'ไม่สามารถลบได้'
                          })
                        }
                      }
                    });
                  }
                });
              }
            </script>
</body>


</html>




      