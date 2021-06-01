<?php
include 'koneksi.php';

// menangkap data yang di kirim dari form
if(isset($_POST['submit'])){
    $mahasiswa_id = $_POST['mahasiswa_id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $tipe = 2;
    $password = $_POST['password'];

    $statement = $conn->prepare('UPDATE mahasiswa SET nama = ?, nim = ?, email = ?, tipe = ?, password = ? WHERE mahasiswa_id=?');
    $statement->bind_param('sssiii', $nama, $nim, $email, $tipe, $password, $mahasiswa_id);
    $statement->execute();

    if( $conn->affected_rows > 0 ) { 
      $message = "Data berhasil diedit!";
    } else {
      $message = "Data gagal diedit!";
    }
  }

$mahasiswa_id = $_REQUEST['mahasiswa_id'];
$sql = 'SELECT * FROM mahasiswa WHERE mahasiswa_id='.$mahasiswa_id;

if(!$result = $conn->query($sql)){
  die("Gagal Query");
}

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Edit</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card col-8" style="margin: 0 auto; padding: 0; margin-top: 40px;border: 1px solid;
                                            padding: 10px;
                                            box-shadow: 5px 7px #888888;">
                    <div class="card-body">


                        <h4 class="text-center">Form Update</h4>
                        <?php if(isset($message)){?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $message ?>
                        </div>
                        <?php } ?>
                            <form action="edit_mahasiswa.php" method="POST">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">ID Mahasiswa</label>
                                    <input type="text" maxlength="5" name="mahasiswa_id" class="form-control" value="<?php echo $data['mahasiswa_id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Mahasiswa</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIM</label>
                                    <input type="text" maxlength="18" name="nim" class="form-control" id="exampleInputEmail1" value="<?php echo $data['nim']; ?>" placeholder="Masukkan NIM" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" maxlength="11" name="password" class="form-control" id="exampleInputEmail1" value="<?php echo $data['password']; ?>" placeholder="Masukkan Password" onkeypress="return Angkasaja(event)" required>
                                </div>

                                <div class="row ml-1">
                                    <button onclick="return confirm('Apakah anda ingin mengedit data?');" type="submit" name="submit" class="btn btn-info">Simpan</button>
                                    <a href="halaman_mahasiswa.php" class="btn btn-primary ml-2">Kembali</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>