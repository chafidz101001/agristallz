<?php
    include "database/connect.php";
    include "database/session.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM pembelian WHERE id_pembelian = $id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Pembelian <?php echo $id ?></title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <?php if (isset($_SESSION['email'])) : ?>
        <?php 
            include "navleftAdm.php"; 
            include "database/errors.php";
            $id = $_GET['id'];
            $query = "SELECT * FROM pembelian WHERE id_pembelian = $id";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Detail Pembelian <small></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Detail Barang
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="formBar.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input class="form-control" name="nambar" value="<?php echo $row['nama_barang'] ?>" disabled="">
                                
                                            <label>Jumlah yang Dibeli</label>
                                            <input class="form-control" name="jumlah" value="<?php echo $row['jumlah'] ?>" disabled="">
                                     
                                            <label>Total Harga</label>
                                            <input class="form-control" value="<?php echo $row['total'] ?>" name="harga" disabled="">
                                    </form>
                                </div>
                                
                                <!-- /.col-lg-6 (nested) -->
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Detail Toko
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="formBar.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Toko</label>
                                            <input class="form-control" name="nambar" value="<?php echo $row['nama_toko'] ?>" disabled="">
                                
                                            <label>Alamat Toko</label>
                                            <input class="form-control" name="jumlah" value="<?php echo $row['alamat_toko'] ?>" disabled="">
                                     
                                            <label>Kontak Toko</label>
                                            <input class="form-control" value="<?php echo $row['kontak_toko'] ?>" name="harga" disabled="">
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>

                        <!-- /.panel-body -->
                    </div>
                    <div class="panel-heading">
                                  Detail Pembeli
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" action="formBar.php" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Nama Pembeli</label>
                                                    <input class="form-control" name="nambar" value="<?php echo $row['nama_user'] ?>" disabled="">
                                        
                                                    <label>Alamat Pengiriman</label>
                                                    <input class="form-control" name="jumlah" value="<?php echo $row['alamat_kirim'] ?>" disabled="">
                                             
                                                    <label>Kontak Pembeli</label>
                                                    <input class="form-control" value="<?php echo $row['kontak_user'] ?>" name="harga" disabled="">
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        <?php endif; ?>
<?php if (!isset($_SESSION['email'])) : ?>
   
    <img src="assets/img/sad-panda.png" height=20% width=20% />
    <strong>Silahkan Log In Jika Anda Seorang Admin!<br></strong>
   
<?php endif ?>
			<footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
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
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
