<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PHP dan MySQLi</title>
    </head>
    <body>

        <h2>DATA MAHASISWA</h2>
        <br/>
        <a href="login.php">
            + LOGIN +
        </a>
        <br/>
        <br/>
        <table border="1">
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Alamat</th>
                <th>OPSI</th>
            </tr>
            <?php 
        // Memanggil Koneksi untuk akses database
		include 'koneksi.php';
        $no = 1; // variable
        // Query untuk menambil data. 
        $data = mysqli_query($koneksi,"select * from mahasiswa");
        // ambil data dengan memasukkan kedalam array dan dibuat pengulangan while untuk menampilkan data
		while($d = mysqli_fetch_array($data)){
			?>
            <tr>
                <!-- Output data -->
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['npm']; ?></td>
                <td><?php echo $d['jurusan']; ?></td>
                <td>
                    <!-- Untuk mengirim data ?npm=.. dikirim ke halaman detil.php -->
                    <a href="detail.php?npm=<?php echo $d['npm']; ?>">DETAIL</a>
                </td>
            </tr>
            <?php 
		}
		?>
        </table>
    </body>
</html>