<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PATRASE | Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php 

   include('header.php');
   require_once('connect_database.php');
   session_start();
   if(!empty($_POST)){
      $name = $_POST['name'];
      $category = $_POST['category'];
      $region = $_POST['region'];
      $waktu_buka = date("H:i:s", strtotime($_POST['open']));
      $waktu_tutup = date("H:i:s", strtotime($_POST['closed']));
      $keterangan = $_POST['description'];
      $address = $_POST['address'];
      $id = $_POST['id'];
      $row = getRowPasarById($id);
      if ($waktu_buka > $waktu_tutup){
          $_SESSION['err_message'] = 'Error Edit Data Pasar id = '.$id.' : Waktu salah' ;
          // header('Location: edit_pasar.php?id='.$id);
          // die();
      } else {
         $query = "UPDATE mst_pasar SET name='$name', id_category='$category', id_region='$region', time_open='$waktu_buka', time_close='$waktu_tutup', keterangan='$keterangan', address='$address' WHERE id=$id;";
      $result= @mysql_query($query);
      if($result){
        $_SESSION['success_message'] = 'Success Edit Data Pasar id = '.$id ;
        echo '
          <script type="text/javascript">
          location.href = "management-pasar.php";
          </script>
        ';
        die();
      }else{

        $_SESSION['err_message'] = 'Error Edit Data Pasar id = '.$id ;
        header('Location: edit_pasar.php?id='.$id);
        die();
      }
      }
     
      
   }


   ?>
    
  <?php 
  $TabManagementPasar = 'active';
  include('menubar.php');?>
 <?php
    if( isset($_SESSION['err_message'])){
      echo "<p class='alert alert-danger'>".$_SESSION['err_message']."</p>";
      unset($_SESSION['err_message']);
    }
    if(!empty($_GET)){
       $id = $_GET['id'];
       $name = $_GET['name'];
       $row = getRowPasarById($id);
    }else{
      header('Location: management-pasar.php');
      die();
    }
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Management Pasar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> CMS</a></li>
        <li class="active">Edit Pasar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Pasar</h3>
              <hr>
              <h4 style="font-weight:bold;"><?=$name?> </h4>
            </div>
            <div class="box-body">

                <form action="edit_pasar.php?id=<?=$id?>"  method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                              <label>Name</label>
                    <input type="text" name="name" class="form-control" value="<?=$row['name']?>" placeholder="ex: Jakarta Pusat" required>

                  </div>
                  <div class="form-group">
                    <label>Category</label>
                     <select class="form-control" name="category" required>
                    
                      <?php
                        $query1 = "SELECT * FROM mst_category";
                        $result1 = @mysql_query($query1);
                        $i = 0;

                        while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
                            $selected = "";
                            if ($row1['id'] == $row['id_category']) {
                                $selected = "selected";
                            }
                            ?>
                          <option <?= $selected ?> value="<?= $row1['id'] ?>"><?= $row1['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Region</label>
                     <select class="form-control" name="region" required>
                     
                      <?php
                        $query1 = "SELECT * FROM mst_region";
                        $result1 = @mysql_query($query1);
                        $i = 0;

                        while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
                            $selected = "";
                            if ($row1['id'] == $row['id_region']) {
                                $selected = "selected";
                            }
                            ?>

                          <option <?= $selected ?> value="<?= $row1['id'] ?>"><?= $row1['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                                <div class="bootstrap-timepicker">
                            <div class="form-group">
                              <label>Open Time :</label>

                              <div class="input-group">
                              <?php
                                $waktu_buka = date("g:i a", strtotime($row['time_open']));
                              ?>
                                <input type="text" class="form-control timepicker" name="open" value="<?=$waktu_buka?>">

                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="bootstrap-timepicker">
                            <div class="form-group">
                              <label>Close Time :</label>

                              <div class="input-group">
                              <?php
                                $waktu_tutup = date("g:i a", strtotime($row['time_close']));
                              ?>
                                <input type="text" class="form-control timepicker" name="closed" value="<?=$waktu_tutup?>">

                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                            </div>
                            </div>
                            </div>
                            </div>
                  <div class="form-group">
                              <label>Alamat</label>
                              
                              <textarea style="height: 100px" class="form-control" placeholder="address" required name="address"><?=$row['address']?></textarea>
                            </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea style="height: 200px" class="form-control"  placeholder="extra description" name="description"><?=$row['keterangan']?></textarea>
                  </div>

                  <input type="hidden" class="btn btn-warning" name="id" value="<?=$_GET['id']?>">
                  <input type="submit" class="btn btn-warning" value="SAVE">
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Geography Information System
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">PATRASE Team</a>.</strong> All rights reserved.
  </footer>

  

  
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DATATABLE -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->

<script src="plugins/chartjs/Chart.min.js"></script>
<!-- Select2 -->
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
   
  });
  //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
</script>
</body>
</html>
