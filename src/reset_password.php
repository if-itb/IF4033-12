<?php
	$dbhost="localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname="kpi_db";
	$tbl_name = "users";
	
	$conn = mysql_connect($dbhost,$dbusername,$dbpassword);
	mysql_select_db($dbname) or die ("cannot select DB");
	
	if((!empty($_POST["email"])) && (!empty($_POST["token"])) && (!empty($_POST["newpassword"]))){
		
		$email = $_POST["email"];
		$token = $_POST["token"];
		$newpassword = $_POST["newpassword"];
		
		$iduser = "select id_user from tokens where token='$token'";
		$iduseremail = "select id_user from users where email='$email'";
		if($iduser===$iduseremail){
			$sql = "UPDATE users SET password='$newpassword' WHERE email='$email'";
			$retval = mysql_query( $sql, $conn );
			if(! $retval )
			{
			  die('Could not update data: ' . mysql_error());
			}
			echo "Updated data successfully\n";
			mysql_close($conn);
		}
		
	}

?>