<?php
	require '../PHPMailer-master/class.phpmailer.php';
	$dbhost="localhost";
	$dbname="kpi_db";
	$dbusername = "root";
	$dbpassword = "";
	$dbcon=mysql_connect($dbhost,$dbusername,$dbpassword);
	$connection_string=mysql_select_db($dbname);
	
	
	echo "tes1";
	if(!empty($_POST["email"])){
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
			$id_user = "select id_user from users where email='$email'";
			$token = "select token from users where id_user='$id_user'";
			$body = "your token".$token." Please go to link http://localhost/KPI_tugas/KPI/src/newpassword.php";	
			$from = "gabrielle.wicesawati@gmail.com";
			$from_name = "gabrielle";
			$subject = "secure web app recovered";
			$headers1 = 'From: sharepic@example.com' . "\r\n" .
			'Reply-To: sharepic@example.com' . "\r\n" ;
			
			$mail = new PHPMailer();  // create a new object
			$mail->IsSMTP(); // enable SMTP
			$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
			$mail->SMTPAuth = true;  // authentication enabled
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Host = 'smtp.gmail.com';//required for gmail
			$mail->Port = 465; 
			$mail->Username = 'gabrielle.wicesawati@gmail.com';//the email I want to send from  
			$mail->Password = 'akumaumakan';  //my password         
			$mail->SetFrom($from, $from_name);
			$mail->Subject = $subject;
			$mail->Body = $body;
			$mail->AddAddress($to);
			if(!$mail->Send()) echo "message sent";
			else echo "message not sent";
					//$sentmail = mail($to, $subject, $body, $headers1);
					//echo "sentmail".$sentmail;
					/*if($sentmail){
						echo "email sent to".$to;
					}*/
					
				}else{
					echo "email not found";
				}
	}
	
	
	
	//contoh token di dalam link dari email https://console.appfog.com/recover?token=7CSiLrAHRqjANGHQkD80eARYPA-0UhE6CzjRWgna-lsQwXKel2sdNePhhUdczNe_aA:1395344715
?>