<?php
include "database/connect.php";

$id = $_GET['id'];
$query = "SELECT * FROM toko WHERE id_toko = $id";
$res = mysqli_query($db,$query);
$row = mysqli_fetch_array($res);
$nama = $row['nama_toko'];

mysqli_query($db,"DELETE FROM barang WHERE nama_toko = '$nama'");

mysqli_query($db,"DELETE FROM toko WHERE id_toko = '$id'");

echo "<script language=javascript>parent.location.href='tableTok.php';</script>";
?>