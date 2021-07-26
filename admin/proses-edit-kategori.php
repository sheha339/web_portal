<?php

include '../koneksi.php';

$jns_artikel = $_POST['jns_artikel'];
$id_kategori = $_POST['id_kategori'];

$query = "UPDATE kategori 
    SET jns_artikel = '$jns_artikel'
    WHERE id_kategori = $id_kategori";

$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('Location: list-kategori.php');
}
else {
    header('Location: tambah-kategori.php');
}
