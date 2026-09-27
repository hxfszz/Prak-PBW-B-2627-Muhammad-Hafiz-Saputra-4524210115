<?php

interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga,
        protected string $kategori // MODIFIKASI 1
    ) {
        // MODIFIKASI 2: Validasi harga
        if ($harga < 0) {
            throw new InvalidArgumentException('Harga tidak boleh negatif.');
        }
    }

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getKategori(): string
    {
        return $this->kategori;
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(
        string $nama,
        float $harga,
        string $kategori,
        private float $diskon
    ) {
        parent::__construct($nama, $harga, $kategori);

        // MODIFIKASI 2: Validasi diskon
        if ($diskon < 0 || $diskon > 100) {
            throw new InvalidArgumentException(
                'Diskon harus berada antara 0 sampai 100 persen.'
            );
        }
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }
}

$daftar = [
    new Produk('Keyboard', 250000, 'Aksesoris'),
    new ProdukDiskon('Mouse', 150000, 'Perangkat Komputer', 10)
];

foreach ($daftar as $produk) {
    echo $produk->getNama()
        . " - "
        . $produk->getKategori()
        . " - Rp "
        . number_format(
            $produk->hargaAkhir(),
            0,
            ',',
            '.'
        )
        . "<br>";
}