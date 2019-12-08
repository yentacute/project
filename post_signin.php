<?php 
session_start();
require_once 'db.php';
require_once './commons/constants.php';
require_once './commons/helpers.php';

if (isset($_POST['submit'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];

	$mysql="SELECT * FROM  users WHERE email = '".$email."'";
	$stmt=$conn->prepare($mysql);
	$stmt->execute();
	$acc=$stmt->fetch();
	if ($acc && password_verify($password, $acc["password"])) {
		$_SESSION[AUTHIES] = [
			"id" => $acc['id'],
			"username" => $acc['username'],
			"name" => $acc['name'],
			"email" => $acc['email'],
			"adress" => $acc['adress'],
			"image" => $acc['image'],
			"role" => $acc['role'],
		];
		dd($_SESSION[AUTHIES]);die;
		if(!isset($_SESSION[AUTHIES])){
			header("location: home.php");
		}elseif($_SESSION[AUTHIES]['role']==1){
			header("location: admin.php");
		}else{
			header("location: home.php");
			die();
		}
	}
	// header('location: ' . BASE_URL . 'login.php?msg=Email/Mật khẩu không đúng');
	// die;
}
?>