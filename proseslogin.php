<?php 
// Memanggil Koneksi untuk akses database
include 'koneksi.php';
// Untuk memulai session
session_start();
// escape string dan htmlentities, cara untuk menanggulangi dan mempersempit serangan SQL Injection
// menangkap data dari form login
$username = mysqli_real_escape_string($koneksi,htmlentities($_POST['username']));
// kita enkripsi awal menggunakan md5
$password = mysqli_real_escape_string($koneksi,htmlentities(md5($_POST['password'])));
// query untuk menambil akun pada tabel user
$query = mysqli_query($koneksi,"select * from user where username='$username'");
// cek apakah query diatas ada yang error, maka akan menampilkan error pada layar
if (!$query)
    echo(mysqli_error($koneksi));
//kita ambil data passwordnya yang terenkripsi password_bcrypt untuk dicocokkan dengan enkripsi md5 password
$datanya = mysqli_fetch_array($query);
$bcrypt =  $datanya['password'];
// dari variable query akan dicek berupa boolean, yang dimana 0 false dan 1 true
if(mysqli_num_rows($query)==0){
        // Jika false maka akan muncul alert
        echo '<script language="javascript">alert("Tidak bisa Login !"); document.location="/";</script>';
 } else {
     //kita cek apakah sama atau tidak menurut password_verify()
    if (password_verify($password, $bcrypt)){
        // jika true maka akan membuat session untuk username yang diinputkan login,
        $_SESSION['admin']=$username;
        // deklarasikan status diberi login untuk dicek nanti apakah true or false
        $_SESSION['status'] = "login";
        // akan memunculkan alert
        echo '<script language="javascript">alert("Anda berhasil Login !"); document.location="admin/index.php";</script>';
    } else {
        echo '<script language="javascript">alert("Tidak bisa Login !"); document.location="/";</script>';
    }
 }
/*
````````````````````````````````````````````````````````````````````````````````````
`                                      Kesimpulan                                  ` 
````````````````````````````````````````````````````````````````````````````````````
Alur logikanya:
1. Kita Enkripsi password dengan md5 terlebih dahulu.
2. Lalu kita enkripsi lagi menggunakan BCRYPT.
3. Untuk login kita cocokkan enkripsi BCRYPT pada database dengan password inputan.
4. jika True maka akan login.

Berikut Logika Code Hashing BCRYPT.
<?php
	$string = "admin"; //passwordnya
	$md5 = md5($string); //hashmd5
	$bcrypt = password_hash($md5, PASSWORD_BCRYPT);

	echo "Masukkan Password = ";
	$pass = trim(fgets(STDIN)); //inputan password 
	$md5pass = md5($pass); //hash md5
	
	if (password_verify($md5pass, $bcrypt)){
		echo "Hasil MD5 = ".md5($pass)."\n";
		echo "Hasil MD5 to BCRYPT = ".$bcrypt."\n";
		echo "\n\nSukses Login\n";
	}
?>
*/
 

?>