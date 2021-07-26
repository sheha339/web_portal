<?php

// ... ambil data dari database
include 'proses-list.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>List Artikel</title>
</head>
<body>
	<h2 align="center">List Artikel</h2>
    <p align="center">
        <a href="tambah-artikel.php"><button>Tambah Artikel</button></a>
        <a href="list-kategori.php"><button>List Kategori</button></a>
    
    </p>
	<div>
		<table border="1" cellpadding="5" cellspacing="0" align="center">
			<tr align="center">
				<td>Id</td>
				<td>Judul</td>
				<td>Isi</td>
                <td>Gambar</td>
				<td>Kategori</td>
				<td>Tanggal</td>
				<td>Pemilik</td>
				<td>Aksi</td>
			</tr>

            <?php foreach ($data_artikel as $artikel) : ?>
            <tr> 
                <td><?php echo $artikel['id_artikel']; ?></td> 
                <td><?php echo $artikel['judul']; ?></td> 
                <td><?php echo substr($artikel['isi'],0, 40); ?>...</td> 
                <td><img src="gambar/<?php echo $artikel['gambar']; ?>" style="width: 120px;"></td> 
                <td><?php echo $artikel['jns_artikel']; ?></td>
                <td><?php echo $artikel['tgl']; ?></td>
                <td><?php echo $artikel['nama']; ?></td>
				<td>
                    <a href="edit-artikel.php?id_artikel=<?php echo $artikel['id_artikel']; ?>">
                        <button>Edit</button>
                    </a>
                    <a href="delete-artikel.php?id_artikel=<?php echo $artikel['id_artikel']; ?>" onclick="return confirm('Hapus data ini?');">
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
