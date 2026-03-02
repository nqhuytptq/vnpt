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
        $students = $studentController->process();
        $students = $studentController->getAllData();

        $monController = new MonHocController();
        $monHocs = $monController->process();
        $monHocs = $monController->getAllData();

        $loaiController = new LoaiKiemTraController();
        $loaiKiemTras = $loaiController->process();
        $loaiKiemTras = $loaiController->getAllData();


        $lopController = new LopHocController();
        $lopHocs = $lopController->process();
        $lopHocs = $lopController->getAllData();

        $diemController = new DiemController;
        $diems = $diemController->process();
        $diems = $diemController->getAllData();


        require __DIR__ . '/../Views/quanlyDiem.php';
    }
}
