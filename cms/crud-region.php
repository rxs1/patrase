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
  
  $TabCrudRegion = 'active';
  include('menubar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CRUD Region
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> CMS</a></li>
        <li class="active">CRUD Region</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Region</h3>
              <hr>
              <br>
              <div class="btn-group">
                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal">TAMBAH DATA</a>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">ADD DATA</h4>
                        </div>
                        <div class="modal-body">
                          <?php
                            if( isset($_SESSION['err_message'])){
                              echo "<p class='alert alert-danger'>".$_SESSION['err_message']."</p>";
                              unset($_SESSION['err_message']);
                            }

                             
                          ?>
                          <form action="add_region.php"  method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control" placeholder="ex: Jakarta Pusat" required>
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
                if( isset($_SESSION['succes_message'])){
                  echo "<p class='alert alert-success'>".$_SESSION['succes_message']."</p>";
                  unset($_SESSION['succes_message']);
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
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM mst_region";
                $result = @mysql_query($query);
                while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
                  ?>
                  <tr>
                  <td><?=$row['id']?></td>
                  <td><?=$row['name']?></td>
                   
                 
                  <td>
                  <a href="edit_region.php?id=<?=$row['id']?>" ><span class="button btn-sm btn-warning"> <i class="glyphicon glyphicon-edit"></i></span></a>
                  <a href="delete_region.php?id=<?=$row['id']?>" onClick="return confirm('Delete This Category?')"><span class="button btn-sm btn-danger"> <i class="glyphicon glyphicon-trash"></i></span></a>
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
    <!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- Select2 -->

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
      //Initialize Select2 Elements
 
    <?php
    if(isset($_SESSION['modal'])){
      if($_SESSION['modal']){
        echo"
        $('#myModal').modal('show');
        ";

        unset($_SESSION['modal']);
      }
    }
    ?>

  });
</script>
</body>
</html>
