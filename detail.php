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
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- start: Meta -->
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/favicon.png"/>
	<title>Canterella Shop</title> 
	<meta name="description" content="online shop"/>
	<meta name="keywords" content="" />
	<meta name="author" content="Gusti Aldi"/>
	<!-- end: Meta -->
		
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: Facebook Open Graph -->
	<meta property="og:title" content=""/>
	<meta property="og:description" content=""/>
	<meta property="og:type" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:image" content=""/>
	<!-- end: Facebook Open Graph -->

    <!-- start: CSS --> 
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    
	<!--start: Header -->
	<header>
		
		<!--start: Container -->
		<div class="container">
			
			<!--start: Row -->
			<div class="row">
				
				<!--start: Logo -->
				<div class="logo span3">
						
					<a class="brand" href="index.php"><img src="img/banner4.png" alt="Logo"></a>
						
				</div>
				<!--end: Logo -->
					
				<!--start: Navigation -->
				<div class="span10">
					
					<div class="navbar navbar-inverse">
			    		<div class="navbar-inner">
			          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			            		<span class="icon-bar"></span>
			          		</a>
							
			          		<div class="nav-collapse collapse">
			            		<ul class="nav">
			              			<li><a href="index.php">Home</a></li>
			              			<!-- <li><a href="produk.php">Produk Kami</a></li>-->
									
									<li class="dropdown">
			                			<a href="produk.php" class="dropdown-toggle" data-toggle="dropdown">Product <b class="caret"></b></a>
			                			<ul class="dropdown-menu">
			                  				<li><a href="produk.php?type=clothes">Clothes</a></li>
			                  				<li><a href="produk.php?type=hijab">Hijab</a></li>
											<li><a href="produk.php?type=bag">Bag</a></li>
											<li><a href="produk.php?type=shoes">Shoes</a></li>
			                  				<!--<li class="divider"></li>
			                  				<li class="nav-header">Nav header</li>
			                  				<li><a href="#">Separated link</a></li>
			                  				<li><a href="#">One more separated link</a></li>-->
			                			</ul>
			              			</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions<b class="caret"></b></a>
										<ul class="dropdown-menu">
			                  				<li><a href="konf_trans.php">Payment Confirmation</a></li>
			                  			</ul>
									</li>
                                    <li><a href="detail.php" classs="badge">Shopping Cart <span id ="cartcount" class="badge">0</span></a></li>
									<!--check if session is there then change button login to logout button-->
											<?php
											if(isset($_SESSION['username'])){
												#echo "you logged in as </br>", $_SESSION['username'];
    										?>
									<li><a href="logout.php" onClick="return confirm('Are you sure want to log out ?')"><u><?php echo $_SESSION['username'];?></u>, Logout ?</a></li>
											<?php }else{ ?>
									<li class="dropdown">
			                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
			                			<ul class="dropdown-menu">
											<div class ="icons-box">
											<!-- start Login form -->
			                  				 <form action="proseslogin.php" method="POST">
											  Username: <input type="text" name="username"><br>
											  Password: <input type="password" name="password"><br>
											 <input type="submit" value="login" class="loginbutton">
											 <a href="registuser.php">Register</a> 
											</form> 
											</div>
			                			</ul>
			              			</li>
									<!-- finish Login form -->
									<?php } ?>
			            		</ul>
			          		</div>
			        	</div>
			      	</div>
					
				<!--end: Navigation -->
				</nav>	
			</div>
			<!--end: Row -->
			
		</div>
		<!--end: Container-->			
	</header>
	<!--end: Header-->
	
	<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-usd ico-white"></i>Shopping Cart</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
	
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Table -->
            <div class="title"><h3>Detail Keranjang Belanja</h3></div>
			<form method="post" action"">
				<table class="table table-hover table-condensed">
				<tr>
					<th><center>No Pembelian</center></th>
                    <th><center>Kode Barang</center></th>
					<th><center>Nama Barang</center></th>
					<th><center>Harga Satuan</center></th>
					<th><center>Jumlah</center></th>
					<th><center>Berat Barang</center></th>
					<th><center>Sub Total</center></th>
					<th><center>Opsi</center></th>
				</tr>
			    <?php
				//MENAMPILKAN DETAIL KERANJANG BELANJA//
                	$total = 0;
					//mysql_select_db($database_conn, $conn);
					if (isset($_SESSION['items'])) {
						foreach ($_SESSION['items'] as $key => $val) {
							$query = mysqli_query($koneksi, "select * from barang where br_id = '$key'");
							$data = mysqli_fetch_array($query);
							$jumlah_harga = $data['br_hrg'] * $val;
							$brt_brg = $data['brt_brg'];
							$total += $jumlah_harga;
							$no1 = substr($_SESSION['username'], 0, 2);
							$no2 = substr(uniqid(), 0, 8);
							$uniqueidtrans = strtoupper($no1."".$no2);
				?>
                <tr>
					<td><center><?php echo $uniqueidtrans; ?></center></td>
					<td><center><?php echo $data['br_id']; ?></center></td>
					<td><center><?php echo $data['br_nm']; ?></center></td>
					<td><center><?php echo number_format($data['br_hrg']); ?></center></td>
					<td><center><?php echo number_format($val); ?></center></td>
					<td><center><?php echo $brt_brg; ?> Kg</center></td>
					<td><center><?php echo number_format($jumlah_harga); ?></center></td>
					<td><center><a href="cart.php?act=plus&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-success">Tambah</a> <a href="cart.php?act=min&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-warning">Kurang</a> <a href="cart.php?act=del&amp;barang_id=<?php echo $key; ?>&amp;ref=detail.php" class="btn btn-xs btn-danger">Hapus</a></center></td>
                </tr>
                
				<?php
                    //mysql_free_result($query);			
						}
							//$total += $sub;
				}?>  
                <?php
					if($total == 0){
						echo '<tr><td colspan="5" align="center">Ups, Keranjang kosong!</td></tr></table>';
						echo '<p><div align="right">
							<a href="index.php" class="btn btn-info btn-lg">&laquo; Continue Shopping</a>
							</div></p>';
					} else {
						echo '
						<tr style="background-color: #DDD;"><td colspan="4" align="right"><b>Total :</b></td><td align="right"><b>Rp. '.number_format($total,2,",",".").'</b></td></td></td><td></td></tr></table>
						<p><div align="right">
						<a href="index.php" class="btn btn-info">&laquo; CONTINUE SHOPPING</a>
						<a href="checkout.php" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart icon-white"></i>CHECKOUT &raquo;</a>
						</div></p>
						';
					}
				?>
				</table>
				
				
			<!-- end: Table -->

		</div>
		<!-- end: Container -->
				
	</div>
	<!-- end: Wrapper  -->			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
						
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="span9">
					
					<div id="footer-menu-links">

						<ul id="footer-nav">

							

						</ul>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>		
	<!-- end: Footer Menu -->

	<!-- start: Footer -->
	<div id="footer">
		
		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: About -->
				<div class="span3">
					
					<h3>Tentang Canterella Shop</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
					</p>
						
				</div>
				<!-- end: About -->

				<!-- start: Photo Stream -->
				<div class="span3">
					
					<h3>Alamat Kami</h3>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum
				</div>
				<!-- end: Photo Stream -->

				<div class="span6">
				
					<!-- start: Follow Us -->
					<h3>Follow Us!</h3>
					
					<p>
						<img src="img/icons/social/bbm.png" alt="logo" height="50" width="50"/>
						<big><b>5EC5E398</b></big>
					</p>
					
					<p>
						<img src="img/icons/social/line.png" alt="logo" height="50" width="50"/>
						<a href="http://www.line.me/ti/p/%40wpk6586y" target="_blank"><big><b>http://www.line.me/ti/p/%40wpk6586y</b></big></a>
					</p>
					
					<p>
						<img src="img/icons/social/ig.png" alt="logo" height="50" width="50"/>
						<a href="http://www.instagram.com/canterellastore" target="_blank"><big><b>Canterellastore</b></big></a>
					</p>
					<!--just in case social media button show up later
					<ul class="social-grid">
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-twitter">
											<a href="http://twitter.com"></a>
										</div>
										<div class="social-info-back social-twitter-hover">
											<a href="http://twitter.com"></a>
										</div>-	
									</div>
								</div>
							</div>-
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-facebook">
											<a href="http://facebook.com"></a>
										</div>
										<div class="social-info-back social-facebook-hover">
											<a href="http://facebook.com"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-dribbble">
											<a href="http://dribbble.com"></a>
										</div>
										<div class="social-info-back social-dribbble-hover">
											<a href="http://dribbble.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-flickr">
											<a href="http://flickr.com"></a>
										</div>
										<div class="social-info-back social-flickr-hover">
											<a href="http://flickr.com"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
					</ul>
					social media button end-->
					<!-- end: Follow Us -->
				
					<!-- start: Newsletter -->
				<!--	<form id="newsletter">
						<h3>Newsletter</h3>
						<p>Please leave us your email</p>
						<label for="newsletter_input">@:</label>
						<input type="text" id="newsletter_input"/>
						<input type="submit" id="newsletter_submit" value="submit">
					</form> -->
					<!-- end: Newsletter -->
				
				</div>
				
			</div>
			<!-- end: Row -->	
			
		</div>
		<!-- end: Container  -->

	</div>
	<!-- end: Footer -->

	<!-- start: Copyright -->
	<div id="copyright">
	
		<!-- start: Container -->
		<div class="container">
		
			<p>
				Developed by <a href="">Gusti Aldi 2016</a> Copyright &copy; <a href="http://bootstrapmaster.com" alt="Bootstrap Themes">Bootstrap Themes</a> designed by BootstrapMaster
			</p>
	
		</div>
		<!-- end: Container  -->
		
	</div>	
	<!-- end: Copyright -->

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script def src="js/custom.js"></script>
<script>
cartcount = '<?php echo $_SESSION['cartcount']; ?>';
document.getElementById("cartcount").textContent = cartcount;
</script>
<!-- end: Java Script -->

</body>
</html>