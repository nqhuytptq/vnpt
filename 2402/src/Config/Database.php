<?php

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    const HOST = 'localhost';
    const DB_NAME = 'bai_11_1';
    const USERNAME = 'root';
    const PASSWORD = '24082002';
    public function connect()
    {
        try {
            $connect = "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME . ";charset=utf8";
            $pdo = new PDO($connect, self::USERNAME, self::PASSWORD);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }
}
// $diemController = new DiemController();
// $studentController = new StudentController();
// $lopController = new LopHocController();
// $monController = new MonHocController();
// $loaiController = new LoaiKiemTraController();
// $hocSinhLopController = new HocSinhLopController();
// $giangDayController = new GiangDayController();
// $khoiMonController = new KhoiMonController();
// $teacherController = new TeacherController();

// $students = $studentController->getAll();
// $lopHocs = $lopController->getAll();
// $monHocs = $monController->getAll();
// $loaiKiemTraIds = $loaiController->getAll();
// $hocSinhLops = $hocSinhLopController->getAll();
// $giangDays = $giangDayController->getAll();
// $khoiMons = $khoiMonController->getAll();
// $teachers = $teacherController->getAll();