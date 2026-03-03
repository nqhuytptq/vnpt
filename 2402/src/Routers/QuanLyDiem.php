<?php

namespace App\Routers;

use App\Controllers\StudentController;
use App\Controllers\MonHocController;
use App\Controllers\LoaiKiemTraController;
use App\Controllers\LopHocController;
use App\Controllers\DiemController;



class QuanLyDiem
{
    public static function run()
    {

        $studentController = new StudentController();
        $students = $studentController->getAllData();

        $monController = new MonHocController();
        $monHocs = $monController->getAllData();

        $loaiController = new LoaiKiemTraController();
        $loaiKiemTras = $loaiController->getAllData();


        $lopController = new LopHocController();
        $lopHocs = $lopController->getAllData();

        $diemController = new DiemController;
        $result = $diemController->process();

        $diems = $result['diems'];
        $tbTungMons = $result['tbTungMons'];
        $tbCacMons = $result['tbCacMons'];
        $dieuKienTNHSs = $result['dieuKienTNHSs'];



        require __DIR__ . '/../Views/quanlyDiem.php';
    }
}