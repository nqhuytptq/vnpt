<?php

/*
 * Complete the 'permutationEquation' function below.
 *
 * The function is expected to return an INTEGER_ARRAY.
 * The function accepts INTEGER_ARRAY p as parameter.
 */

function permutationEquation($p)
{
    $n = count($p);
    $result = [];
    for ($x = 1; $x <= $n; $x++) {
        $first = array_search($x, $p) + 1;
        $second = array_search($first, $p) + 1;
        $result[] = $second;
    }
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$p_temp = rtrim(fgets(STDIN));

$p = array_map('intval', preg_split('/ /', $p_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = permutationEquation($p);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
