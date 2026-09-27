<?php
// kalkulator.php

$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'] ?? '';
    $npm = $_POST['npm'] ?? '';
    $a = $_POST['a'] ?? '';
    $b = $_POST['b'] ?? '';
    $operator = $_POST['operator'] ?? '';

    
    if ($nama === '' || $npm === '') {
        $pesan = 'Nama dan NPM wajib diisi.';
    } elseif ($a === '' || $b === '') {
        $pesan = 'Kedua angka wajib diisi.';
    } else {

        $a = (float) $a;
        $b = (float) $b;

        switch ($operator) {

            case '+':
                $hasil = $a + $b;
                break;

            case '-':
                $hasil = $a - $b;
                break;

            case '*':
                $hasil = $a * $b;
                break;

            case '/':
                if ($b == 0) {
                    $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
                } else {
                    $hasil = $a / $b;
                }
                break;

            default:
                $pesan = 'Operator tidak valid.';
        }
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Kalkulator</title>
</head>

<body>

    <h1>Kalkulator Sederhana</h1>

    <!-- MODIFIKASI 2: Field Nama dan NPM -->
    <form method="post">

        <label>Nama:</label>
        <input
            type="text"
            name="nama"
            placeholder="Masukkan nama"
            required>

        <br><br>

        <label>NPM:</label>
        <input
            type="text"
            name="npm"
            placeholder="Masukkan NPM"
            required>

        <br><br>

        <input
            type="number"
            step="any"
            name="a"
            placeholder="Angka pertama"
            required>

        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <input
            type="number"
            step="any"
            name="b"
            placeholder="Angka kedua"
            required>

        <button type="submit">Hitung</button>

    </form>

    <?php if ($pesan): ?>

        <p>
            <?= htmlspecialchars($pesan) ?>
        </p>

    <?php elseif ($hasil !== null): ?>

        <p>
            Nama: <?= htmlspecialchars($nama) ?>
            <br>
            NPM: <?= htmlspecialchars($npm) ?>
            <br>
            Hasil: <?= htmlspecialchars((string)$hasil) ?>
        </p>

    <?php endif; ?>

</body>

</html>