<?php
include "connect.php";

// Check user login or not
if (!isset($_SESSION['emp_id'])) {
  header('Location: login_admin.php');
}

$emp_id = $_SESSION['emp_id'];
$emp_firstname = $_SESSION['emp_firstname'];
$Position_name = $_SESSION['Position_name'];
?>

<!DOCTYPE html>
<html lang="en">
ss
<head>
  <link rel="icon" href="img/login2.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>อัพโหลดเอกสาร</title>
</head>
<?php
$con = new PDO('mysql:host=localhost; dbname=project', 'root', '') or die(mysql_error());
if (isset($_POST['submit']) != "") {
  $name = $_FILES['file']['name'];
  $size = $_FILES['file']['size'];
  $type = $_FILES['file']['type'];
  $temp = $_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis") . '_' . $name;
  $chk = $con->query("SELECT * FROM  document where name = '$name' ")->rowCount();
  if ($chk) {
    $i = 1;
    $c = 0;
    while ($c == 0) {
      $i++;
      $reversedParts = explode('.', strrev($name), 2);
      $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
      // var_dump($tname);exit;
      $chk2 = $con->query("SELECT * FROM  document where name = '$tname' ")->rowCount();
      if ($chk2 == 0) {
        $c = 1;
        $name = $tname;
      }
    }
  }
  $move =  move_uploaded_file($temp, "upload/" . $fname);
  if ($move) {
    $query = $con->query("insert into document(fname,name)values('$fname','$name')");
    if ($query) {
      header("location:upload.php");
    } else {
      die(mysql_error());
    }
  }
}
?>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script src="js/validation.js"></script>
<link rel="stylesheet" href="css/style.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
</head>
<script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="css/mdb.min.css" rel="stylesheet">
<!-- Your custom styles (optional) -->
<link href="css/style.min.css" rel="stylesheet">

<script src="js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="medias/css/dataTable.css" />
<script src="medias/js/jquery.dataTables.js" type="text/javascript"></script>
<!-- end table-->
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
<style>
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

  #show_employee {
    display: none;
  }

  #show_index {
    display: block;
  }

  #show_divistion {
    display: none;
  }

  #show_manual {
    display: none;
  }

  #show_history {
    display: none;
  }

  th.thcenter {
    text-align: center;
  }

  #modal {
    background: rgba(0, 0, 0, 0.7);
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 100;
    display: none;
  }

  .bgLeft {
    background: rgba(0, 0, 0, 0.5);
  }

  .glow-on-hover {
    width: 300px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 50px;
  }

  .glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left: -2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
  }

  .glow-on-hover:active {
    color: #000
  }

  .glow-on-hover:active:after {
    background: transparent;
  }

  .glow-on-hover:hover:before {
    opacity: 1;
  }

  .glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #111;
    left: 0;
    top: 0;
    border-radius: 10px;
  }

  @keyframes glowing {
    0% {
      background-position: 0 0;
    }

    50% {
      background-position: 400% 0;
    }

    100% {
      background-position: 0 0;
    }
  }
</style>
<div class="container contact">
  <div class="row">
    <div class="col-md-9">
      <center>
        <h2>กรอกข้อมูลเอกสาร</h2>
      </center>
      </br>
      <center>
        <h2>คำชี้แจง : โปรดกรอกรายละเอียดให้ครบถ้วน</h2>
      </center>

      <div class="form-group">
        <label class="control-label col-sm-2" for="documentNumber">เลขที่หนังสือ:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="document_number" name="document_number" placeholder="Enter Number">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="documentName">ชื่อหนังสือ:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter Name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="documentDetaile">รายละเอียด:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="document_detail" name="document_detail" placeholder="Enter Detaile">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="divistionId">รหัส:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="divistion_id" name="divistion_id" placeholder="Enter Divistionid">
        </div>
      </div>
      <div class="form-group">
        <p>ประเภทเอกสาร:
          </br>
          <select name="documenttype_id" id="documenttype_id">
            <option value="0">--เลือกประเภทเอกสาร--</option>
            <option value="1">--เอกสารของหน่วยงาน--</option>
            <option value="2">--หน่วยงานภายใน--</option>
            <option value="3">--หน่วยงานภายนอก--</option>
          </select>
      </div>
      </p>
      </p>

      <div class="d-flex justify-content-center pull-right">
        <p>ชั้นความเร็ว :
          <?php
          $sql = "SELECT * from speedclass";

          $result = mysqli_query($conn, $sql);
          ?>
          <select name="speed_send" id="speed_send" class="form-select">
            <option value="ชั้นความเร็ว">ชั้นความเร็ว</option>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <option value="<?php echo $row["speedclass_id"] ?>"><?php echo $row["speedclass_name"] ?></option>
            <?php
            }
            ?>
          </select>
        </p>
        <p>ชั้นความลับ :
          <?php
          $sql = "SELECT * from secretclass";

          $result = mysqli_query($conn, $sql);
          ?>
          <select name="secret_send" id="secret_send" class="form-select">
            <option value="ชั้นความเร็ว">ชั้นความเร็ว</option>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <option value="<?php echo $row["Secretclass_Id"] ?>"><?php echo $row["Secretclass_Name"] ?></option>
            <?php
            }
            ?>
          </select>
        </p>
        <p>เก็บไว้ถึงปี พ.ศ.&nbsp;:
          <label for="documentDate"></label>
          <input type="date" name="mydate" id="mydate">
        </p>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="DocumentFI">อัพโหลดไฟล์:</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" id="download" name="download">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <footer><button type="submit" class="btn btn-default" id="save_document">บันทึก</button></footer>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#save_document').on('click', function() {

      var document_number = $('#document_number').val();
      var document_name = $('#document_name').val();
      var document_detail = $('#document_detail').val();
      var divistion_id = $('#divistion_id').val();
      var documenttype_id = $('#documenttype_id').val();
      var speed_send = $('#speed_send').val();
      var secret_send = $('#secret_send').val();
      var mydate = $('#mydate').val();
      var download = $('#download').val();


      if (document_number != "" && document_name != "") {
        $.ajax({
          url: "save_document.php",
          type: "POST",
          data: {
            document_number: document_number,
            document_name: document_name,
            document_detail: document_detail,
            divistion_id: divistion_id,
            documenttype_id: documenttype_id,
            speed_send: speed_send,
            secret_send: secret_send,
            mydate: mydate,
            download: download
          },
          cache: false,
          success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
              
              Swal.fire({
                icon: 'success',
                title: 'เพิ่มกองสำเร็จ',
              })
              $('#exampleModal5').modal('hide');
            } else if (dataResult.statusCode == 201) {
              Swal.fire({
                icon: 'error',
                title: 'มีชื่อกองนี้แล้ว',
              })
            }
            $('#exampleModal5').find('input[type=text], input[type=password], input[type=number], input[type=tel], input[type=email], textarea').val('');
          }
        });
      } else {
        Swal.fire('กรุณากรอกข้อมูลให้ครบ');
      }
    });
  });
</script>