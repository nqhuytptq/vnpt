<?php

/*
 * Complete the 'beautifulDays' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER i
 *  2. INTEGER j
 *  3. INTEGER k
 */

function beautifulDays($i, $j, $k)
{
    $count = 0;
    for ($a = $i; $a <= $j; $a++) {
        $n = $a;
        $rev = 0;
        while ($n > 0) {
            $rev = $rev * 10 + ($n % 10);
            $n = intdiv($n, 10);
        }
        if (abs($a - $rev) % $k === 0) {
            $count++;
        }
    }
    return $count;
}

beautifulDays(819945, 946749, 8946432);
