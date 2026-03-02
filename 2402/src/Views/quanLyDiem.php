<?php
// require_once __DIR__ . '/../../vendor/autoload.php';

// use App\Config\Database;
// use App\Controllers\StudentController;
// use App\Controllers\LopHocController;
// use App\Controllers\MonHocController;
// use App\Controllers\LoaiKiemTraController;
// use App\Controllers\DiemController;

// $studentController = new StudentController();
// $studentController->submitRequest();
// $students = $studentController->getAll();

// $lopController = new LopHocController();
// $lopController->submitRequest();
// $lopHocs = $lopController->getAll();

// $monController = new MonHocController();
// $monController->submitRequest();
// $monHocs = $monController->getAll();

// $loaiController = new LoaiKiemTraController();
// $loaiController->submitRequest();
// $loaiKiemTraIds = $loaiController->getAll();

// $diemController = new DiemController;
// $diemController->submitRequest();
// $diems = $diemController->getAll();

// $tbTungMons = [];
// if (isset($_POST['tinhTrungBinhTungMonHocKy'])) {
//     $tbTungMons = $diemController->getTrungBinhTungMonHocKy(
//         $_POST['hocSinhId'],
//         $_POST['hocKy']
//     );
// }

// $tbCacMons = [];
// if (isset($_POST['tinhTrungBinhCacMonHocKy'])) {
//     $tbCacMons = $diemController->getTrungBinhCacMonHocKy(
//         $_POST['hocSinhId'],
//         $_POST['hocKy']
//     );
// }

// $dieuKienTNHSs = [];
// if (isset($_POST['kiemTraDieuKienTNHS'])) {
//     $dieuKienTNHSs = $diemController->getDieuKienTNHS(
//         $_POST['hocSinhId'],
//         $_POST['hocKy']
//     );
// }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nhập Điểm</title>
    <link rel="stylesheet" href="../../css/style.css">

</head>

<body>
    <?php include_once('../../head.php'); ?>
    <div class="container1">
        <div class="left">
            <h2>NHẬP ĐIỂM HỌC SINH</h2>


            <form method="POST">

                <label>Học kỳ:</label>
                <select name="hocKy" required>
                    <option value="1">Học kỳ 1</option>
                    <option value="2">Học kỳ 2</option>
                </select>
                <br><br>

                <label>Học sinh:</label>
                <select name="hocSinhId" required>
                    <?php foreach ($students as $student): ?>
                    <option value="<?= $student['hoc_sinh_id'] ?>">
                        <?= $student['ho_ten'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br><br>

                <label>Lớp:</label>
                <select name="lopId" required>
                    <?php foreach ($lopHocs as $lopHoc): ?>
                    <option value="<?= $lopHoc['lop_id'] ?>">
                        <?= $lopHoc['ten_lop'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br><br>

                <label>Môn học:</label>
                <select name="monId" required>
                    <?php foreach ($monHocs as $monHoc): ?>
                    <option value="<?= $monHoc['mon_id'] ?>">
                        <?= $monHoc['ten_mon'] ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <br><br>
                <label>Loại kiểm tra:</label>
                <select name="loaiKiemTraId" required>
                    <?php foreach ($loaiKiemTras as $loaiKiemTra): ?>
                    <option value="<?= $loaiKiemTra['loai_kt_id'] ?>">
                        <?= $loaiKiemTra['ten_loai'] ?> (Hệ số <?= $loaiKiemTra['he_so'] ?>)
                    </option>
                    <?php endforeach; ?>
                </select>
                <br><br>

                <label>Năm học:</label>
                <input type="text" name="namHoc" placeholder="2025-2026" required>
                <br><br>

                <label>Điểm:</label>
                <input type="number" step="0.1" min="0" max="10" name="diem" required>
                <br><br>

                <input type="submit" name="submitDiem" value="Lưu điểm">

            </form>
            <hr>
            <h2> Tính điểm trung bình của HS </h2>
            <form method="POST">
                <label>Học sinh:</label>
                <select name="hocSinhId" required>
                    <?php foreach ($students as $student): ?>
                    <option value="<?= $student['hoc_sinh_id'] ?>">
                        <?= $student['ho_ten'] ?>
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
                <input type="submit" name="tinhTrungBinhTungMonHocKy" value="Tính trung bình học kì từng môn">
                <input type="submit" name="tinhTrungBinhCacMonHocKy" value="Tính trung bình học kì các môn">

                <?php if (isset($_POST['tinhTrungBinhTungMonHocKy']) && !empty($tbTungMons)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Tên HS</th>
                            <th>Tên Môn</th>
                            <th>Học kỳ</th>
                            <th>TBMôn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tbTungMons as $tbTungMon): ?>

                        <tr>
                            <td><?= $tbTungMon['TenHS'] ?></td>
                            <td><?= $tbTungMon['TenMon'] ?></td>
                            <td><?= $tbTungMon['HocKy'] ?></td>
                            <td><?= $tbTungMon['TBMon'] ?></td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <?php endif; ?>
                <?php if (isset($_POST['tinhTrungBinhCacMonHocKy']) && !empty($tbCacMons)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Tên HS</th>
                            <th>Học kỳ</th>
                            <th>TBMôn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tbCacMons as $tbCacMon): ?>

                        <tr>
                            <td><?= $tbCacMon['TenHS'] ?></td>
                            <td><?= $tbCacMon['HocKy'] ?></td>
                            <td><?= $tbCacMon['TBCaNam'] ?></td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <?php endif; ?>

            </form>
        </div>
        <div class="right">
            <h3>Danh Sách quản lý</h3>
            <table>
                <thead>
                    <tr>
                        <th>Học kỳ</th>
                        <th>Tên HS</th>
                        <th>Lớp</th>
                        <th>Điểm</th>
                        <th>Loại kiểm tra</th>
                        <th>Môn</th>
                        <th>Năm học</th>
                        <th>Chức nắng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($diems as $diem): ?>

                    <tr>
                        <td><?= $diem['hoc_ky'] ?></td>
                        <td><?= $diem['ho_ten'] ?></td>
                        <td><?= $diem['ten_lop'] ?></td>
                        <td><?= $diem['diem'] ?></td>
                        <td><?= $diem['ten_loai'] ?></td>
                        <td><?= $diem['ten_mon'] ?></td>
                        <td><?= $diem['nam_hoc'] ?></td>

                        <td class="actions">

                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <hr>
            <h2> Kiểm tra điều kiện Tốt nghiệp của HS </h2>
            <form method="POST">
                <label>Học sinh:</label>
                <select name="hocSinhId" required>
                    <?php foreach ($students as $student): ?>
                    <option value="<?= $student['hoc_sinh_id'] ?>">
                        <?= $student['ho_ten'] ?>
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
                <input type="submit" name="kiemTraDieuKienTNHS" value="Kiểm tra điều kiện tốt nghiệp HS">
                <?php if (isset($_POST['kiemTraDieuKienTNHS']) && !empty($dieuKienTNHSs)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Tên HS</th>
                            <th>Học kỳ</th>
                            <th>TB cả năm</th>
                            <th>Học lực</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dieuKienTNHSs as $dieuKienTNHS): ?>

                        <tr>
                            <td><?= $dieuKienTNHS['TenHS'] ?></td>
                            <td><?= $dieuKienTNHS['HocKy'] ?></td>
                            <td><?= $dieuKienTNHS['TBCaNam'] ?></td>
                            <td><?= $dieuKienTNHS['HocLuc'] ?></td>

                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <?php endif; ?>
        </div>
    </div>

</body>

</html>