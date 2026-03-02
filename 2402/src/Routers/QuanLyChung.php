<?php

namespace App\Routers;

use App\Config\Database;
use App\Controllers\TeacherController;
use App\Controllers\StudentController;
use App\Controllers\KhoiController;
use App\Controllers\MonHocController;
use App\Controllers\LoaiKiemTraController;
use App\Controllers\LopHocController;
use App\Controllers\DiemController;



class QuanLyChung
{
    public static function run()
    {

        $studentController = new StudentController();
        $students = $studentController->process();

        $teacherController = new TeacherController();
        $teachers = $teacherController->process();

        $khoiController = new KhoiController;
        $khois = $khoiController->process();

        $monController = new MonHocController();
        $monHocs = $monController->process();

        $loaiController = new LoaiKiemTraController();
        $loaiKiemTras = $loaiController->process();


        //

        $lopController = new LopHocController();
        $lopHocs = $lopController->process();

        $diemController = new DiemController;
        $diems = $diemController->process();

        require __DIR__ . '/../Views/quanLyChung.php';
    }
}
