<?php
	$dbhost="localhost";
	$dbname="kpi_db";
	$dbusername = "root";
	$dbpassword = "";
	$dbcon=mysql_connect($dbhost,$dbusername,$dbpassword);
	$connection_string=mysql_select_db($dbname);
	echo "tes1";
	if(!empty($_POST["email"])){
		//ini_set("SMTP","localhost");
		//ini_set("smtp_port","25");
		//ini_set("sendmail_from","gabrielle.wicesawati@gmail.com");
		echo "tes";
		$email = $_POST["email"];
		$query = "select * from users where email='$email'";
		$result = mysql_query($query);
		$count = mysql_num_rows($result);
		if($count==1){
			$rows=mysql_fetch_array($result);
			$pass = $rows['password'];
			$to = $rows['email'];
			$from = "login web app";
			$url = "http://localhost/KPI_tugas/KPI/src/newpassword.php";
			$body = "your password";	
			 
			$from = "xxx@gmail.com";
			$subject = "secure web app recovered";
			$headers1 = "From: $from\n";
			$headers1 .="Content type: text/html";
			$sentmail = mail($to, $subject, $body, $headers1);

		}else{
			echo "email not found";
		}
	}
	
	
	
	//contoh token di dalam link dari email https://console.appfog.com/recover?token=7CSiLrAHRqjANGHQkD80eARYPA-0UhE6CzjRWgna-lsQwXKel2sdNePhhUdczNe_aA:1395344715
?>