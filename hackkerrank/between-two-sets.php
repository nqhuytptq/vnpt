<?php

/*
 * Complete the 'getTotalX' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER_ARRAY a
 *  2. INTEGER_ARRAY b
 */

function getTotalX($a, $b)
{
    $count = 0;
    $maxA = max($a);
    $minB = min($b);
    for ($i = $maxA; $i <= $minB; $i++) {

        $check = true;
        for ($j = 0; $j < count($a); $j++) {
            if ($i % $a[$j] != 0) {
                $check = false;
                break;
            }
        }
        for ($k = 0; $k < count($b); $k++) {
            if ($b[$k] % $i != 0) {
                $check = false;
                break;
            }
        }
        if ($check) {
            $count++;
        }
    }
    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$m = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$brr_temp = rtrim(fgets(STDIN));

$brr = array_map('intval', preg_split('/ /', $brr_temp, -1, PREG_SPLIT_NO_EMPTY));

$total = getTotalX($arr, $brr);

fwrite($fptr, $total . "\n");

fclose($fptr);
