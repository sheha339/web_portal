<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

include '../koneksi.php';

include 'function.php';
$data_kategori = ambil_kategori($db);


// ambil artikel yang mau di edit
$id_artikel = $_GET['id_artikel'];
$query = "SELECT * FROM artikel WHERE id_artikel = $id_artikel";
$hasil = mysqli_query($db, $query);
$data_artikel = mysqli_fetch_assoc($hasil);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Artikel</title>
</head>
<body>
	<h2 align="center">Form Edit Artikel</h2>
	<form action="proses-edit-artikel.php" name="form_edit_artikel" id="form_edit_artikel" method="post" enctype="multipart/form-data">
        <input value="<?php echo $id_artikel; ?>" type="hidden" name="id_artikel" id="id_artikel">
		<table align="center">
			<tr>
				<td>Judul</td>
				<td>
                    <input type="text" name="judul"id="judul" value="<?php echo $data_artikel['judul']; ?>">
				</td>
			</tr>
			<tr>
				<td>Isi</td>
				<td>
                    <textarea name="isi" id="isi" cols="30" rows="10"><?php echo $data_artikel['isi']; ?></textarea>
				</td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>
					<img src="gambar/<?php echo $data_artikel['gambar']; ?>" style="width: 120px;float: left;margin-bottom: 5px;"><br>
					<input type="file" name="gambar" id="gambar" required=""><br>
					<i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
				</td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>
                    <input type="date" name="tgl" id="tgl" value="<?php echo $data_artikel['tgl']; ?>">
				</td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>
					<select name="id_kategori" id="kategori">
						<option value=""> - Pilih Kategori - </option>

                        <?php foreach ($data_kategori as $kategori) : ?>
                        
                            <?php 
                                if ($data_artikel['id_kategori'] == $kategori['id_kategori']) {
                                    $selected = 'selected="selected"';
                                }
                                else {
                                    $selected = "";
                                }
                            ?>
                            <option <?php echo $selected; ?> value="<?php echo $kategori['id_kategori']; ?>">
                                <?php echo $kategori['jns_artikel']; ?>
                            </option>

                        <?php endforeach; ?>

					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="update" id="update" value="Update">
					<input type="reset" name="batal" id="batal" value="Batal" onclick="self.history.back();">
				</td>
			</tr>
		</table>	
	</form>
</body>
</html>
