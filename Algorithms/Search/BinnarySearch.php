<?php
include('../Sort/BubbleSort.php');
function binarySearch($arr, $k)
{
    $left = 0;
    $right = count($arr) - 1;
    while ($left <= $right) {
        $mid = round(($left + $right) / 2, 0);
        if ($arr[$mid] == $k) {
            return $mid;
        } elseif ($arr[$mid] < $k) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }
    return -1;
}
$arr = [4, 1, 2, 6, 9, 8, 7, 0, 5, 3];
$k = 5;
print_r(bubbleSort($arr));
print_r(binarySearch(bubbleSort($arr), $k));
