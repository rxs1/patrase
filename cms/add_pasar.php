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
		date_default_timezone_set("Asia/Jakarta");
		if ($waktu_buka > $waktu_tutup){
			$_SESSION['modal'] = 1;
			$_SESSION['er_message'] = 'Error Add Data Pasar : Waktu salah' ;
	        header('Location: management-pasar.php');
	        die();
		}

		$query = "INSERT INTO mst_pasar (name, id_category, id_region, time_open, time_close, keterangan) VALUES ('$name', '$category', '$region', '$waktu_buka', '$waktu_tutup', '$keterangan');";
    	$result = @mysql_query($query);
    	
    	if($result){
    		$_SESSION['modal'] = 0;
	        $_SESSION['success_message'] = 'Data Was Added' ;
	        header('Location: management-pasar.php');
	        die();
      	}else{
      		$_SESSION['modal'] = 1;
	        $_SESSION['er_message'] = 'Error Add Data Pasar' ;
	        echo @mysql_error();
	        // header('Location: management-pasar.php');
	        // die();
      	}
	} else {
		header('Location: management-pasar.php');
		die();
	}


?>