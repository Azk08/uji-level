<?php

include "back_end/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari form
    $kodebarang = $_POST['kodebarang'];
    $namabarang = $_POST['namabarang'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // Query untuk mengupdate data barang
    $sql = "UPDATE tblbarang SET nama_barang='$namabarang', stok=$jumlah, harga=$harga WHERE kode_barang='$kodebarang'";

    if ($con->query($sql) === TRUE) {
        echo "Data berhasil diperbarui";
        header("Location: barang.php"); // Mengarahkan kembali ke halaman index.php setelah data diperbarui
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    // Mendapatkan kode barang dari URL
    $kodebarang = $_GET['kode_barang'];

    // Query untuk mendapatkan data barang
    $sql = "SELECT * FROM tblbarang WHERE kode_barang='$kodebarang'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan";
    }
}
?>

<?php
include "header.php"
?>

<body class="form">
    <center>
        <div class="login">
            <h1>Edit Barang</h1>
            <form action="edit.php" method="post">
                <input type="hidden" name="kodebarang" value="<?php echo $row['kode_barang']; ?>">
                <input type="text" name="namabarang" value="<?php echo $row['nama_barang']; ?>" placeholder="Nama Barang" required>
                <br><br>
                <input type="number" name="jumlah" value="<?php echo $row['stok']; ?>" placeholder="Jumlah" required>
                <br><br>
                <input type="number" name="harga" value="<?php echo $row['harga']; ?>" placeholder="Harga" required>
                <br><br>
                <input type="submit" value="Update">
            </form>
            <br>
            <a href="barang.php">go back</a>
            <br>
        </div>
    </center>
</body>

</html>