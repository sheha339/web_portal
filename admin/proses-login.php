<?php
session_start();
include "../koneksi.php";

$username = $_POST['username']; // dari <input name="username" ...
$password = $_POST['password'];

// ... periksa username

$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysqli_query($db, $query);
$data_user = mysqli_fetch_assoc($hasil);

if ($data_user != null) {

    // ... jika hasil tidak null berarti user ketemu,
    // ... lanjut periksa password

    if ($password == $data_user['password']) {
        $_SESSION['user'] = $data_user;
        header('Location: list-artikel.php');
    }
    else {
        header('Location: login.php');
    }
}
else {
    header('Location: login.php');
}

