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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PWEB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
</head>

<body>
    <div class="container">
        <div class="row">


            <div class="col-20 mt-3 mb-5" style="margin: 0 auto; padding: 0;">
                <div class="card" style="border: 1px solid;
                                            padding: 10px;
                                            box-shadow: 5px 7px #888888;">
                    <div class="card-header" style="background-color: #659DBD; text-align: center; font-size: 25px;"><p class="text-white">SISTEM INFORMASI REKAPITULASI PERKULIAHAN<span class="badge badge-info">
                    </div>

                    <a href="tambah_mahasiswa.php" class="btn btn-success mt-2 mb-2" style="width: 170px;">Tambah Mahasiswa</a>

                    <?php if(isset($message)){?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $message ?>
                        </div>
                    <?php } ?>
                    <table id="table_id" class="table table-bordered table-hover" style="text-align: center;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" >ID Mahasiswa</th>
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
                                    <td>
                                        <?php echo $d['mahasiswa_id']; ?>
                                    </td>
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
                                        <form action="halaman_mahasiswa.php" method="POST">
                                            <input type="hidden" name="aksi" value="hapus">
                                            <input type="hidden" name="mahasiswa_id" value="<?php echo $d['mahasiswa_id']?>">
                                        <a class="btn btn-info" href="edit_mahasiswa.php?mahasiswa_id=<?php echo $d['mahasiswa_id']; ?>">Edit</a>
                                        <button onclick="return confirm('Apakah anda ingin menghapus data?');" type="submit" class="btn btn-danger" name="Hapus">Hapus</button>
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
