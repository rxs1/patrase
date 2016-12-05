<?php
	include('header.php');
	require_once('connect_database.php');
	session_start();
	if(!empty($_POST)){
		$name = $_POST['name'];
		$category = $_POST['category'];
		$region = $_POST['region'];
		$keterangan = $_POST['description'];
		date_default_timezone_set("Asia/Jakarta");
		//Upload First File
		$dataDescription = array();

		$query = "INSERT INTO mst_pasar (name, id_category, id_region, keterangan) VALUES ('$name', '$category', '$region', '$keterangan');";
    	$result = @mysql_query($query);
    	
    	if($result){
	        $_SESSION['success_message'] = 'Data Was Added' ;
	        header('Location: management-pasar.php');
	        die();
      	}else{
	        $_SESSION['err_message'] = 'Error Add Data Pasar' ;
	        header('Location: management-pasar.php');
	        die();
      	}
	} else {
		header('Location: management-pasar.php');
		die();
	}


?>