<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>
<body>

	<h2>DATA MAHASISWA</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<?php 
		// Memanggil Koneksi untuk akses database
		include 'koneksi.php';
		// escape string dan htmlentities, cara untuk menanggulangi dan mempersempit serangan SQL Injection
		// menangkap data post ?npm= ...
		$id = mysqli_real_escape_string($koneksi,htmlentities($_GET['npm']));
		// Query untuk menambil data dengan inner join. Bagi yang lulus mata kuliah basis data harusnya udah paham :D
		$data = mysqli_query($koneksi,"SELECT npm, nama, jurusan, tgl_lahir, asal, ipk FROM `mahasiswa` m
        INNER JOIN `detil-mahasiswa` d using (npm)
		where npm = '$id'");
		// ambil data dengan memasukkan kedalam array dan dibuat pengulangan while untuk menampilkan data
		while($d = mysqli_fetch_array($data)){
			?>
	<h3>Lihat Data <?php echo $d['nama']; ?></h3> <!-- Output data -->
    <table border="1">
		<tr>
			<th>Nama</th>
			<th>NPM</th>
			<th>Jurusan</th>
            <th>IPK</th>
            <th>Tanggal Lahir</th>
            <th>Asal</th>
		</tr>
			<tr>
				<!-- Output data -->
				<td><?php echo $d['nama']; ?></td>
				<td><?php echo $d['npm']; ?></td>
				<td><?php echo $d['jurusan']; ?></td>
                <td><?php echo $d['ipk']; ?></td>
                <td><?php echo $d['tgl_lahir']; ?></td>
                <td><?php echo $d['asal']; ?></td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>