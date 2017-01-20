<?php

require_once("koneksi.php");
session_start();

    if (!isset($_SESSION['username'])){
		echo "<script>alert('You must register an account first, we will redirect you to register page !'); window.location = 'registuser.php'</script>";
	}

$username = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * from user WHERE log_usr='$username'");
$Count=mysqli_num_rows($query);
	if($Count==1){
			$data = mysqli_fetch_array($query);
	}
	
if (isset($_POST['submit'])) {

    $nm_usr = $_POST['nm_usr'];
    $almt_usr = $_POST['almt_usr'];
    $prov_usr = $_POST['postprovince'];
	$kota_usr = $_POST['postcity'];
    $kp_usr = $_POST['kp_usr'];
	$tlp = $_POST['tlp'];
	$ongkir = $_POST['postongkir'];
	$jasakirim = $_POST['postpaket'];
	
	$no1 = substr($_SESSION['username'], 0, 2);
	$no2 = substr(uniqid(), 0, 8);
	$no_pen = strtoupper($no1."".$no2);
		
    // masukkan dalam table user
    mysqli_select_db($koneksi, $db_name);
    $query = mysqli_query($koneksi, "update `user` set nm_usr = '$nm_usr', almt_usr='$almt_usr', kota_usr='$kota_usr', kp_usr='$kp_usr', tlp='$tlp' where nm_usr='$nm_usr'") or die(mysqli_error());
    if ($query) {
        $idquery = mysqli_query($koneksi, "select * from user where nm_usr = '$nm_usr'");
		$fetchid = mysqli_fetch_array($idquery);
		$getid = $fetchid['id_usr'];
		
        // masukkan dalam tabel penjualan
        $query = mysqli_query($koneksi, "INSERT INTO `penjualan` (`no_pen`, `tanggal`, `id_usr`, `prov_tujuan`, `kota_tujuan`, `almt_tjuan`, `jasa_kirim`, `total`, `biaya_pengiriman`, `jumlah_total`, `status`) VALUES ('$no_pen', CURRENT_DATE, '$getid', '$prov_usr', '$kota_usr', '$almt_usr', '$jasakirim', 0, '$ongkir', 0, 'Belum')") or die(mysqli_error($koneksi));
        if ($query) {
            $penjualan_id = mysqli_insert_id($koneksi);
			$total = 0;
            
            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $value) {
                    $br_id = $key;
                    $kuantitas = $value;
					$query_barang = mysqli_query($koneksi, "SELECT * FROM `barang` WHERE `br_id` = '$br_id'");
                    // ambil data dari data barang
                    $rs_barang = mysqli_fetch_array($query_barang);
                    $harga = $rs_barang['br_hrg'];
					$jumlah_harga = $harga * $kuantitas;
                    $total += $jumlah_harga;
                    mysqli_query($koneksi, "INSERT INTO `item_penjualan` (`penjualan_id`, `br_id`, `harga`, `kuantitas`, `jumlah_harga`) VALUES ('$penjualan_id', '$br_id', '$harga', '$kuantitas', '$jumlah_harga')");
                }
            }

            $jumlah_total = $total + $ongkir;
            $query = mysqli_query($koneksi,"UPDATE `penjualan` SET `total` = '$total', `jumlah_total` = '$jumlah_total' WHERE `id` = '$penjualan_id'");
            if ($query) {
                echo "<script>alert('Checkout Success.'); window.location = 'selesai.php?nopen=$no_pen' </script>";

                // clear cart session
                foreach ($_SESSION['items'] as $key => $val) {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
				unset($_SESSION['cartcount']);				
            }
        }
    }
}


?>