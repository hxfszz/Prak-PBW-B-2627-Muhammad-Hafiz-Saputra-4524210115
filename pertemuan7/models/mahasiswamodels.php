<?php

class MahasiswaModel {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function getAllMahasiswa() {
        $query = mysqli_query(
            $this->koneksi,
            "SELECT * FROM mahasiswa"
        );

        if (!$query) {
            die("Query gagal: " . mysqli_error($this->koneksi));
        }

        return $query;
    }
}
?>