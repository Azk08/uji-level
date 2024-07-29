<?php
include "header.php";
include "navbar.php";
?>

<body class="barang">
    <h1>Mengatur Barang</h1>
    <br>
    <a class="nambah" href="create.php">Create</a>
    <a class="nambah" onclick="printTable()" style="float: right; margin-right: 100px;">Print Laporan</a>
    <br>
    <br>
    <center>
        <div id="printableTable">
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
                        <th class='no-print'>Aksi</th>
                    </tr>";
                // Output data dari setiap row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["kode_barang"] . "</td>
                        <td>" . $row["nama_barang"] . "</td>
                        <td>Rp." . $row["harga"] . "</td>
                        <td>" . $row["stok"] . "</td>
                        <td class='no-print'>
                        <a href='edit.php?kode_barang=" . $row["kode_barang"] . "'>Edit</a>
                        <a href='delete.php?kode_barang=" . $row["kode_barang"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                    </td>
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
    <footer>
        <h1>Thank you</h1>
        <p>Website ini dibuat oleh @copyright 2024 Aufa Ziya Khairi</p>
    </footer>
    <script>
        function printTable() {
            // Hapus kolom aksi sebelum mencetak
            var elements = document.getElementsByClassName('no-print');
            for (var i = 0; i < elements.length; i++) {
                elements[i].style.display = 'none';
            }

            // Cetak tabel
            var printContents = document.getElementById('printableTable').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;

            // Kembalikan kolom aksi setelah mencetak
            location.reload();
        }
    </script>

</body>