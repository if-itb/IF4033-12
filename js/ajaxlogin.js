var http = new XMLHttpRequest();

var nocache = 0;
function login() {
	//document.getElementById('login_response').innerHTML = "Loading..."
	alert("login");
	var uname = encodeURI(document.getElementById('uname_login').value);
	var passw = encodeURI(document.getElementById('password_login').value);
	nocache = Math.random();	
	http.open('get', 'php/login.php?username='+uname+'&password='+passw+'&nocache = '+nocache);
	http.onreadystatechange = loginReply;
	http.send(null);
}