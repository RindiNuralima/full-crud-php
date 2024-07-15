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
$title = 'ubah Mahasiswa';
 include 'layout/header.php';
 
 if (isset($_POST['ubah'])){
    if (update_mahasiswa($_POST)> 0){
        echo "<script>
               alert('Data mahasiswa Berhasil Diubahkan');
               document.location.href = 'mahasiswa.php';
               </script>";
    }else {
        echo "<script>
               alert('Data mahasiswa Gagal Diubahkan');
               document.location.href = 'mahasiswa.php';
               </script>";
    }
}

$id_mahasiswa = (int)$_GET['id_mahasiswa'];

$data_mahasiswa = mysqli_query($db, "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'");
$mahasiswa = mysqli_fetch_array($data_mahasiswa);
?>
<div class="container mt-5">
    <h1>ubah mahasiswa</h1>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama mahasiswa..." required value="<?= $mahasiswa['nama']; ?>">
        </div>

        <div class="row">
        <div class="mb-3 col-6" >
            <label for="prodi" class="form-label">Program Studi </label>
            <select name="prodi" id="prodi" class="form-control" required>
                <?php $prodi = $mahasiswa['prodi']; ?>]
                <option value="Teknik Informatika" <?= $prodi == 'Teknik Informatika' ? 'selected' : null ?>>-- Teknik Informatika--</option>
                <option value="Teknik Mesin" <?= $prodi == 'Teknik Mesin' ? 'selected' : null ?>>--Teknik Mesin--</option>
                <option value="Teknik Listrik" <?= $prodi == 'Teknik Listrik' ? 'selected' : null ?>>--Teknik Listrik--</option>
            </select>
        </div>
        <div class="mb-3 col-6">
            <label for="jk" class="form-label">Jenis Kelamin </label>
            <select name="jk" id="jk" class="form-control" required>
                <?php $jk = $mahasiswa['jk']; ?>
                <option value="laki-laki" <?= $prodi == 'Laki-Laki ' ? 'selected' : null ?>>-- laki-laki--</option>
                <option value="perempuan" <?= $prodi == 'Perempuan' ? 'selected' : null ?>>--perempuan--</option>
            </select>
        </div>
        </div>

        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="telepon" name="telepon" placeholder="telepon..." required value="<?= $mahasiswa['telepon']; ?>">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="alamat" class="form-control" id="alamat" name="alamat" placeholder="alamat ..." required value="<?= $mahasiswa['alamat']; ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email mahasiswa..." required value="<?= $mahasiswa['email']; ?>">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto </label>
            <input type="file" class="form-control" id="foto" name="foto" placeholder="foto ..." >
            <p>
                <small>Gambar Sebelumnya</small>
            </p>
            <img src="assets/img/<?= $mahasiswa['foto']; ?>" alt="foto" width="100px">
        </div>
        <button type="submit" name="ubah" class="btn btn-primary" style="float: right;"><i class="fas fa-plus">ubah</button>      
    </form>
</div>
<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.file[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php include 'layout/footer.php';?>