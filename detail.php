<?php 
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Website Portal IT</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="container">
		<header>
			<h1>Selamat Datang di Web Portal IT</h1>
			<h2>Cari Info Seputar Teknologi Disini</h2>
		</header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php 
					$query = "SELECT * FROM kategori";
					$hasil = mysqli_query($db, $query);

					$data_kategori = array();
					while ($row = mysqli_fetch_assoc($hasil)) {
						$data_kategori[] = $row;
					}
				?>

				<?php foreach ($data_kategori as $kategori): ?>
					<li><a href="index.php?kategori=<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['jns_artikel']; ?></a></li>
				<?php endforeach ?>
			</ul>
		</nav>
		<div id="content">
			<?php  
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
		            AND artikel.id_artikel=".$_GET['id'];

				$hasil = mysqli_query($db, $query);
				$detail_artikel = mysqli_fetch_assoc($hasil);
			?>
			<h2 align="center"><?php echo $detail_artikel['judul']; ?></h2>
			<p align="center">
				<img src="admin/gambar/<?php echo $detail_artikel['gambar']; ?>" style="width: 80%;">
			</p>
			<p align="justify">
				<?php echo $detail_artikel['isi']; ?>
			</p>
			<p><p><?php echo $detail_artikel['tgl'] .' | '. $detail_artikel['jns_artikel'] .' | '.$detail_artikel['nama']; ?></p></p> 
		</div>
		<footer>
			20180801339 | Kholid Nur Sheha
		</footer>
	</div>
</body>
</html>