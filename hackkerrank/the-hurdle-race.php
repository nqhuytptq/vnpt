<?php

/*
 * Complete the 'hurdleRace' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER k
 *  2. INTEGER_ARRAY height
 */

function hurdleRace($k, $height)
{
    $max = max($height);
    if ($k >= $max) {
        return 0;
    } else {
        return $max - $k;
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$k = intval($first_multiple_input[1]);

$height_temp = rtrim(fgets(STDIN));

$height = array_map('intval', preg_split('/ /', $height_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = hurdleRace($k, $height);

fwrite($fptr, $result . "\n");

fclose($fptr);
