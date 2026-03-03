<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản Lý GVCN</title>
    <link rel="stylesheet" href="/vnpt/2402/css/style.css">


</head>

<body>
    <?php include_once __DIR__ . '/../../head.php'; ?>

    <div class="container1">
        <div class="left">
            <h1>QUẢN LÝ GVCN</h1>

            <div class="form-section">
                <h3>Thêm GVCN các lớp</h3>
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

                        <label>Khối:</label>
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
                        <label>Tên lớp:</label>
                        <input type="text" name="tenLop" placeholder="Ví dụ: 12C1">
                        <br><br>
                    </div>
                    <div class="form-group">
                        <label>Năm học:</label>
                        <input type="text" name="namHoc" placeholder="Ví dụ: 2025-2026">
                        <br><br>
                    </div>
                    <button type="submit" name="submitLopHoc" class="btn-add">Thêm </button>
                </form><br>
                <form method="POST">
                    <button type="submit" name="showListLopHoc" class="btn-add">Hiện DS các lớp</button>
                </form>
            </div>
            <hr>
            <h2> In phiếu điểm cho HS </h2>
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
                <input type="submit" name="inPhieuDiem" value="In phiếu điểm">
                <?php if (!empty($phieuDiems)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Tên HS</th>
                            <th>Ngày sinh</th>
                            <th>Tên lớp</th>
                            <th>Năm học</th>
                            <th>Tên GVCN</th>
                            <th>Học kỳ</th>
                            <th>Tên môn</th>
                            <th>TB Môn</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($phieuDiems as $phieuDiem): ?>

                        <tr>
                            <td><?= $phieuDiem['TenHS'] ?></td>
                            <td><?= $phieuDiem['NgaySinh'] ?></td>
                            <td><?= $phieuDiem['TenLop'] ?></td>
                            <td><?= $phieuDiem['NamHoc'] ?></td>
                            <td><?= $phieuDiem['TenGVCN'] ?></td>
                            <td><?= $phieuDiem['HocKy'] ?></td>
                            <td><?= $phieuDiem['TenMon'] ?></td>
                            <td><?= $phieuDiem['TBMon'] ?></td>


                            <?php endforeach; ?>

                    </tbody>
                </table>
                <?php endif; ?>

        </div>
        <div class="right">
            <?php if (!empty($lopHocs)) : ?>
            <hr>

            <h3>Danh Sách quản lý</h3>
            <table>
                <thead>
                    <tr>
                        <th>GVCN</th>
                        <th>Khối</th>
                        <th>Lớp</th>
                        <th>Năm học</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lopHocs as $lopHoc): ?>

                    <tr>
                        <td><?= $lopHoc['ho_ten'] ?></td>
                        <td><?= $lopHoc['ten_khoi'] ?></td>
                        <td><?= $lopHoc['ten_lop'] ?></td>
                        <td><?= $lopHoc['nam_hoc'] ?></td>
                        <td class="actions">

                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>