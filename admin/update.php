<?php 
include '../koneksi.php';
session_start();

// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$npm = $_POST['npm'];
$jurusan = $_POST['jurusan'];
$ipk = $_POST['ipk'];
$tgl_lahir = $_POST['tgl_lahir'];
$asal = $_POST['asal'];
 
// update data ke database
$query = mysqli_query($koneksi,"UPDATE `mahasiswa` SET `npm` = '$npm', `nama` = '$nama', `jurusan` = '$jurusan' WHERE `mahasiswa`.`npm` = '$npm';");
$query1 = mysqli_query($koneksi,"UPDATE `detil-mahasiswa` SET `ipk` = '$ipk', `tgl_lahir` = '$tgl_lahir', `asal` = '$asal' WHERE `detil-mahasiswa`.`npm` = '$npm';");
if (!$query || !$query1)
    echo(mysqli_error($koneksi));
// mengalihkan halaman kembali ke index.php
header("location:/admin");
?>
