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
$conn = new PDO('mysql:host=localhost; dbname=project', 'root', '') or die(mysql_error());
if (isset($_POST['submit']) != "") {
  $name = $_FILES['file']['name'];
  $size = $_FILES['file']['size'];
  $type = $_FILES['file']['type'];
  $temp = $_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis") . '_' . $name;
  $chk = $conn->query("SELECT * FROM  document where name = '$name' ")->rowCount();
  if ($chk) {
    $i = 1;
    $c = 0;
    while ($c == 0) {
      $i++;
      $reversedParts = explode('.', strrev($name), 2);
      $tname = (strrev($reversedParts[1])) . "_" . ($i) . '.' . (strrev($reversedParts[0]));
      // var_dump($tname);exit;
      $chk2 = $conn->query("SELECT * FROM  document where name = '$tname' ")->rowCount();
      if ($chk2 == 0) {
        $c = 1;
        $name = $tname;
      }
    }
  }
  $move =  move_uploaded_file($temp, "upload/" . $fname);
  if ($move) {
    $query = $conn->query("insert into document(fname,name)values('$fname','$name')");
    if ($query) {
      header("location:upload.php");
    } else {
      die(mysql_error());
    }
  }
}
?>

<html>
<title>อัพโหลดเอกสาร</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
</head>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

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
    background-image: url('img/background.jpg');
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

<body>
  <div class="row-fluid">
    <div class="span12">
      <div class="container">
        <br />
        <h1>
          <p>อัพโหลดเอกสาร</p>
        </h1>
        <br />
        <br />
        <form enctype="multipart/form-data" action="" name="form" method="post">
          เลือกไฟล์
          <input type="file" name="file" id="file" /></td>
          <input type="submit" name="submit" id="submit" value="Submit" />
        </form>
        <footer style="font-size: 12px"><b>ชนิดไฟล์:</b>
          <font color="red"><i>.docx .doc .pptx .xlsx .xls .pdf</i></font>
        </footer>
        <hr>
      </div>
    </div>
  </div>
  <center>
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
                <table width="850" height="550" border="0" align="center" cellpadding="0" cellspacing="0">
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
                      <form action="insert.php" name="form" method="post">
                        <br>
                        <p>เลขที่หนังสือ :
                          <label for="documentNumber"></label>
                          <input type="text" name="document_number" id="documentNumber">
                          <label for="document_number"></label>
                        <p>
                          <label for="documentName">ชื่อหนังสือ:</label>
                          <input type="text" name="document_name" id="documentName">
                        </p>
                        <p>
                          <label for="documentDetail">รายละเอียด:</label>
                          <input type="text" name="document_detail" id="documentDetail">
                        </p>
                        <p>
                          <label for="divistionId">รหัส:</label>
                          <input type="text" name="divistion_id" id="divistionId">
                        </p>
                        <p>
                          <label for="documenttypeId"></label>
                          ประเภทเอกสาร
</br>
                          <input type="radio" name="documenttype_id" id="documenttypeId" value="1">
                          <label for="documenttypeId"></label>
                          &nbsp;เอกสารของหน่วยงาน&nbsp;
                          <input type="radio" name="documenttype_id" id="documenttypeId" value="2">
                          <label for="documenttypeId"></label>
                          &nbsp;หน่วยงานภายใน&nbsp;
                          <input type="radio" name="documenttype_id" id="documenttypeId" value="3">
                          <label for="documenttypeId"></label>
                          &nbsp;หน่วยงานภายนอก&nbsp;
                          <input type="radio" name="documenttype_id" id="documenttypeId" value="4">
                          &nbsp;อื่นๆ (โปรดระบุ)&nbsp;
                          <label for="documenttypeId"></label>
                          <textarea type="radio" name="documenttype_id" cols="100" id="documenttypeId"></textarea>
                        </p>

                        <div class="d-flex justify-content-center pull-right">
                          <p>ชั้นความเร็ว :
</br>
                            <select name="speed_send" id="speedSend">
                              <option value="0">--เลือกชั้นความเร็ว--</option>
                              <option value="1">--ด่วน--</option>
                              <option value="2">--ด่วนมาก--</option>
                              <option value="3">--ด่วนที่สุด--</option>
                            </select>
                          </p>
                          <p>ชั้นความลับ :
                            <select name="secret_send" id="secretSend">
                              <option value="0">--เลือกชั้นความลับ--</option>
                              <option value="1">--ลับ--</option>
                              <option value="2">--ลับมาก--</option>
                              <option value="3">--ลับที่สุด--</option>
                            </select>
                          </p>
                          <p>วัตถุประสงค์ :
                            <select name="oject_send" id="ojectSend">
                              <option value="0">--เลือกวัตถุประสงค์--</option>
                              <option value="1">--#--</option>
                              <option value="2">--#--</option>
                              <option value="3">--#--</option>
                            </select>
                          </p>
                          <p>เก็บไว้ถึงปี พ.ศ.&nbsp;:
                            <label for="documentDate"></label>
                            <input type="date" name="mydate" id="myDate">
                          </p>
                        </div>
                        <footer><button type="submit" class="btn btn-success"><a href="upload.php?filename=">บันทึก</button></footer>
                    </td>
                    </form>
                    <hr>
                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  </form>
                </table>

              </div>
            </div>
        </div>
      </div>
      <Br><br>
      </div>
      </div>
  </center>
</body>

</html>