<?php

if (isset($_POST['submit'])) {
    $kode_kelas = $_POST['kode_kelas'];
    $kode_makul = $_POST['kode_makul'];
    $nama_makul = $_POST['nama_makul'];
    $tahun = $_POST['tahun'];
    $semester = $_POST['semester'];
    $sks = $_POST['sks'];

    include 'koneksi.php';

    $sql = "INSERT INTO kelas VALUES('','$kode_kelas','$kode_makul','$nama_makul','$tahun','$semester', '$sks')";
    $query = mysqli_query($conn, $sql);

    if($query) { 
      $message = "Berhasil menyimpan data";
    } else {
      $message = "Gagal menyimpan data";
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Tambah Kelas</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card col-8" style="margin: 0 auto; padding: 0; margin-top: 40px;border: 1px solid;
                                            padding: 10px;
                                            box-shadow: 5px 7px #888888;">
                    <div class="card-body">
                        <h4 class="text-center">Tambah Kelas</h4>

                        <?php if(isset($message)){?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $message ?>
                        </div>
                        <?php } ?>
                        <form method="POST" action="tambah_kelas.php">

                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">ID Kelas</label>
                                <input type="text" name="kelas_id" class="form-control" id="exampleInputEmail1" placeholder="Masukkan ID Kelas" required onkeypress="return Angkasaja(event)">
                            </div> -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Kelas</label>
                                <input type="text" name="kode_kelas" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Kode Kelas" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Mata Kuliah</label>
                                <input type="text" name="kode_makul" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Kode Mata Kuliah" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Mata Kuliah</label>
                                <input type="text" name="nama_makul" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Mata Kuliah" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tahun Ajaran</label>
                                <input type="text" name="tahun" class="form-control" id="exampleInputEmail1" placeholder="(mis: 2021)" onkeypress="return Angkasaja(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Semester</label>
                                <select name="semester" class="form-control" id="exampleInputEmail1" required>
                                    <option>1</option>
                                    <option>2</option>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SKS</label>
                                <input type="text" name="sks" class="form-control" id="exampleInputEmail1" placeholder="Masukkan SKS Mata Kuliah" onkeypress="return Angkasaja(event)" required>
                            </div>
                            
                            <div class="row ml-1">
                                <button onclick="return confirm('Tambahkan kelas?');" type="submit" name="submit" class="btn btn-info">Simpan</button>
                                <a href="lihat_kelas.php" class="btn btn-primary ml-2">Kembali</a>
                            </div>
                        </form>
                        <script type="text/javascript">
                            function Angkasaja(evt) {
                            var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                            return true;
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
</body>

</html>
