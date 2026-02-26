<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<?php
abstract class HinhHoc
{
    protected $name;
    function __construct($name)
    {
        $this->name = $name;
    }
    abstract function dienTich();
    abstract function chuVi();
}

class HinhChuNhat extends HinhHoc
{
    protected $width;
    protected $height;

    function __construct($width, $height)
    {
        parent::__construct("Hình chữ nhật");
        $this->width = $width;
        $this->height = $height;
    }
    function dienTich()
    {
        return $this->width * $this->height;
    }
    function chuVi()
    {
        return 2 * ($this->width + $this->height);
    }
}
class HinhTron extends HinhHoc
{
    protected $r;
    function __construct($r)
    {
        parent::__construct("Hình tròn");
        $this->r = $r;
    }
    function dienTich()
    {
        return pi() * pow($this->r, 2);
    }
    function chuVi()
    {
        return 2 * pi() * $this->r;
    }
}
class HinhVuong extends HinhHoc
{
    protected $a;
    function __construct($a)
    {
        parent::__construct("Hình vuông");
        $this->a = $a;
    }
    function dienTich()
    {
        return pow($this->a, 2);
    }
    function chuVi()
    {
        return 4 * $this->a;
    }
}

if ($_POST['choice'] == 'rectangle') {
    $width = $_POST['width'];
    $height = $_POST['height'];
    if ($width == "" || $height == "") {
        echo "Chưa nhập dữ liệu";
    } else {

        $hinhChuNhat = new HinhChuNhat($width, $height);
        $dienTich = $hinhChuNhat->dienTich();
        $chuVi = $hinhChuNhat->chuVi();
    }
}
if ($_POST['choice'] == 'square') {
    $side = $_POST['side'];
    if ($side ==    "") {
        echo "Chưa nhập dữ liệu";
    } else {

        $hinhVuong = new HinhVuong($side);
        $dienTich = $hinhVuong->dienTich();
        $chuVi = $hinhVuong->chuVi();
    }
}
if ($_POST['choice'] == 'circle') {
    $radius = $_POST['radius'];
    if ($radius == "") {
        echo "Chưa nhập dữ liệu";
    } else {

        $hinhTron = new HinhTron($radius);
        $dienTich = $hinhTron->dienTich();
        $chuVi = $hinhTron->chuVi();
    }
}
?>


<body>
    <form action="index.php" method="post">
        <label for="cars">Chọn xe:</label>
        <select id="choice" name="choice">
            <option value="rectangle">Hình chữ nhật</option>
            <option value="square">Hình vuông</option>
            <option value="circle">Hình tròn</option>
        </select>
        <button type="submit">Xác nhận chọn</button>
    </form>

    <div>

        <h1>Hình chữ nhật</h1>
        <form method="post">
            <label for="input">Nhập dữ liệu:</label><br>
        </form>
        <form action="index.php" method="POST">
            <table border="1" cellpadding="5" cellspacing="0">
                <tr>
                    <td><label for="width">Chiều rộng:</label></td>
                    <td> <input type="text" placeholder="Width" name="width">
                    </td>
                </tr>
                <tr>
                    <td><label for="height">Chiều dài:</label></td>
                    <td> <input type="text" placeholder="Height" name="height">
                    </td>
                </tr>
                <tr>
                    <td>Chu vi hình chữ nhật là:</td>
                    <?php
                    if (isset($chuVi)) {
                        echo "<td>" . $chuVi . "</td>";
                    } else {
                        echo "<td>Chưa nhập dữ liệu</td>";
                    }
                    ?>

                </tr>
                <tr>
                    <td>Diện tích hình chữ nhật là:</td>
                    <?php
                    if (isset($dienTich)) {
                        echo "<td>" . $dienTich . "</td>";
                    } else {
                        echo "<td>Chưa nhập dữ liệu</td>";
                    }
                    ?>

                </tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" value="Gửi">
                </td>
                </tr>
            </table>
        </form>

    </div>
</body>

</html>