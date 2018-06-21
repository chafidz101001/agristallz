<?php



$db = mysqli_connect('localhost', 'root', '', 'agristall');
$errors = array();
$nama = "";
$email = "";
$alamat = "";
$no_tlp = "";

include "session.php";

if (isset($_POST['register_user'])) {
  // receive all input values from the form
  $nama = mysqli_real_escape_string($db, $_POST['Nama']);
  $email = mysqli_real_escape_string($db, $_POST['Email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['Password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['Password_cnf']);
  $alamat = mysqli_real_escape_string($db, $_POST['Alamat']);
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
  if (ctype_digit($no_tlp)) {
        echo "";
  } else {
        array_push($errors, "Masukkan Nomor Telepon Dengan Benar!");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE nama='$nama' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errors, "Email sudah terpakai!");
    }
  }

    if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (nama, password, email, alamat, no_tlp) 
  			  VALUES ('$nama', '$password', '$email', '$alamat', '$no_tlp')";
  	 if(mysqli_query($db,$query) ){
    echo "<script type='text/javascript'> alert('Sukses! Anda telah terdaftar! Silahkan Log In.') </script>";
  }
  else{
    echo "<script type='text/javascript'> alert('Maaf! Hidup Anda gagal.') </script>";
  }

    
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
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['success'] = "Anda sudah masuk.";
      #echo $password;
      header('location: index.php');
      
    }else {
      array_push($errors, "Email atau Password Anda Salah!");
    }
  }
}

if (isset($_POST['log_adm'])) {
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
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['success'] = "Anda sudah masuk.";
      #echo $password;
      header('location: index.php');
      
    }else {
      array_push($errors, "Email atau Password Anda Salah!");
    }
  }
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


if (isset($_POST['forgot_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['Email']);

  $query = "SELECT * FROM user WHERE email= '$email'";
    $res = mysqli_query($db, $query);


  $r = mysqli_fetch_assoc($res);
  $password = generateRandomString();
  $passwordHashed = md5($password);
  $query = "UPDATE user SET password = '$passwordHashed' WHERE email = '$email'";
  mysqli_query($db,$query);

  $to = $r['email'];
  $subject = "Your Recovered Password";
   
  $message = "Please use this password to login: " . $password;
  $headers = "From : Agristall's Admins";
  mail($to, $subject, $message, $headers);

}

if (isset($_POST['res_pass'])) {
  $password = md5(mysqli_real_escape_string($db, $_POST['Password']));
  $password_1 = mysqli_real_escape_string($db, $_POST['Password_new']);
  $password_2 = mysqli_real_escape_string($db, $_POST['Password_new_cnf']);

  $pass_check_query = "SELECT * FROM user WHERE email= '" . $_SESSION['email'] . "'";
  $result = mysqli_query($db, $pass_check_query);
  $passcheck = mysqli_fetch_assoc($result);

  if ($passcheck['password'] != $password) {
  array_push($errors, "Password Anda Salah");

  }
  if ($password_1 != $password_2) {
  array_push($errors, "Password Tidak Sama!");
  }

  $passwordhash = md5($password_1);

  if (count($errors) == 0) {
    $query = "UPDATE user SET password = '$passwordhash' WHERE email = '" . $_SESSION['email'] . "'";
    if(mysqli_query($db,$query)){
      echo "<script type='text/javascript'> alert('Sukses! Password Sudah di Update!'); </script>";
    } else {
      echo "<script type='text/javascript'> alert('Maaf! Hidup Anda gagal.') </script>";
    }
  }
}


?>