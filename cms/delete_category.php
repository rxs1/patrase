<?php
	include('header.php');
	require_once('connect_database.php');
	session_start();


	if(!empty($_GET)){
		$id = $_GET['id'];
		$query = "SELECT * From mst_category where id=$id";
		$result = @mysql_query($query);
		$row = mysql_fetch_array($result);

		unlink('upload/icon_category/'.$row['icon']);
		$query = "DELETE From mst_category where id=$id";
		$result = @mysql_query($query);
		if($result){
			$_SESSION['err_message']='NOT DELETED !';
			header('Location: crud-category.php');
			die('no file or permission denied');
		}
		$_SESSION['succes_message']='DELETED !';
		header('Location: crud-category.php');
		die();
	
	}else{
		
		header('Location: crud-category.php');
		die();
	}


?>