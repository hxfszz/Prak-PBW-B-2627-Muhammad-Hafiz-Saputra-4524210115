<?php

require_once __DIR__ . '/../models/ProdukModel.php';

class ProdukController
{
    private $model;

    public function __construct($koneksi)
    {
        $this->model = new ProdukModel($koneksi);
    }

    // Menampilkan daftar produk
    public function index()
    {
        $produk = $this->model->getAll();

        include __DIR__ . '/../views/produk/index.php';
    }

    // Menampilkan form tambah
    public function create()
    {
        include __DIR__ . '/../views/produk/create.php';
    }

    // Menyimpan produk baru
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit;
        }

        $nama_produk = trim($_POST['nama_produk']);
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        if ($nama_produk === '' || $harga < 0 || $stok < 0) {
            die('Data produk tidak valid.');
        }

        $this->model->create(
            $nama_produk,
            $harga,
            $stok
        );

        header('Location: index.php');
        exit;
    }

    // Menampilkan form edit
    public function edit()
    {
        $id = $_GET['id'];

        $data = $this->model->getById($id);

        if (!$data) {
            die('Data produk tidak ditemukan.');
        }

        include __DIR__ . '/../views/produk/edit.php';
    }

    // Menyimpan perubahan produk
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit;
        }

        $id = $_POST['id'];
        $nama_produk = trim($_POST['nama_produk']);
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        if ($nama_produk === '' || $harga < 0 || $stok < 0) {
            die('Data produk tidak valid.');
        }

        $this->model->update(
            $id,
            $nama_produk,
            $harga,
            $stok
        );

        header('Location: index.php');
        exit;
    }

    // Menghapus produk
    public function delete()
    {
        $id = $_GET['id'];

        $this->model->delete($id);

        header('Location: index.php');
        exit;
    }
}

?>