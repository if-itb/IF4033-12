<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start(); 

if(login_check($mysqli) == true): 
	header('Location: src/upload_file.php');				
else: 
    echo 'You are not authorized to access this page, please login.';
endif;
?>