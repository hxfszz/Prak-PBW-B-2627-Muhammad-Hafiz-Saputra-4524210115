<?php

include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

echo "<h2>Data Mahasiswa</h2>";

while ($data = mysqli_fetch_assoc($query)) {

    echo "NIM          : " . $data['nim'];
    echo "<br>";

    echo "Nama         : " . $data['nama'];
    echo "<br>";

    echo "Email        : " . $data['email'];
    echo "<br>";

    echo "No. Telepon  : " . $data['no_telepon'];
    echo "<br>";

    echo "Prodi        : " . $data['prodi'];
    echo "<br>";

    echo "Angkatan     : " . $data['angkatan'];
    echo "<br>";

    echo "IPK          : " . $data['ipk'];
    echo "<br>";

    echo "Status       : " . $data['status_mahasiswa'];
    echo "<br>";

    echo "-----------------------------";
    echo "<br><br>";
}

?>