<?php
function quickSort($arr)
{
    if (count($arr) <= 1) {
        return $arr;
    }
    $left = [];
    $right = [];
    $p = $arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $p) {
            array_push($left, $arr[$i]);
        } else {
            array_push($right, $arr[$i]);
        }
    }
    return array_merge(quickSort($left), [$p], quickSort($right));
}
$arr = [4, 1, 2, 6, 9, 8, 7, 0, 5, 3];
quickSort($arr);
print_r(quickSort($arr));
