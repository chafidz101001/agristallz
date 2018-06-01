						<?php include('connect.php') ?>
						
<!DOCTYPE html>
<html>

<head>
	<title>Ganti Data Anda</title>
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
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
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
</head>
	
<body>
<!-- header -->
<?php include "headerNat.php" ?>
<!-- //header -->
<!-- products-breadcrumb -->
<!-- //products-breadcrumb -->
<!-- banner -->

<?php 
	$sql = "SELECT * FROM user WHERE email = '" . $_SESSION['email'] . "'";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);
	//echo $result;
?>
<?php include "errors.php" ?>
<div class="privacy">
			<div class="privacy1">
				<h3>Data Anda</h3>
				<div class="banner-bottom-grid1 privacy1-grid">
				<div class = "form">
					<form action="editUser.php" method="post">
					<ul>
						<li><i aria-hidden="true"></i></li>
						<li><font size = 3 color='black'> Nama </font> <span><input type="text" name="Nama" value = "<?php echo $row['nama']; ?>" ></span></li>
						
					</ul>
					<ul>
						<li><i aria-hidden="true"></i></li>
						<li><font size = 3 color='black'> E-mail </font> <span><input type="email" name="Email" value = "<?php echo $row['email']; ?>" ></span></li>
						
					</ul>
					<ul>
						<li><i aria-hidden="true"></i></li>
						<li><font size = 3 color='black''> Alamat </font> <span> <input type="text" name="Alamat" value = "<?php echo $row['alamat']; ?>"  ></span></li>
						
					</ul>
					<ul>
						<li><i aria-hidden="true"></i></li>
						<li><font size = 3 color='black'> Nomor Telepon </font><span><input type="text" name="Telp" value = "<?php echo $row['no_tlp']; ?>" ></span></li>

					</ul>
					<ul>

						
						
						
						
					</ul>
					<div class="module form-module">
					<center><input type="submit" value="Ubah" name="edit_user"><br> <br><h1>
					<a href="profile.php"><span class="label label-danger">Batal</span></a></h1></center>
				</div>
					<!-- <br><center><h2><a href="editUser.php"><span class="label label-primary">Ubah Data Anda</span></a></h2></center> -->
				</form>
			</div>

				</div>
			</div>
<br>

			
<!-- //login -->
		
	
<!-- //newsletter -->
<!-- footer -->
	<?php include "footer.html" ?>
<!-- //footer -->
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