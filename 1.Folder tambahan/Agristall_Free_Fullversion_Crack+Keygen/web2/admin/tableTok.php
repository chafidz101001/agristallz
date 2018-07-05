<?php
    include "database/connect.php";
    include "database/session.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Toko Agristall</title>
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
       <?php include "navleftAdm.php" ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Tabel Toko <small></small>
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
                                            <th>ID Toko</th>
                                            <th>Nama Toko</th>
                                            <th>Alamat Toko</th>
                                            <th>Kontak</th>
                                            <th>Gambar</th>
                                            <?php if(isset($_SESSION['email'])) : ?>
                                            <th>Pilihan</th>
                                            <?php endif ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $query = "SELECT * FROM toko";
                                        $result = mysqli_query($db, $query);
                                        while($row = mysqli_fetch_array($result)){

                                        $id = $row['id_toko'];
                                    ?>
                                        <tr >
                                            <td><?php echo $row['id_toko'] ?></td>
                                            <td><?php echo $row['nama_toko'] ?></td>
                                            <td><?php echo $row['alamat_toko'] ?></td>
                                            <td><?php echo $row['kontak'] ?></td>
                                            <td class="invert-image"><img src="getImageTok.php?id=<?php echo $id; ?>" alt="" height=50% width=50%> </td>
                                            <?php if(isset($_SESSION['email'])) : ?>
                                            <td align="center">
                                                <a href="editTok.php?id=<?php echo $id; ?>">edit</a> <br>
                                                ---- <br>
                                                <a href="editTokImg.php?id=<?php echo $id; ?>">ganti foto</a><br>
                                                ---- <br>
                                                <a href="delTok.php?id=<?php echo $id; ?>" onclick ="if (!confirm('Apakah Anda yakin akan menghapus data ini? Bila Anda menghapus Toko ini maka barang jualan mereka juga terhapus!')) return false;">hapus</a>
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
