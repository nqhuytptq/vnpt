<?php

namespace App\Routers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\KhoiController;
use App\Controllers\MonHocController;
use App\Controllers\KhoiMonController;



class QuanLyKhoiMon
{
    public static function run()
    {


        $khoiController = new KhoiController;
        $khois = $khoiController->getAllData();

        $monController = new MonHocController();
        $monHocs = $monController->getAllData();

        $khoiMonController = new KhoiMonController();
        $khoiMons = $khoiMonController->process();

        require __DIR__ . '/../Views/quanLykhoiMon.php';
    }
}