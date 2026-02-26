<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Config\Database;
use App\Controllers\KhoiController;
use App\Controllers\MonHocController;
use App\Controllers\KhoiMonController;


$khoiController = new KhoiController;
$khoiController->submitRequest();
$khois = $khoiController->getAll();

$monController = new MonHocController();
$monController->submitRequest();
$monHocs = $monController->getAll();

$khoiMonController = new KhoiMonController();
$khoiMonController->submitRequest();
$khoiMons = $khoiMonController->getAll();

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản Lý môn học các khối</title>
    <link rel="stylesheet" href="../../css/style.css">


</head>

<body>
    <?php include_once('../../head.php'); ?>

    <div class="container">
        <h1>QUẢN LÝ MÔN HỌC CÁC KHỐI</h1>

        <div class="form-section">
            <h3>Thêm Môn học cho các khối</h3>
            <form>
                <div class="form-group">
                    <label>Khối</label>
                    <select name="khoiId" required>
                        <?php foreach ($khois as $khoi): ?>
                        <option value="<?= $khoi['khoi_id'] ?>">
                            <?= $khoi['ten_khoi'] ?>
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

                <button type="submitKhoiMon" class="btn-add">Thêm </button>
            </form>
        </div>
        <hr>
        <h3>Danh Sách quản lý</h3>
        <table>
            <thead>
                <tr>
                    <th>Khối</th>
                    <th>Môn</th>
                    <th>Chức năng</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($khoiMons as $khoiMon): ?>

                <tr>
                    <td><?= $khoiMon['ten_khoi'] ?></td>
                    <td><?= $khoiMon['ten_mon'] ?></td>
                    <td class="actions">

                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</body>

</html>