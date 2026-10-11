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

$query = mysqli_query(
    $koneksi,
    "UPDATE mahasiswa SET
        nama='$nama',
        email='$email',
        no_telepon='$no_telepon',
        prodi='$prodi',
        angkatan='$angkatan',
        ipk='$ipk',
        status_mahasiswa='$status_mahasiswa'
    WHERE nim='$nim'"
);

if ($query) {
    echo "<script>
        alert('Data mahasiswa berhasil diubah');
        window.location.href = 'indexmodif.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal diubah: " . mysqli_error($koneksi) . "');
        window.history.back();
    </script>";
}

?>