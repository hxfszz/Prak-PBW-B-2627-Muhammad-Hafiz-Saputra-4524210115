<?php

require_once 'koneksi.php';

// Membuat database
$sqlCreateDb = "CREATE DATABASE IF NOT EXISTS akademik";

if (mysqli_query($koneksi, $sqlCreateDb)) {
    echo "Database berhasil dibuat atau sudah ada\n";
} else {
    die("Error membuat database: " . mysqli_error($koneksi) . "\n");
}

// Mengatur charset
mysqli_set_charset($koneksi, "utf8mb4");

// Memilih database
if (mysqli_select_db($koneksi, "akademik")) {
    echo "Database akademik berhasil dipilih\n";
} else {
    die("Gagal memilih database: " . mysqli_error($koneksi) . "\n");
}


// ==========================
// SQL UNTUK MEMBUAT TABEL
// ==========================

$sqlCreateTables = [

    // Tabel mahasiswa
    "CREATE TABLE IF NOT EXISTS mahasiswa (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nim VARCHAR(15) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE,
        prodi VARCHAR(80) NOT NULL,
        angkatan YEAR NOT NULL,
        ipk DECIMAL(3,2) DEFAULT 0.00
    ) ENGINE=InnoDB",

    // Tabel dosen
    "CREATE TABLE IF NOT EXISTS dosen (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nidn VARCHAR(20) NOT NULL UNIQUE,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(120) NOT NULL UNIQUE
    ) ENGINE=InnoDB",

    // Tabel mata kuliah
    "CREATE TABLE IF NOT EXISTS matakuliah (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        kode_mk VARCHAR(12) NOT NULL UNIQUE,
        nama_mk VARCHAR(100) NOT NULL,
        sks TINYINT UNSIGNED NOT NULL,
        dosen_id BIGINT UNSIGNED,

        CONSTRAINT fk_mk_dosen
        FOREIGN KEY (dosen_id)
        REFERENCES dosen(id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
    ) ENGINE=InnoDB"

];


// ==========================
// EKSEKUSI PEMBUATAN TABEL
// ==========================

foreach ($sqlCreateTables as $query) {

    if (mysqli_query($koneksi, $query)) {

        echo "Tabel berhasil dibuat atau sudah ada\n";

    } else {

        echo "Gagal membuat tabel: " . mysqli_error($koneksi) . "\n";

    }

}


// Menutup koneksi
mysqli_close($koneksi);

?>
