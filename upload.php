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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mx-auto"style="width:200%">
    <a class="navbar-brand" href="index_admin.php"><img src="img/icon.png" width="33px" height="33px"> <font color="#F0B56F">F</font>ile <font color="#F0B56F">M</font>anagement <font color="#F0B56F">S</font>ystem</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fab fa-facebook-f"></i> Facebook
          <span class="sr-only">(current)</span>
        </a>
      </li>-->
   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
           <font color="black"></font> <?php echo ucwords(htmlentities($emp_firstname)); ?> <i class="fas fa-user-circle"></i> Login </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
           <a class="dropdown-item" href="login_admin.php"> <i class="fas fa-chalkboard-teacher"></i> User Logged</a>
          <a class="dropdown-item" href="index.html"><i class="fas fa-sign-in-alt"></i> LogOut</a>

        </div>
      </li>
    </ul>
  </div>
</nav>
<br>
<!DOCTYPE html>
<html lang="en">

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
$con = new PDO('mysql:host=localhost; dbname=project2', 'root', '');
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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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

<script src="js/jquery-3.5.1.min.js"></script>
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
<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <a href="index_admin.php">
      <footer><button type="submit" class="btn btn-default">หน้าหลัก</button></footer>
    </a>
  </div>
</div>
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
          <input type="hidden" id="documentstatus_id" value="6">
        </div>
      </div>
      </p>
      </p>
      <div class="form-group">
        <label class="control-label col-sm-2" for="documentName">ชื่อหนังสือ:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="document_name" name="document_name" placeholder="Enter Name">
        </div>
      </div>
      </p>
      </p>
      <div class="form-group">
        <label class="control-label col-sm-2" for="documentDetaile">รายละเอียด:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="document_detail" name="document_detail" placeholder="Enter Detaile">
        </div>
      </div>
      </p>
      </p>
      <div class="form-group">
        <p>ประเภทเอกสาร:
          <?php
          $sql = "SELECT * from documenttype";

          $result = mysqli_query($conn, $sql);
          ?>
        <div class="col-sm-10">
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
        </p>
        </p>
        </td>
        <div class="col-sm-10">
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
        </div>
        </p>
        <div class="col-sm-10">
          <p>ชั้นความลับ :
            <?php
            $sql = "SELECT * from secretclass";

            $result = mysqli_query($conn, $sql);
            ?>
            <select name="secret_send" id="secret_send" class="form-select">
              <option value="ชั้นความลับ">ชั้นความลับ</option>
              <?php
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <option value="<?php echo $row["Secretclass_Id"] ?>"><?php echo $row["Secretclass_Name"] ?></option>
              <?php
              }
              ?>
            </select>
        </div>
        </p>
        <p>เก็บไว้ถึงปี พ.ศ.&nbsp;:
          <label for="documentDate"></label>
          <input type="date" name="document_date" id="document_date">
        </p>

        <div class="form-group">
          <label class="control-label col-sm-2" for="DocumentFI">อัพโหลดไฟล์:</label>
          <div class="col-sm-10">
          <input id="download" type='file'  accept="application/pdf">
            <input type="hidden" id="b64">
            <img id="img" height="120">
          </div>
        </div>
        </p>
        </p>
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
        var documenttype_id = $('#documenttype_id').val();
        var speed_send = $('#speed_send').val();
        var secret_send = $('#secret_send').val();
        var document_date = $('#document_date').val();
        var download = $('#download').val();
        var documentstatus_id = $('#documentstatus_id').val();;
        var download = document.getElementById("img").src;

        if (document_number != "" && document_name != "") {
          $.ajax({
            url: "save_document.php",
            type: "POST",
            data: {
              document_number: document_number,
              document_name: document_name,
              document_detail: document_detail,
              documenttype_id: documenttype_id,
              speed_send: speed_send,
              secret_send: secret_send,
              document_date: document_date,
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
                header('location : add_document.php');
              } else if (dataResult.statusCode == 201) {
                Swal.fire({
                  icon: 'error',
                  title: 'มีชื่อนี้แล้ว',
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
    function readFile() {

var test = ''

if (this.files && this.files[0]) {

    var FR = new FileReader();

    FR.addEventListener("load", function (e) {
        document.getElementById("img").src = e.target.result;
        document.getElementById("b64").innerHTML = e.target.result;
        return e.target.result
    });

    FR.readAsDataURL(this.files[0]);
  }
}
document.getElementById("download").addEventListener("change", readFile);

console.log(document.getElementById("download"))
  </script>