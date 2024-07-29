<?php
include "header.php";
?>

<body class="form">
    <nav class="navtop">
        <h1>Penyimpanan barang</h1>
        <a href="#about">About</a>
    </nav>
    <br>
    <center>
        <div class="view">
            <?php
            include "back_end/koneksi.php";
            $sql = "SELECT kode_barang, nama_barang, harga, stok FROM tblbarang";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>";
                // Output data dari setiap row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row["kode_barang"] . "</td>
                    <td>" . $row["nama_barang"] . "</td>
                    <td>Rp." . $row["harga"] . "</td>
                    <td>" . $row["stok"] . "</td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>0 results</p>";
            }
            ?>
        </div>
    </center>
    <br>
    <br>
    <div id="about">
        <h1>Website Ini</h1>
        <p>Sistem Inventaris Barang adalah sebuah aplikasi web yang dirancang untuk membantu perusahaan atau individu dalam mengelola stok barang secara efisien dan efektif.</p>
    </div>
    <br>
    <br>
    <footer>
        <h1>Thank you</h1>
        <p>Website ini dibuat oleh @copyright 2024 Aufa Ziya Khairi</p>
    </footer>
</body>