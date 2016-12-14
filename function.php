<?php
require_once('connect_database.php');
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
   if ($action == "list") {
      getlist();
   } elseif ($action == "location"){
      getLocation();
   } else {
      detail();
   }
   
}

function getLocation(){
  $id = $_POST['id_market'];
  $query2 = "SELECT * FROM mst_location where id ='$id'";
  $result2 = @mysql_query($query2);

  $return = mysql_fetch_array($result2, MYSQL_ASSOC);
  echo json_encode($return);
}

function getlist(){
  $region = $_POST['region'];
  $category = $_POST['category'];
  if ($region == '') {
    $query1 = "SELECT * FROM mst_pasar where id_category ='$category'";
  }elseif ($category == '') {
    $query1 = "SELECT * FROM mst_pasar where id_region ='$region'";
  }else{
    $query1 = "SELECT * FROM mst_pasar where id_region ='$region' and id_category ='$category'";
  }
  
  
    $result1 = @mysql_query($query1);
    $return = array();
    $pasar = array();
    $i=0;
    while ($row1 = mysql_fetch_array($result1)) {
      //echo $row1['name'];
      $pasar['id'] = $row1['id'];
      $pasar['name'] = $row1['name'];
      $return[$i]=$pasar;
      $i++;
     }
     echo json_encode($return);
}
function detail(){
  $id = $_POST['id'];
  $query_pasar = "SELECT * FROM mst_pasar where id ='$id'";
  $result_pasar = @mysql_query($query_pasar);
  $query_img = "SELECT * FROM mst_pasar_img where id_pasar ='$id'";
  $result_img = @mysql_query($query_img);
  $return = array();
  $img = array();
  $i = 0;
  while ($row = mysql_fetch_array($result_pasar)) {
    $return['name'] = $row['name'];
    $return['address'] = $row['address'];
    $return['time_open'] = date("g:i a", strtotime($row['time_open']));
    $return['time_close'] = date("g:i a", strtotime($row['time_close']));
    $return['keterangan'] = $row['keterangan'];
    while ($row_img = mysql_fetch_array($result_img)) {
      $img[$i] = $row_img['img'];
      $i++; 
    }
    $return['img'] = $img;
  }
  echo json_encode($return);
  
}
  
?>