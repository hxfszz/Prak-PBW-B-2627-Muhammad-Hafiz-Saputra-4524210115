<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Produk</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-lg mx-auto">

        <div class="bg-white rounded-xl shadow-md p-6">

            <h1 class="text-2xl font-bold text-gray-800 mb-6">
                Tambah Produk
            </h1>

            <form action="index.php?action=store" method="POST">

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
                        required
                        class="w-full border border-gray-300 rounded-lg p-2">
                </div>

                <div class="flex gap-2">

                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Simpan
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