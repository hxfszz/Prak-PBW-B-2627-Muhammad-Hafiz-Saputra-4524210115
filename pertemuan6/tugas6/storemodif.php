<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
        echo "<script>
            alert('IPK harus berada di antara 0 sampai 4');
            window.history.back();
        </script>";
        exit;
    }

    // Validasi status mahasiswa
    $status_valid = ['Aktif', 'Cuti', 'Lulus'];

    if (!in_array($status_mahasiswa, $status_valid)) {
        echo "<script>
            alert('Status mahasiswa tidak valid');
            window.history.back();
        </script>";
        exit;
    }

    // Validasi angkatan
    if ($angkatan < 2000 || $angkatan > 2100) {
        echo "<script>
            alert('Angkatan tidak valid');
            window.history.back();
        </script>";
        exit;
    }

    $query = mysqli_query(
        $koneksi,
        "INSERT INTO mahasiswa
        (nim, nama, email, no_telepon, prodi, angkatan, ipk, status_mahasiswa)
        VALUES
        ('$nim', '$nama', '$email', '$no_telepon',
        '$prodi', '$angkatan', '$ipk', '$status_mahasiswa')"
    );

    if ($query) {
        echo "<script>
            alert('Data mahasiswa berhasil disimpan');
            window.location.href = 'indexmodif.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal disimpan: " . mysqli_error($koneksi) . "');
            window.history.back();
        </script>";
    }
}

?>