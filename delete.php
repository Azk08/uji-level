<?php

include "back_end/koneksi.php";

// Mendapatkan kode barang dari URL
$kodebarang = $_GET['kode_barang'];

// Query untuk menghapus data barang
$sql = "DELETE FROM tblbarang WHERE kode_barang='$kodebarang'";

if ($con->query($sql) === TRUE) {
    echo "Data berhasil dihapus";
    header("Location: barang.php"); // Mengarahkan kembali ke halaman index.php setelah data dihapus
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
?>