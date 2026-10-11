<?php

include "koneksi.php";


// Mengecek NIM
if (!isset($_GET['nim']) || $_GET['nim'] == '') {

    echo "<script>
        alert('NIM tidak ditemukan');
        window.location.href = 'index.php';
    </script>";

    exit;
}

$nim = $_GET['nim'];

// Mengecek apakah data tersedia
$cek = mysqli_prepare(
    $koneksi,
    "SELECT nim FROM mahasiswa WHERE nim = ?"
);

mysqli_stmt_bind_param($cek, "s", $nim);
mysqli_stmt_execute($cek);

$result = mysqli_stmt_get_result($cek);

if (mysqli_num_rows($result) == 0) {

    echo "<script>
        alert('Data mahasiswa tidak ditemukan');
        window.location.href = 'index.php';
    </script>";

    exit;
}


// Menggunakan prepared statement untuk DELETE
$stmt = mysqli_prepare(
    $koneksi,
    "DELETE FROM mahasiswa WHERE nim = ?"
);

mysqli_stmt_bind_param($stmt, "s", $nim);

if (mysqli_stmt_execute($stmt)) {

    // Mengecek apakah data benar-benar terhapus
    if (mysqli_stmt_affected_rows($stmt) > 0) {

        echo "<script>
            alert('Data mahasiswa berhasil dihapus');
            window.location.href = 'indexmodif.php';
        </script>";

    } else {

        echo "<script>
            alert('Data tidak berhasil dihapus');
            window.location.href = 'indexmodif.php';
        </script>";

    }

} else {

    echo "<script>
        alert('Data gagal dihapus');
        window.history.back();
    </script>";

}

?>