<?php
session_start();
include "koneksi.php";
if (!isset($_POST['username'], $_POST['password'])) {
    exit('Silahkan isi username dan password lebih dahulu!');
}
if ($stmt = $con->prepare('SELECT id,password FROM tbllogin WHERE username=?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        if (password_verify($_POST['password'], $password)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
        } else {
            echo 'Incorrect username and/or password!';
        }
        $stmt->close();
    } else {
    }
    header('Location: ../home.php');
}
