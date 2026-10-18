<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Produk</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-xl shadow-md p-6">

            <div class="flex justify-between items-center mb-6">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        Daftar Produk
                    </h1>

                    <p class="text-gray-500">
                        Sistem Penjualan Produk
                    </p>
                </div>

                <a
                    href="index.php?action=create"
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    + Tambah Produk
                </a>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full border-collapse">

                    <thead>

                        <tr class="bg-gray-100">

                            <th class="border p-3 text-left">
                                No
                            </th>

                            <th class="border p-3 text-left">
                                Nama Produk
                            </th>

                            <th class="border p-3 text-left">
                                Harga
                            </th>

                            <th class="border p-3 text-left">
                                Stok
                            </th>

                            <th class="border p-3 text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php
                        $no = 1;

                        while ($data = mysqli_fetch_assoc($produk)) {
                        ?>

                            <tr class="hover:bg-gray-50">

                                <td class="border p-3">
                                    <?= $no++; ?>
                                </td>

                                <td class="border p-3 font-medium">
                                    <?= htmlspecialchars($data['nama_produk']); ?>
                                </td>

                                <td class="border p-3">
                                    Rp <?= number_format(
                                            $data['harga'],
                                            0,
                                            ',',
                                            '.'
                                        ); ?>
                                </td>

                                <td class="border p-3">
                                    <?= $data['stok']; ?>
                                </td>

                               <td class="border p-3 text-center">

                                    <a
                                        href="index.php?action=edit&id=<?= $data['id']; ?>"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                        Edit
                                    </a>

                                    <a
                                        href="index.php?action=delete&id=<?= $data['id']; ?>"
                                        onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                        Hapus
                                    </a>

                                </td>

                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>

</html>