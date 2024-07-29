<?php
include "koneksi.php";

$namabarang = $_POST['namabarang'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$kodebarang = $_POST['kodebarang'];

// Query untuk menambahkan data ke tabel barang
$sql = "INSERT INTO tblbarang (kode_barang, nama_barang, harga, stok) VALUES ('$kodebarang', '$namabarang', $harga, $jumlah)";

if ($con->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();

header('location: ../barang.php')
?>