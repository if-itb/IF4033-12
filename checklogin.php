<?php
	$dbhost="localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname="kpi_db";
	$tbl_name = "users";
	
	mysql_connect($dbhost,$dbusername,$dbpassword) or die ("cannot connect");
	mysql_select_db($dbname) or die ("cannot select DB");
	
	if((!empty($_POST["myusername"])) && (!empty($_POST["mypassword"]))){
		
		$myusername = $_POST["myusername"];
		$mypassword = $_POST["mypassword"];
		$encrypted_mypassword=md5($mypassword);

		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);
		$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$encrypted_mypassword'";
		$result=mysql_query($sql);

		$count=mysql_num_rows($result);
		
		if($count==1){
		session_register("myusername");
		session_register("mypassword"); 
		header("location:login_success.php");
		}
		else {
		echo "Wrong Username or Password";
		}
	}
//	else {
//		echo "Failed"
//	}*/
?>