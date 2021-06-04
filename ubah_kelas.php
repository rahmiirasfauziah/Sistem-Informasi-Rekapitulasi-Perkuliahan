<?php

include 'koneksi.php';

if(isset($_POST['submit'])){
    $kode_kelas = $_POST['mahasiswa_id'];
    $kode_makul = $_POST['nama'];
    $nama_makul = $_POST['nim'];
    $tahun = $_POST['email'];
    $semester = $_POST['password'];
    $sks = $_POST['password'];

    $statement = $conn->prepare('UPDATE kelas SET kode_kelas = ?, kode_makul = ?, nama_makul = ?, tahun = ?, semester = ?, sks = ? WHERE kelas_id= ?');
    $statement->bind_param('sssiii', $kode_kelas, $kode_makul, $nama_makul, $tahun, $semester, $sks, $kelas_id);
    $statement->execute();

    if( $conn->affected_rows > 0 ) { 
      $message = "Berhasil mengubah data";
    } else {
      $message = "Gagal mengubah data";
    }
  }

$kelas_id = $_REQUEST['kelas_id'];
$sql = 'SELECT * FROM kelas WHERE kelas_id='.$kelas_id;

if(!$result = $conn->query($sql)){
  die("Gagal Query");
}

$data = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ubah Kelas</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card col-8" style="margin: 0 auto; padding: 0; margin-top: 40px;border: 1px solid;
                                            padding: 10px;
                                            box-shadow: 5px 7px #888888;">
                    <div class="card-body">


                        <h4 class="text-center">Ubah Kelas</h4>
                        <?php if(isset($message)){?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $message ?>
                        </div>
                        <?php } ?>
                            <form action="ubah_kelas.php" method="POST">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID Kelas</label>
                                    <input type="text" name="kelas_id" class="form-control" value="<?php echo $data['kelas_id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Kelas</label>
                                    <input type="text" name="kode_kelas" class="form-control" value="<?php echo $data['kode_kelas']; ?>" placeholder="Masukkan Kode Kelas" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode Mata Kuliah</label>
                                    <input type="text" name="kode_makul" class="form-control" id="exampleInputEmail1" value="<?php echo $data['kode_makul']; ?>" placeholder="Masukkan Kode Mata Kuliah" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Mata Kuliah</label>
                                    <input type="text" name="nama_makul" class="form-control" value="<?php echo $data['nama_makul']; ?>" placeholder="Masukkan Nama Mata Kuliah" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tahun Ajaran</label>
                                    <input type="text" name="tahun" class="form-control" id="exampleInputEmail1" value="<?php echo $data['tahun']; ?>" placeholder="(mis: 2021)" onkeypress="return Angkasaja(event)" required>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Semester</label>
                                <select name="semester" class="form-control" id="exampleInputEmail1" required>
                                    <option>1</option>
                                    <option>2</option>
                            </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SKS</label>
                                    <input type="text" name="sks" class="form-control" id="exampleInputEmail1" value="<?php echo $data['sks']; ?>" placeholder="Masukkan SKS Mata Kuliah" onkeypress="return Angkasaja(event)" required>
                                </div>

                                <div class="row ml-1">
                                    <button onclick="return confirm('Simpan perubahan?');" type="submit" name="submit" class="btn btn-info">Simpan</button>
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

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
</body>

</html>