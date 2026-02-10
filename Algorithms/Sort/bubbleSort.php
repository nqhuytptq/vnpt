<?php
function bubbleSort($arr)
{
    $arr_count = count($arr);
    for ($i = 0; $i < $arr_count - 1; $i++) {
        for ($j = $arr_count - 1; $j > $i; $j--) {
            if ($arr[$j] < $arr[$j - 1]) {

                $temp = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $temp;
            }
        }
    }
    return $arr;
}
$arr = [4, 5, 3, 5, 3, 5, 2, 1, 5, 2, 124, 5, 1, 41, 125];
bubbleSort($arr);
print_r(bubbleSort($arr));
