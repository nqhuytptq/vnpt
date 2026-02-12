<?php

/*
 * Complete the 'encryption' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING s as parameter.
 */

function encryption($s)
{
    $s = str_replace(' ', '', $s);
    $length = strlen($s);
    $rows = floor(sqrt($length));
    $cols = ceil(sqrt($length));
    if ($rows * $cols < $length) {
        $rows++;
    }
    $result = [];
    for ($i = 0; $i < $cols; $i++) {
        $word = '';
        for ($j = 0; $j < $rows; $j++) {
            $index = $j * $cols + $i;
            if ($index < $length) {
                $word .= $s[$index];
            }
        }
        $result[] = $word;
    }
    return implode(' ', $result);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$s = rtrim(fgets(STDIN), "\r\n");

$result = encryption($s);

fwrite($fptr, $result . "\n");

fclose($fptr);
