<?php
//memulai session baru
session_start();

//memanggil koneksi
include "koneksi.php";
 
#$username=$_POST['log_usr'];

#$arr_user=array("itechroom", "trialuser");

//get the username  
$username = mysqli_real_escape_string($koneksi, $_POST['log_usr']);  
  
//mysql query to select field username if it's equal to the username that we check '  
$result = mysqli_query($koneksi, 'select nm_usr from user where nm_usr = "'. $username .'"');  
  

if(mysqli_num_rows($result)>0) 
{echo '<span class="error">Username already exists.</span>';exit;}
	
else if (preg_match("/^[a-zA-Z1-9]+$/", $username)) 
{
       echo '<span class="success">Username is available.</span>';
} 
else 
{
      echo '<span class="error">Use alphanumeric characters only.</span>';
}

?>