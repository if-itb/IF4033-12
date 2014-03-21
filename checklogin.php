<?php
	$dbhost="localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname="kpi_db";
	$tbl_name = "users";
	
	$link = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname) or die ("cannot connect");
	//mysql_select_db($dbname,$link) or die ("cannot select DB ".mysql_error());
	
	if((!empty($_POST['myusername'])) && (!empty($_POST['mypassword']))){
		
		$myusername = $_POST['myusername'];
		$mypassword = $_POST['mypassword'];
		//$encrypted_mypassword=md5($mypassword);

		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);
		$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
		$result=mysqli_query($dbcon,$sql);

		$count=mysqli_num_rows($result);
		
		if($count==1){
			session_start();
			$_SESSION["username"] = $myusername;
			$row = mysqli_fetch_array($result);
			$_SESSION["id_user"] = $row['id_user']; 	//--Satria: pake mysqli_*, rekomendasi dari PHP
			//$_SESSION["id_user"] = 
			//$_SESSION("mypassword") = "mypassword"; 
			header("location:login_success.php");
		}
		else {
			echo "Wrong Username or Password";
		}
	}

?>