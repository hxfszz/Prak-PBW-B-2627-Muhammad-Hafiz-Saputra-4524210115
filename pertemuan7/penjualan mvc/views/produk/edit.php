<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Produk</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-lg mx-auto">

        <div class="bg-white rounded-xl shadow-md p-6">

            <h1 class="text-2xl font-bold text-gray-800 mb-6">
                Edit Produk
            </h1>

            <form action="index.php?action=update" method="POST">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $data['id']; ?>">

                <div class="mb-4">

                    <label
                        for="nama_produk"
                        class="block font-semibold mb-1">
                        Nama Produk
                    </label>

                    <input
                        type="text"
                        id="nama_produk"
                        name="nama_produk"
                        value="<?= htmlspecialchars($data['nama_produk']); ?>"
                        required
                        class="w-full border border-gray-300 rounded-lg p-2">

                </div>

                <div class="mb-4">

                    <label
                        for="harga"
                        class="block font-semibold mb-1">
                        Harga
                    </label>

                    <input
                        type="number"
                        id="harga"
                        name="harga"
                        min="0"
                        value="<?= $data['harga']; ?>"
                        required
                        class="w-full border border-gray-300 rounded-lg p-2">

                </div>

                <div class="mb-6">

                    <label
                        for="stok"
                        class="block font-semibold mb-1">
                        Stok
                    </label>

                    <input
                        type="number"
                        id="stok"
                        name="stok"
                        min="0"
                        value="<?= $data['stok']; ?>"
                        required
                        class="w-full border border-gray-300 rounded-lg p-2">

                </div>

                <div class="flex gap-2">

                    <button
                        type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        Simpan Perubahan
                    </button>

                    <a
                        href="index.php"
                        class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                        Kembali
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>