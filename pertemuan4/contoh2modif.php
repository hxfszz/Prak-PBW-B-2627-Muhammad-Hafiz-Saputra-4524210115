<?php

require_once 'koneksi.php';

// Memilih database
mysqli_select_db($koneksi, 'akademik');


// ==========================================
// 1. UPDATE: Mengubah data IPK dan status
// ==========================================

echo "=== 1. PROSES UPDATE DATA ===\n";

$sqlUpdate = "UPDATE mahasiswa 
              SET ipk = 3.40, 
                  status_mahasiswa = 'Aktif'
              WHERE nim = '2025003'";

if (mysqli_query($koneksi, $sqlUpdate)) {
    echo "Data IPK mahasiswa dengan NIM 2025003 berhasil diubah menjadi 3.40.\n";
    echo "Status mahasiswa diubah menjadi Aktif.\n\n";
} else {
    echo "Gagal UPDATE: " . mysqli_error($koneksi) . "\n\n";
}


// ==========================================
// 2. SELECT & GROUP BY
// Rekap jumlah mahasiswa per prodi dan angkatan
// ==========================================

echo "=== 2. REKAP MAHASISWA ===\n";

$sqlRekap = "SELECT prodi, angkatan, COUNT(*) AS jumlah_mahasiswa
             FROM mahasiswa
             GROUP BY prodi, angkatan
             ORDER BY jumlah_mahasiswa DESC";

$resultRekap = mysqli_query($koneksi, $sqlRekap);

if (mysqli_num_rows($resultRekap) > 0) {

    while ($row = mysqli_fetch_assoc($resultRekap)) {

        echo "Prodi    : " . $row['prodi'] . "\n";
        echo "Angkatan : " . $row['angkatan'] . "\n";
        echo "Jumlah   : " . $row['jumlah_mahasiswa'] . "\n";
        echo "-----------------------------\n";
    }

} else {

    echo "Tidak ada data rekap mahasiswa.\n";
}


// ==========================================
// 3. SELECT: Verifikasi sebelum penghapusan
// ==========================================

echo "\n=== 3. VERIFIKASI DATA ===\n";

$sqlVerifikasi = "SELECT nim, nama, no_telepon, prodi, angkatan, ipk, status_mahasiswa
                  FROM mahasiswa
                  WHERE nim = '2025003'";

$resultVerifikasi = mysqli_query($koneksi, $sqlVerifikasi);

if (mysqli_num_rows($resultVerifikasi) > 0) {

    $row = mysqli_fetch_assoc($resultVerifikasi);

    echo "Data ditemukan:\n";
    echo "NIM          : " . $row['nim'] . "\n";
    echo "Nama         : " . $row['nama'] . "\n";
    echo "No. Telepon  : " . $row['no_telepon'] . "\n";
    echo "Prodi        : " . $row['prodi'] . "\n";
    echo "Angkatan     : " . $row['angkatan'] . "\n";
    echo "IPK          : " . $row['ipk'] . "\n";
    echo "Status       : " . $row['status_mahasiswa'] . "\n";

} else {

    echo "Data mahasiswa tidak ditemukan.\n";
}


// ==========================================
// 4. DELETE: Menghapus data
// ==========================================

echo "\n=== 4. PROSES DELETE DATA ===\n";

$sqlDelete = "DELETE FROM mahasiswa 
              WHERE nim = '2025003'";

if (mysqli_query($koneksi, $sqlDelete)) {

    echo "Data mahasiswa dengan NIM 2025003 berhasil dihapus dari tabel.\n";

} else {

    echo "Gagal menghapus data: "
        . mysqli_error($koneksi) . "\n";
}


// Menutup koneksi
mysqli_close($koneksi);

?>