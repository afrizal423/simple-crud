<?php 
// Memanggil Koneksi untuk akses database
include 'koneksi.php';
// Untuk memulai session
session_start();
// escape string dan htmlentities, cara untuk menanggulangi dan mempersempit serangan SQL Injection
// menangkap data dari form login
$username = mysqli_real_escape_string($koneksi,htmlentities($_POST['username']));
$password = mysqli_real_escape_string($koneksi,htmlentities(md5($_POST['password'])));
// query untuk menambil akun pada tabel user
$query = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// cek apakah query diatas ada yang error, maka akan menampilkan error pada layar
if (!$query)
    echo(mysqli_error($koneksi));
// dari variable query akan dicek berupa boolean, yang dimana 0 false dan 1 true
if(mysqli_num_rows($query)==0){
        // Jika false maka akan muncul alert
        echo '<script language="javascript">alert("Tidak bisa Login !"); document.location="/";</script>';
 } else {
     // jika true maka akan membuat session untuk username yang diinputkan login,
    $_SESSION['admin']=$username;
    // deklarasikan status diberi login untuk dicek nanti apakah true or false
    $_SESSION['status'] = "login";
    // akan memunculkan alert
    echo '<script language="javascript">alert("Anda berhasil Login !"); document.location="admin/index.php";</script>';
 }

?>