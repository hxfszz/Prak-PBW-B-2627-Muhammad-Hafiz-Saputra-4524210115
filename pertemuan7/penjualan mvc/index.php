<?php

require_once 'koneksi.php';
require_once 'controllers/ProdukController.php';

$controller = new ProdukController($koneksi);

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'create':
        $controller->create();
        break;

    case 'store':
        $controller->store();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'update':
        $controller->update();
        break;

    default:
        $controller->index();
        break;
}

?>