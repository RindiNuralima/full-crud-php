<?php

require '../config/app.php';

// Mengambil data dari tabel barang
$queryb = select("SELECT * FROM barang");

// Mengubah hasil query menjadi format JSON
echo json_encode($query);
