<?php
include "database/connect.php";

mysqli_query($db,"DELETE FROM pembelian WHERE id_pembelian = '".$_GET['id']."'");
echo "<script language=javascript>parent.location.href='tableBeli.php';</script>";
?>