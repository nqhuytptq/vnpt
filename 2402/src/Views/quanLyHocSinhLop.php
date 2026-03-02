<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\HocSinhLopController;
use App\Controllers\StudentController;
use App\Controllers\LopHocController;

$studentController = new StudentController();
$studentController->submitRequest();
$students = $studentController->getAll();

$lopController = new LopHocController();
$lopController->submitRequest();
$lopHocs = $lopController->getAll();

$hocSinhLopController = new HocSinhLopController();
$hocSinhLopController->submitRequest();
$hocSinhLops = $hocSinhLopController->getAll();


$tiLeHSs = [];
if (isset($_POST['tinhTiLeHocSinhCuaLopTheoHocKy'])) {
    $tiLeHSs = $hocSinhLopController->getTiLeHocSinhCuaLopTheoHocKy(
        $_POST['lopId'],
        $_POST['hocKy']
    );
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản Lý Lớp Học</title>

    <link rel="stylesheet" href="../../css/style.css">


</head>

<body>
    <?php include_once('../../head.php'); ?>

    <div class="container1">
        <div class="left">

            <h1>QUẢN LÝ LỚP HỌC</h1>
            <div class="form-section">
                <h3>Thêm Học Sinh</h3>
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Học sinh:</label>
                        <select name="hocSinhId" required>
                            <?php foreach ($students as $student): ?>
                                <option value="<?= $student['hoc_sinh_id'] ?>">
                                    <?= $student['ho_ten'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <br><br>
                    </div>


                    <div class="form-group">

                        <label>Lớp:</label>
                        <select name="lopId" required>
                            <?php foreach ($lopHocs as $lopHoc): ?>
                                <option value="<?= $lopHoc['lop_id'] ?>">
                                    <?= $lopHoc['ten_lop'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <br><br>
                    </div>
                    <div class="form-group">

                        <label>Năm học:</label>
                        <input type="text" name="namHoc" required>
                        <br><br>
                    </div>
                    <button type="submit" name="submitHocSinhLop" class="btn-add">Thêm học sinh vào lớp</button>
                </form>
                <hr>
                <h2> Tính tỉ lệ HS của các lớp</h2>
                <form method="POST">
                    <label>Lớp:</label>
                    <select name="lopId" required>
                        <?php foreach ($lopHocs as $lopHoc): ?>
                            <option value="<?= $lopHoc['lop_id'] ?>">
                                <?= $lopHoc['ten_lop'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                    <label>Học kỳ:</label>
                    <select name="hocKy" required>
                        <option value="1">1</option>
                        <option value="2">2</option>

                    </select>
                    <br><br>
                    <input type="submit" name="tinhTiLeHocSinhCuaLopTheoHocKy"
                        value="Tính tỉ lệ HS của lớp theo học kì">

                    <?php if (isset($_POST['tinhTiLeHocSinhCuaLopTheoHocKy']) && !empty($tiLeHSs)): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Tên lớp</th>
                                    <th>Phần trăm HS Giỏi</th>
                                    <th>Phần trăm HS Khá</th>
                                    <th>Phần trăm HS TB</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tiLeHSs as $tiLeHSs): ?>

                                    <tr>
                                        <td><?= $tiLeHSs['TenLop'] ?></td>
                                        <td><?= $tiLeHSs['PhanTramHocSinhGioi'] ?></td>
                                        <td><?= $tiLeHSs['PhanTramHocSinhKha'] ?></td>
                                        <td><?= $tiLeHSs['PhanTramHocSinhTB'] ?></td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    <?php endif; ?>

                </form>
            </div>

        </div>

        <div class="right">
            <h3>Danh Sách Học Sinh</h3>
            <table>
                <thead>
                    <tr>
                        <th>Mã HS</th>
                        <th>Họ Tên</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th>Lớp</th>
                        <th>Năm học</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hocSinhLops as $hocSinhLop): ?>

                        <tr>
                            <td><?= $hocSinhLop['hoc_sinh_id'] ?></td>
                            <td><?= $hocSinhLop['ho_ten'] ?></td>
                            <td><?= $hocSinhLop['ngay_sinh'] ?></td>
                            <td><?= $hocSinhLop['phai'] ?></td>
                            <td> <?= $hocSinhLop['ten_lop'] ?></td>
                            <td> <?= $hocSinhLop['nam_hoc'] ?></td>

                            <td class="actions">

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>