<?php
	
	session_start();
	if(isset($_POST)){
		include 'header.php';
		require_once 'connect_database.php';
		$lat = $_POST['lat'];
		$lng= $_POST['lng'];
		$id= $_POST['id'];
		
		$query = "SELECT * from mst_location where id = $id";
		$result = @mysql_query($query);
		
		$row = mysql_fetch_array($result);

		if($row){
			$query = "UPDATE mst_location SET lat=$lat,lng=$lng WHERE id=$id;";
            if(@mysql_query($query)){
            	$_SESSION['success_message'] = 'Marker Was Updated !';
            	header('Location: marker-pasar.php?id='.$id);
            	die();
            }else{
           		$_SESSION['err_message'] = 'Marker Not Working';
            	header('Location: marker-pasar.php?idmaps='.$id);
            	die();
            }
		}else{
			$query = "INSERT INTO mst_location (id,lat,lng)  VALUES ($id,$lat, $lng);";
            $result = @mysql_query($query);
            
            if($result){
            	$_SESSION['success_message'] = 'Marker Was Added !';
            	header('Location: marker-pasar.php?idmaps='.$id);
            	die();
            }else{
            	$_SESSION['err_message'] = 'Marker Not Working';
            	header('Location: marker-pasar.php?id='.$id);
            	die();
            }
		}

	}else{
		die('404');
	}
?>