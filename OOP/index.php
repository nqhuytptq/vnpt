<!DOCTYPE html>
<html lang="en">

<head>
    <title>DEMO</title>
</head>

<body>

    <?php include('process.php'); ?>

    <form action="" method="POST">
        <h1> Tổng số giáo viên và sinh viên: <?php echo Person::$total; ?> </h1>
        <h1>Nhập thông tin giáo viên/sinh viên</h1>
        <label>Tên:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label>Tuổi:</label>
        <input type="text" id="age" name="age" required><br><br>
        <label>Mã ID:</label>
        <input type="text" id="id" name="id" required><br><br>
        <label>Thành phần:</label>
        <select name="type">
            <option name="type" value="student">Sinh viên</option>
            <option name="type" value="teacher">Giáo viên</option>
        </select><br><br>

        <input type="submit" name="submit" value="Gửi">

    </form>
    <form method="POST">
        <input type="submit" name="showListStudent" value="Hiện DSSV">
        <input type="submit" name="showListTeacher" value="Hiện DSGV">
        <button onclick="window.location.href='index.php'">Làm mới</button>
        <button type="submit" name="clearData">Xóa dữ liệu</button>
    </form>


</body>

</html>