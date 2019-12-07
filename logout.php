<?php 
	session_start();
	
	if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
		unset($_SESSION['user']);
		setcookie("user", "", time()-3600,"/" );
		unset($_SESSION['role']);
		setcookie("role", "", time()-3600,"/" );
		header('location: index.php');
	}
 ?>