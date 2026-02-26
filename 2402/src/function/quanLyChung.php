<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\TeacherController;
use App\Controllers\StudentController;
use App\Controllers\KhoiController;
use App\Controllers\MonHocController;
use App\Controllers\LoaiKiemTraController;

$studentController = new StudentController();
$studentController->submitRequest();
$students = $studentController->getAll();

$teacherController = new TeacherController();
$teacherController->submitRequest();
$teachers = $teacherController->getAll();

$khoiController = new KhoiController;
$khoiController->submitRequest();
$khois = $khoiController->getAll();

$monController = new MonHocController();
$monController->submitRequest();
$monHocs = $monController->getAll();

$loaiController = new LoaiKiemTraController();
$loaiController->submitRequest();
$loaiKiemTraIds = $loaiController->getAll();


?>
<html lang="en">


<head>
    <title>DEMO</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <?php include_once('../../head.php'); ?>
    <div class="container1">
        <div class="left">
            <form action="" method="POST">
                <h1> Quản lý Học sinh: </h1>
                <h1>Nhập thông tin Học sinh</h1>
                <label>Họ và tên:</label>
                <input type="text" id="name" name="nameHS" required><br><br>
                <label for="birthday">Ngày sinh:</label>
                <input type="date" id="ngay_sinh" name="ngaySinh" required><br><br>
                <label>Phái:</label>
                <select name="phai" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select><br><br>
                <input type="submit" name="submitHS" value="Gửi">
            </form>
            <form method="POST">
                <input type="submit" name="showListStudent" value="Hiện DSHS">
            </form>

            <form action="" method="POST">
                <h1> Quản lý khối: </h1>
                <h1>Nhập thông tin Khối</h1>
                <label>Tên khối:</label>
                <input type="text" id="name" name="nameKhoi" required><br><br>
                <input type="submit" name="submitKhoi" value="Gửi">
            </form>
            <form method="POST">
                <input type="submit" name="showListKhoi" value="Hiện DSLK">
            </form>

            <form action="" method="POST">
                <h1> Quản lý loại bài kiểm tra: </h1>
                <h1>Nhập thông tin:</h1>
                <label>Tên loại bài kiểm tra:</label>
                <input type="text" id="name" name="nameLoaiKiemTra" required><br><br>
                <label>Hệ số </label>
                <select name="heSoLoaiKiemTra" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select><br><br>
                <input type="submit" name="submitLoaiKiemTra" value="Gửi">
            </form>
            <form method="POST">
                <input type="submit" name="showListLoaiKiemTra" value="Hiện DS loại bài kiểm tra">
            </form>
        </div>
        <div class="right">
            <form action="" method="POST">
                <h1> Quản lý Giáo viên: </h1>
                <h1>Nhập thông tin Giáo viên</h1>
                <label>Họ và tên:</label>
                <input type="text" id="name" name="nameGV" required><br><br>
                <label>Địa chỉ:</label>
                <input type="text" id="address" name="address" required><br><br>
                <input type="submit" name="submitGV" value="Gửi">
            </form>
            <form method="POST">
                <input type="submit" name="showListTeacher" value="Hiện DSGV">
            </form>
            <form action="" method="POST">
                <h1> Quản lý môn học: </h1>
                <h1>Nhập thông tin Môn học</h1>
                <label>Tên môn học:</label>
                <input type="text" id="name" name="nameMonHoc" required><br><br>
                <input type="submit" name="submitMonHoc" value="Gửi">
            </form>
            <form method="POST">
                <input type="submit" name="showListMonHoc" value="Hiện DSMH">

            </form>
        </div>
    </div>





    <form method="POST"><br><br>
        <button onclick="window.location.href='index.php'">Làm mới</button>
        <input type="submit" name="showListLopHoc" value="Hiện DS lớp học">
        <input type="submit" name="showListGiangDay" value="Hiện DS gv dạy các lớp">
        <input type="submit" name="showListKhoiMon" value="Hiện DS các môn của khối">
        <input type="submit" name="showListHocSinhLop" value="Hiện DS HS từng lớp">


        <button type="submit" name="clearData">Xóa dữ liệu</button>
    </form>


</body>

</html>