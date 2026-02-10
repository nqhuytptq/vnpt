<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    function plusMinus($arr)
    {
        $arr_count = count($arr);
        $neg = 0;
        $pos = 0;
        $zero = 0;
        for ($i = 0; $i < $arr_count; $i++) {
            if ($arr[$i] > 0) $pos++;
            if ($arr[$i] < 0) $neg++;
            if ($arr[$i] == 0) $zero++;
        }
        $per_pos = ($pos / $arr_count);
        $per_neg = ($neg / $arr_count);
        $per_zero =  ($zero / $arr_count);

        return number_format($pos / $arr_count, 6);
    }
    $arr = [-4, 3, -9, 0, 4, 1];
    echo plusMinus($arr);
    ?>

</body>

</html>