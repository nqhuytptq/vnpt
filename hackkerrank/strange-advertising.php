<?php

/*
 * Complete the 'viralAdvertising' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts INTEGER n as parameter.
 */

function viralAdvertising($n)
{
    $shared = 5;
    $liked = 0;
    $cumulative = 0;
    for ($day = 1; $day <= $n; $day++) {
        $liked = floor($shared / 2);
        $cumulative += $liked;
        $shared = $liked * 3;
    }
    return $cumulative;
}
$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));
$result = viralAdvertising($n);

fwrite($fptr, $result . "\n");

fclose($fptr);
