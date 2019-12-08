<?php 
session_start();
require_once './commons/constants.php';
require_once 'db.php';
require_once './commons/helpers.php';
$message="";
if (isset($_POST["submit"])) {
	$username=$_POST['username'];
	$password= password_hash($_POST['password'],PASSWORD_DEFAULT);
	$confirm= password_hash($_POST['confirm'],PASSWORD_DEFAULT);
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$status=$_POST['status'];
	$image=$_FILES['file'];
	if(isset($_FILES['file']['name'])){
		$filename=$_FILES['file']['name'];
		$fileType=$_FILES['file']['type'];
		$fileSize=$_FILES['file']['size'];
		$fileTmpName=$_FILES['file']['tmp_name'];
		$fileErro=$_FILES['file']['error'];
		if ($fileErro===0) {
			if ($fileSize<=1000000) {
				$fileDestination="img/".$filename;
				if(move_uploaded_file($fileTmpName,$fileDestination)){
					echo "đã cập nhập ảnh thành công";  
				}else{
					echo "cập nhật ảnh thất bại";
				}
			}else{
				echo "Mời bạn chọn file ảnh dưới 1 GB";
			}
				$sql="INSERT INTO users (username,password,name,email,address,phone,status,image) VALUES(N'$username',N'$password',N'$name',N'$email',N'$address',N'$phone','status','".$filename."')";
				$stmt=$conn->prepare($sql);
				$stmt->execute();


			}
		}
	}






			?>