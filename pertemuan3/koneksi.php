<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';

$koneksi = mysqli_connect($host, $user, $pass);

if(!$koneksi) {
    die ("koneksi gagal:" . mysqli_connect_error());
}
echo "koneksi ke server mysql berhasil\n";
?>