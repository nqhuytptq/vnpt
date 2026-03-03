<?php

namespace App\Routers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\TeacherController;
use App\Controllers\LopHocController;
use App\Controllers\MonHocController;
use App\Controllers\GiangDayController;



class QuanLyGiangDay
{
    public static function run()
    {
        $teacherController = new TeacherController();
        $teachers = $teacherController->getAllData();

        $monController = new MonHocController();
        $monHocs = $monController->getAllData();

        $lopController = new LopHocController();
        $lopHocs = $lopController->getAllData();

        $giangDayController = new GiangDayController();
        $giangDays = $giangDayController->process();




        require __DIR__ . '/../Views/quanLyGiangDay.php';
    }
}