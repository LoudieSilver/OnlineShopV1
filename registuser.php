<?php
	require_once("koneksi.php");
    if (!isset($_SESSION)) {
        session_start();
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
    <style type="text/css">
    .konten
{
    margin-top: 20px;
    margin-left: 350px;
    margin-right: 15px;
	color: black;
	font-family: calibri;
    font-size: 20px;
    font-weight: none;	
}
.komentar
{
    position: center;
    margin-top: 20px;
    margin-left: 340px;
    margin-right: 15px;
	color: gray;
	font-family: calibri;
    font-size: 14px;
    font-weight: none;	
    border: 1px solid #;
    width: 700px;
    height: 260px;
    overflow: scroll;
}
    </style>
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
				<div class="span9">
					
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

				<h2><i class="ico-stats ico-white"></i>User Registration</h2>

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
            <div class="table-responsive">
             <div class="hero-unit"><center>Please Fill out the Form with Your Personal Data Correctly </center></div>
                
				<form id="myform" action="prosesregistusr.php" method="post">
					<table class="table table-condensed">
						<input type="hidden" name="total" value="<?php echo abs((int)$_GET['total']); ?>">
						  <tr>
							<td><label for="nm_usr">Nama</label></td>
							<td><input name="nm_usr" type="text" class="required" minlength="6" id="nm_usr" data-toggle="tooltip" data-placement="right" title="Masukkan nama lengkap anda" /></td>
						  </tr>
						  <tr>
							<td><label for="log_usr">Username</label></td>
							<td><input name="log_usr" type="text" class="required" minlength="6" maxlength="15" id="log_usr" />
							<span id='usercheck' style='padding-left:10px; vertical-align: middle;'>
							</td>
						  </tr>
						  <tr>
							<td><label for="pas_usr">Password</label></td>
							<td><input name="pas_usr" type="password" class="required" minlength="6" id="pas_usr" data-toggle="tooltip" data-placement="right" title="" /></td>
						  </tr>
						  <tr>
							<td><label for="repas_usr">Confirm Password</label></td>
							<td><input name="repas_usr" type="password"  class="required" minlength="6" id="repas_usr" data-toggle="tooltip" data-placement="right" title="" /></td>
						  </tr>
						  <tr>
							<td><label for="email_usr">Email</label></td>
							<td><input name="email_usr" type="text" class="email required" id="email_usr" data-toggle="tooltip" data-placement="right" title="Pastikan email Anda aktif"/></td>
						  </tr>
						  <tr>
							<td><label for="almt_usr">Alamat</label></td>
							<td><textarea name="almt_usr" type="text" class="required" id="almt_usr" data-toggle="tooltip" data-placement="right" title="Alamat tujuan pengiriman barang pesanan Anda"/></textarea></td>
						  </tr>
						  <tr>
							<td><label for="kp_usr">Kode Pos</label></td>
							<td><input name="kp_usr" type="text" class="required number" minlength="5" maxlength="5" id="kp_usr" data-toggle="tooltip" data-placement="right" title=""/></td>
						  </tr>
						  <tr>
							<td><label for="prov_usr">Provinsi</label></td>
							<td>
							<select name="prov_usr" id="oriprovince">
							<option>Provinsi</option>
							</select>
							</td>
						  </tr>
						  <tr>
							<td><label for="kota_usr">Kota</label></td>
							<td>
							<select name="kota_usr" id="oricity">
							<option>Kota</option>
							</select>
							</td>
						  </tr>
						  <tr>
							<td><label for="tlp">No telepon</label></td>
							<td><input name="tlp" type="text" class="required number" minlength="11" id="tlp" data-toggle="tooltip" data-placement="right" title=""/></td>
						  </tr>
						  <!--<tr>
							<td><label for="rek">No Rekening</label></td>
							<td><input name="rek" type="text" class="required number" minlength="12" id="rek" data-toggle="tooltip" data-placement="right" title="Digunakan sebagai rekening konfirmasi pembelian anda"/></td>
						  </tr>
						  <tr>
							<td><label for="nmrek">Nama Rekening</label></td>
							<td><input name="nmrek" type="text" class="required" minlength="6" id="nmrek" data-toggle="tooltip" data-placement="right" title="Hooray!"/></td>
						  </tr>
						  <tr>
							<td><label for="bank">Bank</label></td>
							<td><select name="bank" class="required" >
							<option></option>
							<option value="Mandiri">Mandiri</option>
							<option value="BNI">BNI</option>
							<option value="CIMB">CIMB</option>
							<option value="BCA">BCA</option>
							<option value="Bank Jabar">Bank Jabar</option>
							<option value="Danamon">Danamon</option>
							<option value="BRI">BRI</option>
							<option value="Permata">Permata</option>
							</select>
							</td>
						  </tr>-->
						  <tr>
						  <td></td>
							<td><input id="submit" type="submit" value="Simpan Data" name="finish"  class="btn btn-sm btn-primary"/>&nbsp;<a href="index.php" class="btn btn-sm btn-primary">Kembali</a></td>
							</tr>
					</table>
				</form>
            </div>
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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/scriptprovcity.js"></script>
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script def src="js/custom.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
    $(document).ready(function(){
        $("#myform").validate();
    });
</script> 
    <style type="text/css">
    label.error {
        color: red;
        padding-left: .5em;
    }
</style>
	
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({trigger: "focus"});   
});
</script>

<script type="text/javascript">

function checkUserName(usercheck)
{
	$('#usercheck').html('<img src="img/ajax-loader.gif" />');
	$.post("checkuser.php", {log_usr: usercheck} , function(data)
		{			
			   if (data != '' || data != undefined || data != null) 
			   {				   
				  $('#usercheck').html(data);	
			   }
          });
}
</script>
<script type="text/javascript">
    $(function () {
        $("#submit").click(function () {
            var password = $("#pas_usr").val();
            var confirmPassword = $("#repas_usr").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>

<!-- end: Java Script -->

</body>
</html>