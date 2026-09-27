<?php
// biodata.php

function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

// MODIFIKASI 2: Fungsi untuk menentukan status semester
function statusSemester(int $semester): string
{
    if ($semester <= 7) return 'Mahasiswa Aktif';
    return 'Semester Akhir';
}

$mahasiswa = [
    'nim' => '2024115',
    'nama' => 'Muhammad Hafiz Saputra',
    'prodi' => 'Teknik Informatika',
    'fakultas' => 'Fakultas Teknik',
    'semester' => 5,
    'ipk' => 3.72
];
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata</title>
</head>

<body>

    <h1>Biodata Mahasiswa</h1>

    <ul>
        <?php foreach ($mahasiswa as $kunci => $nilai): ?>
            <li>
                <?= ucfirst($kunci) ?>:
                <?= htmlspecialchars((string)$nilai) ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p>
        Predikat:
        <?= statusKelulusan($mahasiswa['ipk']) ?>
    </p>

    <!-- MODIFIKASI 2: Menampilkan status semester -->
    <p>
        Status:
        <?= statusSemester($mahasiswa['semester']) ?>
    </p>

</body>

</html>