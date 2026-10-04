<?php

require_once 'koneksi.php';

mysqli_select_db($koneksi, 'akademik');


// ========================================
// INSERT DATA MAHASISWA
// ========================================

$sqlInsert = "INSERT IGNORE INTO mahasiswa
    (nim, nama, email, no_telepon, prodi, angkatan, ipk, status_mahasiswa)
    VALUES
    ('2026001', 'Andi Pratama', 'andi@kampus.ac.id', '081234567801', 'Teknik Informatika', 2026, 3.75, 'Aktif'),
    ('2026002', 'Siti Rahma', 'siti@kampus.ac.id', '081234567802', 'Sistem Informasi', 2026, 3.82, 'Aktif'),
    ('2025003', 'Budi Santoso', 'budi@kampus.ac.id', '081234567803', 'Teknik Informatika', 2025, 3.20, 'Cuti')";

if (mysqli_query($koneksi, $sqlInsert)) {
    echo "[INSERT] Data mahasiswa berhasil dimasukkan ke tabel.<br>";
} else {
    echo "[ERROR] Gagal memasukkan data: "
        . mysqli_error($koneksi) . "<br>";
}


// ========================================
// SELECT DATA MAHASISWA
// ========================================

// MODIFIKASI 1:
// Menambahkan no_telepon dan status_mahasiswa
// pada hasil SELECT.

// MODIFIKASI 2:
// Menambahkan filter berdasarkan angkatan 2026.

$sqlSelect = "SELECT nim, nama, no_telepon, prodi, angkatan, ipk, status_mahasiswa
              FROM mahasiswa
              WHERE ipk >= 3.50
              AND angkatan = 2026
              ORDER BY ipk DESC, nama ASC
              LIMIT 10";

$result = mysqli_query($koneksi, $sqlSelect);

echo "<br>--- HASIL QUERY SELECT ---<br>";


// ========================================
// MENAMPILKAN HASIL
// ========================================

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        echo "NIM          : " . $row['nim'] . "<br>";
        echo "Nama         : " . $row['nama'] . "<br>";
        echo "No. Telepon  : " . $row['no_telepon'] . "<br>";
        echo "Prodi        : " . $row['prodi'] . "<br>";
        echo "Angkatan     : " . $row['angkatan'] . "<br>";
        echo "IPK          : " . $row['ipk'] . "<br>";
        echo "Status       : " . $row['status_mahasiswa'] . "<br>";
        echo "<hr>";
    }

} else {

    echo "Tidak ada data mahasiswa dengan kriteria tersebut.<br>";
}


mysqli_close($koneksi);

?>