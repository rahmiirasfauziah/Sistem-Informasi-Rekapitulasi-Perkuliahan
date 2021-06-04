<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <script src="https://kit.fontawesome.com/bc23a99e51.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Kelas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="dashboard_mhs.php">SELAMAT DATANG MAHASISWA | <b>SISTEM INFORMASI REKAPITULASI PERKULIAHAN</b></a>

        <div class="icon">
            <h5>
              <a href="logout.php"><i class="fas fa-sign-out-alt text-dark" data-toggle="tooltip" title="Log Out"></i></a>
            </h5>
          </div>
        </div>
    </nav>

    <div class="row no-gutters mt-5">
      <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
        <ul class="nav flex-column ml-3 mb-5">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="dashboard_mhs.php"><i class="fas fa-chalkboard mr-2"></i>Dashboard</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="lihat_kelas_mhs.php"><i class="far fa-clipboard mr-2"></i>Daftar Kelas</a><hr class="bg-secondary">
          </li>
        </ul>
      </div>

      <div class="col-md-10 p-5 pt-2">
        <h3><i class="far fa-clipboard mr-2"></i>DAFTAR KELAS</h3><hr>
<div class="container"></div>
  <?php
  session_start();

  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['tipe']==""){
    header("location:index.php?pesan=gagal");
  }

  ?>
  <?php
    include_once("koneksi.php");
    $user = $_SESSION['mahasiswa_id'];
    $result = mysqli_query($conn,"SELECT krs_peserta_kelas.krs_id, kelas.kelas_id,kelas.kode_kelas,kelas.kode_makul,kelas.nama_makul,kelas.tahun,kelas.semester,kelas.sks FROM krs_peserta_kelas
    join kelas on kelas.kelas_id=krs_peserta_kelas.kelas_id
        where mahasiswa_id=$user");
  ?>


  <div class="row py-2">
            <div class="col-sm">
            
            <?php if(isset($message)){ ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $message; ?>
                    </div>
              <?php  } ?>

            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                <th class="text-center">ID Kelas</th> 
        <th class="text-center">Kode Kelas</th> 
        <th class="text-center">Kode Matkul</th> 
        <th class="text-center">Nama Matkul</th>
        <th class="text-center">Tahun</th> 
        <th class="text-center">Semester</th> 
        <th class="text-center">SKS</th>
        <th class="text-center">Aksi</th>
        </tr>
                 </thead>
                <tbody>
                    <?php
                         while($data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $data['kelas_id'] ?></td>
                        <td><?php echo $data['kode_kelas'] ?></td>
                        <td><?php echo $data['kode_makul'] ?></td>
                        <td><?php echo $data['nama_makul'] ?></td>
                        <td><?php echo $data['tahun'] ?></td>
                        <td><?php echo $data['semester'] ?></td>
                        <td><?php echo $data['sks'] ?></td>
            <td class="text-center">
            <a href="detail_kelas.php?krs_id=<?php echo $data['krs_id']; ?> && kelas_id=<?php echo $data['kelas_id']; ?>" class='btn btn-sm btn-primary'> Detail </a>
            </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

</body>
</html>