<?php
include '../koneksi.php';
$id_artikel = $_GET['id_artikel'];

$query = "DELETE FROM artikel WHERE id_artikel = $id_artikel";
$hasil = mysqli_query($db, $query);

header('Location: list-artikel.php');
