<?php
	include('header.php');
	require_once('connect_database.php');
	session_start();


	if(!empty($_GET)){
		$id = $_GET['id'];
		$id_pasar = $_GET['id_pasar'];
		$query = "DELETE From mst_pasar_img where id=$id";
		$result = @mysql_query($query);
		if(!$result){
			$_SESSION['err_message']='NOT DELETED !';
			header('Location: edit_image.php?id='.$id_pasar);
			die('no file or permission denied');
		} else{
		$_SESSION['deleted']='DELETED !';
		header('Location: edit_image.php?id='.$id_pasar);
		die();
	}
	}else{
		
		header('Location: edit_image.php?id='.$id_pasar);
		die();
	}


?>