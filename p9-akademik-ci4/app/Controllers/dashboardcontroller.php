<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'jumlahMahasiswa' => 120,
            'jumlahDosen'     => 25,
            'jumlahMK'        => 40,
            'jumlahKRS'       => 350
        ];

        return view('dashboard', $data);
    }
}
