<?php
	include('header.php');
	require_once('connect_database.php');
	session_start();


	if(!empty($_GET)){
		$id = $_GET['id'];
		$query = "DELETE From mst_pasar where id=$id";
		$result = @mysql_query($query);
		if(!$result){
			$_SESSION['err_message']='NOT DELETED !';
			header('Location: management-pasar.php');
			die('no file or permission denied');
		} else{
		$_SESSION['success_message']='DELETED !';
		header('Location: management-pasar.php');
		die();
	}
	}else{
		
		header('Location: management-pasar.php');
		die();
	}


?>