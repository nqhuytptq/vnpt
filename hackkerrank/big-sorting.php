<?php

/*
 * Complete the 'bigSorting' function below.
 *
 * The function is expected to return a STRING_ARRAY.
 * The function accepts STRING_ARRAY unsorted as parameter.
 */

function bigSorting($unsorted)
{
    usort($unsorted, function ($a, $b) {
        if (strlen($a) == strlen($b)) {
            return strcmp($a, $b);
        }
        return strlen($a) - strlen($b);
    });
    return $unsorted;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$unsorted = array();

for ($i = 0; $i < $n; $i++) {
    $unsorted_item = rtrim(fgets(STDIN), "\r\n");
    $unsorted[] = $unsorted_item;
}

$result = bigSorting($unsorted);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
