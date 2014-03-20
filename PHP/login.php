<?php
	$dbhost="localhost";
	$dbname="kpi_db";
	$dbusername = "root";
	$dbpassword = "password";
	$dbcon=mysql_connect($dbhost,$dbusername,$dbpassword);
	$connection_string=mysql_select_db($dbname);
	
	if(isset($_GET['username']) && isset($_GET['password'])){
		$uname = $_GET['username'];
		$passw = $_GET['password'];

		$getUser_sql = 'SELECT * FROM users WHERE username="'. $uname . '" AND password = "' . $passw . '"';
		$getUser = mysql_query($getUser_sql);
		$getUser_result = mysql_fetch_assoc($getUser);
		$getUser_RecordCount = mysql_num_rows($getUser);

		if($getUser_RecordCount < 1){ echo '0';} 
		else { echo $getUser_result['username'];
			}
	}
?>