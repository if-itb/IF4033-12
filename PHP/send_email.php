<?php
	$dbhost="localhost";
	$dbname="kpi_db";
	$dbusername = "root";
	$dbpassword = "password";
	$dbcon=mysql_connect($dbhost,$dbusername,$dbpassword);
	$connection_string=mysql_select_db($dbname);
	
	if(isset($_POST['email'])){
		$email = $_POST['email'];
		$query = "select * from users where email='$email'";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		if($count==1){
			$rows=mysql_fetch_array($result);
			$pass = $rows['password'];
			$to = $rows['email'];
			$from = "login web app";
			$url = "http://localhost/KPI_tugas/KPI/src/newpassword.php"
			$body = "secure web app password recovery";
			 Url : $url;
			 email Detail is : $to;
			 Here is your password : $pass;
			 
			$from = "xxx@gmail.com"
			$subject = "secure web app recovered"
			$headers1 = "From: $from\n"
			$headers1 .="Content type: text/html";
			$sentmail = mail($to, $subject, $body, $header);
			
		}else{
			echo "email not found";
		}
	}
	
	
	
	//contoh token di dalam link dari email https://console.appfog.com/recover?token=7CSiLrAHRqjANGHQkD80eARYPA-0UhE6CzjRWgna-lsQwXKel2sdNePhhUdczNe_aA:1395344715
?>