<?php

/*
 * Complete the 'kaprekarNumbers' function below.
 *
 * The function accepts following parameters:
 *  1. INTEGER p
 *  2. INTEGER q
 */

function kaprekarNumbers($p, $q)
{
    $found = false;
    for ($i = $p; $i <= $q; $i++) {
        $d = strlen((string)$i);
        $squared = (string)($i * $i);
        $right = substr($squared, -$d);
        $left = substr($squared, 0, strlen($squared) - $d);
        if ($left === false) {
            $left = '0';
        }
        if ((int)$left + (int)$right == $i) {
            echo $i . ' ';
            $found = true;
        }
    }
}

$p = intval(trim(fgets(STDIN)));

$q = intval(trim(fgets(STDIN)));

kaprekarNumbers($p, $q);
