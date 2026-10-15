<?php
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/controllers/MahasiswaController.php';

$controller = new MahasiswaController($koneksi);
$controller->index();
?>