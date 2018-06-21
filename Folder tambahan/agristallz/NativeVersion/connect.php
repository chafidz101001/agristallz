<?php

session_start();

$db = mysqli_connect('localhost', 'root', '', 'agristall');
$errors = array();
$nama = "";
$email = "";
$alamat = "";
$kota = "";
$kode_pos = "";
$no_tlp = "";

if (isset($_POST['register_user'])) {
  // receive all input values from the form
  $nama = mysqli_real_escape_string($db, $_POST['Nama']);
  $email = mysqli_real_escape_string($db, $_POST['Email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['Password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['Password_cnf']);
  $alamat = mysqli_real_escape_string($db, $_POST['Alamat']);
  $kota = mysqli_real_escape_string($db, $_POST['Kota']);
  $kode_pos = mysqli_real_escape_string($db, $_POST['Postal']);
  $no_tlp = mysqli_real_escape_string($db, $_POST['Telefon']);
 /* 
  echo $nama;
  echo $email;
  echo $password_1;
  echo $alamat;
  echo $kota;
  echo $kode_pos;
  echo $no_tlp;
*/
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($nama)) { array_push($errors, "Masukkan Nama!"); }
  if (empty($email)) { array_push($errors, "Masukkan Email!"); }
  if (empty($password_1)) { array_push($errors, "Masukkan Password!"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Password Tidak Sama!");
	}

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE nama='$nama' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['nama'] === $nama) {
      array_push($errors, "Anda sudah pernah mendaftar dengan identitas ini!");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email sudah terpakai!");
    }
  }

    if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (nama, password, email, alamat, kota, kode_pos, no_tlp) 
  			  VALUES ('$nama', '$password', '$email', '$alamat', '$kota', '$kode_pos', '$no_tlp')";
  	mysqli_query($db, $query);

    
    /*
  	$_SESSION['nama'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');*/
  }
}

if (isset($_POST['log_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['Email']);
  $password = mysqli_real_escape_string($db, $_POST['Password']);
  //echo $password;

  if (empty($email)) {
    array_push($errors, "Masukkan Email Anda!");
  }
  if (empty($password)) {
    array_push($errors, "Masukkan Password Anda!");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
      $_SESSION['email'] = $email;
      $_SESSION['success'] = "Anda sudah masuk.";
      header('location: index.php');
      echo $password;
    }else {
      array_push($errors, "Email atau Password Anda Salah!");
    }
  }
}

?>