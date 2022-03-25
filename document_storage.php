<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>แฟ้มเอกสาร</title>
  
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
  $(document).ready(function(){
      $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 10
                
            });
  })
    </script>
    <style type="text/css">
      select[multiple], select[size] {
    height: auto;
    width: 20px;
}
.pull-right {
    float: right;
    margin: 2px !important;
}
    #loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('img/lg.flip-book-loader.gif') 50% 50% no-repeat rgb(249,249,249);
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
  $(window).on('load', function(){
    //you remove this timeout
    setTimeout(function(){
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

if(!isset($_SESSION['emp_id'])){
   header('Location: login_user.php');
}

$emp_id = $_SESSION['emp_id'];
$emp_firstname = $_SESSION['emp_firstname'];
$Position_name = $_SESSION['Position_name'];

date_default_timezone_set("Asia/Bangkok");

?>
  <!-- Start your project here-->
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color fixed-top">
    <a class="navbar-brand" href="#"><img src="js/img/Files_Download.png" width="33px" height="33px"> <font color="#F0B56F">F</font>ile <font color="#F0B56F">M</font>anagement <font color="#F0B56F">S</font>ystem</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
        <?php echo ucwords(htmlentities($emp_firstname)); ?> <i class="fas fa-user-circle"></i> Login </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="history_log.php"> <i class="fas fa-chalkboard-teacher"></i> User Logged</a>
          <a class="dropdown-item" href="Logout.php"><i class="fas fa-sign-in-alt"></i> LogOut</a>

        </div>
      </li>
    </ul>
  </div>
</nav>
<br>
<!--/.Navbar -->
<br><Br><br>
<!-- Card -->
<div id="hero" class="hero route bg-image" style="background-image: url(assets/img/wall.jpg)">
    <div class="overlay-itro"></div>
    
    <div class="hero-content display-table">
<div class="container">
  <div class="row">
     <div class="col-md-9">
     <div class="card-body d-sm-flex justify-content-between">

<h4 class="mb-2 mb-sm-0 pt-1">


<div class="d-flex justify-content-center pull-right">

  <a href="add_file_user.php">
  <button class="btn btn-warning pull-right"><i class="far fa-file-image"></i>  อัพโหลดไฟล์</button></a>
</div>
</div>
<hr>
  <table id="dtable" class = "table table-striped" style="">
     <thead>

    <th>ชื่อไฟล์</th>
    <th>ขนาดไฟล์</th>
    <th>อัพโหลดโดย</th>  
    <th>สถานะ</th> 
     <th>วัน/เวลา</th>
    <th>ลบ</th>
    <th>ดาวน์โหลด</th>

</thead>
<tbody>

<?php                 
                    $sql_query = "SELECT ID
                    FROM upload_files
                    ORDER BY `ID` ASC";

                    $result = mysqli_query($conn,$sql_query);
                    $num_row = mysqli_num_rows($result);

                    while($row = $result->fetch_assoc()) {
                  ?>
    <tr>
        <?php 
   
        require_once("connect.php");

      $query = mysqli_query($conn,"SELECT ID,FILES_NAME,SIZE,EMAIL,ADMIN_STATUS,TIMERS,DOWNLOAD FROM upload_files group by FILES_NAME DESC") or die (mysqli_error($conn));
      while($row=mysqli_fetch_array($query)){
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
      <td onclick="OnDelete3(<?=$row['ID'];?>)" type="button" class="alert-success"><img src="img/delete.png" width="30px" height="30px" title="Delete File"></a> </td>
      <td class="alert-success"><a href='download.php?filename=<?php echo $name; ?>'><?php echo $row['FILES_NAME'] ?><img src="img/698569-icon-57-document-download-128.png" width="30px" height="30px" title="Download File"></a> </td>
      <td><?php echo $download; ?></td>
        
      </tr>
<?php } } ?>
</tbody>
   </table>
    </div>
 


</script>


 <div class="col-md-3" style="border-top: 4px solid #17a2b8;border-radius: 4px;  box-shadow: 0px 1px 1px 0px  #6c757d;"><br>
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
      aria-controls="pills-home" aria-selected="true">โปรไฟล์</a>
  </li>
</ul>
<div class="tab-content pt-2 pl-1" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <img src="img/people.jpg" class="rounded" alt="..."><hr>
    <div class="">
     
     <div class=""><p><b style="font-size: 1.1em">ชื่อ:</b> ทัตพงศ์ น้อยดำ</p></div>
     <div class=""><p><b style="font-size: 1.1em">ตำแหน่ง:</b> นักศึกษา มหาวิทยาลัยสงขลานครินทร์</p></div>

  </div>
  <hr>
  



<!-- Card -->
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>

  <script type="text/javascript" src="js/popper.min.js"></script>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/mdb.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>   
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
            success: function (dataResult) {
              var dataResult = JSON.parse(dataResult);
              if (dataResult.statusCode == 200) {
                swalWithBootstrapButtons.fire(
                  'ลบข้อมูลสำเร็จ',
                  '',
                  'success'
                  
                )
                header("Refresh:0; url=document_storage.php");
              }
              else{
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
