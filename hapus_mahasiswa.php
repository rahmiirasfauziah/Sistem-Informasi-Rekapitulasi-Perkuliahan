<?php  
include 'koneksi.php';
$mahasiswa_id = $_GET['mahasiswa_id'];
		
	$hapus = mysqli_query($conn, "select * from mahasiswa WHERE mahasiswa_id = '$mahasiswa_id'");
	while($result = mysqli_fetch_array($hapus)){
		$mahasiswa_id = $result['mahasiswa_id'];
	}

	$delete = mysqli_query($conn, "DELETE FROM mahasiswa WHERE mahasiswa_id = '$mahasiswa_id'");
	header('location:lihat_mahasiswa.php');
?>
