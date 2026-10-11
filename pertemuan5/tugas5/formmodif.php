<form action="simpan.php" method="post">

    NIM:
    <input type="text" name="nim" maxlength="15" required>
    <br><br>

    Nama:
    <input type="text" name="nama" required>
    <br><br>

    Email:
    <input type="email" name="email" required>
    <br><br>

    No. Telepon:
    <input type="text" name="no_telepon" maxlength="15" required>
    <br><br>

    Prodi:
    <input type="text" name="prodi" required>
    <br><br>

    Angkatan:
    <input type="number" name="angkatan" min="2000" max="2100" required>
    <br><br>

    IPK:
    <input type="number" name="ipk" min="0" max="4" step="0.01" required>
    <br><br>

    Status Mahasiswa:
    <select name="status_mahasiswa" required>
        <option value="">-- Pilih Status --</option>
        <option value="Aktif">Aktif</option>
        <option value="Cuti">Cuti</option>
        <option value="Lulus">Lulus</option>
    </select>
    <br><br>

    <button type="submit">Simpan</button>

</form>