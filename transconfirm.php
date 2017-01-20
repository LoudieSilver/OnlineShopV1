<?php
//memulai session baru
session_start();

//memanggil koneksi
include "koneksi.php";

$id_trans = mysqli_real_escape_string($koneksi, $_POST['penjualan_id']);
$id_usr = mysqli_real_escape_string($koneksi, $_POST['usr_id']);
$rek_usr = mysqli_real_escape_string($koneksi, $_POST['no_rek']);
$tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggalinput']);
$bank = mysqli_real_escape_string($koneksi, $_POST['bank']);
$nm_pengirim = mysqli_real_escape_string($koneksi, $_POST['nm_pengirim']);
$juml_transf = mysqli_real_escape_string($koneksi, $_POST['jmlh_transf']);
$berita_acara = mysqli_real_escape_string($koneksi, $_POST['berita_acara']);

	$sql="insert into konf_transf(penjualan_id, usr_id, no_rek, tanggal, bank_tujuan, nm_pengirim, jmlh_transf, berita_acara, status) values('$id_trans', '$id_usr', '$rek_usr', '$tanggal', '$bank', '$nm_pengirim', '$juml_transf', '$berita_acara', 'Belum')";
	$res=mysqli_query($koneksi, $sql);
		If($res)
			{
			 echo "<script>alert('Your transaction confirmation has successfully registered.'); window.location = 'index.php'</script>";
			}
		Else
			{
			 echo "<script>alert('Your transaction confirmation failed.'); window.location = 'index.php'</script>";
			}

?>