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

//membatasi halaman sesuai user login
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3) {
    echo "<script>
        alert ('Perhatikan anda tidak memiliki hak akses');
        document.location.href = 'akun.php';
        </script>";
    exit;
}
$title = 'Daftar Mahasiswa';
include 'layout/header.php';

//menampilkan data mahasiswa
$data_mahasiswa = select("SELECT * FROM mahasiswa  ORDER BY id_mahasiswa DESC");


?>
<div class="content-wrapper">
    <div class="container mt-5">
        <h1>Data Mahasiswa</h1>
        <hr>
        <a href="tambah-mahasiswa.php" class="btn btn-primary mb-1"><i class="fas fa-plus-circle"></i>Tambah</a>

        <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1"> <i class=" fas fa-file-excel"></i>>Download
            Excel</a>

        <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1"> <i class=" fas fa-file-pdf"></i>>Download
            PDF</a>
        <table class="table table-bordered table-striped mt-3" id="table">
            <thead>
                <tr>
                    <th>no</th>
                    <th>nama</th>
                    <th>prodi</th>
                    <th>jenis kelamin</th>
                    <th>telepon</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data_mahasiswa as $mahasiswa) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $mahasiswa['nama']; ?></td>
                    <td><?= $mahasiswa['prodi']; ?></td>
                    <td><?= $mahasiswa['jk']; ?></td>
                    <td><?= $mahasiswa['telepon']; ?></td>
                    <td class="text-center">
                        <a href="detail-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>"
                            class="btn btn-secondary btn-sm">Detail</a>

                        <a href="ubah-mahasiswa.php?id_mahasiswa=<?= $mahasiswa['id_mahasiswa']; ?>"
                            class="btn btn-success btn-sm">Ubah</a>

                        <a href="hapus-mahasiswa.php?id_mahasiswa=<?=$mahasiswa['id_mahasiswa'];?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin data mahasiswa akan dihapus.');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'layout/footer.php';?>