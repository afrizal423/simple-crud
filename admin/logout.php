<?php 
// mengaktifkan session
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman sambil mengirim pesan logout
echo '<script language="javascript">alert("Logout telah berhasil!"); document.location="/";</script>';
?>