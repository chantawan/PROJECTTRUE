<!DOCTYPE html>
<html lang="en">
<?php

// Inialize session
session_start();

?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="img/login2.png" type="image/png">
  <title>อัพโหลดเอกสารนำเข้า</title>
</head>

<?php
$conn = new PDO('mysql:host=localhost; dbname=project', 'root', '') or die(mysql_error());
if (isset($_POST['submit']) != "") {
  $name = $_FILES['file']['name'];
  $size = $_FILES['file']['size'];
  $type = $_FILES['file']['type'];
  $temp = $_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis") . '_' . $name;
  $chk = $conn->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
  if ($chk) {
    $i = 1;
    $c = 0;
    while ($c == 0) {
      $i++;
      $reversedParts = explode('.', strrev($name), 2);
      $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
      // var_dump($tname);exit;
      $chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
      if ($chk2 == 0) {
        $c = 1;
        $name = $tname;
      }
    }
  }
  $move =  move_uploaded_file($temp, "upload/" . $fname);
  if ($move) {
    $query = $conn->query("insert into upload(name,fname)values('$name','$fname')");
    if ($query) {
      header("location:upload.php");
    } else {
      die(mysql_error());
    }
  }
}
?>
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
  select[multiple],
  select[size] {
    height: auto;
    width: 20px;
  }

  .pull-right {
    float: right;
    margin: 2px !important;
  }

  .map-container {
    overflow: hidden;
    padding-bottom: 56.25%;
    position: relative;
    height: 0;
  }

  .map-container iframe {
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    position: absolute;
  }

  input[type=file] {
    border: 2px dotted #999;
    border-radius: 10px;
    margin-left: 9px;
    width: 231px !important;
  }

  body {
    background-image: url('img/wall.jpg');
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed;
    background-size: 100% 100%, auto;
  }
</style>
<center>
  <br>
  <br>
  <br>
  <br>
  <br>
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="index_admin.php">หน้าหลัก</a>
            <span>/</span>
            <span>เอกสารนำเข้า</span>
          </h4>

          <div class="d-flex justify-content-center pull-right">

            <a href="add_document.php">
              <button class="btn btn-warning"><i class="far fa-file-image"></i> ดูไฟล์</button></a>
          </div>
        </div>
        <hr>
        <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add File Form</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-2">
              </div>
            </div>
          </div>
        </div>
        <center>
          <div class="text-center col-md-8">
            <div class="card">
              <table width="830" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <th width="1819" bgcolor="#CCCCCC" scope="col">กรอกข้อมูลเอกสาร</th>
                </tr>
                <tr>
                  <td bgcolor="#CCCCCC">
                    <table width="522" border=0" align="center">
                      <tr bgcolor="#999999">
                        <th align="center" valign="middle" scope="col" colortxt="red">คำชี้แจง : โปรดกรอกรายละเอียดให้ครบถ้วน</th>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr align="left">
                  <td>
                  <form action="insert.php" method="post">
                      <br>
                      <p>เลขที่หนังสือ :
                        <label for="code"></label>
                        <input type="text" name="document_id" id="document_id">
                        <label for="document_id"></label>

                      </p>
                      <p>ประเภทเอกสาร :
                        <label for="phone"></label>
                        <input type="text" name="documenttype_id" id="documenttype_id">
                        <label for="documenttype_id"></label>

                      <p>
                        <label for="accept_other"></label>
                        จาก :
                        <input type="radio" name="divistion_id" id="divistion_id" value="divistion_id">
                        <label for="divistion_id"></label>
                        &nbsp;เอกสารของหน่วยงาน&nbsp;
                        <input type="radio" name="divistion_id" id="divistion_id" value="divistion_id">
                        <label for="divistion_id"></label>
                        &nbsp;หน่วยงานภายใน&nbsp;
                        <input type="radio" name="divistion_id" id="divistion_id" value="divistion_id">
                        <label for="divistion_id"></label>
                        &nbsp;หน่วยงานภายนอก&nbsp;
                        <input type="radio" name="divistion_id" id="divistion_id" value="divistion_id">
                        &nbsp;อื่นๆ (โปรดระบุ)&nbsp;
                        <label for="divistion_id"></label>
                        <textarea name="divistion_id" cols="100" id="divistion_id"></textarea>
                      </p>
                      <p>เรื่อง
                        :
                        <label for="address"></label>
                        <textarea name="address" cols="50" rows="2" id="address"></textarea>
                        <br>
                        &nbsp;&nbsp;&nbsp;รายละเอียด&nbsp; :
                        <label for="document_detail"></label>
                        <textarea name="document_detail" id="document_detail"></textarea>
                      </p>
                      <div class="d-flex justify-content-center pull-right">
                        <p>ชั้นความเร็ว :
                          <select name="speed_send" id="speed_send">
                            <option value="0">--เลือกชั้นความเร็ว--</option>
                            <option value="1">--ด่วน--</option>
                            <option value="2">--ด่วนมาก--</option>
                            <option value="3">--ด่วนที่สุด--</option>
                          </select>
                        </p>
                        <p>ชั้นความลับ :
                          <select name="secret_send" id="secret_send">
                            <option value="0">--เลือกชั้นความลับ--</option>
                            <option value="1">--ลับ--</option>
                            <option value="2">--ลับมาก--</option>
                            <option value="3">--ลับที่สุด--</option>
                          </select>
                        </p>
                        <p>วัตถุประสงค์ :
                          <select name="pay_bank2" id="pay_bank2">
                            <option value="0">--เลือกวัตถุประสงค์--</option>
                            <option value="1">--#--</option>
                            <option value="2">--#--</option>
                            <option value="3">--#--</option>
                          </select>
                        </p>
                        <p>เก็บไว้ถึงปี พ.ศ.&nbsp;:
                          <label for="textfield5"></label>
                          <input type="text" name="phone" id="textfield5">
                        </p>
                        <button type="submit" class="btn btn-success" >บันทึก</button>
                      </div>
                    </form>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
              <h5 class="card-header info-color white-text text-center py-4">
                <strong>เอกสารนำเข้า</strong>
              </h5>
              <div class="card-body px-lg-5 pt-0">
                <div class="container">
                  <div class="row"><br><br>
                    <form enctype="multipart/form-data" action="" name="form" method="post">
                      <div class="col-md-11">
                      </div>

                      <label for="subject" class="">อัพโหลดเอกสาร</label>
                      <input type="file" name="file" id="file" /></td>
                      <button type="submit" class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" id="submit" value="Submit">อัพโหลด</button>
                      <footer style="font-size: 12px"><b>ชนิดไฟล์:</b>
                        <font color="red"><i>.docx .doc .pptx .xlsx .xls .pdf</i></font>
                      </footer>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <Br><br>
          </div>
      </div>
</center>