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

            <form action="" method="POST">
                <input type="submit" name="showListStudent" value="Hiện DSHS">
                <?php if (!empty($students)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Tên HS</th>
                            <th>Ngày sinh</th>
                            <th>Phái</th>
                            <th> Chức năng </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>

                        <tr>
                            <td><?= $student['ho_ten'] ?></td>
                            <td><?= $student['ngay_sinh'] ?></td>
                            <td><?= $student['phai'] ?></td>
                            <td></td>

                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <?php endif; ?>
            </form>

            <form action="" method="POST">
                <h1> Quản lý khối: </h1>
                <h1>Nhập thông tin Khối</h1>
                <label>Tên khối:</label>
                <input type="text" id="name" name="nameKhoi" required><br><br>
                <input type="submit" name="submitKhoi" value="Gửi">
            </form>
            <form method="POST">
                <input type="submit" name="showListKhoi" value="Hiện DS các khối">
            </form>
            <?php if (!empty($khois)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Tên khối</th>
                        <th> Chức năng </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($khois as $khoi): ?>

                    <tr>
                        <td> Khối <?= $khoi['ten_khoi'] ?></td>
                        <td></td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?php endif; ?>

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
            <?php if (!empty($loaiKiemTras)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Tên loại Kiểm Tra</th>
                        <th>Hệ số </th>
                        <th> Chức năng </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($loaiKiemTras as $loaiKiemTra): ?>

                    <tr>
                        <td><?= $loaiKiemTra['ten_loai'] ?></td>
                        <td><?= $loaiKiemTra['he_so'] ?></td>
                        <td></td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?php endif; ?>
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
            <?php if (!empty($teachers)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Tên GV</th>
                        <th>Địa chỉ</th>
                        <th> Chức năng </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teachers as $teacher): ?>

                    <tr>
                        <td><?= $teacher['ho_ten'] ?></td>
                        <td><?= $teacher['dia_chi'] ?></td>
                        <td></td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?php endif; ?>
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
            <?php if (!empty($monHocs)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Tên môn học</th>
                        <th> Chức năng </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($monHocs as $monHoc): ?>

                    <tr>
                        <td><?= $monHoc['ten_mon'] ?></td>
                        <td></td>

                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?php endif; ?>
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