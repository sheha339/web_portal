<?php
session_start();

// ... jika belum login, alihkan ke halaman login
if (! isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}


include '../koneksi.php';

$query = "SELECT 
            artikel.*,
            kategori.jns_artikel, 
            user.nama 
        FROM 
            artikel, 
            kategori, 
            user 
        WHERE 
            user.id_user =  artikel.id_user
            AND 
            kategori.id_kategori = artikel.id_kategori
        ORDER BY id_artikel DESC";

$hasil = mysqli_query($db, $query);

// ... menampung semua data artikel
$data_artikel = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_artikel
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_artikel[] = $row;
}


// ... lanjut di tampilan
