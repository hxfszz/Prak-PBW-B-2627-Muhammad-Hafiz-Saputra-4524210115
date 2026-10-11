<?php

include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_telepon = $_POST['no_telepon'];
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$ipk = $_POST['ipk'];
$status_mahasiswa = $_POST['status_mahasiswa'];

// Validasi IPK
if ($ipk < 0 || $ipk > 4) {
    die("IPK harus berada di antara 0 sampai 4.");
}

// Validasi status mahasiswa
$status_valid = ['Aktif', 'Cuti', 'Lulus'];

if (!in_array($status_mahasiswa, $status_valid)) {
    die("Status mahasiswa tidak valid.");
}

// Menyimpan data mahasiswa
$query = mysqli_query(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, no_telepon, prodi, angkatan, ipk, status_mahasiswa)
    VALUES
    ('$nim', '$nama', '$email', '$no_telepon', '$prodi', '$angkatan', '$ipk', '$status_mahasiswa')"
);

if ($query) {
    echo "Data berhasil disimpan.<br>";
    echo "<a href='form.php'>Kembali ke Form</a><br>";
    echo "<a href='data.php'>Lihat Data Mahasiswa</a>";
} else {
    echo "Data gagal disimpan: " . mysqli_error($koneksi);
}

?>