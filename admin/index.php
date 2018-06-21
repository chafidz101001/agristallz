<?php
   include "database/session.php";
?>
<?php 
if(isset($_SESSION['email'])){ 
    $sql = "SELECT * FROM admin WHERE email = '" . $_SESSION['email'] . "'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
} 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agristall's Admin</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> 
     
</head>

<body>
    <div id="wrapper">

        <?php include "navleftAdm.php" ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Selamat Datang! 
                            <?php if (isset($_SESSION['email'])) : ?>
                                <small><?php echo $row['nama'] ?></small></h1>
                            <?php endif ?>

                            <?php if (!isset($_SESSION['email'])) : ?>
                                <small>Di Agristall Admin Page</small></h1>
                            <?php endif ?>
                            
                    </div>
                </div>
				
				
                <!-- /. ROW  -->
<?php if (isset($_SESSION['email'])) : ?>
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                    <a href="tableBar.php">
                        <div class="panel panel-primary text-center no-boder bg-color-green green">
                            <div class="panel-left pull-left green">
                                <i class="fa fa-eye fa-5x"></i>
                                
                            </div>
                            <div class="panel-right">
								<h3>Barang</h3>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                    <a href="tableTok.php">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                              <div class="panel-left pull-left blue">
                                <i class="fa fa-shopping-cart fa-5x"></i>
								</div>
                                
                            <div class="panel-right">
							<h3>Toko</h3>
                            </div>
                        </div></a>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                    <a href="tableUser.php">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-left pull-left red">
                                <i class="fa fa fa-comments fa-5x"></i>
                               
                            </div>
                            <div class="panel-right">
							 <h3>Pengguna</h3>

                            </div>
                        </div></a>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                    <a href="tableBeli.php">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-left pull-left brown">
                                <i class="fa fa-users fa-5x"></i>
                                
                            </div>
                            <div class="panel-right">
							<h3>Pembelian </h3>

                            </div>
                        </div></a>
                    </div>
                </div>
<?php endif ?>
                <!-- /. ROW  -->

<?php if (!isset($_SESSION['email'])) : ?>
   
    <img src="assets/img/sad-panda.png" height=20% width=20% />
    <strong>Silahkan Log In Jika Anda Seorang Admin!<br></strong>
   
<?php endif ?>
				
				
                <!-- /. ROW  -->
			
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p>
				
        
				</footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
 

</body>

</html>