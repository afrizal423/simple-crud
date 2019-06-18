<?php 
// koneksi database
include '../koneksi.php';
// memulai session agar tidak bisa diakses diluar session admin
include 'akses.php';


// escape string dan htmlentities, cara untuk menanggulangi dan mempersempit serangan SQL Injection
// menangkap data id yang di kirim dari url
$id = mysqli_real_escape_string($koneksi,htmlentities($_GET['id']));


// menghapus data dari database
mysqli_query($koneksi,"delete from `mahasiswa` where npm='$id'");
mysqli_query($koneksi,"delete from `detil-mahasiswa` where npm='$id'");

// mengalihkan halaman kembali ke index.php
header("location:index.php");

?>