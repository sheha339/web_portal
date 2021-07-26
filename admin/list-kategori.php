<?php

// ... ambil data dari database
include 'proses-list-kategori.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List Kategori</title>
</head>
<body>
	<h2 align="center">List Kategori Artikel</h2>
    <p align="center">
        <a href="tambah-kategori.php"><button>Tambah Kategori</button></a>
        <a href="list-artikel.php"><button>List Artikel</button></a>
    </p>
	<div>
		<table border="1" cellpadding="5" cellspacing="0" align="center">
			<tr align="center">
				<td>Id</td>
				<td>Jenis Berita</td>
				<td>Aksi</td>
			</tr>

            <?php foreach ($data_kategori as $kategori) : ?>
            <tr> 
                <td><?php echo $kategori['id_kategori']; ?></td> 
                <td><?php echo $kategori['jns_artikel']; ?></td>
				<td>
                    <a href="edit-kategori.php?id_kategori=<?php echo $kategori['id_kategori']; ?>">
                        <button>Edit</button>
                    </a>
                    <a href="delete-kategori.php?id_kategori=<?php echo $kategori['id_kategori']; ?>" onclick="return confirm('Hapus data ini?');">
                        <button>Delete</button>
                    </a>
				</td>
			</tr>
            <?php endforeach; ?>
			
		</table>
	</div>
	<p align="center"><a href="logout.php" onclick="return confirm('Keluar dari admin?')">Logout</a></p>
	<p align="center"><a target="_blank" href="../index.php">Lihat Web</a></p>
</body>
</html>
