<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$email = $_POST['email'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from mahasiswa where email='$email' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['tipe']=="1"){

		// buat session login dan username
		$_SESSION['email'] = $email;
		$_SESSION['tipe'] = 1;
		// alihkan ke halaman dashboard admin
		header("location:dashboard.php");

	// cek jika user login sebagai mahasiswa
	}else if($data['tipe']=="2"){
		// buat session login dan username
		$_SESSION['email'] = $email;
		$_SESSION['tipe'] = 2;
		// alihkan ke halaman dashboard mahasiswa
		header("location:dashboard_mhs.php"); 

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}

	
}else{
	header("location:index.php?pesan=gagal");
}


 
?>
