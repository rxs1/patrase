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
   echo "haha";
   include('header.php');
   require_once('connect_database.php');
   session_start();
   if(!empty($_POST)){
      $id = $_POST['id'];
      $image=$_FILES['image'];
      date_default_timezone_set("Asia/Jakarta");
      //Upload First File
      $dataDescription = array();
      $path_parts = pathinfo($_FILES["image"]["name"]);
      $extension = $path_parts['extension'];

      if($extension == 'png' || $extension == 'jpeg' || $extension == 'jpg'){
        // chekking dimendion
        list($width, $height) = getimagesize($image['tmp_name']);

          $dataDescription["Upload"]=$image["name"];
          $dataDescription["Type"]=$image["type"];
          $dataDescription["Size"]= ($image["size"]/1024) ." Kb";
          $dataDescription["Temp"]= $image["tmp_name"];
          $dataDescription["NewName"]= "img-".date("H-i-s").".".$extension;
          $ImgNewName = $dataDescription['NewName'];
          $dataDescription["store_directory"] = "upload/img_pasar/" . $dataDescription["NewName"];
            //checking if proses upload success
           
            if(move_uploaded_file($image["tmp_name"], "upload/img_pasar/" . $dataDescription["NewName"])){
              $query = "INSERT INTO mst_pasar_img (id_pasar, img) VALUES ('$id', '$ImgNewName');";
              @mysql_query($query);
              $_SESSION['success_message'] = "Success Upload and Data Was Added";
              // header('Location: edit_image.php?id='.$id);
              // die();

            }else{
              
              $_SESSION['err_message'] = "Not Uploaded";
              // header('Location: edit_image.php?id='.$id);
              // die();
            } 
          }else{

            $_SESSION['err_message'] = "Extension Must be .png or .jpeg or .jpg";
            // header('Location: edit_image.php?id='.$id);
            // die();
          }
      
        
   }


   ?>
    
  <?php 
  $TabManagementPasar = 'active';
  include('menubar.php');?>
  <?php
              
    if (!empty($_SESSION['success_message'])) {
        echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
        unset($_SESSION['success_message']);
    }

    if (!empty($_SESSION['deleted'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['deleted'] . '</div>';
        unset($_SESSION['deleted']);
    }

    if (!empty($_SESSION['err_message'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['err_message'] . '</div>';
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
        <li class="active">Edit Gambar Pasar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Gambar Pasar</h3>
              <hr>
              <h4 style="font-weight:bold;"><?=$name?> </h4>
            </div>
            <div class="box-body">
                 
                <form action="edit_image.php?id=<?=$id?>"  method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="exampleInputFile">Upload Image</label>
                      <input type="file" id="exampleInputFile" name="image" required>
                      <p class="help-block"> </p>
                  </div>

                  <input type="hidden" class="btn btn-warning" name="id" value="<?=$_GET['id']?>">
                  <input type="submit" class="btn btn-warning" value="UPLOAD">
                </form>
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

                              <div class="caption">
                                  <p> <a onclick="alert('Are You Sure To Delete This Image?')" 
                                    href="<?php echo 'delete_img_pasar.php?id_pasar='.$_GET['id'].'&id='.$row['id'];?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>       
                                  </p>
                              </div>
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
