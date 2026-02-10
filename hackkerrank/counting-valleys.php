<?php

/*
 * Complete the 'countingValleys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER steps
 *  2. STRING path
 */

function countingValleys($steps, $path)
{
    $high = 0;
    $valley_count = 0;
    for ($i = 0; $i < $steps; $i++) {
        if ($path[$i] == 'U') {
            $high++;
            if ($high == 0) {
                $valley_count++;
            }
        } else {
            $high--;
        }
    }
    return $valley_count;
}


$steps = 8;

$path = 'UDDDUDUU';

echo $result = countingValleys($steps, $path);
