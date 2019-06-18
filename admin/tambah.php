<?php include('akses.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD PHP dan MySQLi</title>
    </head>
    <body>

        <h2>DATA MAHASISWA</h2>
        <br/>
        <a href="/admin">KEMBALI</a>
        <br/>
        <br/>
        <h3>TAMBAH DATA MAHASISWA</h3>
        <form method="post" action="tambahproses.php">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td><input type="text" name="npm"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td><input type="text" name="jurusan"></td>
                </tr>
                <tr>
                    <td>IPK</td>
                    <td><input type="text" name="ipk"></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input type="date" name="tgl_lahir"></td>
                </tr>
                <tr>
                    <td>Asal</td>
                    <td><input type="text" name="asal"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>
            </table>
        </form>
    </body>
</html>