<?php

  $id = $_GET['id'];
  // do some validation here to ensure id is safe

  $link = mysqli_connect("localhost", "root", "", "agristall");
  
  $sql = "SELECT img FROM barang WHERE id_barang=$id";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_assoc($result);
  mysqli_close($link);

  header("Content-type: image/jpeg");
  echo $row['img'];
?>