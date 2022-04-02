<?php
include "connect2.php";

date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เอกสารส่งออก</title>

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
      background-image: url('img/wall.jpg');
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

  <script>
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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mx-auto" style="width:200%">
    <a class="navbar-brand" href="index_admin.php">
      <font color="#F0B56F">D</font>ocument <font color="#F0B56F"></font>Management <font color="#F0B56F">S</font>ystem
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <label style="color:#FFFFFF83">ชื่อผู้ใช้ : <?php echo $emp_firstname ?> &nbsp</label>
            <label style="color:#FFFFFF83">สถานะ : <?php echo $Position_name ?> &nbsp</label>
            <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
              <a class="dropdown-item" href="history_log.php"> <i class="fas fa-chalkboard-teacher"></i> User Logged</a>
              <a class="dropdown-item" href="login_user.php"><i class="fas fa-sign-in-alt"></i> LogOut</a>

            </div>
        </li>
      </ul>
    </div>
  </nav>
  <br>
  <Br><br>
  <!-- Card -->
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <center>
          <h2>เอกสารส่งออก</h2>
        </center>

        <!--/.Navbar -->
        <br><Br><br>
        <!-- Card -->
        <div class="container contact">
          <div class="row">
            <div class="col-md-10">
              <hr>
              <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal5">เพิ่มเอกสารส่งออก</button>
              <table id="dtable" class="table table-striped" style="width:150%">
                <thead>
                  <th style="color:#fff; font-size:23px">เลขที่เอกสาร</th>
                  <th style="color:#fff;font-size:23px">เรื่อง</th>
                  <th style="color:#fff;font-size:23px">วันที่ส่งออกเอกสาร</th>
                  <th style="color:#fff;font-size:23px">ประเภทเอกสาร</th>
                  <th style="color:#fff;font-size:23px">การจัดการ</th>
                </thead>
                <tbody id="Input_doc" style=" width:100%; height:100%">
                  <?php
                  $search1 = date("Y/m/d");

                  $sql_query = "SELECT a.Doc_id,a.document_number,a.document_name,a.document_date_Out,b.documenttype_name,a.download,a.documentstatus_id
            FROM document a , documenttype b
            Where a.documenttype_id = b.documenttype_id and a.documentstatus_id = '7'
            ORDER BY `document_date` DESC";

                  $result = mysqli_query($conn, $sql_query);
                  $num_row = mysqli_num_rows($result);
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                  ?>
                      <tr style="background-color:white; color:black;">
                        <td style="color:black; font-size:23px"><?= $row['document_number']; ?></a></td>
                        <td style="color:black; font-size:23px"><?= $row['document_name']; ?></a></td>
                        <td style="color:black; font-size:23px"><?= $row['document_date_Out']; ?></a></td>
                        <td style="color:black; font-size:23px"><?= $row['documenttype_name']; ?></a></td>
                        <td style="width:20%;">
                          <button onclick="OnDelete4(<?= $row['Doc_id']; ?>)" type="button" class="btn btn-danger">ลบ</button>
                        </td>
                      </tr>

                  <?php
                    }
                  } else {
                  }
                  ?>
                </tbody>
              </table>

            </div>
          </div>

          <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" style="width:100%">
                <div class="modal-header bg-primary text-white" style="width:100%">
                  <h5 class="modal-title" id="exampleModalLabel">เอกสารส่งออก</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <center>
                  <h2>กรอกข้อมูลเอกสาร</h2>
                </center>
                </br>
                <center>
                  <h2>คำชี้แจง : โปรดกรอกรายละเอียดให้ครบถ้วน</h2>
                </center>
                <div class="modal-body" style="width:100%">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <div class="preference">
                          <label for="documentNumber">เลขที่หนังสือ :</label>
                          <input type="text" class="form-control" id="document_number" name="document_number" placeholder="Enter Number">
                          <input type="hidden" id="documentstatus_id" value="7">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="documentName">ชื่อหนังสือ :</label>
                        <input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="documentDetaile">รายละเอียด :</label>
                        <input type="text" style="width:210%" class="form-control" id="document_detail" name="document_detail" placeholder="Enter Detaile">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="documenttype_id">ประเภทเอกสาร :</label>
                        <?php
                        $sql = "SELECT * from documenttype";

                        $result = mysqli_query($conn, $sql);
                        ?>
                        <select name="documenttype_id" id="documenttype_id" class="form-select">
                          <option value="ประเภทเอกสาร">ประเภทเอกสาร</option>
                          <?php
                          while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                            <option value="<?php echo $row["documenttype_id"] ?>"><?php echo $row["documenttype_name"] ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <?php
                        $date = date("Y-m-d");
                        ?>
                        <input type="date" id="document_date_Out" name="document_date_Out" value="<?= $date ?>" hidden>
                        <label for="download">อัพโหลดไฟล์เอกสาร:</label>
                        <input id="download" type='file' accept="application/pdf">
                        <input type="hidden" id="b64">
                        <embed id="pdf" height="120">

                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="clear_modal5">ปิด</button>
                      <button type="button" class="btn btn-success" id="butupdatedoc">ยืนยัน</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      </script>




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
                    AutoRefresh();
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

        function Onsent(id) {
          $.ajax({
            url: "Select_Doc.php",
            type: 'post',
            data: {
              Doc_id: id
            },
            success: function(dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {

                $("#Doc_id").val(dataResult.Doc_id);
                $("#document_number").val(dataResult.document_number);

              }
            }
          });
        }
      </script>
      <script>
        $(document).ready(function() {

          $('#clear_modal5').on('click', function() {
            $('#exampleModal5').find('input[type=text], input[type=password], input[type=number], input[type=tel], input[type=email], textarea').val('');
          });

          $('#divistion_id').change(function() {
            var divistion_id = $(this).val();

            $.ajax({
              type: "post",
              url: "SelectDivistion.php",
              data: {
                id: divistion_id,
                function: 'divistion_id'
              },
              success: function(data) {
                $('#emid').html(data);
              }
            });
          });


          function OnDelete3(id) {
            //  alert(id);
            const swalWithBootstrapButtons = Swal.mixin({
              customClass: {
                confirmButton: 'btn btn-success mx-2',
                cancelButton: 'btn btn-danger mx-2'
              },
              buttonsStyling: false
            })
          }
          $('#butupdatedoc').on('click', function() {
            
            var document_number = $('#document_number').val();
            var document_name = $('#document_name').val();
            var documenttype_id = $('#documenttype_id').val();
            var document_detail = $('#document_detail').val();
            var document_date_Out = $('#document_date_Out').val();
            var download = $('#download').val();
            var documentstatus_id = $('#documentstatus_id').val();;
            var download = document.getElementById("pdf").src;


            if (document_number != "" && document_name != "" && document_date_Out != "" && download != "" && documenttype_id != "") {
              $.ajax({
                url: "save_sentOut.php",
                type: "POST",
                data: {
                  document_number: document_number,
                  document_name: document_name,
                  documenttype_id: documenttype_id,
                  document_detail: document_detail,
                  document_date_Out: document_date_Out,
                  download: download,
                  documentstatus_id: documentstatus_id

                },
                cache: false,
                success: function(dataResult) {
                  var dataResult = JSON.parse(dataResult);
                  if (dataResult.statusCode == 200) {
                    Swal.fire({
                      icon: 'success',
                      title: 'เพิ่มข้อมูลสำเร็จ',
                    })
                    AutoRefresh();
                  }
                }

              });
            } else {
              Swal.fire('กรุณากรอกข้อมูลให้ครบ');
            }
          });
        });

        function AutoRefresh() {
          setTimeout("location.reload(true);", 1000);

        }

        function readFile() {

          var test = ''

          if (this.files && this.files[0]) {

            var FR = new FileReader();

            FR.addEventListener("load", function(e) {
              document.getElementById("pdf").src = e.target.result;
              document.getElementById("b64").innerHTML = e.target.result;
              return e.target.result
            });

            FR.readAsDataURL(this.files[0]);
          }
        }
        document.getElementById("download").addEventListener("change", readFile);

        console.log(document.getElementById("download"))
      </script>
</body>

</html>