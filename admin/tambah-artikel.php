<?php
session_start();                                                                                                       
                                                                                                                       
if (! isset($_SESSION['user'])) {                                                                                      
    header('Location: login.php');                                                                                     
    exit();                                                                                                            
}
                                                                                                                       
include '../koneksi.php';

include 'function.php';
$data_kategori = ambil_kategori($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Artikel</title>
</head>
<body>
	<h2 align="center">Form Tambah Artikel</h2>
	<form action="proses-tambah-artikel.php" name="form_tambah_artikel" id="form_tambah_artikel" method="post" enctype="multipart/form-data">
		<table align="center">
			<tr>
				<td>Judul</td>
				<td>
					<input type="text" name="judul"id="judul">
				</td>
			</tr>
			<tr>
				<td>Isi</td>
				<td>
					<textarea name="isi" id="isi" cols="30" rows="10"></textarea>
				</td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>
					<input type="file" name="gambar" id="gambar" required="">
				</td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>
					<input type="date" name="tgl" id="tgl">
				</td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>
					<select name="id_kategori" id="id_kategori">
						<option value=""> - Pilih Kategori - </option>

                        <?php foreach ($data_kategori as $kategori) : ?>
                        <option value="<?php echo $kategori['id_kategori']; ?>">
                            <?php echo $kategori['jns_artikel']; ?>
                        </option>
                        <?php endforeach; ?>

					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="simpan" id="simpan">
					<input type="reset" name="batal" id="batal" value="Batal" onclick="self.history.back();">
				</td>
			</tr>
		</table>	
	</form>
</body>
</html>
