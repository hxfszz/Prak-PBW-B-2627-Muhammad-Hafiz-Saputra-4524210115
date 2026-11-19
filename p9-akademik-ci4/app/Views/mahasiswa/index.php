<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="nav nav-pills mb-4">
            <a class="nav-link active" href="<?= base_url('mahasiswa'); ?>">Mahasiswa</a>
            <a class="nav-link" href="#">Dosen</a>
            <a class="nav-link" href="#">Mata Kuliah</a>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mb-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title">Mahasiswa</h3>
                        <p class="card-text fs-4 mb-0">120</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title">Dosen</h3>
                        <p class="card-text fs-4 mb-0">25</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title">Mata Kuliah</h3>
                        <p class="card-text fs-4 mb-0">40</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h3 class="card-title">KRS</h3>
                        <p class="card-text fs-4 mb-0">350</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="divider">
        <h2>Data Mahasiswa</h2>
        <a href="<?= base_url('mahasiswa/tambah'); ?>" 
            class="btn btn-primary">
            Tambah Mahasiswa
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Prodi</th>
                        <th>Angkatan</th>
                        <th>IPK</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa as $mhs): ?>
                        <tr>
                            <td><?= esc($mhs['nim']); ?></td>
                            <td><?= esc($mhs['nama']); ?></td>
                            <td><?= esc($mhs['jenis_kelamin']); ?></td>
                            <td><?= esc($mhs['prodi']); ?></td>
                            <td><?= esc($mhs['angkatan']); ?></td>
                            <td><?= esc($mhs['ipk']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>