<?php

include "koneksi.php";

$nim = $_GET['nim'];

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM mahasiswa WHERE nim = '$nim'"
);

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Ubah Data <?= $data['nama'] ?></title>

</head>

<body class="bg-gray-50 p-6 font-sans text-gray-800">

    <form action="updatemodif.php" method="POST"
        class="max-w-sm mx-auto bg-white p-6 rounded-lg shadow-md flex flex-col">

        <h2 class="text-2xl font-bold mb-4 text-gray-800">
            Ubah Data <?= $data['nama'] ?>
        </h2>

        <label for="nim" class="text-sm font-semibold mb-1">
            NIM:
        </label>

        <input type="text"
            id="nim"
            name="nim"
            value="<?= $data['nim'] ?>"
            required
            class="mb-4 p-2 border border-gray-300 rounded">

        <label for="nama" class="text-sm font-semibold mb-1">
            Nama:
        </label>

        <input type="text"
            id="nama"
            name="nama"
            value="<?= $data['nama'] ?>"
            required
            class="mb-4 p-2 border border-gray-300 rounded">

        <label for="email" class="text-sm font-semibold mb-1">
            Email:
        </label>

        <input type="email"
            id="email"
            name="email"
            value="<?= $data['email'] ?>"
            required
            class="mb-4 p-2 border border-gray-300 rounded">

        
        <label for="no_telepon" class="text-sm font-semibold mb-1">
            No. Telepon:
        </label>

        <input type="text"
            id="no_telepon"
            name="no_telepon"
            value="<?= $data['no_telepon'] ?>"
            maxlength="15"
            required
            class="mb-4 p-2 border border-gray-300 rounded">

        <label for="prodi" class="text-sm font-semibold mb-1">
            Prodi:
        </label>

        <input type="text"
            id="prodi"
            name="prodi"
            value="<?= $data['prodi'] ?>"
            required
            class="mb-4 p-2 border border-gray-300 rounded">

        <label for="angkatan" class="text-sm font-semibold mb-1">
            Angkatan:
        </label>

        <input type="number"
            id="angkatan"
            name="angkatan"
            value="<?= $data['angkatan'] ?>"
            min="2000"
            max="2100"
            required
            class="mb-4 p-2 border border-gray-300 rounded">

        <label for="ipk" class="text-sm font-semibold mb-1">
            IPK:
        </label>

        <input type="number"
            id="ipk"
            name="ipk"
            value="<?= $data['ipk'] ?>"
            min="0"
            max="4"
            step="0.01"
            required
            class="mb-4 p-2 border border-gray-300 rounded">

        
        <label for="status_mahasiswa"
            class="text-sm font-semibold mb-1">
            Status Mahasiswa:
        </label>

        <select id="status_mahasiswa"
            name="status_mahasiswa"
            required
            class="mb-6 p-2 border border-gray-300 rounded">

            <option value="Aktif"
                <?= $data['status_mahasiswa'] == 'Aktif' ? 'selected' : '' ?>>
                Aktif
            </option>

            <option value="Cuti"
                <?= $data['status_mahasiswa'] == 'Cuti' ? 'selected' : '' ?>>
                Cuti
            </option>

            <option value="Lulus"
                <?= $data['status_mahasiswa'] == 'Lulus' ? 'selected' : '' ?>>
                Lulus
            </option>

        </select>

        <button type="submit"
            class="bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700">
            Simpan Perubahan
        </button>

    </form>

</body>

</html>