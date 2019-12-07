<?php 
	session_start();
	$message="";
	require_once"db.php";
	if (isset($_POST["submit"])) {
		$name=$_POST['name'];
		$email=$_POST['email'];
		$image="";
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$password= password_hash($_POST['password'],PASSWORD_DEFAULT);
		$confirm= password_hash($_POST['confirm'],PASSWORD_DEFAULT);
		$sql="INSERT INTO account (name,email,address,phone,password,confirm) VALUES(N'$name',N'$email',N'$address',N'$phone',N'$password',N'$confirm')";
		$stmt=$conn->prepare($sql);
		$stmt->execute();
		var_dump($sql);
		die;


}






 ?>