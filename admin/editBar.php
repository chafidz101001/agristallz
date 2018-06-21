<?php
    include "database/connect.php";
    include "database/session.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM barang WHERE id_barang = $id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ubah Data <?php echo $row['nama_barang'] ?></title>
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
            $query = "SELECT * FROM barang WHERE id_barang = $id";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Forms Barang <small></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Input Data Barang Baru
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="editBar.php?id=<?php echo $id ?>" method="post">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input class="form-control" name="nambar" placeholder="<?php echo $row['nama_barang']; ?>">
                                
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" rows="3" name="deskripsi"  placeholder="<?php echo $row['deskripsi']; ?>"></textarea>
                                     
                                            <label>Harga Barang (Per Kilogram)</label>
                                            <input class="form-control" name="harga" placeholder="<?php echo $row['harga_barang']; ?>">
                                            <p class="help-block">Contoh: 100,000</p>
                                            
                                            <label for="disabledSelect">Toko Barang Sebelumnya</label>
                                                <input class="form-control" type="text" value="<?php echo $row['nama_toko']; ?>" disabled="">
                                            <label >Kategori Sebelumnya</label>
                                                <input class="form-control" type="text" value="<?php echo $row['kategori']; ?>" disabled="">
                                            <label >Kesegaran Sebelumnya</label>
                                                <input class="form-control" type="text" value="<?php echo $row['fresh']; ?>" disabled="">
                                            <label>Toko Barang Baru</label>
                                            <select class="form-control" name="toko" >
                                                <option>Sama</option>
                                                <?php 
                                                    $query = "SELECT * FROM toko";
                                                    $result = mysqli_query($db, $query);
                                                    while($rowTok = mysqli_fetch_array($result)){
                                                ?>
                                                <option><?php echo $rowTok['nama_toko']; ?></option>
                                                <?php } ?>

                                            </select>
                                            
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori" >
                                                <option>Sama</option>
                                                <option>Bumbu</option>
                                                <option>Sayur dan Buah</option>
                                                <option>Makanan Pokok</option>
                                                
                                            </select>
                                            
                                            <label>Kesegaran</label>
                                            <select class="form-control" name="fresh" >
                                                <option>Sama</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        
                                        <input type="submit" class="btn btn-default" name="edit_bar" value="Submit">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                    <?php 
                                    if (isset($_POST['edit_bar'])) {
                                      // receive all input values from the form
                                      $nama = mysqli_real_escape_string($db, $_POST['nambar']);
                                      $deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);
                                      $harga = mysqli_real_escape_string($db, $_POST['harga']);
                                      $kategori = mysqli_real_escape_string($db, $_POST['kategori']);
                                      $kesegaran = mysqli_real_escape_string($db, $_POST['fresh']);
                                      $toko = mysqli_real_escape_string($db, $_POST['toko']);

                                      // first check the database to make sure 
                                      // a user does not already exist with the same username and/or email
                                      if (empty($nama)) {
                                        $nama = $row['nama_barang'];
                                      }
                                      if (empty($deskripsi)) {
                                        $deskripsi = $row['deskripsi'];
                                      }
                                      if (empty($harga)) {
                                        $harga = $row['harga_barang'];
                                      }
                                      if (strcmp($toko, "Sama")==0) {
                                        $toko = $row['nama_toko'];
                                      }
                                      if (strcmp($kesegaran, "Sama")==0) {
                                        $kesegaran = $row['fresh'];
                                      }                           
                                      if (strcmp($kategori, "Sama")==0) {
                                        $kategori = $row['kategori'];
                                      }                                             
/*
                                      echo $nama;
                                      echo $deskripsi;
                                      echo $kategori;
                                      echo $kesegaran;
                                      echo $toko;
                                      echo $harga;
  */                                    
                                        $query = "UPDATE barang SET nama_barang = '$nama', nama_toko = '$toko', harga_barang = '$harga', kategori = '$kategori', deskripsi = '$deskripsi', fresh = '$kesegaran' WHERE id_barang = $id";
                                      
                                        if(mysqli_query($db,$query) ){
                                          echo "<script type='text/javascript'> alert('Sukses! Barang Sudah di Update!'); window.location = 'tableBar.php'; </script>";
                                        }
                                        else{
                                          echo "<script type='text/javascript'> alert('Maaf! Hidup Anda gagal.') </script>";
                                        }
                                      
                                    }


                                    ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
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
