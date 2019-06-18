<?php include('akses.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PHP dan MySQLi</title>
    </head>
    <body>

        <h2>DATA MAHASISWA</h2>
        <br/>
        <a href="/admin/tambah.php">+ TAMBAH MAHASISWA</a>
        <a href="/admin/logout.php">+ LOGOUT</a>
        <br/>
        <br/>
        <table border="1">
            <tr>
                <th>Nama</th>
                <th>NPM</th>
                <th>Jurusan</th>
                <th>IPK</th>
                <th>Tanggal Lahir</th>
                <th>Asal</th>
                <th>OPSI</th>
            </tr>
            <?php
            // Memanggil Koneksi untuk akses database 
		include '../koneksi.php';
        $no = 1; // variable
        // Query untuk menambil data. 
		$data = mysqli_query($koneksi,"SELECT npm, nama, jurusan, tgl_lahir, asal, ipk FROM `mahasiswa` m
        INNER JOIN `detil-mahasiswa` d using (npm)");
		// ambil data dengan memasukkan kedalam array dan dibuat pengulangan while untuk menampilkan data
while($d = mysqli_fetch_array($data)){
			?>
            <tr>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['npm']; ?></td>
                <td><?php echo $d['jurusan']; ?></td>
                <td><?php echo $d['ipk']; ?></td>
                <td><?php echo $d['tgl_lahir']; ?></td>
                <td><?php echo $d['asal']; ?></td>
                <td>
                    <a href="edit.php?npm=<?php echo $d['npm']; ?>">EDIT</a>
                    <a href="delete.php?id=<?php echo $d['npm']; ?>">HAPUS</a>
                </td>
            </tr>
            <?php 
		}
		?>
        </table>
    </body>
</html>