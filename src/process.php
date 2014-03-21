<?php
	include_once '../includes/functions.php';

	sec_session_start();
	if (!isset($_FILES["customer_photo"])) {
		echo "No direct linking to this file.";
		return;
	}
	
	if (!isset($_SESSION['username'])) {
		echo "Please login first.";
		return;
	}
	
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["customer_photo"]["name"]);
	$extension = $temp[0];
	
	if ($_FILES["customer_photo"]["error"] > 0) {
		echo "Return Code: " . $_FILES["customer_photo"]["error"] . "<br>";
	} else {
		echo "Upload: " . $_FILES["customer_photo"]["name"] . "<br>";
		echo "Type: " . $_FILES["customer_photo"]["type"] . "<br>";
		echo "Size: " . ($_FILES["customer_photo"]["size"] / 1024) . " KiB<br>";
		
		$dir_member = "./../upload/". $_SESSION['username'] . substr( md5($_SESSION['username']), 0, 4 ) . "_";
		echo $dir_member;
		
		if (!file_exists("$dir_member")) {
			mkdir("$dir_member");
		}
		
		if (file_exists("$dir_member/" . $_FILES["customer_photo"]["name"])) {
			echo $_FILES["customer_photo"]["name"] . " already exists. ";
		} else {
			move_uploaded_file($_FILES["customer_photo"]["tmp_name"], "$dir_member/" . $_FILES["customer_photo"]["name"]);
			
			$dbhost="localhost";
			$dbname="kpi_db";
			$dbusername="root";
			$dbpassword="";
			$dbcon=mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);
			
			if (mysqli_connect_errno()) {
				echo "Failed to connect to MySQL: ".mysqli_connect_errno();
			}
			
			$id_user = 1;
			$username = $_SESSION["username"];
			$filename = mysqli_real_escape_string($dbcon, $_FILES["customer_photo"]["name"]);
			$hash_value = md5_file("$dir_member/" .$filename);
			
			echo $hash_value;
			
			$query="INSERT INTO files(id_user, nama_file, hash_value) VALUES($id_user,'$filename','$hash_value')";
			mysqli_query($dbcon, $query); 
			mysqli_close($dbcon);
			echo "Stored as " . "$dir_member/" . $_FILES["customer_photo"]["name"];
		
		}
		echo "<BR/><BR/>";
		echo "<a href='index.php'>Kembali</a>";
	}
?> 