<?php
//memulai session baru
session_start();

//memanggil koneksi
include "koneksi.php";

$nm_usr = mysqli_real_escape_string($koneksi, $_POST['nm_usr']);
$log_usr = mysqli_real_escape_string($koneksi, $_POST['log_usr']);
$pas_usr = mysqli_real_escape_string($koneksi, $_POST['pas_usr']);
$hash = password_hash($pas_usr, PASSWORD_BCRYPT);
$email_usr = mysqli_real_escape_string($koneksi, $_POST['email_usr']);
$almt_usr = mysqli_real_escape_string($koneksi, $_POST['almt_usr']);
$kp_usr = mysqli_real_escape_string($koneksi, $_POST['kp_usr']);
$prov_usr = mysqli_real_escape_string($koneksi, $_POST['prov_usr']);
$kota_usr = mysqli_real_escape_string($koneksi, $_POST['kota_usr']);
$tlp = mysqli_real_escape_string($koneksi, $_POST['tlp']);


$usersql="select * from user where log_usr = '$log_usr'";
$getuser=mysqli_query($koneksi, $usersql);
		
if(mysqli_num_rows($getuser) >= 1){
	echo"<script>alert('Username already registered, please choose other username'); window.location = 'registuser.php'</script>";
}else{
	$sql="insert into user(nm_usr,log_usr,hash,email_usr,almt_usr,kp_usr, prov_usr,kota_usr,tlp,sts_usr) values('$nm_usr', '$log_usr', '$hash', '$email_usr', '$almt_usr', '$kp_usr', '$prov_usr', '$kota_usr', '$tlp', 'U')";
	$res=mysqli_query($koneksi, $sql);
		If($res)
			{
			 echo "<script>alert('You have successfully registered.'); window.location = 'index.php'</script>";
			}
		Else
			{
			 echo "<script>alert('Registration failed.'); window.location = 'registuser.php'</script>";
			}
}
?>