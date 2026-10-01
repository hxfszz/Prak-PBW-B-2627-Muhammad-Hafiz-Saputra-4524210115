<?php

require_once 'koneksi.php';

// Membuat database
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

if (mysqli_query($koneksi, $sqlCreateDB)) {
    echo "Database berhasil dibuat atau sudah ada.\n";
} else {
    echo "Error membuat database: " . mysqli_error($koneksi) . "\n";
}

// Mengatur charset
mysqli_set_charset($koneksi, "utf8mb4");

// Memilih database
if (mysqli_select_db($koneksi, "akademik")) {
    echo "Database akademik berhasil dipilih.\n";
} else {
    echo "Gagal memilih database: " . mysqli_error($koneksi) . "\n";
}

// Query untuk membuat tabel
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
    "CREATE TABLE IF NOT EXISTS mata_kuliah (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        kode_mk VARCHAR(12) NOT NULL UNIQUE,
        nama_mk VARCHAR(100) NOT NULL,
        sks TINYINT UNSIGNED NOT NULL,
        dosen_id BIGINT UNSIGNED,

        CONSTRAINT fk_matakuliah_dosen_id
            FOREIGN KEY (dosen_id)
            REFERENCES dosen(id)
            ON UPDATE CASCADE
            ON DELETE SET NULL
    ) ENGINE=InnoDB",

    // Tabel KRS
    "CREATE TABLE IF NOT EXISTS krs (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        mahasiswa_id BIGINT UNSIGNED NOT NULL,
        semester TINYINT UNSIGNED NOT NULL,
        tahun_ajaran VARCHAR(9) NOT NULL,

        CONSTRAINT uq_krs_mahasiswa_sem_thn UNIQUE (
            mahasiswa_id,
            semester,
            tahun_ajaran
        ),

        CONSTRAINT fk_krs_mahasiswa_id
            FOREIGN KEY (mahasiswa_id)
            REFERENCES mahasiswa(id)
            ON UPDATE CASCADE
            ON DELETE CASCADE
    ) ENGINE=InnoDB",

    // Tabel detail KRS / mata kuliah yang diambil
    "CREATE TABLE IF NOT EXISTS mk_krs (
        id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        krs_id BIGINT UNSIGNED NOT NULL,
        mata_kuliah_id BIGINT UNSIGNED NOT NULL,

        CONSTRAINT fk_mkkrs_krs_id
            FOREIGN KEY (krs_id)
            REFERENCES krs(id)
            ON UPDATE CASCADE
            ON DELETE CASCADE,

        CONSTRAINT fk_mkkrs_matakuliah_id
            FOREIGN KEY (mata_kuliah_id)
            REFERENCES mata_kuliah(id)
            ON UPDATE CASCADE
            ON DELETE CASCADE
    ) ENGINE=InnoDB"
];

// Menjalankan semua query pembuatan tabel
foreach ($sqlCreateTables as $query) {
    if (mysqli_query($koneksi, $query)) {
        echo "Tabel berhasil dibuat atau sudah ada.\n";
    } else {
        echo "Gagal membuat tabel: " . mysqli_error($koneksi) . "\n";
    }
}

// Menutup koneksi
mysqli_close($koneksi);

?>