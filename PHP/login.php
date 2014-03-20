<?php
	$dbhost="localhost";
	$dbname="kpi_db";
	$dbusername = "root";
	$dbpassword = "password";
	$tbl_name = "users";
	
	$dbcon=mysql_connect($dbhost,$dbusername,$dbpassword);
	$connection_string=mysql_select_db($dbname);
	
	if(isset($_POST['myusername']) && isset($_POST['mypassword'])){
		$myusername = $_POST['myusername'];
		$mypassword = $_POST['mypassword'];

		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);
		$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
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
?>