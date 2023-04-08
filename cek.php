<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'connect/koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = mysqli_real_escape_string($conn, $_POST['username']);
//$username =$_POST['username'];
$pass = md5($_POST['pass']);
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from user where username='$username' and pass='$pass'");
            //mysql_real_escape_string($username),
            //mysql_real_escape_string($pass));
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:dashboard/index.php");
 
	}else{
 
		// alihkan ke halaman login kembali
        echo "<script>alert('Username atau password Anda salah')
        window.location = './';</script>";
	}	
}else{
    echo "<script>alert('Username atau password Anda salah')
    window.location = './';</script>";
}
 
?>