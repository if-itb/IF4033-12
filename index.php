<!DOCTYPE HTML>
<html> 
<body>
<script src="js/ajaxlogin.js" language="javascript"></script>
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
</script>
<b>Login</b>
<form id="login_form" action="javascript:login()" onsubmit="login()" method="post">
Username: <input type="text" name="myusername"><br>
Password: <input type="text" name="mypassword"><br>
<input type="submit" value="Login" name="Submit"> 

</form>
<a href="src/forget_password.php">Forget Password</a>
</body>
</html>