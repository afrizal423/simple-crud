<?php 
/*
Variable koneksi untuk meninisialisasikan alamat host, username, password, nama database.
PERLU DIINGAT!!
Parameter 1 = untuk alamat host (default semua hosting rata-rata localhot)
Parameter 2 = untuk Username pada akun database 
Parameter 3 = untuk Password pada akun database
Parameter 4 = adalah nama Database yang dipilih
*/
$koneksi = mysqli_connect("localhost","root","","crud-simple");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>