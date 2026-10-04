<?php

require_once 'koneksi.php';

// Membuat database
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

if (mysqli_query($koneksi, $sqlCreateDB)) {
    echo "Database berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error membuat database: " . mysqli_error($koneksi) . "<br>";
}

// Mengatur charset
mysqli_set_charset($koneksi, "utf8mb4");

// Memilih database
if (mysqli_select_db($koneksi, "akademik")) {
    echo "Database akademik berhasil dipilih.<br>";
} else {
    echo "Gagal memilih database: " . mysqli_error($koneksi) . "<br>";
}


// ======================================================
// 1. MEMBUAT TABEL MAHASISWA
// ======================================================

$sqlMahasiswa = "CREATE TABLE IF NOT EXISTS mahasiswa (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nim VARCHAR(15) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE,
    prodi VARCHAR(80) NOT NULL,
    angkatan YEAR NOT NULL,
    ipk DECIMAL(3,2) DEFAULT 0.00
) ENGINE=InnoDB";

if (mysqli_query($koneksi, $sqlMahasiswa)) {
    echo "Tabel mahasiswa berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Gagal membuat tabel mahasiswa: " . mysqli_error($koneksi) . "<br>";
}


// ======================================================
// 2. MODIFIKASI TABEL MAHASISWA
// Tambah no_telepon dan status_mahasiswa
// ======================================================

// Mengecek apakah kolom no_telepon sudah ada
$cekNoTelepon = mysqli_query(
    $koneksi,
    "SHOW COLUMNS FROM mahasiswa LIKE 'no_telepon'"
);

if (mysqli_num_rows($cekNoTelepon) == 0) {

    $sqlTambahTelepon = "
        ALTER TABLE mahasiswa
        ADD COLUMN no_telepon VARCHAR(15) NOT NULL
        AFTER email
    ";

    if (mysqli_query($koneksi, $sqlTambahTelepon)) {
        echo "Kolom no_telepon berhasil ditambahkan.<br>";
    } else {
        echo "Gagal menambahkan no_telepon: "
            . mysqli_error($koneksi) . "<br>";
    }

} else {
    echo "Kolom no_telepon sudah ada.<br>";
}


// Mengecek apakah kolom status_mahasiswa sudah ada
$cekStatus = mysqli_query(
    $koneksi,
    "SHOW COLUMNS FROM mahasiswa LIKE 'status_mahasiswa'"
);

if (mysqli_num_rows($cekStatus) == 0) {

    $sqlTambahStatus = "
        ALTER TABLE mahasiswa
        ADD COLUMN status_mahasiswa
        ENUM('Aktif', 'Cuti', 'Lulus')
        DEFAULT 'Aktif'
        AFTER ipk
    ";

    if (mysqli_query($koneksi, $sqlTambahStatus)) {
        echo "Kolom status_mahasiswa berhasil ditambahkan.<br>";
    } else {
        echo "Gagal menambahkan status_mahasiswa: "
            . mysqli_error($koneksi) . "<br>";
    }

} else {
    echo "Kolom status_mahasiswa sudah ada.<br>";
}


// ======================================================
// 3. MEMBUAT TABEL DOSEN
// ======================================================

$sqlDosen = "CREATE TABLE IF NOT EXISTS dosen (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nidn VARCHAR(20) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL UNIQUE
) ENGINE=InnoDB";

if (mysqli_query($koneksi, $sqlDosen)) {
    echo "Tabel dosen berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Gagal membuat tabel dosen: " . mysqli_error($koneksi) . "<br>";
}


// ======================================================
// 4. MEMBUAT TABEL MATA KULIAH
// ======================================================

$sqlMataKuliah = "CREATE TABLE IF NOT EXISTS mata_kuliah (
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

) ENGINE=InnoDB";

if (mysqli_query($koneksi, $sqlMataKuliah)) {
    echo "Tabel mata_kuliah berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Gagal membuat tabel mata_kuliah: "
        . mysqli_error($koneksi) . "<br>";
}


// ======================================================
// 5. MEMBUAT TABEL KRS
// ======================================================

$sqlKRS = "CREATE TABLE IF NOT EXISTS krs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mahasiswa_id BIGINT UNSIGNED NOT NULL,
    semester TINYINT UNSIGNED NOT NULL,
    tahun_ajaran VARCHAR(9) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

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

) ENGINE=InnoDB";

if (mysqli_query($koneksi, $sqlKRS)) {
    echo "Tabel krs berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Gagal membuat tabel krs: "
        . mysqli_error($koneksi) . "<br>";
}


// ======================================================
// 6. MEMBUAT TABEL DETAIL KRS
// ======================================================

$sqlMKKRS = "CREATE TABLE IF NOT EXISTS mk_krs (
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

) ENGINE=InnoDB";

if (mysqli_query($koneksi, $sqlMKKRS)) {
    echo "Tabel mk_krs berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Gagal membuat tabel mk_krs: "
        . mysqli_error($koneksi) . "<br>";
}


// Menutup koneksi
mysqli_close($koneksi);

?>