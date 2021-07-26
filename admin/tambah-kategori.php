<?php
session_start();                                                                                                       
                                                                                                                       
if (! isset($_SESSION['user'])) {                                                                                      
    header('Location: login.php');                                                                                     
    exit();                                                                                                            
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Kategori</title>
</head>
<body>
	<h2 align="center">Form Tambah Kategori</h2>
	<form action="proses-tambah-kategori.php" name="form_tambah_kategori" id="form_tambah_kategori" method="post">
		<table align="center">
			<tr>
				<td>Jenis Berita</td>
				<td>
					<input type="text" name="jns_artikel"id="jns_artikel">
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
