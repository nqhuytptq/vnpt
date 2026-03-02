<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\TeacherController;
use App\Controllers\LopHocController;
use App\Controllers\MonHocController;
use App\Controllers\GiangDayController;


$teacherController = new TeacherController();
$teacherController->submitRequest();
$teachers = $teacherController->getAll();


$monController = new MonHocController();
$monController->submitRequest();
$monHocs = $monController->getAll();

$lopController = new LopHocController();
$lopController->submitRequest();
$lopHocs = $lopController->getAll();

$giangDayController = new GiangDayController();
$giangDayController->submitRequest();
$giangDays = $giangDayController->getAll();

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

    <div class="container">
        <h1>QUẢN LÝ GIẢNG DẠY</h1>

        <div class="form-section">
            <h3>Thêm Gv giảng dạy bộ môn các lớp</h3>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Giáo viên:</label>
                    <select name="gvId" required>
                        <?php foreach ($teachers as $teacher): ?>
                            <option value="<?= $teacher['gv_id'] ?>">
                                <?= $teacher['ho_ten'] ?>
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
                    <label>Môn:</label>
                    <select name="monId" required>
                        <?php foreach ($monHocs as $monHoc): ?>
                            <option value="<?= $monHoc['mon_id'] ?>">
                                <?= $monHoc['ten_mon'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <br><br>
                </div>
                <div class="form-group">
                    <label>Năm học:</label>
                    <input type="text" name="namHoc" placeholder="Ví dụ: 2025-2026">
                    <br><br>
                </div>
                <button type="submit" name="submitGiangDay" class="btn-add">Thêm </button>
            </form>
        </div>
        <hr>

        <h3>Danh Sách quản lý</h3>
        <table>
            <thead>
                <tr>
                    <th>Mã GV</th>
                    <th>Họ Tên</th>
                    <th>Lớp</th>
                    <th>Môn</th>
                    <th>Năm học</th>

                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($giangDays as $giangDay): ?>

                    <tr>
                        <td><?= $giangDay['gv_id'] ?></td>
                        <td><?= $giangDay['ho_ten'] ?></td>
                        <td><?= $giangDay['ten_lop'] ?></td>
                        <td><?= $giangDay['ten_mon'] ?></td>
                        <td><?= $giangDay['nam_hoc'] ?></td>
                        <td class="actions">

                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</body>

</html>