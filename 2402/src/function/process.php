<?php
require_once __DIR__ . '/../../vendor/autoload.php';

// use App\Config\Database;
// use App\Controllers\TeacherController;
use App\Controllers\StudentController;
// use App\Controllers\KhoiController;
// use App\Controllers\MonHocController;
// use App\Controllers\LoaiKiemTraController;
// use App\Controllers\LopHocController;
// use App\Controllers\GiangDayController;
// use App\Controllers\KhoiMonController;
// use App\Controllers\HocSinhLopController;
// use App\Controllers\DiemController;
$studentController = new StudentController();
$students = $studentController->getAll();

if (isset($_POST['submitHS'])) {
    $studentController->store(
        $_POST['nameHS'],
        $_POST['ngaySinh'],
        $_POST['phai']
    );
}

if (isset($_POST['showListStudent'])) {
    $studentController->index();
}
