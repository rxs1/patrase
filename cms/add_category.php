<?php
	include('header');
	require_once('connect_database.php');
	session_start();
	if(!empty($_POST)){
		$name = $_POST['name'];
		$icon=$_FILES['icon'];
		date_default_timezone_set("Asia/Jakarta");
		//Upload First File
		$dataDescription = array();
		$path_parts = pathinfo($_FILES["icon"]["name"]);
		$extension = $path_parts['extension'];

		if($extension == 'png' || $extension == 'ico'){
			// chekking dimendion
			list($width, $height) = getimagesize($icon['tmp_name']);
			
			if($width > "30" && $height > "30") {
				$_SESSION['modal'] = 1;
			    $_SESSION['err_message'] = "Dimension at least widht=30 height=30";
			    header('Location: crud-category.php');
			    die();
			}

		    $dataDescription["Upload"]=$icon["name"];
		    $dataDescription["Type"]=$icon["type"];
		    $dataDescription["Size"]= ($icon["size"]/1024) ." Kb";
		    $dataDescription["Temp"]= $icon["tmp_name"];
		    $dataDescription["NewName"]= "icon-".date("H-i-s").".".$extension;
		    $IconNewName = $dataDescription['NewName'];
		    $dataDescription["store_directory"] = "upload/icon_category/" . $dataDescription["NewName"];
	        //checking if proses upload success
		     
	        if(move_uploaded_file($icon["tmp_name"], "upload/icon_category/" . $dataDescription["NewName"])){
	    
	        	$query = "INSERT INTO mst_category (name,icon) VALUES ('$name','$IconNewName');";
	        	@mysql_query($query);
	        	$_SESSION['modal'] = 0;
	        	$_SESSION['success_message'] = "Success Upload and Data Was Added";
	        	header('Location: crud-category.php');
	        	die();

	        }else{
	      
	        	$_SESSION['modal'] = 1;
	        	$_SESSION['err_message'] = "Not Uploaded";
	        	header('Location: crud-category.php');
	        	die();
	        }	
        }else{
        
        	$_SESSION['modal'] = 1;
	        $_SESSION['err_message'] = "Extension Must be .png or .ico";
	        header('Location: crud-category.php');
	        die();
        }
	}else{

		header('Location: crud-category.php');
		die();
	}


?>