<?php
session_start();
// membatasi halaman sebelum login
if (!isset($_SESSION["login"])) {
    echo "<script>
        alert ('login dulu');
        document.location.href = 'login.php';
        </script>";
    exit;
}
$title = 'Detail Mahasiswa';
include 'layout/header.php';

//mengambil id mahasiswa dari url
$id_mahasiswa = (int)$_GET['id_mahasiswa'];

//menampilkan data mahasiswa
$mahasiswa = mysqli_query($db, "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'");
$data_mahasiswa = mysqli_fetch_array($mahasiswa);

?>

<div class="container mt-5">
    <h1>Data <?= $data_mahasiswa['nama']; ?></h1>
    <hr>

    <table class="table table-bordered table-striped mt-3">
        <tr>
            <td>Nama</td>
            <td>: <?= $data_mahasiswa['nama']; ?></td>
        </tr>
        <tr>
            <td>Progam Studi</td>
            <td>: <?= $data_mahasiswa['prodi']; ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>: <?= $data_mahasiswa['jk']; ?></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td>: <?= $data_mahasiswa['telepon']; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: <?= $data_mahasiswa['alamat']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?= $data_mahasiswa['email']; ?></td>
        </tr>
        <tr>
            <td width="25%">Foto</td>
            <td>
                <a href="assets/img/<?= $data_mahasiswa['foto']?>">
                    <img src="assets/img/<?= $data_mahasiswa['foto']?>" alt="foto" width="25%">
            </td>
            </a>
        </tr>
    </table>
    <a href="mahasiswa.php" class="btn btn-secondary btn-sm" style="float: right ;">Kembali</a>
</div>

<?php include 'layout/footer.php';?>