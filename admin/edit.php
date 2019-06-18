<?php include('akses.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PHP dan MySQLi</title>
    </head>
    <body>

        <h2>CRUD DATA MAHASISWA</h2>
        <br/>
        <a href="index.php">KEMBALI</a>
        <br/>
        <br/>
        <h3>EDIT DATA MAHASISWA</h3>

        <?php
        // Memanggil Koneksi untuk akses database
    include '../koneksi.php';
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
        <form method="post" action="update.php">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="text" name="nama" value="<?php echo $d['nama']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><input type="number" name="npm" value="<?php echo $d['npm']; ?>"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><input type="text" name="jurusan" value="<?php echo $d['jurusan']; ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal lahir</td>
                    <td><input type="date" name="tgl_lahir" value="<?php echo $d['tgl_lahir']; ?>"></td>
                </tr>
                <tr>
                    <td>Asal</td>
                    <td><input type="text" name="asal" value="<?php echo $d['asal']; ?>"></td>
                </tr>
                <tr>
                    <td>IPK</td>
                    <td><input type="text" name="ipk" value="<?php echo $d['ipk']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
        <?php 
	}
	?>

    </body>
</html>