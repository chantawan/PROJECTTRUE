<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/login2.png" type="image/png">
  <title>เอกสารนำเข้า</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>เอกสารนำเข้า</title>
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

    }
  </style>
</head>

<body>
  <br />
  <br />
  <tr>
    <td>
    </td <div class="row-fluid">
    <div class="span12">
      <div class="container">
        <br />
        <h1>
          <center>
            <p>เอกสารนำเข้า</p>
          </center>
        </h1>
        <br />
        <br />
        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
          <thead>
            <tr>
              <th width="70%" align="center">ชื่อไฟล์</th>
              <th align="center">แผนก</th>
              <th align="center">ประเภทเอกสาร</th>
              <th align="center">ลงเมื่อวันที่</th>
              <th align="center">ดาวน์โหลด</th>
            </tr>
          </thead>
          <?php
          $query = $conn->query("select * from upload order by id desc");
          while ($row = $query->fetch()) {
            $name = $row['name'];
          ?>
            <?php
            $query = $conn->query("select * from document order by document_id desc");
            while ($row = $query->fetch()) {
              $divistion_id = $row['divistion_id'];
            ?>
              <?php
              $query = $conn->query("select * from document order by document_id desc");
              while ($row = $query->fetch()) {
                $documenttype_id = $row['documenttype_id'];
              ?>
                <?php
                $query = $conn->query("select * from document order by document_id desc");
                while ($row = $query->fetch()) {
                  $document_date = $row['document_date'];
                ?>
                  <tr>

                    <td>
                      &nbsp;<?php echo $name; ?>
                    </td>
                    <td>
                      &nbsp;<?php echo $divistion_id; ?>
                    </td>
                  <?php } ?>
                  <td>
                    &nbsp;<?php echo $documenttype_id; ?>
                  </td>
                <?php } ?>
                <td>
                  &nbsp;<?php echo $document_date; ?>
                </td>
              <?php } ?>
              <td>
                <button class="alert-success"><a href="download.php?filename=<?php echo $name; ?>&f=<?php echo $row['fname'] ?>">ดาวน์โหลด</a></button>
              </td>
                  </tr>
                <?php } ?>
        </table>
      </div>
    </div>
    </div>
    <div class="">

      <a href="add_file.php"><button type="button" class="btn btn-success"><i class="fas fa-file-medical"></i> เพิ่มไฟล์</button></a>
    </div>

    <hr>
</body>

</html>