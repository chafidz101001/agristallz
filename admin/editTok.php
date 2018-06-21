<?php
    include "database/connect.php";
    include "database/session.php";
    $id = $_GET['id'];
    $query = "SELECT * FROM toko WHERE id_toko = $id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ubah Data Toko <?php echo $row['nama_toko']; ?></title>
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
            $query = "SELECT * FROM toko WHERE id_toko = $id";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Forms Toko <small></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Data Toko
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="editTok.php?id=<?php echo $id ?>" method="post">
                                        <div class="form-group">
                                            <label>Nama Toko</label>
                                            <input class="form-control" name="namtok" placeholder="<?php echo $row['nama_toko']; ?>">
                                
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3" name="alamat"  placeholder="<?php echo $row['alamat_toko']; ?>"></textarea>
                                     
                                            <label>Kontak</label>
                                            <input class="form-control" name="kontak" placeholder="<?php echo $row['kontak']; ?>">
                                            <p class="help-block">Contoh: 0858888888</p>
                                        </div>
                                        
                                        <input type="submit" class="btn btn-default" name="edit_tok" value="Submit">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                    <?php 
                                    if (isset($_POST['edit_tok'])) {
                                      // receive all input values from the form
                                      $nama = mysqli_real_escape_string($db, $_POST['namtok']);
                                      $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
                                      $kontak = mysqli_real_escape_string($db, $_POST['kontak']);

                                      // first check the database to make sure 
                                      // a user does not already exist with the same username and/or email
                                      if (empty($nama)) {
                                        $nama = $row['nama_toko'];
                                      }
                                      if (empty($alamat)) {
                                        $alamat = $row['alamat_toko'];
                                      }
                                      if (empty($kontak)) {
                                        $kontak = $row['kontak'];
                                      }
                                      /*
                                      echo $id;
                                      echo $nama;
                                      echo $alamat;
                                      echo $kontak;
                                      */

                                        $query = "UPDATE toko SET nama_toko = '$nama', alamat_toko = '$alamat', kontak = '$kontak' WHERE id_toko = $id";
                                      
                                        if(mysqli_query($db,$query) ){
                                          echo "<script type='text/javascript'> alert('Sukses! Toko Sudah di Update!'); window.location = 'tableTok.php'; </script>";
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
