<?php
function linearSearch($arr, $k)
{
    $arr_count = count($arr);
    for ($i = 0; $i < $arr_count; $i++) {
        if ($arr[$i] == $k) {
            return $i;
        }
    }
    return -1;
}
$arr = [1, 4, 6, 2, 7, 3];
$k = 7;
print_r(linearSearch($arr, $k));
