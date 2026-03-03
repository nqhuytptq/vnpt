<?php

namespace App\Routers;

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\HocSinhLopController;
use App\Controllers\StudentController;
use App\Controllers\LopHocController;



class QuanLyHocSinhLop
{
    public static function run()
    {

        $studentController = new StudentController();
        $students = $studentController->getAllData();

        $lopController = new LopHocController();
        $lopHocs = $lopController->getAllData();



        $hocSinhLopController = new HocSinhLopController();
        $result = $hocSinhLopController->process();
        $hocSinhLops = $result['hocSinhLops'];
        $tiLeHSs = $result['tiLeHSs'];


        require __DIR__ . '/../Views/quanLyHocSinhLop.php';
    }
}