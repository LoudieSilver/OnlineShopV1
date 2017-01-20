<?php
require_once("koneksi.php");
session_start();

    if (!isset($_SESSION['username'])){
		echo "<script>alert('You must register an account first, we will redirect you to register page !'); window.location = 'registuser.php'</script>";
	}

#$getdata = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM user WHERE nm_usr = '".$_SESSION['username']."'"));
#$userid = $getdata['nm_usr']; 

$username = $_SESSION['username'];

$query = mysqli_query($koneksi, "SELECT * from user WHERE log_usr='$username'");
$exitCount=mysqli_num_rows($query);
	if($exitCount==1){
			$data = mysqli_fetch_array($query);
	$id = $data["almt_usr"];
	}
	echo $id;

?>