<?php
				if(isset($_POST['simpan'])){
					mysqli_query($main,"INSERT INTO hunian (name, telp, alamat, email, password) VALUES ('".$_POST['name']."','".$_POST['telp']."','".$_POST['address']."','".$_POST['email']."','".$_POST['password']."')");
				}
?>