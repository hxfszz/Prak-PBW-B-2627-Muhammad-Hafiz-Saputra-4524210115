<?php

interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    private string $prodi; // MODIFIKASI 1
    protected float $ipk;

    public function __construct(
        string $nim,
        string $nama,
        string $prodi,
        float $ipk
    ) {
        // MODIFIKASI 2: Validasi NIM
        if ($nim === '') {
            throw new InvalidArgumentException('NIM tidak boleh kosong.');
        }

        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }

        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function ringkasan(): string
    {
        return $this->nim
            . ' - ' . $this->nama
            . ' - ' . $this->prodi
            . ' - IPK: ' . $this->ipk;
    }
}

$mhs = new Mahasiswa(
    '2024115',
    'Muhammad Hafiz Saputra',
    'Teknik Informatika',
    4.00
);

echo $mhs->ringkasan();