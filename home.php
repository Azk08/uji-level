<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
}
include "back_end/koneksi.php";
// mengambil data email dari tabel accounts
$stmt = $con->prepare('SELECT email FROM tbllogin WHERE id = ?');
// mengambil data email berdasarkan id
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();
include 'header.php';
?>

<body class="form">
    <?php include 'navbar.php'; ?>
    <center>
    <div class="loggedin">
    <div class="content">
        <h2>Home Page</h2>
        <h2>Welcome back, <?= $_SESSION['name'] ?>!</h2>
    </div>
    <div class="content">
        <div>
            <h2>Hello <?= $_SESSION['name'] ?></h2>
            <p>Your account details are below:</p>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><?= $_SESSION['name'] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $email ?></td>
                </tr>
            </table>
        </div>
    </div>
    </div>
    </center>
    <br>
    <br>
    <footer>
        <h1>Thank you</h1>
        <p>Website ini dibuat oleh @copyright 2024 Aufa Ziya Khairi</p>
    </footer>
</body>

</html>
</body>

</html>