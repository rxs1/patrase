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
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
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

  <?php include('header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php 
  $TabManagementPasar = 'active';
  include('menubar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Management Pasar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> CMS</a></li>
        <li class="active">Management Pasar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pasar Tradisional</h3>
              <hr>
              <br>
              <div class="btn-group">
                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal">TAMBAH DATA </a>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">TAMBAH DATA</h4>
                        </div>
                        <div class="modal-body">
                          <?php
                            // if( isset($_SESSION['err_message'])){
                            //   echo "<p class='alert alert-danger'>".$_SESSION['err_message']."</p>";
                            //   unset($_SESSION['err_message']);
                            // }

                          ?>
                          <form action="add_pasar.php"  method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control" placeholder="ex: Pasar Minggu" required>
                            </div>
                            <div class="form-group">
                              <label>Category</label>
                               <select class="form-control" name="category" required>
                              
                                <?php
                                  $query1 = "SELECT * FROM mst_category";
                                  $result1 = @mysql_query($query1);
                                  $i = 0;

                                  while ($row1 = mysql_fetch_array($result1, MYSQL_ASSOC)) {
                                      ?>

                                    <option <?= $selected1 ?> value="<?= $row1['id'] ?>"><?= $row1['name'] ?></option>
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
                                      ?>

                                    <option <?= $selected1 ?> value="<?= $row1['id'] ?>"><?= $row1['name'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="bootstrap-timepicker">
                            <div class="form-group">
                              <label>Waktu Buka :</label>

                              <div class="input-group">
                                <input type="text" class="form-control timepicker" name="open">

                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="bootstrap-timepicker">
                            <div class="form-group">
                              <label>Waktu Tutup :</label>

                              <div class="input-group">
                                <input type="text" class="form-control timepicker" name="closed">

                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                              <label>Keterangan</label>
                              <textarea style="height: 200px" class="form-control" placeholder="extra description" name="description"></textarea>
                            </div>

                            <input type="submit" class="btn btn-danger" value="ADD">
                          </form>
                        </div>
                  
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
                if( isset($_SESSION['success_message'])){
                  echo "<p class='alert alert-success'>".$_SESSION['success_message']."</p>";
                  unset($_SESSION['success_message']);
                }

                if( isset($_SESSION['err_message'])){
                  echo "<p class='alert alert-error'>".$_SESSION['err_message']."</p>";
                  unset($_SESSION['err_message']);
                }
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Region</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM mst_pasar";
                $result = @mysql_query($query);
                while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                  ?>
                  <tr>
                  <td><?=$row['id']?></td>
                  <td><?=$row['name']?></td>
                  <td><?=getCategoryNameById($row['id_category'])?></td>
                  <td><?=getRegionNameById($row['id_region'])?></td>
                  <td>
                  <a href="edit_pasar.php?id=<?=$row['id']?>" ><span class="button btn-sm btn-warning"> <i class="glyphicon glyphicon-edit"></i></span></a>
                  <a href="edit_image.php?id=<?=$row['id']?>" ><span class="button btn-sm btn-danger"> <i class="glyphicon glyphicon-picture"></i></span></a>
                  <a href="view_pasar.php?id=<?=$row['id']?>" ><span class="button btn-sm btn-primary"> <i class="glyphicon glyphicon-eye-open"></i></span></a>

                  <a href="marker-pasar.php?id=<?=$row['id']?>" ><span class="button btn-sm btn-success"> <i class="glyphicon glyphicon-map-marker"></i></span></a>
                  <a href="delete_pasar.php?id=<?=$row['id']?>" onClick="return confirm('Delete This Data?')"><span class="button btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"></i></span></a>
                  </td>
                </tr>

                  <?php
                }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
