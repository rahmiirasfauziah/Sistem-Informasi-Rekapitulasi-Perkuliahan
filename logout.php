<?php 
// mengaktifkan session 
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman ke halaman utama
header("location:index.php");
?>
