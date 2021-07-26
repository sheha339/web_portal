<?php

include '../koneksi.php';

$judul = $_POST['judul'];
$isi= $_POST['isi'];
$gambar = $_FILES['gambar']['name'];
$tgl = $_POST['tgl'];
$id_kategori = $_POST['id_kategori'];
$id_artikel = $_POST['id_artikel'];

if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE artikel SET judul = '$judul', isi = '$isi', gambar = '$nama_gambar_baru', tgl = '$tgl', id_kategori = '$id_kategori'";
                    $query .= "WHERE id_artikel = '$id_artikel'";
                    $result = mysqli_query($db, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($db).
                             " - ".mysqli_error($db));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE artikel SET judul = '$judul', isi = '$isi', tgl = '$tgl', id_kategori = '$id_kategori'";
      $query .= "WHERE id_artikel = '$id_artikel'";
      $result = mysqli_query($db, $query);
      // periska query apakah ada error
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($db).
                             " - ".mysqli_error($db));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }
