<?php
	$id = $_GET['id'];
	#echo $id;
	include "session.php";
	include "connect.php";
	$query = "SELECT * FROM barang WHERE id_barang = $id";
					    $result = mysqli_query($db, $query);
					    $rowBar = mysqli_fetch_array($result);
	$namaToko = $rowBar['nama_toko'];
	#echo $namaToko;
	$query2 = "SELECT * FROM user WHERE email = '" . $_SESSION['email'] . "'";
						$result2 = mysqli_query($db, $query2);
					    $rowUse = mysqli_fetch_array($result2);
	$query3 = "SELECT * FROM toko WHERE nama_toko = '$namaToko'";
						$result3 = mysqli_query($db, $query3);
					    $rowTok = mysqli_fetch_array($result3);
?>
<!DOCTYPE html>
<html>
<head>
<title>Konfirmasi Pembelian</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
<!-- //font-awesome icons -->

<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

</head>

<body>
<!-- header -->
<?php include "headerNat.php" ?>
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>|</span></li>
				<li>Checkout</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div>
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						<li><a href="Pokok.php">Makanan Pokok</a></li>
						<li><a href="Bumbu.php">Bumbu dapur</a></li>
										<li><a href="Sayur.php">Sayur dan Buah</a></li>
									</ul>
								</div>
							</div>
						</li>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Konfir<span>masi</span></h3>

	      <div class="checkout-right">

				<table class="timetable_sub">
					<thead>
						<tr>
							<th>ID Produk</th>
							<th>Produk</th>
							<th>Nama Produk</th>
							<th>Harga Satuan</th>

						</tr>
					</thead>
					<tbody><tr class="rem1">
						<td class="invert"><?php echo $id ?></td>
						<td class="invert-image"><a href="single.php?id=<?php echo $id?>"><img src="getImage.php?id=<?php echo $id ?>" alt=" " class="img-responsive"></a></td>
						<td class="invert"><?php echo $rowBar['nama_barang'] ?></td>

						<td class="invert">Rp <?php echo $rowBar['harga_barang'] ?>/kg</td>

					</tr>

				</tbody></table>
			</div>
			<div class="checkout-left">
				<div class="col-md-4 checkout-left-basket">
					<h4><?php echo $namaToko ?></h4>
					<ul>
						<li>Kontak <i><br></i> <span><font color='black'><?php echo $rowTok['kontak']?></font> </span></li>
						<li>Alamat Toko <i><br></i> <span><font color='black'><?php echo $rowTok['alamat_toko']?></span> </span></li>

					</ul><br>
					<h5><center><font color=#ff6666 size=3>Tolong Hubungi Toko Tersebut untuk Saling Konfirmasi</font></center></h5>
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4>Informasi Anda</h4>
				<div class="form">
				<form action="checkout.php?id=<?php echo $id; ?>" method="post">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Nama: </label>
													<input readonly="" class="billing-address-name form-control" type="text" name="name" value="<?php echo $rowUse['nama']; ?>">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Nomor Telefon:</label>
														    <input readonly="" class="form-control" type="text" value="<?php echo $rowUse['no_tlp'];?>">
														</div>
													</div>

													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Alamat Pengiriman: </label>
														 <input readonly="" class="form-control" type="text" placeholder="Landmark" value="<?php echo $rowUse['alamat'];?>">
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Jumlah yang Akan Dibeli (Kg):</label>
														    <input required="" class="form-control" type="text" placeholder="Jumlah" name="kuantitas">
														</div>
													</div>

											</div>
											<div class="form">
											<input type="submit" name="konf_barang" class="form" value="Pesan">
<?php
	if (isset($_POST['konf_barang'])){
  $id = $_GET['id'];
  $query = "SELECT * FROM barang WHERE id_barang = $id";
              $result = mysqli_query($db, $query);
              $rowBar = mysqli_fetch_array($result);
  $namaToko = $rowBar['nama_toko'];
  #echo $namaToko;
  $query2 = "SELECT * FROM user WHERE email = '" . $_SESSION['email'] . "'";
            $result2 = mysqli_query($db, $query2);
              $rowUse = mysqli_fetch_array($result2);
  $query3 = "SELECT * FROM toko WHERE nama_toko = '$namaToko'";
            $result3 = mysqli_query($db, $query3);
              $rowTok = mysqli_fetch_array($result3);


  $idBar = $id;
  $namaToko = $rowTok['nama_toko'];
  $namUs = $rowUse['nama'];
  $alKir = $rowUse['alamat'];
  $KonUs = $rowUse['no_tlp'];
  $idUse = $rowUse['id_user'];
  $alTok = $rowTok['alamat_toko'];
  $konTok = $rowTok['kontak'];
  $namBar = $rowBar['nama_barang'];
  $kuantitas = mysqli_real_escape_string($db, $_POST['kuantitas']);
  $harga = floatval(preg_replace("/[^-0-9\.]/","",$rowBar['harga_barang']));
  #echo $harga;
  #$input = '1,000,000';
  #echo floatval(preg_replace("/[^-0-9\.]/","",$input));
  $jumlah = floatval($kuantitas);
  $total = $jumlah * $harga;
  $totalS = number_format($total);
  #echo $totalS;

  $query = "INSERT INTO pembelian (id_user, nama_user, alamat_kirim, kontak_user, nama_toko, alamat_toko, kontak_toko, id_barang, nama_barang, jumlah, total)
          VALUES ('$idUse', '$namUs', '$alKir', '$KonUs', '$namaToko', '$alTok', '$konTok', '$idBar', '$namBar', '$kuantitas', '$totalS')";
  #$alert = '';
  if(mysqli_query($db,$query) ){
  	echo "<script type='text/javascript'> alert('Sukses! Pembelian Anda sedang kami proses.') </script>";
  }
  else{
  	echo "<script type='text/javascript'> alert('Maaf! Pembelian gagal.') </script>";
  }


}
?>
										</div>
									</section>
								</form>
						</div>
					</div>

				<div class="clearfix"> </div>

			</div>

		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->


<!-- newsletter -->
<!-- //newsletter -->
<!-- footer -->
	<?php include 'footer.html' ?>
<!-- //footer -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
							 <!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
							<script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});
								});
						   </script>
							<script>$(document).ready(function(c) {
								$('.close2').on('click', function(c){
									$('.rem2').fadeOut('slow', function(c){
										$('.rem2').remove();
									});
									});
								});
						   </script>
						  	<script>$(document).ready(function(c) {
								$('.close3').on('click', function(c){
									$('.rem3').fadeOut('slow', function(c){
										$('.rem3').remove();
									});
									});
								});
						   </script>

<!-- //js -->
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop();
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });

	});
	</script>
<!-- //script-for sticky-nav -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.js"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
</body>
</html>
