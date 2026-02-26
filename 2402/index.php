<?php
require_once "src/Controllers/StudentController.php";
require_once "src/Controllers/TeacherController.php";
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <title>DEMO</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include_once('head.php'); ?>
    <div class="container">
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
                <input type="submit" name="showListStudent" value="Hiện DSSV">

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
                <input type="submit" name="showListTeacher" value="Hiện DSGV">


            </form>
        </div>
    </div>





    <form method="POST"><br><br>
        <button onclick="window.location.href='index.php'">Làm mới</button>
        <button type="submit" name="clearData">Xóa dữ liệu</button>
    </form>


</body>

</html>