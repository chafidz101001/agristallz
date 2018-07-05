<?php
    include "database/connect.php";
    include "database/session.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Pengguna Agristall</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <?php if (isset($_SESSION['email'])) : ?>
       <?php include "navleftAdm.php" ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Tabel Pengguna <small></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID Pembeli</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Kontak</th>
                                            <?php if(isset($_SESSION['email'])) : ?>
                                            <th>Pilihan</th>
                                            <?php endif ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $query = "SELECT * FROM user";
                                        $result = mysqli_query($db, $query);
                                        while($row = mysqli_fetch_array($result)){

                                        $id = $row['id_user'];
                                    ?>
                                        <tr >
                                            <td><?php echo $row['id_user'] ?></td>
                                            <td><?php echo $row['nama'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['alamat'] ?></td>
                                            <td><?php echo $row['no_tlp'] ?></td>
                                            <?php if(isset($_SESSION['email'])) : ?>
                                            <td align="center">
                                                <a href="editUser.php?id=<?php echo $id; ?>">edit</a> <br>
                                                ---- <br>
                                                <a href="editUserPass.php?id=<?php echo $id; ?>">ganti password</a><br>
                                                ---- <br>
                                                <a href="delUser.php?id=<?php echo $id; ?>" onclick ="if (!confirm('Apakah Anda yakin akan menghapus data ini?')) return false;">hapus</a>
                                            </td>
                                            <?php endif ?>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
        </div>
    <?php endif ?>
    <?php if (!isset($_SESSION['email'])) : ?>
   
    <img src="assets/img/sad-panda.png" height=20% width=20% />
    <strong>Silahkan Log In Jika Anda Seorang Admin!<br></strong>
   
<?php endif ?>
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
