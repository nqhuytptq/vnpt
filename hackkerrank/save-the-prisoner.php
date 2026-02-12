<?php

/*
 * Complete the 'saveThePrisoner' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER m
 *  3. INTEGER s
 */

function saveThePrisoner($n, $m, $s)
{
    $result = ($s + $m - 1) % $n;
    if ($result == 0) {
        return $n;
    } else {
        return $result;
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$t = intval(trim(fgets(STDIN)));

for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

    $n = intval($first_multiple_input[0]);

    $m = intval($first_multiple_input[1]);

    $s = intval($first_multiple_input[2]);

    $result = saveThePrisoner($n, $m, $s);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
