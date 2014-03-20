<!DOCTYPE HTML>
<html> 
<body>
<?php /*<script src="js/ajaxlogin.js" language="javascript"></script>
<script>
	function login() {
		//document.getElementById('login_response').innerHTML = "Loading..."
		alert("login");
		var uname = encodeURI(document.getElementById('uname_login').value);
		var passw = encodeURI(document.getElementById('password_login').value);
		nocache = Math.random();	
		http.onreadystatechange = loginReply;
		http.open('get', 'php/login.php?username='+uname+'&password='+passw+'&nocache = '+nocache);
		http.send(null);
	}
</script>*/?>
<b>Login</b>
<form name="form1" method="post" action="login.php">
Username: <input name="myusername" type="text" id="myusername"><br>
Password: <input name="mypassword" type="text" id="mypassword"><br>
<input type="submit" name="Submit" value="Login"> 

</form>
<a href="src/forget_password.php">Forget Password</a>
</body>
</html>