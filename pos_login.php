<?php 
session_start();
require_once './commons/constant.php';
require_once 'db.php';
require_once './commons/helper.php';

if (isset($_POST['submit'])) {
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql="select * from account where email = '$email'";
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	$user=$stmt->fetch();
	if ($user && password_verify($password, $user['password'])) {
		$_SESSION[AUTH] = [
			"id" => $user['id'],
			"email" => $user['email'],
			"name" => $user['name'],
			"status" => $user['status'],
			"role" => $user['role']
		];
		if($session[AUTH]['role']==1){
	header("location: admin.php");
}else{
	header("location: home.php");
	die();
}
}
header('location: ' . BASE_URL . 'login.php?msg=Email/Mật khẩu không đúng');
die;
}
?>