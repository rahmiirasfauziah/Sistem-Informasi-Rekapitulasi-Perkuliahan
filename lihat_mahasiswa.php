<?php
include('koneksi.php');

if(isset($_POST['Hapus'])){
    if(isset($_POST['aksi']) && $_POST['aksi'] == 'hapus') {
        $mahasiswa_id = $_POST['mahasiswa_id'];
        $sql = "DELETE FROM mahasiswa WHERE mahasiswa_id='$mahasiswa_id'";
        $conn->query($sql);
        if($conn->affected_rows > 0) {
            $message = "Data berhasil dihapus!";
        }
      }
}

if(!$result = $conn->query('SELECT * FROM mahasiswa')) {
    die("Gagal meminta data");
}
$mahasiswa_id = 1;
?>

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
    <title>List Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">SELAMAT DATANG ADMIN | <b>SISTEM INFORMASI REKAPITULASI PERKULIAHAN</b></a>
          <!-- <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> -->

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
            <a class="nav-link active text-white" aria-current="page" href="dashboard.php"><i class="fas fa-chalkboard mr-2"></i>Dashboard</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="lihat_mahasiswa.php"><i class="fas fa-user-graduate mr-2"></i>Daftar Mahasiswa</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="lihat_kelas.php"><i class="far fa-clipboard mr-2"></i>Daftar Kelas</a><hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="lihat_makul.php"><i class="fas fa-book-open mr-2"></i>Daftar Mata Kuliah</a><hr class="bg-secondary">
          </li>
        </ul>
      </div>

      <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-user-graduate mr-2"></i>DAFTAR MAHASISWA</h3><hr>

            <div class="container">
                <div class="row">


                    <div class="col-20 mt-3 mb-5" style="margin: 0 auto; padding: 0;">
                        <div class="card" style="border: 1px solid;
                                                    padding: 10px;
                                                    box-shadow: 5px 7px #888888;">
                            <div class="card-header" style="background-color: #659DBD; text-align: center; font-size: 25px;"><p class="text-white">LIST DATA MAHASISWA</div>

                            <a href="tambah_mahasiswa.php" class="btn btn-success mt-2 mb-2" style="width: 120px;"><i class="fas fa-user-plus mr-2"></i>Tambah</a>

                            <?php if(isset($message)){?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $message ?>
                                </div>
                            <?php } ?>
                            <table id="table_id" class="table table-bordered table-hover" style="text-align: center;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" >No</th>
                                        <th scope="col" >Nama Mahasiswa</th>
                                        <th scope="col" >NIM</th>
                                        <th scope="col" >Email</th>
                                        <th scope="col" >Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $select = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE tipe=2");
                                    
                                    while ($d = mysqli_fetch_array($select)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $no++ ?></th>
                                            <td>
                                                <?php echo $d['nama']; ?>
                                            </td>
                                            <td>
                                                <?php echo $d['nim']; ?>
                                            </td>                                    
                                            <td>
                                                <?php echo $d['email']; ?>
                                            </td>
                                            <td>
                                                <form action="lihat_mahasiswa.php" method="POST">
                                                    <input type="hidden" name="aksi" value="hapus">
                                                    <input type="hidden" name="mahasiswa_id" value="<?php echo $d['mahasiswa_id']?>">
                                                <a class="btn btn-info" href="edit_mahasiswa.php?mahasiswa_id=<?php echo $d['mahasiswa_id']; ?>"><i class="fas fa-user-edit" data-toggle="tooltip" title="Edit"></i></a>
                                                <button onclick="return confirm('Apakah anda ingin menghapus data?');" type="submit" class="btn btn-danger" name="Hapus"><i class="far fa-trash-alt" data-toggle="tooltip" title="Hapus"></i></button>
                                            </form>
                                            </td>
                                        </tr>

                                        <?php } ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</body>

</html>