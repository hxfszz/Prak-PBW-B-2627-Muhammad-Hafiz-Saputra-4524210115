<?php

class ProdukModel
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    // Mengambil semua data produk
    public function getAll()
    {
        $query = mysqli_query(
            $this->koneksi,
            "SELECT * FROM produk ORDER BY id DESC"
        );

        return $query;
    }

    // Mengambil satu produk berdasarkan ID
    public function getById($id)
    {
        $query = mysqli_query(
            $this->koneksi,
            "SELECT * FROM produk WHERE id = '$id'"
        );

        return mysqli_fetch_assoc($query);
    }

    // Menambahkan produk
    public function create($nama_produk, $harga, $stok)
    {
        return mysqli_query(
            $this->koneksi,
            "INSERT INTO produk
            (nama_produk, harga, stok)
            VALUES
            ('$nama_produk', '$harga', '$stok')"
        );
    }

    // Mengubah produk
    public function update($id, $nama_produk, $harga, $stok)
    {
        return mysqli_query(
            $this->koneksi,
            "UPDATE produk SET
                nama_produk = '$nama_produk',
                harga = '$harga',
                stok = '$stok'
            WHERE id = '$id'"
        );
    }

    // Menghapus produk
    public function delete($id)
    {
        return mysqli_query(
            $this->koneksi,
            "DELETE FROM produk WHERE id = '$id'"
        );
    }
}

?>