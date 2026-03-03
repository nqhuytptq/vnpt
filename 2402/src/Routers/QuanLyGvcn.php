<?php

namespace App\Routers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\TeacherController;
use App\Controllers\StudentController;
use App\Controllers\KhoiController;
use App\Controllers\LopHocController;
use App\Entity\Khoi;




class QuanLyGvcn
{
    public static function run()
    {
        $teacherController = new TeacherController();
        $teachers = $teacherController->getAllData();

        $studentController = new StudentController();
        $students = $studentController->getAllData();

        $khoiController = new KhoiController();
        $khois = $khoiController->getAllData();

        $lopController = new LopHocController();
        $result = $lopController->process();

        $lopHocs = $result['lopHocs'];
        $phieuDiems = $result['phieuDiems'];

        require __DIR__ . '/../Views/quanLyGvcn.php';
    }
}