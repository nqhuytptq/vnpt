<?php
function selectionSort($arr)
{
    $arr_count = count($arr);
    for ($i = 0; $i < $arr_count - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < $arr_count; $j++) {

            if ($arr[$j] < $arr[$min])
                $min = $j;
            if ($min != $i) {
                $temp = $arr[$min];
                $arr[$min] = $arr[$i];
                $arr[$i] = $temp;
            }
        }
    }
    return $arr;
}
$arr = [1, 4, 6, 2, 7, 3];

$sorted = selectionSort($arr);
print_r($sorted);
