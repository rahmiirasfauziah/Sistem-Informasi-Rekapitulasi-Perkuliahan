<?php

include "koneksi.php";

$kelas_id = $_GET['kelas_id'];
$pertemuan_ke;

?>

<!DOCTYPE html>
<html>

<head>

    <title>Detail Kelas</title>
   
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">

</head>

<body>
    <div class="container" style="margin-top:20px">
        <center>
            <h2>Detail Kelas</h2>
        </center>

        <table class="table table-bordered ">
            <br>
            <h5>Data Kelas</h5>
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Kelas</th>
                    <th>Kode Matkul</th>
                    <th>Nama Matkul</th>
                    <th>Tahun</th>
                    <th>Semester</th>
                    <th>SKS</th>
                </tr>
            </thead>

            <?php
            $sql = "SELECT * FROM kelas WHERE kelas_id = '$kelas_id'";

            $result = mysqli_query($conn, $sql);
            $no = 1;

            while ($data = mysqli_fetch_array($result)) {
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data["kode_kelas"]; ?></td>
                        <td><?php echo $data["kode_makul"]; ?></td>
                        <td><?php echo $data["nama_makul"]; ?></td>
                        <td><?php echo $data["tahun"]; ?></td>
                        <td><?php echo $data["semester"]; ?></td>
                        <td><?php echo $data["sks"]; ?></td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

        <table class="table table-bordered ">
            <br>
            <h5>Data Pertemuan Kelas</h5>
            <thread>
                <tr>
                    <th>No</th>
                    <th>ID Kelas</th>
                    <th>Pertemuan Ke-</th>
                    <th>Tanggal</th>
                    <th>Materi</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thread>

            <?php
            $sql = "SELECT * FROM pertemuan WHERE kelas_id = '$kelas_id'";

            $hasil = mysqli_query($conn, $sql);
            $no = 1;

            while ($data = mysqli_fetch_assoc($hasil)) {
            
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data["kelas_id"]; ?></td>
                        <td><?php echo $data["pertemuan_ke"]; ?></td>
                        <td><?php echo $data["tanggal"]; ?></td>
                        <td><?php echo $data["materi"]; ?></td>
                        <td>
                            <a href="lihat_pertemuan.php" class="btn btn-primary ml-2">Detail</a>
                        </td>
                    </tr>
                </tbody>

            <?php
                $pertemuan_ke = $data["pertemuan_ke"];
                $pertemuan_ke++;
            }

            ?>
        </table>
        <a href="tambah_pertemuan.php" class="btn btn-primary ml-2">Tambah Pertemuan</a><br>

        <table class="table table-bordered table-hover">
            <br>
            <h5>Peserta Kelas</h5>
            <form action="detail_kelas>" method="POST">
                <div class="float-left">
                    <select name="mahasiswa" id="mahasiswa" class="form-select" aria-label="Default select example">
                        <option disabled selected value=""> Pilih Mahasiswa </option>

                        <!-- <?php

                        $sql1 = "SELECT * FROM krs WHERE kelas_id = '$kelas_id'";
                        $sql = "SELECT * FROM mahasiswa WHERE kelas_id NOT IN (SELECT mahasiswa_id FROM krs WHERE kelas_id = '$kelas_id')";
                        $hasil_sql = mysqli_query($mysqli, $sql);

                        while ($data = mysqli_fetch_array($hasil_sql)) {
                        ?>

                            <option value="<?=$data["mahasiswa_id"]; ?>"><?= $data["nama"] ?></option>

                        <?php
                        }
                        ?> -->
                    </select>
                </div>
                <div class="float-left">
                    <input type="submit" name="submit" class="btn btn-primary" value="Tambah">
                </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {

                $mahasiswa_id = $_POST['mahasiswa_id'];
                $result = mysqli_query($conn, "INSERT INTO krs_peserta_kelas (krs_id,kelas_id,mahasiswa_id) VALUES ('','$kelas_id','$mahasiswa_id')") or die(mysqli_error($conn));

            ?>
                <script>
                    alert("Berhasil menambahkan data."); 
                    document.location.href = "detail_kelas.php ?>";
                </script> 

            <?php
            }
            ?>

            <thread>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Email</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thread>

            <?php
            $sql1 = "SELECT * FROM krs_peserta_kelas WHERE kelas_id = '$kelas_id'";
            $hasil_sql1 = mysqli_query($conn, $sql1);
            $no = 1;
            while ($data = mysqli_fetch_array($hasil_sql1)) {
                $mahasiswa_id = $data["mahasiswa_id"];
                $sql = "SELECT * FROM mahasiswa WHERE id = '$mahasiswa_id'";
                $hasil = mysqli_query($conn, $sql);

                if ($data2 = mysqli_fetch_array($hasil)) {
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data2["nim"]; ?></td>
                            <td><?php echo $data2["nama"];   ?></td>
                            <td><?php echo $data2["email"];   ?></td>
                            <td>
                                <a href="hapus_peserta.php?" class="btn btn-primary ml-2">Delete</a>
                            </td>
                        </tr>

                    </tbody>
                <?php
                }
                ?>
            <?php
            }
            ?>
        </table>
        <br><br> 
        <h3><a href="lihat_kelas.php" class="btn btn-primary ml-2">Kembali</a></h3>
    </div>
</body>

</html>