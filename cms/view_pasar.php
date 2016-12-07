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

   <?php 

   include('header.php');
   require_once('connect_database.php');
   session_start();
   if(!empty($_POST)){
      $name = $_POST['name'];
      $category = $_POST['category'];
      $region = $_POST['region'];
      $keterangan = $_POST['description'];
      $id = $_POST['id'];
      $row = getRowPasarById($id);
      $query = "UPDATE mst_pasar SET name='$name', id_category='$category', id_region='$region', keterangan='$keterangan' WHERE id=$id;";
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
        header('Location: edit-pasar.php?id='.$id);
        die();
      }
      
   }


   ?>
    
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
        <li class="active">Lihat Pasar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
                  if( isset($_SESSION['err_message'])){
                    echo "<p class='alert alert-danger'>".$_SESSION['err_message']."</p>";
                    unset($_SESSION['err_message']);
                  }
                  if(!empty($_GET)){
                     $id = $_GET['id'];
                     $row = getRowPasarById($id);
                  }else{
                    header('Location: management-pasar.php');
                    die();
                  }
                ?>
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lihat Pasar</h3>
              <hr>
            </div>

            <div class="box-body">
            <div class="row">
              <div class="col-md-6">
          
            <div class="box box-solid">
            <div class="box-header">
            </div>
            <div class="box-body">
              <?php
                if( isset($_SESSION['err_message'])){
                    echo "<p class='alert alert-danger'>".$_SESSION['err_message']."</p>";
                    unset($_SESSION['err_message']);
                  }
                  if(!empty($_GET)){
                     $id = $_GET['id'];
                     $row = getRowPasarById($id);
                  }else{
                    header('Location: management-pasar.php');
                    die();
                  }
              ?>
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
              <?php
                $result = getImagePasarById($id);
                $i = 0;
                while ($row1 = mysql_fetch_array($result, MYSQL_ASSOC)) {
                    $i++;
                    $active = "";
                    if ($i == 1){
                      $active ="active";
                    }
                    
                    ?>
                  <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>" class="<?= $active ?>">"></li>
              <?php } ?>
                </ol>
                <div class="carousel-inner">
                   <?php
                    $result = getImagePasarById($id);
                    $row1 = mysql_fetch_array($result, MYSQL_ASSOC);
                    if(empty($row1)){
                      ?>
                      <div class="item active">
                        <img src="upload/noimage2.png" alt="">

                        <div class="carousel-caption">
                          
                        </div>
                      </div>
                    <?php } else {
                      ?>
                      <div class="item active">
                        <img src="upload/img_pasar/<?=$row1['img']?>" alt="">

                        <div class="carousel-caption">
                          
                        </div>
                      </div>
                    <?php }
                  ?>
                   <?php
                    $i = 0;
                    while ($row1 = mysql_fetch_array($result, MYSQL_ASSOC)) {
                        $i++;
                        $active = "item";
                        
                        
                        ?>
                      <div class="<?= $active ?>">
                        <img src="upload/img_pasar/<?=$row1['img']?>" alt="">

                        <div class="carousel-caption">
                          
                        </div>
                      </div>
                      
                  <?php } ?>
                 
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            
              </div>
              <div class="col-md-6">
              <div class="box ">
            <div class="box-header">
              <h3 class="box-title"><b><?=$row['name']?></b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              
              <table class="table table-striped">
                <tr>
                  <td>Category</td>
                  <td> : <?= getCategoryNameById($row['id_category'])?></td>
                  
                </tr>
                <tr>
                  <td>Region</td>
                  <td> : <?= getRegionNameById($row['id_region'])?></td>
                  
                </tr>
                <tr>
                  <td>Waktu Operasional</td>
                  <?php
                   $waktu_buka = date("g:i a", strtotime($row['time_open']));
                   $waktu_tutup = date("g:i a", strtotime($row['time_close']));
                  ?>
                  <td> : <?=$waktu_buka?> - <?=$waktu_tutup?></td>
                  
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td> : <?=$row['address']?></td>
                </tr>

            
                
              </table>
              <?php
                    $keterangan = $row['keterangan'];
                    if(empty($keterangan)){
                      $keterangan ="";
                    } else {
                      ?>
                      <b>Deskripsi :</b> <br>
                    <?php }
                  ?>
              <i><?=$keterangan?></i>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <hr>

                 
            <h4 style="text-align:center"><i class="icon fa fa-camera"></i>   Lihat Gambar Pasar</h4>
            <hr>
            <?php                    
              $query = "SELECT * from mst_pasar_img where id_pasar=$id";
              $result = @mysql_query($query);
              if ($result) {
                  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                      ?> 
                      <div class="col-sm-6 col-md-4">
                          <div class="thumbnail">
                              <img height="300"  src="upload/img_pasar/<?=$row['img']?>">
                          </div>
                      </div>

                      <?php
                  }
              } else {
                echo '<h3>Still Dont Have Photo.</h3>';
              }
            
              ?>
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

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

</body>
</html>
