<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<?php


class TinhToan
{
    public $a;
    public $b;

    function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    function cong()
    {
        return $this->a + $this->b;
    }

    function tru()
    {
        return $this->a - $this->b;
    }

    function nhan()
    {
        return $this->a * $this->b;
    }
    function chia()
    {
        return $this->a / $this->b;
    }
}




?>

<body>
    <h1>Tính toán</h1>
    <p>Nhập dữ liệu:
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $a = $_POST['a'];
            $b = $_POST['b'];
            $choice = $_POST['choice'];
            if ($a == "" || $b == "") {
                echo "Chưa nhập dữ liệu";
            } else {

                $tinhToan = new TinhToan($a, $b);
                switch ($choice) {
                    case 'Cộng':
                        $ketQua = $tinhToan->cong();
                        break;
                    case 'Trừ':
                        $ketQua = $tinhToan->tru();
                        break;
                    case 'Nhân':
                        $ketQua = $tinhToan->nhan();
                        break;
                    case 'Chia':
                        $ketQua = $tinhToan->chia();
                        break;
                }
            }
        } ?>
    </p>
    <form action="index.php" method="POST">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <td><label for="a">Nhập số thứ nhất:</label></td>
                <td> <input type="text" placeholder="Số thứ nhất" name="a">
                </td>
            </tr>
            <tr>
                <td><label for="b">Nhập số thứ hai:</label></td>
                <td> <input type="text" placeholder="Số thứ hai" name="b">
                </td>
            </tr>
            <tr>
                <td>Kết quả:</td>

                <?php
                if (isset($ketQua)) {
                    echo "<td>$ketQua</td>";
                } else {
                    echo "<td>Chưa nhập dữ liệu</td>";
                }
                ?>
            </tr>

            <td colspan="2" style="text-align:center;">
                <input type="submit" name="choice" value="Cộng">
                <input type="submit" name="choice" value="Trừ">
                <input type="submit" name="choice" value="Nhân">
                <input type="submit" name="choice" value="Chia">

            </td>
            </tr>
        </table>
    </form>


</body>

</html>