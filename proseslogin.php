<?php
//memulai session baru
session_start();

//memanggil koneksi
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$username = stripslashes($username);  
$password = stripslashes($password);  
$username = mysqli_real_escape_string($koneksi, $username);  
$password = mysqli_real_escape_string($koneksi, $password);  
$hashquery = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM `user` WHERE log_usr = '$username'"));
$hash=$hashquery['hash'];

if(password_verify($password, $hash)){

$query = mysqli_query($koneksi, "SELECT * from user WHERE log_usr='$username'");
$exitCount=mysqli_num_rows($query);
	if($exitCount==1){
			$data = mysqli_fetch_array($query);
			$id = $data["log_usr"];
			$lvl = $data["sts_usr"];
			
			if ($lvl=='A')
			{
				$link = 'admin/index.php';
			}
			elseif($lvl='U')
			{
				$link = 'index.php';
			}
		$_SESSION['username'] = $username;
		header ("location:$link");
		exit();
	}else{
		echo "<script>alert('Username dan Password tidak valid.'); window.location = 'index.php'</script>";
	}
}else{
	echo "<script>alert('Username dan Password tidak valid.'); window.location = 'index.php'</script>";
}
?>