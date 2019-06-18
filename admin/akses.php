<?php
// memulai session
session_start();
// cek apakah session yang dibuat tadi true untuk status berisikan login
if($_SESSION['status']!="login"){
	// jika true maka akan menampilkan alert
	echo '<script language="javascript">alert("Anda harus Login!"); document.location="/";</script>';
}
?>