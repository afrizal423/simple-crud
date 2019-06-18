<?php 
// koneksi database
include '../koneksi.php';
include 'akses.php'; 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$npm = $_POST['npm'];
$jurusan = $_POST['jurusan'];
$ipk = $_POST['ipk'];
$tgl_lahir = $_POST['tgl_lahir'];
$asal = $_POST['asal'];

// menginput data ke database
$query = mysqli_query($koneksi,"INSERT INTO `mahasiswa` VALUES (NULL, '$npm', '$nama', '$jurusan')");
$query1 = mysqli_query($koneksi,"insert into `detil-mahasiswa` values (NULL,'$npm','$tgl_lahir','$asal','$ipk')");
if (!$query || !$query1)
    echo(mysqli_error($koneksi));
// mengalihkan halaman kembali ke index.php
header("location:/admin");

?>