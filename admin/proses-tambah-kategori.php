<?php
session_start();

include '../koneksi.php';

$jns_artikel = $_POST['jns_artikel'];

$query = "INSERT INTO kategori (jns_artikel) 
    VALUES ('$jns_artikel')";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('Location: list-kategori.php');
}
else {
    header('Location: tambah-kategori.php');
}
