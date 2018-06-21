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

            $id = $_GET['id'];
            $query = "SELECT * FROM user WHERE id_user = $id";
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);
        ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Forms Ganti Password <small></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
              <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ganti Password <?php echo $row['nama']; ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="editUserPass.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            
                                            <input class="form-control" type="text" name="Password" placeholder="Password Baru">
                                            <input class="form-control" type="text" name="Password_cnf" placeholder="Tulis Ulang Password Baru">
                                        </div>
                                        
                                        <input type="submit" class="btn btn-default" name="res_pass_adm" value="Submit">
                                    </form>
                                    <?php 
                                    include "database/errors.php";

                                    if (isset($_POST['res_pass_adm'])) {
                                      $password_1 = mysqli_real_escape_string($db, $_POST['Password']);
                                      $password_2 = mysqli_real_escape_string($db, $_POST['Password_cnf']);

                                      if ($password_1 != $password_2) {
                                      array_push($errors, "Password Tidak Sama!");
                                      }

                                      $passwordhash = md5($password_1);

                                      if (count($errors) == 0) {
                                        $query = "UPDATE user SET password = '$passwordhash' WHERE id_user = $id";
                                        if(mysqli_query($db,$query)){
                                          echo "<script type='text/javascript'> alert('Sukses! Password Sudah di Update!'); window.location = 'tableUser.php'; </script>";
                                        } else {
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
