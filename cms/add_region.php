<?php
	include('header.php');
	require_once('connect_database.php');
	session_start();
	if(!empty($_POST)){
		$name = $_POST['name'];
		date_default_timezone_set("Asia/Jakarta");
		//Upload First File
		$dataDescription = array();
		$query = "INSERT INTO mst_region (name) VALUES ('$name');";
    	$result = @mysql_query($query);
    	if($result){
	        $_SESSION['succes_message'] = 'Success Upload and Data Was Added' ;
	        header('Location: crud-region.php');
	        die();
      	}else{
	        $_SESSION['err_message'] = 'Error Add Data Region' ;
	        header('Location: crud-region.php');
	        die();
      	}
	} else {
		header('Location: crud-region.php');
		die();
	}


?>