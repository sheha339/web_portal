<?php
session_start();

include '../koneksi.php';

$judul = $_POST['judul'];
$isi= $_POST['isi'];
$gambar = $_FILES['gambar']['name'];
$tgl = $_POST['tgl'];
$id_user = $_SESSION['user']['id_user'];
$id_kategori = $_POST['id_kategori'];

if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
          if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query = "INSERT INTO artikel (judul, isi, gambar, tgl, id_user, id_kategori) VALUES ('$judul', '$isi', '$nama_gambar_baru', '$tgl', $id_user, $id_kategori)";
                    $result = mysqli_query($db, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($db).
                             " - ".mysqli_error($db));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                    }
  
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah-artikel.php';</script>";
              }
  } else {
     $query = "INSERT INTO artikel (judul, isi, gambar, tgl, id_user, id_kategori) VALUES ('$judul', '$isi', null, '$tgl', $id_user, $id_kategori)";
                    $result = mysqli_query($db, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($db).
                             " - ".mysqli_error($db));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                    }
  }

?>
