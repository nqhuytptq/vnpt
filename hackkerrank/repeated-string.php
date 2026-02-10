<?php

/*
 * Complete the 'repeatedString' function below.
 *
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. STRING s
 *  2. LONG_INTEGER n
 */

function repeatedString($s, $n)
{
    $countA = substr_count($s, 'a');
    $lengthS = strlen($s);
    $fullRepeats = floor($n / $lengthS);
    $remainder = $n % $lengthS;
    $totalA = $fullRepeats * $countA + substr_count(substr($s, 0, $remainder), 'a');
    return $totalA;
}



$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$n = intval(trim(fgets(STDIN)));

$result = repeatedString($s, $n);

fwrite($fptr, $result . "\n");

fclose($fptr);
