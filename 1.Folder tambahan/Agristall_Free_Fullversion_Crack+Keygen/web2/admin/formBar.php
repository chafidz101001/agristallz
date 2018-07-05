<?php
    include "database/connect.php";
    include "database/session.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agristall Produk</title>
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
                                    <form role="form" action="formBar.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input class="form-control" name="nambar" required="">
                                
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" rows="3" name="deskripsi" required=""></textarea>
                                     
                                            <label>Harga Barang (Per Kilogram)</label>
                                            <input class="form-control" name="harga" required="">
                                            <p class="help-block">Contoh: 100,000</p>
                             
                                            <label>Toko Barang</label>
                                            <select class="form-control" name="toko" required="">
                                                <?php 
                                                    $query = "SELECT * FROM toko";
                                                    $result = mysqli_query($db, $query);
                                                    while($row = mysqli_fetch_array($result)){
                                                ?>
                                                <option><?php echo $row['nama_toko']; ?></option>
                                                <?php } ?>
                                            </select>
                        
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori" required="">
                                                <option>Bumbu</option>
                                                <option>Sayur dan Buah</option>
                                                <option>Makanan Pokok</option>
                                            </select>
                          
                                            <label>Kesegaran</label>
                                            <select class="form-control" name="fresh" required="">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>

                                            <label>Gambar Barang</label>
                                            <input type="file" name="image" id="image">
                                        </div>
                                        
                                        <input type="submit" class="btn btn-default" name="add_bar" value="Submit">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                    <?php 
                                    if (isset($_POST['add_bar'])) {
                                      // receive all input values from the form
                                      $nama = mysqli_real_escape_string($db, $_POST['nambar']);
                                      $deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);
                                      $harga = mysqli_real_escape_string($db, $_POST['harga']);
                                      $kategori = mysqli_real_escape_string($db, $_POST['kategori']);
                                      $kesegaran = mysqli_real_escape_string($db, $_POST['fresh']);
                                      $toko = mysqli_real_escape_string($db, $_POST['toko']);
                                      $check = getimagesize($_FILES["image"]["tmp_name"]);
                                      if($check !== false){
                                            $image = $_FILES['image']['tmp_name'];
                                            $imgContent = addslashes(file_get_contents($image));
                                        }else{
                                            echo "Please select an image file to upload.";
                                        }


                                      // first check the database to make sure 
                                      // a user does not already exist with the same username and/or email
                                      $user_check_query = "SELECT * FROM barang WHERE nama_barang = '$nama' AND nama_toko ='$toko' LIMIT 1";
                                      $result = mysqli_query($db, $user_check_query);
                                      $barang = mysqli_fetch_assoc($result);
                                      

                                      if (count($errors) == 0) {
                                        $query = "INSERT INTO barang (nama_toko, nama_barang, harga_barang, kategori, deskripsi, fresh, img) 
                                              VALUES ('$toko', '$nama', '$harga', '$kategori', '$deskripsi', '$kesegaran', '$imgContent')";
                                      
                                        if(mysqli_query($db,$query) ){
                                          echo "<script type='text/javascript'> alert('Sukses! Barang Sudah di Input!.'); window.location = 'tableBar.php'; </script>";
                                        }
                                        else{
                                          echo "<script type='text/javascript'> alert('Maaf! Hidup Anda gagal.') </script>";
                                        }
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
