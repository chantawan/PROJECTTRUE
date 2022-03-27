<?php
include "connect2.php";

date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>เอกสารนำเข้า</title>

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

  <link rel="icon" href="img/login2.png" type="image/png">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/mdb.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">

  <script src="js/jquery-1.8.3.min.js"></script>
  <link rel="stylesheet" type="text/css" href="media/css/dataTable.css" />
  <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>

  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $('#dtable').dataTable({
        "aLengthMenu": [
          [5, 10, 15, 25, 50, 100, -1],
          [5, 10, 15, 25, 50, 100, "All"]
        ],
        "iDisplayLength": 10

      });
    })
  </script>
  <style type="text/css">
    select[multiple],
    select[size] {
      height: auto;
      width: 20px;
    }

    * {
      font-family: 'supermarket';
    }

    body {
      background-image: url('img/background.jpg');
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: 100% 100%, auto;
    }

    .pull-right {
      float: right;
      margin: 2px !important;
    }

    #loader {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url('img/lg.flip-book-loader.gif') 50% 50% no-repeat rgb(249, 249, 249);
      opacity: 1;
    }

    /*   #dtable{
 display: block;

  overflow-x: scroll;
  width: 600px;
    }*/
  </style>

  <script src="jquery.min.js"></script>
  <script type="text/javascript">
    $(window).on('load', function() {
      //you remove this timeout
      setTimeout(function() {
        $('#loader').fadeOut('slow');
      });
      //remove the timeout
      //$('#loader').fadeOut('slow'); 
    });
  </script>

</head>

<body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
  <?php
  include "connect.php";

  if (!isset($_SESSION['emp_id'])) {
    header('Location: login_admin.php');
  }

  $emp_id = $_SESSION['emp_id'];
  $emp_firstname = $_SESSION['emp_firstname'];
  $Position_name = $_SESSION['Position_name'];

  date_default_timezone_set("Asia/Bangkok");

  ?>
  <!-- Start your project here-->
  <!--Navbar -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color fixed-top">
    <a class="navbar-brand" href="#"><img src="js/img/Files_Download.png" width="33px" height="33px">
      <font color="#F0B56F">F</font>ile <font color="#F0B56F">M</font>anagement <font color="#F0B56F">S</font>ystem
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo ucwords(htmlentities($emp_firstname)); ?> <i class="fas fa-user-circle"></i> Login </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
            <a class="dropdown-item" href="history_log.php"> <i class="fas fa-chalkboard-teacher"></i> User Logged</a>
            <a class="dropdown-item" href="login_user.php"><i class="fas fa-sign-in-alt"></i> LogOut</a>

          </div>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <!--/.Navbar -->
  <br><Br><br>
  <!-- Card -->
  <div class="container contact">
  <div class="row">
    <div class="col-md-10">
        <hr>
        <table id="dtable" class="table table-striped" style="">
          <thead>
            <th>เลขที่เอกสาร</th>
            <th>เรื่อง</th>
            <th>วันที่นำเข้าเอกสาร</th>
            <th>วันหมดอายุเอกสาร</th>
            <th>ประเภทเอกสาร</th>
            <th>การจัดการ</th>
          </thead>
          <tbody id="Input_doc" style=" width:100%; height:100%">
          <?php                 
            $search1 = date("Y/m/d");

            $sql_query = "SELECT a.Doc_id,a.document_number,a.document_name,a.document_date,b.documenttype_name
            FROM document a , documenttype b
            Where a.documenttype_id = b.documenttype_id
            ORDER BY `document_date` DESC";

            $result = mysqli_query($conn,$sql_query);
            $num_row = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
          ?>	
              <tr style="background-color:white; color:black;" >
                   <td><?=$row['document_number'];?></a></td>
                  <td><?=$row['document_name'];?></a></td>
                  <td><?=$row['document_date'];?></a></td>
                  <td><?=$row['document_date'];?></a></td>
                  <td><?=$row['documenttype_name'];?></a></td>
                  <td style="width:20%;">
                  <button type="button" class="btn btn-success" id="select_input">เลือก</button>
                  <button onclick="OnDelete4(<?=$row['Doc_id'];?>)" type="button" class="btn btn-danger">ลบ</button>
              </td>

              </tr>
            
            <?php	
             }  
             
            }else {
              
            }
            ?>
           
            
        </tbody>
        </table>

            
      </div>



      </script>




            <!-- Card -->
            <!-- /Start your project here-->

            <!-- SCRIPTS -->
            <!-- JQuery -->
            <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>

            <script type="text/javascript" src="js/popper.min.js"></script>

            <script type="text/javascript" src="js/bootstrap.min.js"></script>

            <script type="text/javascript" src="js/mdb.min.js"></script>

            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css">
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>
            <script>
              function OnDelete4(id) {
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

                      url: "delete_inputDoc.php",
                      type: 'post',
                      data: {
                        Doc_id: id
                      },
                      success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                          swalWithBootstrapButtons.fire(
                            'ลบข้อมูลสำเร็จ',
                            '',
                            'success'

                          )
                          header("Refresh:0; url=add_document.php");
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