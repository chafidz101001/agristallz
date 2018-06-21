<?php
include "database/connect.php";

mysqli_query($db,"DELETE FROM barang WHERE id_barang = '".$_GET['id']."'");
echo "<script language=javascript>parent.location.href='tableBar.php';</script>";
?>