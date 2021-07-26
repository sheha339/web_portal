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
		            kategori.id_kategori = artikel.id_kategori";

		        if (!empty($_GET['kategori'])) {
		        	$query .= " AND artikel.id_kategori=".$_GET['kategori'];
		        }

				$hasil = mysqli_query($db, $query);

				// menampung semua data artikel
				$data_artikel = array();

				// tiap baris dari hasil query dikumpulkan ke $data_artikel
				while ($row = mysqli_fetch_assoc($hasil)) {
				    $data_artikel[] = $row;
				}
			?>

			<?php if (empty($data_artikel)): ?>
				<h1 align="center">Tidak ada artikel dalam kategori ini</h1>
			<?php endif ?>

			<?php foreach ($data_artikel as $artikel): ?>
				<div class="artikel">
					<a href="detail.php?id=<?php echo $artikel['id_artikel']; ?>"><?php echo $artikel['judul']; ?></a>
					<div>
						<p><?php echo $artikel['tgl'] .' | '. $artikel['jns_artikel'] .' | '.$artikel['nama']; ?></p>
					</div>
					<p>
						<?php echo substr($artikel['isi'],0, 200); ?>...
						<a href="detail.php?id=<?php echo $artikel['id_artikel']; ?>">Lanjut Baca</a>
					</p>
				</div>
			<?php endforeach ?>
		</div>
		<footer>
			20180801339 | Kholid Nur Sheha
		</footer>
	</div>
</body>
</html>
