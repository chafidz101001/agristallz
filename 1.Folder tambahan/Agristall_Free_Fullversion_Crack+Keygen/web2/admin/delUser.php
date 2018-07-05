<?php
include "database/connect.php";

mysqli_query($db,"DELETE FROM user WHERE id_user = '".$_GET['id']."'");
echo "<script language=javascript>parent.location.href='tableUser.php';</script>";
?>