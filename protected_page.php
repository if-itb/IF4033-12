<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start(); 

if(login_check($mysqli) == true) {
        echo 'You are in.';
		// Masukin file-upload disini
} else { 
        echo 'You are not authorized to access this page, please login.';
}
?>