<?php
include "header.php";
?>

<body class="form">
    <center>
        <div class="login">
            <br>
            <h1>tambah barang</h1>
            <form action="back_end/tambah.php" method="post">
                <input type="text" name="namabarang" id="namabarang" placeholder="nama barang" required>
                <br>

                <input type="number" name="jumlah" id="jumlah" placeholder="jumlah" required>
                <br>

                <input type="number" name="harga" id="harga" placeholder="harga" required>
                <br>

                <input type="text" name="kodebarang" id="kodebarang" placeholder="kodebarang" required>
                <br>

                <input type="submit" value="tambah">
            </form>
            <br>
            <a href="barang.php">go back</a>
        </div>
    </center>
</body>