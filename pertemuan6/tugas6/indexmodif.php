<?php

include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Data Mahasiswa</title>
</head>

<body class="bg-gray-50 p-6 font-sans text-gray-800">

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">

        <h2 class="text-2xl font-bold mb-4 text-gray-800">
            Data Mahasiswa
        </h2>

        <a href="createmodif.php"
            class="inline-block bg-blue-600 text-white font-semibold px-4 py-2 rounded mb-4 hover:bg-blue-700">
            + Tambah Mahasiswa
        </a>

        <div class="overflow-x-auto">

            <table class="w-full border-collapse border border-gray-200 text-left">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="border border-gray-200 p-3 font-semibold">
                            NIM
                        </th>

                        <th class="border border-gray-200 p-3 font-semibold">
                            Nama
                        </th>

                        <th class="border border-gray-200 p-3 font-semibold">
                            Email
                        </th>

                        <th class="border border-gray-200 p-3 font-semibold">
                            No. Telepon
                        </th>

                        <th class="border border-gray-200 p-3 font-semibold">
                            Prodi
                        </th>

                        <th class="border border-gray-200 p-3 font-semibold">
                            Angkatan
                        </th>

                        <th class="border border-gray-200 p-3 font-semibold">
                            IPK
                        </th>

                        <th class="border border-gray-200 p-3 font-semibold">
                            Status
                        </th>

                        <th class="border border-gray-200 p-3 font-semibold text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php while ($data = mysqli_fetch_assoc($query)) { ?>

                        <tr class="hover:bg-gray-50 transition">

                            <td class="border border-gray-200 p-3">
                                <?= $data['nim']; ?>
                            </td>

                            <td class="border border-gray-200 p-3">
                                <?= $data['nama']; ?>
                            </td>

                            <td class="border border-gray-200 p-3">
                                <?= $data['email']; ?>
                            </td>

                            <td class="border border-gray-200 p-3">
                                <?= $data['no_telepon']; ?>
                            </td>

                            <td class="border border-gray-200 p-3">
                                <?= $data['prodi']; ?>
                            </td>

                            <td class="border border-gray-200 p-3">
                                <?= $data['angkatan']; ?>
                            </td>

                            <td class="border border-gray-200 p-3">
                                <?= $data['ipk']; ?>
                            </td>

                            <td class="border border-gray-200 p-3">

                                <?php if ($data['status_mahasiswa'] == 'Aktif') { ?>

                                    <span class="bg-green-100 text-green-700 px-2 py-1 rounded">
                                        Aktif
                                    </span>

                                <?php } elseif ($data['status_mahasiswa'] == 'Cuti') { ?>

                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded">
                                        Cuti
                                    </span>

                                <?php } else { ?>

                                    <span class="bg-gray-100 text-gray-700 px-2 py-1 rounded">
                                        Lulus
                                    </span>

                                <?php } ?>

                            </td>

                            <td class="border border-gray-200 p-3 text-center">

                                <a href="editmodif.php?nim=<?= $data['nim']; ?>"
                                    class="text-blue-600 hover:text-blue-800 hover:underline font-medium">
                                    Edit
                                </a>

                                <span class="mx-1 text-gray-300">|</span>

                                <a href="deletemodif.php?nim=<?= $data['nim']; ?>"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="text-red-600 hover:text-red-800 hover:underline font-medium">
                                    Hapus
                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>