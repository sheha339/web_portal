<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

include '../koneksi.php';

// ambil artikel yang mau di edit
$id_kategori = $_GET['id_kategori'];
$query = "SELECT * FROM kategori WHERE id_kategori = $id_kategori";
$hasil = mysqli_query($db, $query);
$data_kategori = mysqli_fetch_assoc($hasil);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Kategori</title>
</head>
<body>
	<h2 align="center">Form Edit Kategori</h2>
	<form action="proses-edit-kategori.php" name="form_edit_kategori" id="form_edit_kategori" method="post">
		<input type="hidden" name="id_kategori" id="id_kategori" value="<?php echo $data_kategori['id_kategori']; ?>">
		<table align="center">
			<tr>
				<td>Jenis Berita</td>
				<td>
                    <input type="text" name="jns_artikel"id="jns_artikel" value="<?php echo $data_kategori['jns_artikel']; ?>">
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
