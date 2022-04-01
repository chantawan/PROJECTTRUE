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
    #show_index {
      display: block;
    }

    #show_read {
      display: none;
    }

    * {
      font-family: 'Agency FB';
    }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;

    }

    a:hover {
      color: #ffcccc;
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
        <li><a class="nav-link scrollto  " style="font-size:25px;" href="index_user.php">หน้าแรก</a></li>
        <!-- Example single danger button -->
        <li><a class="nav-link scrollto" style="font-size:25px;" href="document_recive_user.php">เอกสารถึงตัวท่าน</a></li>
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
      <div class="container" style="margin-top:10%; background-color:gray; " id="show_index">
        <table style="border:double 4px #ffcccc;padding:3px; width:30%; height:100px">
          <tbody>
            <?php
            $sql_query = "SELECT COUNT(Doc_id) as DocRead 
              FROM document
              Where documentstatus_id = 2 and emp_id = '$emp_id'";

            $result = mysqli_query($conn, $sql_query);
            $num_row = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
            ?>
                <tr style="background-color:white; color:black;">

                  <td align="center" align="middle" style="border:4px double #ffcccc;padding:10px; font-size:68px;"><?= $row['DocRead']; ?><p style="font-size:18px">ยังไม่อ่าน</p>
                  </td>
                  <?php
                  ?>
                </tr>

            <?php
              }
            } else {
              echo "ERROR";
            }
            ?>

          </tbody>
        </table>
        <input type="text" id="eid" value="<?= $emp_id ?>" hidden>
        <table class="table table-responsive-md mx-auto" style="width:50%">
          <thead>
            <tr style="color:white;">

              <th class="thcenter">
                <select class="form-select-sm" aria-label="select" id="s1">
                  <option selected value=" ">ทั้งหมด</option>
                  <option value="1">อ่าน</option>
                  <option value="2">ยังไม่อ่าน</option>
                </select>

              </th>
              <th class="thcenter">

                <?php
                $sql = "SELECT * from documenttype";

                $result = mysqli_query($conn, $sql);
                ?>
                <select name="documenttype_id" id="documenttype_id">
                  <option value="ประเภท">ประเภทเอกสาร</option>
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <option value="<?php echo $row["documenttype_id"] ?>"><?php echo $row["documenttype_name"] ?></option>
                  <?php

                  }
                  ?>
                </select>
              </th>
          </thead>
          <table class="table table-responsive-md mx-auto" style="width:100%">
            <thead>
              <tr style="background-color:#212529; color:white;">
                <th class="thcenter" style="width:8%">เลขที่เอกสาร</th>
                <th class="thcenter">หัวข้อ</th>
                <th class="thcenter" style="width:8%"></th>
                <th class="thcenter" style="width:20%">คำอธิบาย</th>
                <th class="thcenter">เวลา</th>
                <th class="thcenter">จัดการข้อความ</th>

              </tr>
            </thead>
            <tbody id="document_now" style=" width:100%; height:100%">
              <?php
              $sql_query1 = "SELECT  a.Doc_id , a.document_number , a.document_name , a.document_detail , a.document_date , b.documenttype_name , c.documentstatus_name
            FROM document a, documenttype b, document_status c
            WHERE b.documenttype_id = a.documenttype_id and c.documentstatus_id = a.documentstatus_id and a.emp_id = '$emp_id' ORDER BY `a`.`document_date` DESC";
              $result = mysqli_query($conn, $sql_query1);
              $num_row = mysqli_num_rows($result);
              if ($num_row > 0) {
                while ($row = $result->fetch_assoc()) {
              ?>
                  <tr style="background-color:white; color:black;">
                    <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['document_number']; ?></td>
                    <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['document_name']; ?></td>
                    <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['documentstatus_name']; ?></span></td>
                    <td onclick="show_read(<?= $row['Doc_id']; ?>)"><?= $row['document_detail']; ?></td>
                    <td><?= $row['document_date']; ?></td>
                    <td> <button onclick="OnDelete(<?= $row['Doc_id']; ?>)" type="button" class="btn btn-sm btn-danger">ลบ</button></td>

                  </tr>
              <?php

                }
              } else {
                echo '<span style="color:White;">ไม่พบข้อความ</span>';
              }
              ?>


            </tbody>
          </table>

      </div>
      <div class="container" style="margin-top:10%; background-color:gray; " id="show_read">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <input type="text" class="form-control" name="Doc_id" id="Doc_id" hidden>
              <label for="document_number">เลขเอกสาร</label>
              <input type="text" class="form-control" style="background-color:gray; border: 0px solid #dddddd; font-size:20px;" name="document_number" id="document_number" readonly>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <input type="text" class="form-control" style="background-color:gray; border: 0px solid #dddddd; font-size:20px;" name="document_name" id="document_name" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <input type="text" class="form-control" style="background-color:gray; border: 0px solid #dddddd; font-size:20px;" name="document_detail" id="document_detail" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <input type="text" class="form-control" style="background-color:gray; border: 0px solid #dddddd; font-size:20px;" name="documenttype_name" id="documenttype_name" readonly>
              </div>
            </div>
            <!-- <?php
                  $sql_query = "SELECT download , Doc_id
                    FROM document
                    ORDER BY `Doc_id` ASC";

                  $result = mysqli_query($conn, $sql_query);
                  $num_row = mysqli_num_rows($result);

                  while ($row = $result->fetch_assoc()) {
                  ?>
              <tr>

                <?php
                    echo "<td>" . "<embed src='" . $row['download'] . "' type='text/html' width='400px' height='500px'>" . "</td>" ?>

              </tr>

              </tr>

            <?php
                  }
            ?> -->
            <table class="table table-responsive-md mx-auto" style="width:100%">
              <thead>
                <tr style="background-color:#212529; color:white;">
                  <th class="thcenter" style="width:8%"></th>
                </tr>
              </thead>
              <tbody id="document" style=" width:100%; height:100%">

              </tbody>
            </table>
            <button style="width:10%; margin-left:10%" type="button" class="btn btn-sm btn-danger" id="test">เปิดดูเอกสาร</button>

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

      <script>
        show_index();

        function show_index() {
          $("#show_index").show();
          $("#show_read").hide();
        }

        function show_read(id) {

          $("#show_index").hide();
          $("#show_read").show();
          $.ajax({
            url: "Select_docforread.php",
            type: 'post',
            data: {
              Doc_id: id
            },
            success: function(dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {

                $("#Doc_id").val(dataResult.Doc_id);
                $("#document_number").val(dataResult.document_number);
                $("#document_name").val(dataResult.document_name);
                $("#document_detail").val(dataResult.document_detail);
                $("#documenttype_name").val(dataResult.documenttype_name);
                $("#download").val(dataResult.download);

              }
            }
          });
        }
        $("#s1").change(function() {

          var select = $("#s1").val();
          var eid = $("#eid").val();

          $.ajax({

            type: "POST",

            url: "view_docread.php",

            data: {

              read: select,
              eid: eid


            },

            success: function(data) {

              $('#document_now').html(data);

            }

          });

        });
        $("#test").click(function() {

          var doc_id = $("#Doc_id").val();
          $.ajax({

            type: "POST",

            url: "View_docblank.php",

            data: {

              doc_id: doc_id


            },

            success: function(data) {

              $('#document').html(data);

            }

          });

        });

        function OnDelete(id) {
          //  alert(id);
          const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success mx-2',
              cancelButton: 'btn btn-danger mx-2'
            },
            buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
            title: 'คุณต้องการลบเอกสารนี้หรือไม่ ?',
            icon: 'question',
            // background: 'yellow',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: "delete_Doc.php",
                type: 'post',
                data: {
                  Doc_id: id
                },
                success: function(dataResult) {
                  var dataResult = JSON.parse(dataResult);
                  if (dataResult.statusCode == 200) {
                    swalWithBootstrapButtons.fire(
                      'ลบเอกสารสำเร็จ',
                      '',
                      'success'
                    )
                    AutoRefresh();
                  } else {
                    Swal.fire({
                      icon: 'error',
                      title: 'ข้อความกำลังอยู่ระหว่างดำเนินการ'
                    })
                  }
                }
              });
            }
          });
        }

        function AutoRefresh() {
          setTimeout("location.reload(true);", 1000);

        }
      </script>
</body>


</html>